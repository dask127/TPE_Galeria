<?php

require_once "./libs/smarty/Smarty.class.php";

class GalleryView{

    

    private $title;
    

    function __construct(){
        $this->title = "Galeria de Arte";
    }

    function ShowHome($tasks){
        // print_r($tasks);
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        // $smarty->assign('tareas_s', $tasks);
      
        $smarty->display('templates/main.tpl'); // muestro el template 
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

    function ShowEditTask($task){
        //TODO hacer con Smarty
      
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    
}


?>