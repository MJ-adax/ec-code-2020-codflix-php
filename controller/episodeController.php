<?php


require_once( 'model/serie.php' );

/***************************
* ----- LOAD DETAIL PAGE -----
***************************/


function episodePage()
{

    
    $idCurrentEpisode = isset( $_GET['episode'] ) ? $_GET['episode'] : null;
    print($_GET['episode']);
    $infosEpisode= Serie::getDetailEpisode( $idCurrentEpisode );
    //var_dump($infosEpisode);exit;

    //print($infosMedia['type']);


    require('view/episodeView.php');

}