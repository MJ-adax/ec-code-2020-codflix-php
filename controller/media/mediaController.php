<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD LIST MEDIA PAGE -----
***************************/

function mediaPage() {

  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  $medias = Media::filterMedias( $search );

  require('view/mediaListView.php');

}
