<?php

require_once "./View/GalleryView.php";
require_once "./Model/ArtworkModel.php";
require_once "./Model/CategoryModel.php";
require_once "./Model/CommentModel.php";

class GalleryController
{
    private $loginController;
    private $view;
    private $modelArtwork;
    private $modelCategory;
    private $modelUser;
    private $modelComment;


    function __construct()
    {
        $this->loginController = new LoginController();
        $this->view = new GalleryView();
        $this->modelArtwork = new ArtworkModel();
        $this->modelCategory = new CategoryModel();
        $this->modelUser = new UserModel();
        $this->modelComment = new CommentModel();
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

            if ($_FILES['input_name']['type'] == "image/jpg" ||  $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png") {
                $imagen = $_FILES['input_name']['tmp_name'];
            } else {
               $imagen = "algo";
            }

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
            $affected = $this->modelUser->DeleteUser($user_id);

            //si no afecto a ninguna row, quiere decir que tiene comentarios asociados
            if ($affected == 0) {

                //agarro todos los id de comentarios que tenga asociados
                $comentarios = $this->modelComment->getCommentsIdbyUserId($user_id);


                foreach ($comentarios as $comentario) {
                    //por cada uno, le cambio el id de usuario por uno default
                    $this->modelComment->modifyUserId($comentario->comment_id, 0);
                }

                //y finalmente lo borra
                $resultado = $this->modelUser->DeleteUser($user_id);
            }

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
                $imagen = "https://www.dekrs.com/img/image_not_found.png";
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
            $user = $this->modelUser->GetAllById($user_id);
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

        $sessionLevel = $this->loginController->GetSessionAuthLevel();
        $this->view->setSessionLevel($sessionLevel);

        $sessionName = $this->loginController->GetSessionUsername();
        $this->view->setSessionName($sessionName);
    }

    function paginatedArtworks($params = null)
    {
        $this->requestSessionInfo();

        //no es una id, pero es el offset que tomo de base
        $offset_number = $params[':ID'];

        //lo derivo a otra funcion para poder cambiar la cantidad que quiero que se muestren en pantalla
        // lo pongo por defecto en 3, pero se pueden poner las que quieras
        $this->startPagination($offset_number, 3);
    }

    function startPagination($offset, $quantity)
    {
        //creo el limite para el LIMIT de sql 
        $next_offset = $offset + $quantity;

        //compruebo si puedo crear el $back_offset sin que el numero que se crea sea negativo
        if ($offset > 0) {
            $back_offset = $offset - $quantity;
        } else {
            //le doy esto porque smarty no sabe diferenciar 0 de null.
            //se lo paso asi para evitar crear el boton cuando no se puede retroceder mas
            $back_offset = 0.1;
        }

        //le doy de desde donde ($offset) hasta donde ($limit) me traiga obras
        $artworks = $this->modelArtwork->getBlockOfArtworks($offset, $quantity);

        //agarrar la cantidad de rows. arranca desde 0
        $rowcount = $this->modelArtwork->GetRowCount();
        $rowcount_number = $rowcount["COUNT(*)"];


        //si el limite supera o es igual a la cantidad de rows de la db, le doy null para evitar
        //que se pueda crear el boton de avanzar, ya que no traeria nada de la db
        if ($next_offset >= $rowcount_number) {
            $next_offset = null;
        }
        $this->view->showPaginatedPage($artworks, $next_offset, $back_offset);
    }
}
