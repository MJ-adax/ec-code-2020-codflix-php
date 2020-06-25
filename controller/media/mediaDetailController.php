<?php


require_once( 'model/media.php' );

/***************************
* ----- LOAD MEDIA DETAIL PAGE -----
***************************/


function detailMediaPage()
{

    $idCurrentMedia = isset( $_GET['media'] ) ? $_GET['media'] : null;
    $infosMedia = Media::getMedia( $idCurrentMedia );

    require('view/mediaDetailView.php');

}

