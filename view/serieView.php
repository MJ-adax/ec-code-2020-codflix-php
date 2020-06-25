<?php ob_start(); ?>

<div class="media-list">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-first-season-tab" data-toggle="pill" href="#pills-first-season" role="tab" aria-controls="pills-first-season" aria-selected="true">Saison 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-second-season-tab" data-toggle="pill" href="#pills-second-season" role="tab" aria-controls="pills-second-season" aria-selected="false">Saison 2</a>
        </li>
    </ul>
    <?php foreach( $nbSeasons as $season): ?>
        <?php foreach( $episodes as $episode ): ?>
            <?php if( $season['season'] == $episode['season']): ?>
            
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-first-season" role="tabpanel" aria-labelledby="pills-first-season-tab">...</div>
                    <div class="tab-pane fade" id="pills-second-season" role="tabpanel" aria-labelledby="pills-second-season-tab">...</div>
                </div>

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