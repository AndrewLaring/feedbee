<?php foreach ($this->msg as $msg) : ?>
    <?php echo $msg ?><br>
<?php endforeach ?>

<form action="<?php echo URL; ?>login/run" method="POST">
    <div class="input-group">
        <input class="form-control" type="text" name="email" required placeholder="E-MAIL*">
        <input class="form-control" type="password" name="password" required placeholder="Password *">

        <input class="form-control btn btn-info pull-left" type="submit" value="Войти">
    </div>
</form>