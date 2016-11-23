<?php foreach ($this->msg as $msg) : ?>
    <?php echo $msg ?><br>
<?php endforeach ?>

<div class="row fb-form-row">
    <form enctype="multipart/form-data" action="<?php echo URL; ?>feedback/create_action" method="POST"
          id="registration-form">

                <div class="col-sm-4 col-xs-12 fb-form-inputs">
<!--        <div class="col-sm-12 col-xs-12 fb-form-inputs">-->
            <div class="input-group">
                <!--<label>NAME *</label>-->
                <input class="form-control" type="text" name="name" required placeholder="Имя*"
                       pattern="^[a-zA-Zа-яА-Яё][а-яА-Яёa-zA-Z0-9-_\.]{1,20}$">
                <!--<label>E-MAIL*</label>-->
                <input class="form-control" type="email" name="email" required placeholder="E-MAIL*">
                <!--                <label>Прикрепить изображение</label>-->
                <input class="form-control" name="picture" type="file">


            </div>
        </div>

                <div class="input-group col-sm-8 col-xs-12 fb-form-textarea">
<!--        <div class="input-group col-sm-12 col-xs-12 fb-form-textarea">-->
        <textarea class="form-control message_area" rows="6" type="text" name="message" required
                  placeholder="Сообщение*"></textarea>
        </div>

        <div class="input-group col-sm-12 fb-form-buttons">
            <input class="preview_btn btn btn-info pull-left" id="preview" type="button"
                   value="Предварительный просмотр">
            <input type="submit" class="btn btn-info pull-right" value="Отправить">
        </div>

    </form>
</div>


<div class="pre_fb" style="display: none">
    <?php
    $this->fb = array();
    $this->fb['ID'] = 0;
    $this->fb['NAME'] = '';
    $this->fb['EMAIL'] = '';
    $this->fb['IMAGE'] = 1;
    $this->fb['MESSAGE'] = '';
    $this->fb['CREATED_TIME'] = '';
    $this->fb['STATUS'] = 0;
    $this->fb['PREV'] = 1;
    $this->render('feedback/fb', 1);
    ?>
</div>

