<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="header">
    <img src="<?= MOLONI_IMAGES_URL ?>logo.svg" width='300px' alt="Moloni">
</div>

<?php settings_errors(); ?>
<?php $tab = $_GET['tab'] ?? '' ?>

<nav class="nav-tab-wrapper woo-nav-tab-wrapper">
    <a href="<?= admin_url('admin.php?page=moloni') ?>" class="nav-tab <?= $tab === '' ? 'nav-tab-active' : '' ?>">
        <?= __('Encomendas') ?>
    </a>

    <a href="<?= admin_url('admin.php?page=moloni&tab=settings') ?>"
        class="nav-tab <?= $tab === 'settings' ? 'nav-tab-active' : '' ?>">
        <?= __('B2C') ?>
    </a>

    <a href="<?= admin_url('admin.php?page=moloni&tab=settingsB2B') ?>"
        class="nav-tab <?= $tab === 'settingsB2B' ? 'nav-tab-active' : '' ?>">
        <?= __('B2B') ?>
    </a>

    <a href="<?= admin_url('admin.php?page=moloni&tab=logs') ?>"
        class="nav-tab <?= $tab === 'logs' ? 'nav-tab-active' : '' ?>">
        <?= __('Registos') ?>
    </a>

    <a href="<?= admin_url('admin.php?page=moloni&tab=tools') ?>"
        class="nav-tab <?= $tab === 'tools' ? 'nav-tab-active' : '' ?>">
        <?= __('Ferramentas') ?>
    </a>
</nav>
<?php

if (isset($pluginErrorException) && $pluginErrorException instanceof \Moloni\Error) {
    $pluginErrorException->showError();
}


$tab = isset($_GET['tab']) ? $_GET['tab'] : '';

switch ($tab) {
    case 'tools':
        include MOLONI_TEMPLATE_DIR . 'Containers/Tools.php';
        break;
    case 'settings':
        include MOLONI_TEMPLATE_DIR . 'Containers/Settings.php';
        break;
    case 'settingsB2B':
        include MOLONI_TEMPLATE_DIR . 'Containers/SettingsB2B.php';
        break;
    case 'logs':
        include MOLONI_TEMPLATE_DIR . 'Containers/Logs.php';
        break;
    default:
        include MOLONI_TEMPLATE_DIR . 'Containers/PendingOrders.php';
        break;
}