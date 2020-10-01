<?php

require_once "./libs/smarty/Smarty.class.php";

class GalleryView{

    

    private $title;
    

    function __construct(){
        $this->title = "Galeria de Arte";
    }

    function ShowHome($artworks){
        // print_r($artworks);
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('obras_s', $artworks);
        // $smarty->assign('tareas_s', $tasks);
      
        $smarty->display('templates/recent.tpl'); // muestro el template 
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

    function ShowTable(){
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        // $smarty->assign('tareas_s', $tasks);
      
        $smarty->display('templates/table.tpl'); // muestro el template 
    }

    function ShowDetails($artwork){
        $smarty = new Smarty();
        $css = "../css/style.css";
        $smarty->assign('css', $css);
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('obra', $artwork);
        // $smarty->assign('tareas_s', $tasks);

      
        $smarty->display('templates/details.tpl'); // muestro el template 
    }



    function ShowEditTask($task){
        //TODO hacer con Smarty
      
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    
}


?>