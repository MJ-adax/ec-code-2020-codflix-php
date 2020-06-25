<?php ob_start(); ?>

<div class="media-list">

    <?php foreach( $nbSeasons as $season): ?>
        <?php foreach( $episodes as $episode ): ?>
            <?php if( $season['season'] == $episode['season']): ?>
            
                <a class="item" href="index.php?serie=<?= $episode['media_id']?>&episode=<?= $episode['id']; ?>">
                    <div class="video">
                        <div>
                            <iframe allowfullscreen="" frameborder="0"
                                    src="<?= $episode['trailer_url']; ?>" ></iframe>
                        </div>
                    </div>
                    <div class="title"><?= $episode['name_episode']; ?></div>
                </a>

            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>