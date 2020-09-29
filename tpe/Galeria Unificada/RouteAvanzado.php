<?php
    require_once 'Controller/GalleryController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    //esto lo agrego para comparar
    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "GalleryController", "Home");

    //Ruta por defecto.
    $r->setDefaultRoute("GalleryController", "Home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>