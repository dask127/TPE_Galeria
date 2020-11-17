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

        if ((isset($_POST["username"])) && (isset($_POST["password"]))) {

            $username = $_POST["username"];
            $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $this->UserModel->RegisterUser($username, $hash);

            //traigo el usuario que acabo de mandar para traer la id
            $user = $this->UserModel->getByUsername($username);

            //arranco la sesion
            $this->startSession($user->id, $user->nombre, $user->admin_auth);

            $this->view->ShowHomeLocation();
        }
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

    function GetSessionAuthLevel()
    //comprueba si esta logueado para cambiar el aside, basado en el nivel de autorizacion
    // hecho para no repetir las llamadas a session_start y lanzar errores.
    {
        if (isset($_SESSION["AUTH"])) {
            //si retorna algo, es porque antes se hizo un session_start
            return $_SESSION["AUTH"];
        } else {

            //si no está seteado, puede ser porque antes no se hizo un session_start.
            session_start();
            if (isset($_SESSION["AUTH"])) {
                return $_SESSION["AUTH"];
            }
            //y si no está seteado, entonces nunca existió en un principio y devuelve null.
            else return null;
        }
    }

    function GetSessionUsername()
    {
        //no llamo al session_start, porque antes siempre llamo al GetSessionAuthLevel()
        // y la llamada al session_start sigue siendo valida.

        if (isset($_SESSION["USERNAME"])) {
            return $_SESSION["USERNAME"];
        } else return null;
    }


    function verifyUser()
    {

        //si no está seteado alguno de los 2 POST, entonces no lleno todos los campos
        if ((isset($_POST["username"])) && (isset($_POST["password"]))) {

            $username = $_POST["username"];
            $password = $_POST["password"];

            $user = $this->UserModel->getByUsername($username);

            //si existe ese usuario y la contraseña es la misma, entonces...
            if (($user != false) && (password_verify($password, $user->password))) {

                //arranco la sesion
                $this->startSession($user->id, $user->nombre, $user->admin_auth);

                $this->view->ShowHomeLocation();
            } else $this->view->ShowLogin("Error: Usuario y/o contraseña incorrectos");
        } else $this->view->ShowLogin("Error: Complete todos los campos");
    }


    function checkPermissions()
    {
        session_start();
        if (!isset($_SESSION["ID_USER"])) {
            //si no está seteado, entonces no está registrado
            $this->view->ShowHomeLocation();
            die();
        } else {
            $id = $_SESSION["ID_USER"];
            //se trae solo el "admin_auth" del usuario
            $auth = $this->UserModel->getPermissionsById($id);
            //si el permiso es distinto que el de administrador, lo redirecciona
            if ($auth->admin_auth != "1") {
                $this->view->ShowHomeLocation();
                die();
            }
        }
    }

    private function startSession($id, $nombre, $auth)
    {
        session_start();
        $_SESSION["ID_USER"] = $id;
        $_SESSION["USERNAME"] = $nombre;
        $_SESSION["AUTH"] = $auth;
    }
}
