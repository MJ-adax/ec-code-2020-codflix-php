<?php


require_once( 'model/media.php' );

/***************************
* ----- LOAD DETAIL PAGE -----
***************************/


function detailMediaPage()
{

    
    $idCurrentMedia = isset( $_GET['media'] ) ? $_GET['media'] : null;
    $infosMedia = Media::getMedia( $idCurrentMedia );

    if ($infosMedia['type'] == 'Serie')
    {
        $infosSerie = Media::getEpisodes( $idCurrentMedia );
    }
    //print($infosMedia['type']);


    require('view/mediaDetailView.php');

}

