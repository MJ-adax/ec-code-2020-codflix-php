<?php

require_once( 'controller/homeController.php' );
require_once( 'controller/loginController.php' );
require_once( 'controller/signupController.php' );
require_once( 'controller/mediaController.php' );
require_once( 'controller/mediaDetailController.php' );
require_once( 'controller/contactController.php' );
require_once( 'controller/serieController.php');
require_once( 'controller/episodeController.php');
require_once( 'controller/profileController.php');


/**************************
* ----- HANDLE ACTION -----
***************************/

if ( isset( $_GET['action'] ) ):

  switch( $_GET['action']):

    case 'login':

      if ( !empty( $_POST ) ) login( $_POST );
      else loginPage();

    break;

    case 'signup':

      signupPage();

    break;

    case 'logout':

      logout();

    break;

    case 'contact':

      contactPage();

    break;

    case 'profile':

     profilePage();;
      
    break;

    case 'changePassword':

      changePassword();

    break;

    case 'changeEmail':

      changeEmail();

    break;

    case 'deleteAccount':

      deleteAccount();

    break;

  endswitch;

else:

  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( $user_id ):
    
    // Switch to the detail page.
    if(isset( $_GET['media'] ) ):
    
      detailMediaPage();

    elseif (isset( $_GET['serie'] ) ):

      if(isset( $_GET['episode'] ) ):

        episodePage();
        
      else:

        seriePage();

      endif;

    else:

      mediaPage();

    endif;
    
  
  else:

    homePage();

  endif;


endif;
