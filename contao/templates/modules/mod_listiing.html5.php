<?php $this->extend('block_unsearchable'); ?>

<?php $this->block('content'); ?>

<ul>
    <?php foreach ($this->items as $item): ?>
        <li>
            <h3><?php echo $item['title']; ?></h3>

            <div>
                <p><?php echo $item['description']; ?></p>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<?php $this->endblock(); ?>
