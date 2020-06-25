<?php ob_start(); ?>

<div>
    

    <div>
        <div class="row ">
            <h1 class="col-md-3" style="margin-right: 5%"><?= $infosMedia['title']; ?></h1>
            <h4 class="col-md-3"> <?= $infosMedia['type']; ?></h4>
            <div class="col-md-3"><?= $infosMedia['release_date']; ?></div>
        </div>
        
        <iframe 
            allowfullscreen="" frameborder="0"
            width="800"
            height="400"
            src="<?= $infosMedia['trailer_url']; ?>" >
        </iframe>
        <div class="title" style="margin-top: 3%"> "<?= $infosMedia['summary']; ?>"</div>
    </div>
   

   
</div>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>