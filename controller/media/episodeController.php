<?php


require_once( 'model/serie.php' );

/*************************************
* ----- LOAD EPISODE DETAIL PAGE -----
*************************************/

function episodePage()
{

    $idCurrentEpisode = isset( $_GET['episode'] ) ? $_GET['episode'] : null;
    $infosEpisode= Serie::getDetailEpisode( $idCurrentEpisode );
    
    require('view/episodeView.php');

}