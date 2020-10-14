<?php

require_once "./View/GalleryView.php";
require_once "./Model/ArtworkModel.php";
require_once "./Model/CategoryModel.php";

class GalleryController
{
    private $loginController;
    private $view;
    private $modelArtwork;
    private $modelCategory;


    function __construct()
    {
        $this->loginController = new LoginController();
        $this->view = new GalleryView();
        $this->modelArtwork = new ArtworkModel();
        $this->modelCategory = new CategoryModel();
        $this->UserModel = new UserModel();
    }

    function Home()
    {
        $sesion = $this->loginController->asideLoggedIn();
        $this->view->setSesion($sesion);
        
        // muestra solo 2
        $recent_artworks  = $this->modelArtwork->GetFrontArtworks(2);
        $this->view->ShowHome($recent_artworks);

    }

    function About()
    {
        $sesion = $this->loginController->asideLoggedIn();
        $this->view->setSesion($sesion);

        $this->view->ShowAbout();
    }

    function Contact()
    {
        $sesion = $this->loginController->asideLoggedIn();
        $this->view->setSesion($sesion);
        $this->view->ShowContact();
    }

    function ABM()
    {

        $this->loginController->checkLoggedIn();
        $sesion = $this->loginController->asideLoggedIn();
        $this->view->setSesion($sesion);
        $this->view->ShowABM();
    }

    function ArtworkABM()
    {
        $this->loginController->checkLoggedIn();
        $sesion = $this->loginController->asideLoggedIn();
        $this->view->setSesion($sesion);
        $artworks = $this->modelArtwork->GetArtworks();
        $categories = $this->modelCategory->GetCategories();

        $this->view->ShowArtworkABM($artworks, $categories);
    }

    function CategoryABM()
    {
        $this->loginController->checkLoggedIn();
        $sesion = $this->loginController->asideLoggedIn();
        $this->view->setSesion($sesion);
        $categories = $this->modelCategory->GetCategories();
        $this->view->ShowCategoryABM($categories);
    }

    function AddCategoryToDB()
    {
        $this->loginController->checkLoggedIn();
        $sesion = $this->loginController->asideLoggedIn();
        $this->view->setSesion($sesion);

        $id = $_POST["id"];
        $nombre = $_POST["nombre"];


        $this->modelCategory->AddCategory($id, $nombre);
        $this->view->ShowCategoryABMLocation();
    }

    function AddArtworkToDB()
    {
        $this->loginController->checkLoggedIn();
        $sesion = $this->loginController->asideLoggedIn();
        $this->view->setSesion($sesion);

        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $autor = $_POST["autor"];
        $anio = $_POST["anio"];
        $imagen = $_POST["imagen"];
        $category = $_POST["category"];

        $this->modelArtwork->AddArtwork($nombre, $descripcion, $autor, $anio, $imagen, $category);
        $this->view->ShowArtworkABMLocation();
    }

    function Search()
    {
        $sesion = $this->loginController->asideLoggedIn();
        $this->view->setSesion($sesion);

        $category_id = $_POST["category"];
        $artworks = $this->modelArtwork->GetArtworkCategory($category_id);
        $categories = $this->modelCategory->GetCategories();

        $this->view->ShowAllArtworks($artworks, $categories);
    }

    function Categories()
    {
        $sesion = $this->loginController->asideLoggedIn();
        $this->view->setSesion($sesion);

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
        $this->loginController->checkLoggedIn();

        $obra_id = $params[':ID'];
        $artwork = $this->modelArtwork->GetArtwork($obra_id);
        $categories = $this->modelCategory->GetCategories();
        $this->view->ShowArtEdit($artwork, $categories);
    }

    function CategoryEdit($params = null)
    {
        $this->loginController->checkLoggedIn();

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
        $sesion = $this->loginController->asideLoggedIn();
        $this->view->setSesion($sesion);

        $artworks = $this->modelArtwork->GetArtworks();
        $categories = $this->modelCategory->GetCategories();
        $this->view->ShowAllArtworks($artworks, $categories);
    }
}
