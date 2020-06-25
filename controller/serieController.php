<?php

require_once( 'model/serie.php' );

/***************************
* ----- LOAD SERIE PAGE -----
***************************/

function seriePage() {

  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  $episodes = Serie::filterEpisodes( $search );

  require('view/serieView.php');

}