<?php foreach ($this->msg as $msg) : ?>
    <?php echo $msg ?><br>
<?php endforeach ?>

<form action="<?php echo URL; ?>registration/registrate_action" method="POST">
    <div class="input-group">
        <input class="form-control" type="text" name="name" required placeholder="имя" pattern="^[a-zA-Zа-яА-Яё][а-яА-Яёa-zA-Z0-9-_\.]{1,20}$">
        <input class="form-control" type="email" name="email" required placeholder="адрес электронной почты">
        <input class="form-control" type="password" name="password" required placeholder="пароль">
        <input class="form-control" type="password" name="conf_pass" required placeholder="подтвердите пароль">

        <input class="form-control btn btn-info pull-left" type="submit" value="Зарегистрироваться">
    </div>
</form>