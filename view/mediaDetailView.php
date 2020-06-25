<?php ob_start(); ?>

<div>
    

    <div>
        <h1><?= $infosMedia['title']; ?></h1>
        <div class="title"> "<?= $infosMedia['summary']; ?>"</div>
        <iframe 
            allowfullscreen="" frameborder="0"
            width="800"
            height="400"
            src="<?= $infosMedia['trailer_url']; ?>" >
        </iframe>
        <div>
            <div style="display: flex;">
                <div style="float: left; width: 50%;"><?= $infosMedia['release_date']; ?></div>
                <div style="float: right; width: 50%;"> <?= $infosMedia['type']; ?></div>
            </div>  
        </div>  
    </div>
   

   
</div>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>