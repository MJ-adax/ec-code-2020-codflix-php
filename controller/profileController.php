<?php

require_once( 'model/user.php' );

/***************************
* ----- LOAD PROFILE PAGE -----
***************************/

function profilePage()
{
    require('view/profileView.php');
}

function changePassword()
{
    $old_password = $_POST['old_password'];
    $password = $_POST['password'];
    $password_confim = $_POST['password_confirm'];


    if ($password == $password_confirm) {

        User::modifyUserPassword($password);
    }
    else {
        $error_msg = 'Le nouveau mot de passe et la confirmation ne sont pas identiques';
    }
    require('view/profileView.php');
}

function changeEmail()
{
    $email = $_POST['email'];
    User::modifyUserEmail($email); 

    require('view/profileView.php');
}

function deleteAccount()
{
    $current_id = $_SESSION['user_id'];
    User::deleteUserProfile($current_id);

    require('view/profileView.php');
}
