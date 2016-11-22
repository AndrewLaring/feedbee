<div class="feedback" data-status="<?= $this->fb['STATUS'] ?>" data-fId="<?= $this->fb['ID'] ?>">


	<?php if ($this->user_type == 1 && !isset($this->fb['PREV'])): ?>
		<div class="admin_buttons row">
			<button class="admin_edit btn btn-default col-lg-3" type="button">Редактировать</button>
			<?php if ($this->fb['STATUS'] == 1): ?>
				<button class="status_btn btn btn-danger col-lg-3" data-status="<?= $this->fb['STATUS'] ?>"
						data-fId="<?= $this->fb['ID'] ?>" type="button">Запретить
				</button>
			<?php else: ?>
				<button class="status_btn btn btn-success col-lg-3" data-status="<?= $this->fb['STATUS'] ?>"
						data-fId="<?= $this->fb['ID'] ?>" type="button">Разрешить
				</button>
			<?php endif; ?>
		</div>
	<?php endif; ?>


	<div class="fb_name col-lg-3"><?= $this->fb['EMAIL'] ?></div>
	<div class="fb_email col-lg-3"><?= $this->fb['NAME'] ?></div>
	<div class="fb_created_time col-lg-3"><?= $this->fb['CREATED_TIME'] ?></div>
	<div class="fb_edited col-lg-3" style="color: red"><?= $this->fb['STATUS'] == 3 ? 'EDITED BY ADMIN' : NULL ?></div>

	<div class="fb_wrap">
		<div class="col-lg-4">
			<?php if ($this->fb['IMAGE']): ?>
				<img class="<?= isset($this->fb['PREV']) ? 'fb_image_prev' : 'fb_image' ?>"
					 src="<?= URL . 'images/' . $this->fb['IMAGE'] ?>">
			<?php endif; ?>
		</div>
		<div class="col-lg-8 fb_message_wrap">
			<div class="fb_message"><?= $this->fb['MESSAGE'] ?></div>
		</div>
	</div>


</div>

