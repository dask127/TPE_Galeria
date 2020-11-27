<?php

require_once "./libs/smarty/Smarty.class.php";

class GalleryView
{

    private $css_path;
    private $css_alternative_path;
    private $sessionLevel;
    private $sessionName;


    function __construct()
    {
        $this->css_path = "css/style.css";
        $this->css_alternative_path = "../css/style.css";
    }

    function setSessionLevel($sessionLevel)
    {
        $this->sessionLevel = $sessionLevel;
    }

    function setSessionName($name)
    {
        $this->sessionName = $name;
    }

    function ShowHome($artworks)
    {
        $smarty = new Smarty();
        $smarty->assign('css_link', $this->css_path);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);
        $smarty->assign('obras_s', $artworks);

        $smarty->display('templates/recent.tpl');
    }

    function showAllArtworks($artworks, $categories)
    {
        $smarty = new Smarty();
        $smarty->assign('css_link', $this->css_path);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);

        $smarty->assign('obras', $artworks);
        $smarty->assign('categorias', $categories);

        $smarty->display('templates/artworks.tpl');
    }

    function showArtworksByCategory($artworks, $categories, $category)
    {

        $smarty = new Smarty();
        $smarty->assign('css_link', $this->css_path);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);

        $smarty->assign('obras', $artworks);
        $smarty->assign('tituloCategoria', $category);
        $smarty->assign('categorias', $categories);

        $smarty->display('templates/search.tpl');
    }


    function showAllCategories($categories)
    {
        $smarty = new Smarty();
        $smarty->assign('css_link', $this->css_path);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);
        $smarty->assign('categorias', $categories);

        $smarty->display('templates/categories.tpl');
    }

    function ShowAbout()
    {
        $smarty = new Smarty();
        $smarty->assign('css_link', $this->css_path);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);

        $smarty->display('templates/about.tpl');
    }

    function ShowContact()
    {
        $smarty = new Smarty();
        $smarty->assign('css_link', $this->css_path);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);

        $smarty->display('templates/contact.tpl');
    }


    function ShowABM()
    {
        $smarty = new Smarty();
        $smarty->assign('css_link', $this->css_path);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);

        $smarty->display('templates/abm.tpl');
    }

    function ShowArtworkABM($artworks, $categories)
    {

        $smarty = new Smarty();
        $smarty->assign('obras', $artworks);
        $smarty->assign('css_link', $this->css_path);
        $smarty->assign('categorias', $categories);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);

        $smarty->display('templates/artworkabm.tpl');
    }


    function ShowCategoryABM($categories)
    {
        $smarty = new Smarty();
        $smarty->assign('categorias', $categories);
        $smarty->assign('css_link', $this->css_path);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);
        $smarty->display('templates/categoryabm.tpl');
    }

    function ShowUserABM($users, $logName)
    {
        $smarty = new Smarty();
        $smarty->assign('usuarios', $users);
        $smarty->assign('sessionName', $logName);
        $smarty->assign('css_link', $this->css_path);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);

        $smarty->display('templates/userabm.tpl');
    }

    function ShowDetails($artwork)
    {
        $smarty = new Smarty();
        $smarty->assign('css_link', $this->css_alternative_path);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);
        $smarty->assign('obra', $artwork);

        $smarty->display('templates/details.tpl');
    }


    function ShowArtEdit($artwork, $categories)
    {

        $smarty = new Smarty();
        $smarty->assign('css_link', $this->css_alternative_path);
        $smarty->assign('obra', $artwork);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);
        $smarty->assign('categorias', $categories);

        $smarty->display('templates/artworkedit.tpl');
    }

    function ShowCategoryEdit($category)
    {
        $smarty = new Smarty();
        $smarty->assign('css_link', $this->css_alternative_path);
        $smarty->assign('categoria', $category);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);

        $smarty->display('templates/categoryedit.tpl');
    }

    function ShowUserEdit($user)
    {
        $smarty = new Smarty();
        $smarty->assign('css_link', $this->css_alternative_path);
        $smarty->assign('usuario', $user);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);

        $smarty->display('templates/useredit.tpl');
    }

    function ShowLogin($error = null)
    {

        if ($error == null) {
            $error = "";
        }

        $smarty = new Smarty();
        $smarty->assign('css_link', $this->css_path);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);
        $smarty->assign("error", $error);

        $smarty->display('templates/login.tpl');
    }

    function showPaginatedPage($artworks, $next_offset, $back_offset)
    {
        $smarty = new Smarty();
        $smarty->assign('css_link', $this->css_alternative_path);
        $smarty->assign('sesion', $this->sessionLevel);
        $smarty->assign('name', $this->sessionName);
        $smarty->assign('obras', $artworks);
        $smarty->assign('back_button', $back_offset);
        $smarty->assign('next_button', $next_offset);


        $smarty->display('templates/paginatedArtworks.tpl');
    }

    function ShowHomeLocation()
    {
        header("Location: " . BASE_URL . "home");
    }

    function ShowABMLocation()
    {
        header("Location: " . BASE_URL . "abm");
    }

    function ShowArtworkABMLocation()
    {
        header("Location: " . BASE_URL . "artworkabm");
    }

    function ShowUserABMLocation()
    {
        header("Location: " . BASE_URL . "userabm");
    }

    function ShowCategoryABMLocation()
    {
        header("Location: " . BASE_URL . "categoryabm");
    }

    function ShowABMLogin()
    {
        header("Location: " . BASE_URL . "loginscreen");
    }

    function volver()
    {
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
}
