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
    private $modelUser;


    function __construct()
    {
        $this->loginController = new LoginController();
        $this->view = new GalleryView();
        $this->modelArtwork = new ArtworkModel();
        $this->modelCategory = new CategoryModel();
        $this->modelUser = new UserModel();
    }

    // Anotaciones que serviran para entender el codigo en forma global:

    //cada vez que se llama a la funcion "requestSessionInfo()" se pide a la $_SESSION el nombre y la autorizacion
    // para mostrar el nombre y el aside acorde a cada usuario(no registrado, usuario, admin) en la vista;

    // cada vez que se llama a la funcion "checkPermissions()" comprueba desde la db si el usuario tiene permisos para
    // entrar a determinada pagina;

    function Home()
    {
        $this->requestSessionInfo();

        // muestra solo 2
        $recent_artworks  = $this->modelArtwork->GetFrontArtworks(2);
        $this->view->ShowHome($recent_artworks);
    }

    function About()
    {
        $this->requestSessionInfo();
        $this->view->ShowAbout();
    }

    function Contact()
    {
        $this->requestSessionInfo();
        $this->view->ShowContact();
    }

    function ABM()
    {
        $this->loginController->checkPermissions();
        $this->requestSessionInfo();
        $this->view->ShowABM();
    }

    function ArtworkABM()
    {
        $this->loginController->checkPermissions();
        $this->requestSessionInfo();
        $artworks = $this->modelArtwork->GetArtworkAndCategories();
        $categories = $this->modelCategory->GetCategories();

        $this->view->ShowArtworkABM($artworks, $categories);
    }

    function CategoryABM()
    {
        $this->loginController->checkPermissions();
        $this->requestSessionInfo();
        $categories = $this->modelCategory->GetCategories();

        $this->view->ShowCategoryABM($categories);
    }

    function UserABM()
    {
        $this->loginController->checkPermissions();
        $this->requestSessionInfo();
        $users = $this->modelUser->getAllUsers();

        //le paso el nombre para evitar que se edite a si mismo los permisos;
        $this->view->ShowUserABM($users, $_SESSION["USERNAME"]);
    }

    function AddCategoryToDB()
    {
        $this->loginController->checkPermissions();
        $this->requestSessionInfo();

        $nombre = $_POST["nombre"];

        //check que no esté vacío
        if ((isset($nombre)) && (strlen($nombre) > 0)) {
            $this->modelCategory->AddCategory($nombre);
            $this->view->ShowCategoryABMLocation();
        }
    }

    function AddArtworkToDB()
    {
        $this->loginController->checkPermissions();
        $this->requestSessionInfo();

        if ((isset($_POST["nombre"])) && (isset($_POST["descripcion"])) && (isset($_POST["autor"])) && (isset($_POST["anio"])) && (isset($_POST["category"]))) {

            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $autor = $_POST["autor"];
            $anio = $_POST["anio"];
            $category = $_POST["category"];

            // La imagen es opcional, si no trae nada le pone una imagen por default
            if (!(isset($_POST["imagen"]))) {
                $imagen = "https://fomantic-ui.com/images/wireframe/image.png";
            } else $imagen = $_POST["imagen"];


            $this->modelArtwork->AddArtwork($nombre, $descripcion, $autor, $anio, $imagen, $category);
            $this->view->ShowArtworkABMLocation();
        }
    }

    function SearchByCategory()
    {

        $this->requestSessionInfo();

        if (isset($_POST["category"]) && (strlen($_POST["category"]) > 0)) {

            $category_id = $_POST["category"];

            $artworks = $this->modelArtwork->GetArtworksByCategory($category_id);
            $category = $this->modelCategory->GetCategory($category_id);
            $categories = $this->modelCategory->GetCategories();

            //si no hay obras compatibles con esa busqueda, lo paso a null para no tener
            //que preguntar por arrays vacios en smarty(se podrá incluso?)
            if (empty($artworks)) $artworks = null;

            $this->view->showArtworksByCategory($artworks, $categories, $category);
        }
    }

    function Categories()
    {
        $this->requestSessionInfo();

        $categories = $this->modelCategory->GetCategories();
        $this->view->ShowAllCategories($categories);
    }





    function DeleteArtwork($params = null)
    {
        $obra_id = $params[':ID'];

        //compruebo que sea un numero 
        if (is_numeric($obra_id)) {
            $this->modelArtwork->DeleteArtwork($obra_id);
            $this->view->ShowArtworkABMLocation();
        }
    }

    function DeleteCategory($params = null)
    {
        $category_id = $params[':ID'];

        if (is_numeric($category_id)) {
            $this->modelCategory->DeleteCategory($category_id);
            $this->view->ShowCategoryABMLocation();
        }
    }

    function DeleteUser($params = null)
    {
        $user_id = $params[':ID'];

        if (is_numeric($user_id)) {
            $this->modelUser->DeleteUser($user_id);
            $this->view->ShowUserABMLocation();
        }
    }



    function AddEditedArtwork($params = null)
    {

        if ((isset($_POST["nombre"])) && (isset($_POST["descripcion"])) && (isset($_POST["autor"])) && (isset($_POST["anio"])) && (isset($_POST["category"]))) {

            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $autor = $_POST["autor"];
            $anio = $_POST["anio"];
            $category = $_POST["category"];


            if (!(isset($_POST["imagen"]))) {
                $imagen = "https://revor.com.ar/wp-content/uploads/2018/04/default-image.png";
            } else $imagen = $_POST["imagen"];


            $obra_id = $params[':ID'];

            if (is_numeric($obra_id)) {
                $this->modelArtwork->UpdateArtwork($nombre, $descripcion, $autor, $anio, $imagen, $category, $obra_id);
                $this->view->ShowArtworkABMLocation();
            }
        }
    }

    function AddEditedCategory($params = null)
    {
        $categoria_id = $params[':ID'];

        if ((is_numeric($categoria_id)) && (isset($_POST["nombre"]))) {

            $this->modelCategory->UpdateCategory($categoria_id, $_POST["nombre"]);
            $this->view->ShowCategoryABMLocation();
        }
    }

    function AddEditedUser($params = null)
    {

        $user_id = $params[':ID'];

        if ((is_numeric($user_id)) && (isset($_POST["nombre"])) && (isset($_POST["admin_auth"]))) {

            $nombre = $_POST["nombre"];
            $auth = $_POST["admin_auth"];

            $this->modelUser->UpdateUser($user_id, $nombre, $auth);
            $this->view->ShowUserABMLocation();
        }
    }

    function ArtworkEdit($params = null)
    {
        $this->loginController->checkPermissions();
        $this->requestSessionInfo();

        $obra_id = $params[':ID'];

        if (is_numeric($obra_id)) {
            $artwork = $this->modelArtwork->GetArtwork($obra_id);
            $categories = $this->modelCategory->GetCategories();
            $this->view->ShowArtEdit($artwork, $categories);
        }
    }

    function CategoryEdit($params = null)
    {
        $this->loginController->checkPermissions();

        $category_id = $params[':ID'];

        if (is_numeric($category_id)) {
            $artwork = $this->modelCategory->GetCategory($category_id);
            $this->view->ShowCategoryEdit($artwork);
        }
    }


    function UserEdit($params = null)
    {
        $this->loginController->checkPermissions();
        $this->requestSessionInfo();

        $user_id = $params[':ID'];

        if (is_numeric($user_id)) {
            $user = $this->modelUser->GetById($user_id);
            $this->view->ShowUserEdit($user);
        }
    }


    function Details($params = null)
    {
        $this->requestSessionInfo();

        $obra_id = $params[':ID'];

        if (is_numeric($obra_id)) {
            $artwork = $this->modelArtwork->GetArtworkAndCategoryById($obra_id);
            $this->view->ShowDetails($artwork);
        }
    }

    function Artworks()
    {
        $this->requestSessionInfo();

        $artworks = $this->modelArtwork->GetArtworkAndCategories();
        $categories = $this->modelCategory->GetCategories();

        $this->view->ShowAllArtworks($artworks, $categories);
    }

    function requestSessionInfo()
    {
        //asigna a la vista el nombre y la autorizacion del usuario en sesion actualmente
        //para pasarselo al aside;

        //no, no se porque no funca en el login controller

        $sessionLevel = $this->loginController->GetSessionAuthLevel();
        $this->view->setSessionLevel($sessionLevel);

        $sessionName = $this->loginController->GetSessionUsername();
        $this->view->setSessionName($sessionName);
    }
}
