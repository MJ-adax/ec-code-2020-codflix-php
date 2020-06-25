<?php

require_once( 'model/user.php' );

/****************************
* ----- LOAD SIGNUP PAGE -----
****************************/

function signupPage() {

  $user     = new stdClass();
  $user->id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

    if( !$user->id ):
      require('view/auth/signupView.php');
    else:
      require('view/homeView.php');
    endif;

    $email = $_POST['email'];
    $password =  $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

      if ($password == $password_confirm)
      {
        if (!empty($_POST['email']) && !empty($_POST['password'])) 
        {
          $newUser = new User();
          $newUser->setEmail( $email );
          $newUser->setPassword(hash('sha256',$password));
          echo "le mot de passe".$password;
          $newUser->createUser();
        }
      }
      else 
      {
        $error_msg = 'MOT DE PASSE INCORRECT';
      }
  
  

}
