<?php use laring\core\Session; ?>

<?php if (Session::get('user_id') == FALSE): ?>
    <h2>Войдите или зарегистрируйтесь.</h2>
<?php else: ?>
    <h3>Hello, <?= Session::get('user_name') ?> </h3>
<?php endif; ?>
