<?php

require_once( 'model/serie.php' );

/***************************
* ----- LOAD SERIE PAGE WITH EPISODES -----
***************************/

function seriePage() {

  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  $episodes = Serie::filterEpisodes( $search );
  $nbSeasons = Serie::getNumberOfSeasons($_GET['serie']);


  require('view/serieView.php');

}