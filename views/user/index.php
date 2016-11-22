<table class="user_info table table-striped">
    <?php foreach ($this->user as $key => $val) : ?>

        <tr><td><?php echo $key ?></td>
            <td><?php echo $val ?></td></tr>
        <?php // echo $key . ' => ' . $val . '<br>';  ?>

    <?php endforeach; ?>
</table>