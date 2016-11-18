<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\DashboardAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\widgets\AdminMenuWidget;

$user = Yii::$app->user->identity;
$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;

DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><?= Yii::$app->params['siteShortName'] ?></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><?= Yii::$app->params['siteName'] ?></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= (isset($user->avatar)) ? $user->avatar : '/img/avatar.png' ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?= (isset($user->fullname)) ? $user->fullname : $user->username ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?= (isset($user->avatar)) ? $user->avatar : '/img/avatar.png' ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?= (isset($user->fullname)) ? $user->fullname : $user->username ?> - <?= (isset($user->profession)) ? $user->profession : $user->username ?>
                                    <small>Member since <?= Yii::$app->getFormatter()->asDate($user->created_at, 'long') ?></small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <?= Html::a('Profile', ['users/view', 'id' => Yii::$app->user->identity->id], [
                                        'class' => 'btn btn-default btn-flat']) ?>
                                </div>
                                <div class="pull-right">

                                    <?= Html::a('Sign Out', ['/site/logout'], [
                                        'class' => 'btn btn-default btn-flat']) ?>

                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= (isset($user->avatar)) ? $user->avatar : '/img/avatar.png' ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?= (isset($user->fullname)) ? $user->fullname : $user->username ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?= AdminMenuWidget::widget([
                'controller' => $controller,
                'action' => $action,
                'data' => Yii::$app->params['mainMenuData'],
            ]) ?>
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= Html::encode($this->title) ?>
                <small>Control panel</small>
            </h1>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
        </section>

        <!-- Main content -->
        <section class="content">
            <?= $content ?>
        </section>
        <!-- /.content -->
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.7
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://phpmyblog.ru">PHPMyblog.ru</a>.</strong> All rights
        reserved.
    </footer>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
