<div class="row">
    <ul class="sort_wrap_btns nav navbar-nav col-sm-12">
        <div class="sort_wrap">
            <li role="presentation">
                <button type="button" class="navbar-brand sort_key" data-sort="NAME">NAME</button>
            </li>
            <li role="presentation">
                <button type="button" class="navbar-brand sort_key" data-sort="EMAIL">EMAIL</button>
            </li>
            <li role="presentation">
                <button type="button" class="navbar-brand sort_key" data-sort="CREATED_TIME">DATE</button>
            </li>
        </div>
    </ul>
</div>

<?php $this->render('feedback/fb_form', 1); ?>


<?php foreach ($this->feedbacks as $feedback) : ?>
    <?php
    $this->fb = $feedback;
    $this->render('feedback/fb', 1);
    ?>
<?php endforeach; ?>

