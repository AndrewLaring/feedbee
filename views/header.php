<?php use laring\core\Session; ?>
<?php $is_user = Session::get('user_id'); ?>

<div class="container header header-container">
    <div class="row">
        <div href="<?= URL ?>" class="header-logo col-sm-8 col-xs-4">
   <!-- <img src="images/main/logo.png" alt=""> -->
          
          
          <?php $this->render('_partial/_main_menu', 1); ?>
          
           
        </div>


        <div href="<?= URL ?>" class="header-text col-sm-4 col-xs-8">
            <?php if ($is_user): ?>
                <a href="<?= URL ?>/user" class="navbar-brand">Hello, <?= Session::get('user_name') ?></a>
                <a href="<?= URL ?>user/logout" class="navbar-brand exit-btn">Выйти</a>
            <?php else: ?>
                <a class="navbar-brand" href="<?= URL ?>">BEE JEE</a>
            <?php endif; ?>

        </div>


    </div>
</div>