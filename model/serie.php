<?php

require_once( 'database.php' );

class Serie {

  protected $id;
  protected $media_id;
  protected $season;
  protected $name_episode;
  protected $num_episode;
  protected $summary;
  protected $release_date;
  protected $trailer_url;
  protected $duration;

  public function __construct( $serie ) {

    $this->setId( isset( $serie->id ) ? $serie->id : null );
    $this->setMediaId( $serie->media_id );
    $this->setNameEpisode( $serie->name_episode );
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }

  public function setMediaId( $media_id ) {
    $this->media_id = $media_id;
  }

  public function setNameEpisode( $name_episode ) {
    $this->name_episode = $name_episode;
  }

  public function setNumEpisode( $num_episode ) {
    $this->num_episode = $num_episode;
  }

  public function setSeason( $season ) {
    $this->season = $season;
  }

  public function setReleaseDate( $release_date ) {
    $this->release_date = $release_date;
  }

  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }

  public function getMediaId() {
    return $this->media_id;
  }

  public function getNameEpisode() {
    return $this->name_episode;
  }

  public function getNumEpisode() {
    return $this->num_episode;
  }

  public function getSeason() {
    return $this->season;
  }

  public function getReleaseDate() {
    return $this->release_date;
  }

  public function getSummary() {
    return $this->summary;
  }

  public function getTrailerUrl() {
    return $this->trailer_url;
  }

  public function getDuration() {
      return $this->duration;
  }

  /**************************************
  * -------- GET LIST OF EPISODES--------
  ***************************************/

  public static function filterEpisodes( $name_episode ) {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM serie" );
    $req->execute( array( '%' . $name_episode . '%' ));

    // Close databse connection
    $db   = null;

    return $req->fetchAll();

  }

  /******************************************
  * -------- GET EPISODES FOR A SERIE--------
  ******************************************/

  public static function getEpisodes( $media_id ) {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM serie WHERE media_id = $media_id");
    $req->execute( array($media_id));
 
    $db = null;

    return $req->fetchAll();

  }

  /********************************************
  * -------- GET DETAIL FOR ONE EPISODE--------
  *********************************************/

  public static function getDetailEpisode( $num_episode ) {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM serie WHERE id = $num_episode");
    $req->execute( array($num_episode));
 
    $db = null;

    return $req->fetch();


  }

  /****************************************************
  * -------- GET NUMBER OF SEASONS FOR A SEASON--------
  *****************************************************/

  public static function getNumberOfSeasons( $season ) {
    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT season FROM serie WHERE media_id = ? GROUP BY season");
    $req->execute( array($season));
 
    $db = null;

    return $req->fetchAll();
    


  }


}