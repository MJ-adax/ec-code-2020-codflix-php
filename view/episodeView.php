<?php ob_start(); ?>

<div>  

    <div>
        <div class="row ">
            <h1 class="col-md-3-30" style="margin-right: 5%"><?= $infosEpisode['name_episode']; ?></h1>
            <h4 class="col-md-3"> <?=  gmdate("i:s", $infosEpisode['duration']); ?></h4>
            <div class="col-md-3"><?= $infosEpisode['release_date']; ?></div>
        </div>
        
        <iframe 
            allowfullscreen="" frameborder="0"
            width="800"
            height="400"
            src="<?= $infosEpisode['trailer_url']; ?>?autoplay=1">
        </iframe>
        <div class="title" style="margin-top: 3%"> "<?= $infosEpisode['summary']; ?>"</div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>