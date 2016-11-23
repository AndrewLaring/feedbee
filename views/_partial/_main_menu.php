<?php use laring\core\Session; ?>

<?php $is_user = Session::get('user_id'); ?>


<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php if ($is_user): ?>
                <a href="<?= URL ?>/user" class="navbar-brand">Hello, <?= Session::get('user_name') ?></a>
            <?php else: ?>
                <a class="navbar-brand" href="<?= URL ?>">BEE JEE</a>
            <?php endif; ?>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if (!$is_user): ?>
                    <li><a href="<?= URL ?>index">Главная</a></li>
                    <li><a href="<?= URL ?>login">Вход</a></li>
                    <li><a href="<?= URL ?>registration">Регистрация</a></li>
                <?php endif; ?>
                <li><a href="<?= URL ?>feedback">Обратная связь</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>