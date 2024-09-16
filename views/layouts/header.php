<?php

use yii\helpers\Html;
use app\models\Users;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;

/* @var $this \yii\web\View */
/* @var $content string */

$user = Yii::$app->user->identity;
$imagePath = $user->image ? Yii::$app->request->baseUrl . '/uploads/' . $user->image : Yii::$app->request->baseUrl . '/uploads/default-user.png';

BootstrapAsset::register($this);
BootstrapPluginAsset::register($this);

?>

<style>
    /* Header Styles */
    .main-header {
        background-color: #1e2a38; /* Matches sidebar background color */
        border-bottom: 1px solid #34495e; /* Adds a subtle border */
    }

    .logo {
        color: #ffffff !important; /* Logo text color */
    }

    .navbar {
        background-color: #1e2a38 !important; /* Navbar background color */
    }

    .navbar-nav .nav-link {
        color: #ffffff !important; /* Navbar links color */
        transition: color 0.3s ease; /* Smooth color transition */
    }

    .navbar-nav .nav-link:hover {
        color: #007bff !important; /* Change color on hover */
    }

    .dropdown-menu {
        background-color: #2c3e50 !important; /* Dropdown menu background color */
        color: #ffffff !important; /* Dropdown menu text color */
        border: none; /* Remove border for a cleaner look */
    }

    .dropdown-menu .dropdown-item {
        color: #ffffff !important; /* Dropdown item text color */
        transition: background-color 0.3s ease; /* Smooth background color transition */
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #34495e !important; /* Highlight color on hover */
    }

    /* Toggle Button */
    .sidebar-toggle {
        color: #ffffff !important; /* Toggle button text color */
    }

    /* User Image */
    .user-image {
        width: 30px; /* Adjust as needed */
        height: 30px; /* Adjust as needed */
        border-radius: 50%; /* Make image round */
    }

    .user-info {
        display: inline-block;
        margin-left: 10px; /* Spacing between image and text */
    }

    /* For Responsive Design */
    @media (max-width: 767.98px) {
        .navbar-nav .nav-link {
            font-size: 14px; /* Adjust font size for smaller screens */
        }
    }
    .skin-blue .main-header .logo
    {
        background-color: #1e2a38 !important;
    }
</style>

<header class="main-header">
    <?= Html::a('<span class="logo-mini">TW</span><span class="logo-lg">TradeWave</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account -->
                <?php if (Yii::$app->user->isGuest): ?>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">Login</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-body">
                                <div class="pull-right">
                                    <?= Html::a('Login', ['/site/login'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']) ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= $imagePath ?>" alt="User Image" class="user-image">
                            <span class="hidden-xs user-info">
                                <span class="user-name">Hello, <?= Html::encode($user->username) ?></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="<?= $imagePath ?>" alt="User Image" class="img-circle">
                                <p><?= Html::encode($user->username) ?><small><?= Html::encode($user->email) ?></small></p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <?= Html::a('Update Password', ['/users/change-password'], ['class' => 'btn btn-default btn-flat']) ?>
                                </div>
                                <div class="pull-right">
                                    <?= Html::a('Sign out', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']) ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
