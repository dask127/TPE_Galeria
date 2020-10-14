<?php
require_once 'Controller/GalleryController.php';
require_once 'Controller/LoginController.php';
require_once 'RouterClass.php';

// CONSTANTES PARA RUTEO
define("BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/');
//esto lo agrego para comparar
$r = new Router();

// rutas
$r->addRoute("home", "GET", "GalleryController", "Home");
$r->addRoute("about", "GET", "GalleryController", "About");
$r->addRoute("contact", "GET", "GalleryController", "Contact");

//parte del registro y login
$r->addRoute("register", "POST", "LoginController", "Register");
$r->addRoute("loginscreen", "GET", "LoginController", "Login");
$r->addRoute("login", "POST", "LoginController", "verifyUser");
$r->addRoute("logout", "GET", "LoginController", "Logout");

//parte de artworks y categories
$r->addRoute("artworks", "GET", "GalleryController", "Artworks");
$r->addRoute("categories", "GET", "GalleryController", "Categories");
$r->addRoute("search", "POST", "GalleryController", "Search");


//all ABM
$r->addRoute("abm", "GET", "GalleryController", "ABM");

$r->addRoute("artworkabm", "GET", "GalleryController", "ArtworkABM");
$r->addRoute("addartwork", "POST", "GalleryController", "AddArtworkToDB");

$r->addRoute("categoryabm", "GET", "GalleryController", "CategoryABM");
$r->addRoute("addcategory", "POST", "GalleryController", "AddCategoryToDB");



$r->addRoute("artdelete/:ID", "GET", "GalleryController", "DeleteArtwork");
$r->addRoute("categorydelete/:ID", "GET", "GalleryController", "DeleteCategory");

$r->addRoute("artedit/:ID", "GET", "GalleryController", "ArtworkEdit");
$r->addRoute("addeditedartwork/:ID", "POST", "GalleryController", "AddEditedArtwork");

$r->addRoute("categoryedit/:ID", "GET", "GalleryController", "CategoryEdit");
$r->addRoute("addeditedcategory/:ID", "POST", "GalleryController", "AddEditedCategory");


$r->addRoute("details/:ID", "GET", "GalleryController", "Details");


//Ruta por defecto.
$r->setDefaultRoute("GalleryController", "Home");

//run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
