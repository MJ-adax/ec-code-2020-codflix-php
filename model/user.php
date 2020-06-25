<?php

require_once( 'database.php' );

class User {

  protected $id;
  protected $email;
  protected $password;

  public function __construct( $user = null ) {

    if( $user != null ):
      $this->setId( isset( $user->id ) ? $user->id : null );
      $this->setEmail( $user->email );
      $this->setPassword( $user->password, isset( $user->password_confirm ) ? $user->password_confirm : false );
    endif;
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }

  public function setEmail( $email ) {
    $this->email = $email;
  }

  public function setPassword( $password, $password_confirm = false ) {
    $this->password = $password;
    
    //print($this->password);
  }

  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getPassword() {
    return $this->password;
  }

  /***********************************
  * -------- CREATE NEW USER ---------
  ************************************/

  public function createUser() {

    // Open database connection
    $db   = init_db();
    echo "le mot de passe".$this->getPassword();
    // Check if email already exist
    $req  = $db->prepare( "SELECT * FROM user WHERE email = ?" );
    $req->execute( array( $this->getEmail() ) );

    if( $req->rowCount() > 0 ) throw new Exception( "Email ou mot de passe incorrect" );

    // Insert new user
    $req->closeCursor();

    $req  = $db->prepare( "INSERT INTO user ( email, password ) VALUES ( :email, :password )" );
    $req->execute( array(
      'email'     => $this->getEmail(),
      'password'  => $this->getPassword()
    ));
    

    // Close databse connection
    $db = null;

  }

  /**************************************
  * -------- GET USER DATA BY ID --------
  ***************************************/

  public static function getUserById( $id ) {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM user WHERE id = ?" );
    $req->execute( array( $id ));

    // Close databse connection
    $db   = null;

    return $req->fetch();
  }

  /***************************************
  * ------- GET USER DATA BY EMAIL -------
  ****************************************/

  public function getUserByEmail() {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM user WHERE email = ?" );
    $req->execute( array( $this->getEmail() ));

    // Close databse connection
    $db   = null;

    return $req->fetch();
  }

  /**************************************
  * -------- MODIFY USER PASSWORD --------
  ***************************************/

  public static function modifyUserPassword( $password ) {

    $current_id = $_SESSION['user_id'];
    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "UPDATE `user` SET `password`= ? WHERE id = ?" );
    $req->execute( array( $password, $current_id ));

    // Close databse connection
    $db   = null;

    return $req->fetch();
  }

  /**************************************
  * -------- MODIFY USER EMAIL --------
  ***************************************/

  public static function modifyUserEmail( $email ) {

    $current_id = $_SESSION['user_id'];
   
    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "UPDATE `user` SET `email`= ? WHERE id = ?" );
    $req->execute( array( $email, $current_id ));

    // Close databse connection
    $db   = null;

    return $req->fetch();
  }

  /**************************************
  * -------- DELETE USER PROFILE --------
  ***************************************/

  public static function deleteUserProfile( $id ) {

    
    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "DELETE FROM `user` WHERE id = ?" );
    $req->execute( array( $id ));

    // Close databse connection
    $db   = null;

    return $req->fetch();
  }

}
