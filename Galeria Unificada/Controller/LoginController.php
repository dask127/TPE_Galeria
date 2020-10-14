<?php

require_once "./Model/UserModel.php";
require_once "./View/GalleryView.php";

class LoginController
{
    private $UserModel;
    private $view;

    function __construct()
    {
        $this->UserModel = new UserModel();
        $this->view = new GalleryView();
    }

    function Register()
    {
        $username = $_POST["username"];
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $this->UserModel->RegisterUser($username, $hash);
        $this->view->ShowLogin();
    }

    function Logout()
    {
        session_start();
        session_destroy();
        $this->view->ShowHomeLocation();
    }

    function Login()
    {
        $this->view->ShowLogin();
    }


    function isLoggedIn()
    {
        session_start();
        return $_SESSION["USERNAME"];
    }


    function verifyUser()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $user = $this->UserModel->getByUsername($username);

        if (!empty($user) && password_verify($password, $user->password)) {

            session_start();
            $_SESSION["ID_USER"] = $user->id;
            $_SESSION["USERNAME"] = $user->nombre;
            $this->view->ShowABMLocation();
        } else $this->view->ShowHomeLocation();
    }


    function checkLoggedIn()
    {
        session_start();
        if (!isset($_SESSION["ID_USER"])) {
            $this->view->ShowHomeLocation();
            die();
        }
    }
}
