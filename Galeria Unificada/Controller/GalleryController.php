<?php

require_once "./View/GalleryView.php";
//require_once "./Model/GalleryModel.php";
require_once "./Model/UserModel.php";
require_once "./Model/ArtworkModel.php";///add
require_once "./Model/CategoryModel.php";///add

class GalleryController
{

    private $view;
    private $modelArtwork;
    private $modelCategory;
    private $UserModel;

    function __construct()
    {
        $this->view = new GalleryView();
        $this->modelArtwork = new ArtworkModel();
        $this->modelCategory = new CategoryModel();
        $this->UserModel = new UserModel();
    }

    function Home()
    {
        // muestra solo 2
        $recent_artworks  = $this->modelArtwork->GetFrontArtworks(2);
        $this->view->ShowHome($recent_artworks);
        // $this->model->UpdateArtwork("cosa2", "esta es una prueba de la update", "yo 2", "2020-09-30", "https://previews.123rf.com/images/artshock/artshock1209/artshock120900045/15221647-imag-de-coraz%C3%B3n-en-el-cielo-azul-sobre-un-fondo-de-nubes-blancas-.jpg", "3", "13");
    }

    function About()
    {
        $this->view->ShowAbout();
    }

    function Contact()
    {
        $this->view->ShowContact();
    }

    function ABM()
    {
        $this->checkLoggedIn();
        $this->view->ShowABM();
    }

    function ArtworkABM()
    {
        $this->checkLoggedIn();
        $artworks = $this->modelArtwork->GetArtworks();
        $categories = $this->modelCategory->GetCategories();

        $this->view->ShowArtworkABM($artworks, $categories);
    }

    function CategoryABM()
    {
        $this->checkLoggedIn();
        $categories = $this->modelCategory->GetCategories();
        $this->view->ShowCategoryABM($categories);
    }

    function AddCategoryToDB()
    {
        $this->checkLoggedIn();

        $id = $_POST["id"];
        $nombre = $_POST["nombre"];


        $this->modelCategory->AddCategory($id, $nombre);
        $this->view->ShowCategoryABMLocation();
    }

    function AddArtworkToDB()
    {
        $this->checkLoggedIn();

        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $autor = $_POST["autor"];
        $anio = $_POST["anio"];
        $imagen = $_POST["imagen"];
        $category = $_POST["category"];

        $this->modelArtwork->AddArtwork($nombre, $descripcion, $autor, $anio, $imagen, $category);
        $this->view->ShowArtworkABMLocation();
    }

    function Register()
    {
        $username = $_POST["username"];
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $this->UserModel->RegisterUser($username, $hash);
        $this->view->ShowLogin();
    }

    function Login()
    {
        $this->view->ShowLogin();
    }

    function Logout()
    {
        session_start();
        session_destroy();
        $this->view->ShowHomeLocation();
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

    function Search()
    {
        $category_id = $_POST["category"];
        $artworks = $this->modelArtwork->GetArtworkCategory($category_id);
        $categories = $this->modelCategory->GetCategories();

        $this->view->ShowAllArtworks($artworks, $categories);
    }

    function Categories()
    {
        $categories = $this->modelCategory->GetCategories();
        $this->view->ShowAllCategories($categories);
    }

    function DeleteArtwork($params = null)
    {
        $obra_id = $params[':ID'];
        $artwork = $this->modelArtwork->DeleteArtwork($obra_id);
        $this->view->ShowArtworkABMLocation();
    }

    function DeleteCategory($params = null)
    {
        $category_id = $params[':ID'];
        $artwork = $this->modelCategory->DeleteCategory($category_id);
        $this->view->ShowCategoryABMLocation();
    }

    function AddEditedArtwork($params = null)
    {

        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $autor = $_POST["autor"];
        $anio = $_POST["anio"];
        $imagen = $_POST["imagen"];
        $category = $_POST["category"];
        $obra_id = $params[':ID'];

        $this->modelArtwork->UpdateArtwork($nombre, $descripcion, $autor, $anio, $imagen, $category, $obra_id);
        $this->view->ShowArtworkABMLocation();
    }

    function AddEditedCategory($params = null)
    {
        $nombre = $_POST["nombre"];
        $categoria_id = $params[':ID'];

        $this->modelCategory->UpdateCategory($categoria_id, $nombre);
        $this->view->ShowCategoryABMLocation();
    }

    function ArtworkEdit($params = null)
    {
        $this->checkLoggedIn();

        $obra_id = $params[':ID'];
        $artwork = $this->modelArtwork->GetArtwork($obra_id);
        $categories = $this->modelCategory->GetCategories();
        $this->view->ShowArtEdit($artwork, $categories);
    }

    function CategoryEdit($params = null)
    {
        $this->checkLoggedIn();

        $category_id = $params[':ID'];
        $artwork = $this->modelCategory->GetCategory($category_id);
        $this->view->ShowCategoryEdit($artwork);
    }

    function Details($params = null)
    {
        $obra_id = $params[':ID'];
        $artwork = $this->modelArtwork->GetArtwork($obra_id);
        $this->view->ShowDetails($artwork);
    }

    function Artworks()
    {
        $artworks = $this->modelArtwork->GetArtworks();
        $categories = $this->modelCategory->GetCategories();
        $this->view->ShowAllArtworks($artworks, $categories);
    }

    private function checkLoggedIn()
    {
        session_start();
        if (!isset($_SESSION["ID_USER"])) {
            $this->view->ShowHomeLocation();
            die();
        }
    }
}
