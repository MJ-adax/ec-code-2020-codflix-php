<?php ob_start(); ?>

<div>
    

    <div>
    
        <h1><?php $infosEpisode['name_episode']; ?></h1>
        <div class="title"> "<?= $infosEpisode['summary']; ?>"</div>
        <iframe 
            allowfullscreen="" frameborder="0"
            width="800"
            height="400"
            src="<?= $infosEpisode['trailer_url']; ?>?autoplay=1">
        </iframe>
        <div>
            <div style="display: flex;">
                <div style="float: left; width: 50%;"><?= $infosEpisode['release_date']; ?></div>
                <div style="float: right; width: 50%;"> <?= gmdate("i:s", $infosEpisode['duration']); ?></div>
            </div>  
        </div>  
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>