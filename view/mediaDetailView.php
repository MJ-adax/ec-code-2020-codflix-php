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
    <?php if($infosMedia['type'] == 'Serie'):?>
    
        <div>
            <h3>Saison 1</h3>
            <div class="media-list">
                <?php foreach( $infosSerie as $episode ): ?>
                    <a class="item" href="index.php?media=<?= $episode['id']; ?>">
                        <div class="video">
                            <div>
                                <iframe allowfullscreen="" frameborder="0"
                                        src="<?= $episode['trailer_url']; ?>" ></iframe>
                            </div>
                        </div>
                        <div class="title"><?= $episode['name_episode']; ?></div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

   
</div>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>