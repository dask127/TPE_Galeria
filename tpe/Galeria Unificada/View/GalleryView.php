<?php

require_once "./libs/smarty/Smarty.class.php";

class GalleryView{

    

    private $title;
    

    function __construct(){
        $this->title = "Galeria de Arte";
    }

    function ShowHome($artworks){
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('obras_s', $artworks);
        // $smarty->assign('tareas_s', $tasks);
      
        $smarty->display('templates/recent.tpl'); // muestro el template 
    }

    function showAllArtworks($artworks){
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('obras', $artworks);

        $smarty->display('templates/artworks.tpl');
    }
    

    function showAllCategories($categories){
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('categorias', $categories);

        $smarty->display('templates/categories.tpl');
    }

    function ShowAbout(){
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        // $smarty->assign('tareas_s', $tasks);
      
        $smarty->display('templates/about.tpl'); // muestro el template 
    }

    function ShowContact(){
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        // $smarty->assign('tareas_s', $tasks);
      
        $smarty->display('templates/contact.tpl'); // muestro el template 
    }


    function ShowABM($artworks){
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('obras', $artworks);

        $smarty->display('templates/abm.tpl');
    }

    function ShowDetails($artwork){
        $smarty = new Smarty();
        $css = "../css/style.css";
        $smarty->assign('css', $css);
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('obra', $artwork);

        $smarty->display('templates/details.tpl'); // muestro el template 
    }



    function ShowEditTask($task){
        //TODO hacer con Smarty
      
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function ShowABMLocation(){
        header("Location: ".BASE_URL."abm");
    }

    function volver() {
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    
}


?>