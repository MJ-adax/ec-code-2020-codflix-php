<?php ob_start(); ?>

<div>
    <iframe 
        allowfullscreen="" frameborder="0"
        width="800"
        height="400"
        src="<?= $infosMedia['trailer_url']; ?>" >
    </iframe>
    <div>
        <div class="title"> <?= $infosMedia['title']; ?></div>
        <div class="title"> "<?= $infosMedia['summary']; ?>"</div>
        <div>
            <div class="title"> <?= $infosMedia['release_date']; ?></div>
            <div class="title"> <?= $infosMedia['type']; ?></div>
        </div>  
    </div>  
</div>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>