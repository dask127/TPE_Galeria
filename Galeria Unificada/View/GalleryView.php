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
      
        $smarty->display('templates/recent.tpl'); // muestro el template 
    }

    function showAllArtworks($artworks, $categories){
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
 
        $smarty->assign('obras', $artworks);
        $smarty->assign('categorias', $categories);

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


    function ShowABM(){
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->display('templates/abm.tpl');
    }

    function ShowArtworkABM($artworks, $categories){

        $smarty = new Smarty();
        $smarty->assign('obras', $artworks);
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('categorias', $categories);

        $smarty->display('templates/artworkabm.tpl');
    }

    
    function ShowCategoryABM($categories){
        $smarty = new Smarty();
        $smarty->assign('categorias', $categories);
        $smarty->assign('titulo_s', $this->title);
        $smarty->display('templates/categoryabm.tpl');
    }

    function ShowDetails($artwork){
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('obra', $artwork);
 

        $smarty->display('templates/details.tpl'); // muestro el template 
    }

    
    function ShowArtEdit($artwork, $categories){

        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('obra', $artwork);
        $smarty->assign('categorias', $categories);

        $smarty->display('templates/artworkedit.tpl');
    }

    function ShowCategoryEdit($category){
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('categoria', $category);

        $smarty->display('templates/categoryedit.tpl');
    }

    function ShowLogin(){
        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        // $smarty->assign('obras', $artworks);

        $smarty->display('templates/login.tpl');
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

    function ShowArtworkABMLocation(){
        header("Location: ".BASE_URL."artworkabm");
    }

    function ShowCategoryABMLocation(){
        header("Location: ".BASE_URL."categoryabm");
    }

    function ShowABMLogin(){
        header("Location: ".BASE_URL."loginscreen");
    }

    function volver() {
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    
}
