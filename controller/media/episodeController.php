<?php


require_once( 'model/serie.php' );

/*************************************
* ----- LOAD EPISODE DETAIL PAGE -----
*************************************/

function episodePage()
{
    //TODO: Get the informations of the serie to display.s

    $idCurrentEpisode = isset( $_GET['episode'] ) ? $_GET['episode'] : null;
    $infosEpisode= Serie::getDetailEpisode( $idCurrentEpisode );
    
    require('view/episodeView.php');

}