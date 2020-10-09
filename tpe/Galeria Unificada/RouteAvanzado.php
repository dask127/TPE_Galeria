<?php
    require_once 'Controller/GalleryController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    //esto lo agrego para comparar
    $r = new Router();

    // rutas
    $r->addRoute("abm", "GET", "GalleryController", "ABM");
    $r->addRoute("abm", "POST", "GalleryController", "ABM");
    $r->addRoute("home", "GET", "GalleryController", "Home");
    $r->addRoute("about", "GET", "GalleryController", "About");
    // $r->addRoute("show", "POST", "GalleryController", "Search");
    $r->addRoute("contact", "GET", "GalleryController", "Contact");

    //parte del registro y login
    $r->addRoute("register", "POST", "GalleryController", "Register");
    $r->addRoute("loginscreen", "GET", "GalleryController", "Login");
    $r->addRoute("login", "POST", "GalleryController", "verifyUser");

    //parte de artworks y categories
    $r->addRoute("artworks", "GET", "GalleryController", "Artworks");
    $r->addRoute("categories", "GET", "GalleryController", "Categories");
    $r->addRoute("search", "POST", "GalleryController", "Search");
    

    $r->addRoute("delete/:ID", "GET", "GalleryController", "Delete");

    $r->addRoute("details/:ID", "GET", "GalleryController", "Details");
    $r->addRoute("addartwork", "POST", "GalleryController", "AddArtworkToDB");
    

    //Ruta por defecto.
    $r->setDefaultRoute("GalleryController", "Home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
