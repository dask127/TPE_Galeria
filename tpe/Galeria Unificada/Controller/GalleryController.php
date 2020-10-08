<?php

require_once "./View/GalleryView.php";
require_once "./Model/GalleryModel.php";

class GalleryController
{

    private $view;
    private $model;

    function __construct()
    {
        $this->view = new GalleryView();
        $this->model = new GalleryModel();
    }

    function Home()
    {
        $artworks = $this->model->GetArtworks();
        // muestra solo 2
        $recent_artworks = array($artworks[0], $artworks[1]);
        $this->view->ShowHome($recent_artworks);
    }

    function About()
    {
        $this->view->ShowAbout();
    }

    function Contact()
    {
        $this->view->ShowContact();
    }

    function ABM()
    {
        $artworks = $this->model->GetArtworks();
        $this->view->ShowABM($artworks);
    }

    function AddArtworkToDB()
    {

        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $autor = $_POST["autor"];
        $anio = $_POST["anio"];
        $imagen = $_POST["imagen"];
        $category = $_POST["category"];

        $this->model->AddArtwork($nombre, $descripcion, $autor, $anio, $imagen, $category);
        $this->view->ShowABMLocation();
    }

    function Search()
    {
        $category_id = $_POST["category"];
        $artworks = $this->model->GetArtworkCategory($category_id);
        $this->view->ShowAllArtworks($artworks);
    }

    function Categories()
    {
        $categories = $this->model->GetCategories();
        $this->view->ShowAllCategories($categories);
    }

    function Delete($params = null)
    {
        $obra_id = $params[':ID'];
        $artwork = $this->model->DeleteArtwork($obra_id);
        $this->view->ShowABMLocation();
    }

    function Details($params = null)
    {
        $obra_id = $params[':ID'];
        $artwork = $this->model->GetArtwork($obra_id);
        $this->view->ShowDetails($artwork);
    }

    function Artworks()
    {
        $artworks = $this->model->GetArtworks();
        $this->view->ShowAllArtworks($artworks);
    }

    function Admin()
    {
        $category_id = $_POST["category"];
        $artworks = $this->model->GetArtworkCategory($category_id);
        $this->view->ShowAllArtworks($artworks);
    }

    // function InsertTask(){

    //     $completed = 0;
    //     if(isset($_POST['input_completed'])){
    //         $completed = 1;
    //     }

    //     $this->model->InsertTask($_POST['input_title'],$_POST['input_description'],$completed,$_POST['input_priority']);
    //     $this->view->ShowHomeLocation();
    // }


    // function EditTask($params = null){
    //     $task_id = $params[':ID'];
    //     $task = $this->model->GetTask($task_id);

    //      $this->view->ShowEditTask($task);
    // }

    // function BorrarLaTaskQueVienePorParametro($params = null){
    //     $task_id = $params[':ID'];
    //     $this->model->DeleteTaskDelModelo($task_id);
    //     $this->view->ShowHomeLocation();
    // }

    // function MarkAsCompletedTask($params = null){
    //     $task_id = $params[':ID'];
    //     $this->model->MarkAsCompletedTask($task_id);
    //     $this->view->ShowHomeLocation();
    // }
}
