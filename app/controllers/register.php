<?php

if (\Model\Session::isLogged()) {
    header('location: '.WEBROOT);
    exit();
}

if (POST) {
    if ($_POST['username'] != '' && $_POST['email'] != '' && $_POST['password'] != '') {
        if (\Model\User::tryRegister($_POST['username'], $_POST['email'], $_POST['password']) &&
            \Model\Session::tryToConnect($_POST['username'], $_POST['password'], true)) {
            
            Data::get()->add('success', Lang::get()->successes->register);
        }
        else {
            Data::get()->add('error', Lang::get()->errors->credentials);
        }
    }
}

Controller::renderView('register/form');