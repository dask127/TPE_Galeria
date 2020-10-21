<?php

require_once "./libs/smarty/Smarty.class.php";

class GalleryView
{
    
    private $title;
    private $sesion;


    function __construct()
    {
        $this->title = "Galeria de Arte";
    }

    function setSesion($sesion)
    {
        $this->sesion = $sesion;
    }

    function ShowHome($artworks)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('sesion', $this->sesion);
        $smarty->assign('obras_s', $artworks);

        $smarty->display('templates/recent.tpl');  
    }

    function showAllArtworks($artworks, $categories)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('sesion', $this->sesion);

        $smarty->assign('obras', $artworks);
        $smarty->assign('categorias', $categories);

        $smarty->display('templates/artworks.tpl');
    }


    function showAllCategories($categories)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('sesion', $this->sesion);

        $smarty->assign('categorias', $categories);

        $smarty->display('templates/categories.tpl');
    }

    function ShowAbout()
    {
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('sesion', $this->sesion);

        $smarty->display('templates/about.tpl');
    }

    function ShowContact()
    {
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('sesion', $this->sesion);

        $smarty->display('templates/contact.tpl');
    }


    function ShowABM()
    {
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('sesion', $this->sesion);

        $smarty->display('templates/abm.tpl');
    }

    function ShowArtworkABM($artworks, $categories)
    {

        $smarty = new Smarty();
        $smarty->assign('obras', $artworks);
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('categorias', $categories);
        $smarty->assign('sesion', $this->sesion);

        $smarty->display('templates/artworkabm.tpl');
    }


    function ShowCategoryABM($categories)
    {
        $smarty = new Smarty();
        $smarty->assign('categorias', $categories);
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('sesion', $this->sesion);
        $smarty->display('templates/categoryabm.tpl');
    }

    function ShowDetails($artwork)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('sesion', $this->sesion);
        $smarty->assign('obra', $artwork);
        print_r($artwork);

        $smarty->display('templates/details.tpl');
    }


    function ShowArtEdit($artwork, $categories)
    {

        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('obra', $artwork);
        $smarty->assign('sesion', $this->sesion);
        $smarty->assign('categorias', $categories);

        $smarty->display('templates/artworkedit.tpl');
    }

    function ShowCategoryEdit($category)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('categoria', $category);
        $smarty->assign('sesion', $this->sesion);

        $smarty->display('templates/categoryedit.tpl');
    }

    function ShowLogin($error)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('sesion', $this->sesion);
        $smarty->assign("error", $error);

        $smarty->display('templates/login.tpl');
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
