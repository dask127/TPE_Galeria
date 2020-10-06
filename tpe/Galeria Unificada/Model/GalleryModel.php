<?php

class GalleryModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_arte;charset=utf8', 'root', '');
    }

    function GetArtworks()
    {
        $sentencia = $this->db->prepare("SELECT * FROM obra");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetArtwork($id_piece)
    {
        $sentencia = $this->db->prepare("SELECT * FROM obra WHERE id=?");
        $sentencia->execute(array($id_piece));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function GetArtworkCategory($id_category)
    {
        $sentencia = $this->db->prepare("SELECT * FROM obra WHERE id_categoria=?");
        $sentencia->execute([$id_category]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function AddArtwork($nombre, $descripcion, $autor, $anio, $imagen, $category)
    {
        $sentencia = $this->db->prepare("INSERT INTO obra(nombre, descripcion, autor, anio,imagen,id_categoria) VALUES(?,?,?,?,?,?)");
        $sentencia->execute(array($nombre, $descripcion, $autor, $anio, $imagen, $category));
    }

    function DeleteTaskDelModelo($task_id)
    {
        $sentencia = $this->db->prepare("DELETE FROM task WHERE id=?");
        $sentencia->execute(array($task_id));
    }

    //   function InsertTask($title,$description,$completed,$priority){
    //       $sentencia = $this->db->prepare("INSERT INTO task(title, description, completed, priority) VALUES(?,?,?,?)");
    //       $sentencia->execute(array($title,$description,$completed,$priority));
    //   }

    //   function DeleteTaskDelModelo($task_id){
    //       $sentencia = $this->db->prepare("DELETE FROM task WHERE id=?");
    //       $sentencia->execute(array($task_id));
    //   }

    //   function MarkAsCompletedTask($task_id){
    //       $sentencia = $this->db->prepare("UPDATE task SET completed=1 WHERE id=?");
    //       $sentencia->execute(array($task_id));

    //   }

}
