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

    function GetCategories()
    {
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetCategory($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE id=?");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function AddCategory($id, $nombre)
    {
        $sentencia = $this->db->prepare("INSERT INTO categoria(id, nombre) VALUES(?,?)");
        $sentencia->execute(array($id, $nombre));
    }

    function AddArtwork($nombre, $descripcion, $autor, $anio, $imagen, $category)
    {
        $sentencia = $this->db->prepare("INSERT INTO obra(nombre, descripcion, autor, anio,imagen,id_categoria) VALUES(?,?,?,?,?,?)");
        $sentencia->execute(array($nombre, $descripcion, $autor, $anio, $imagen, $category));
    }

    function GetFrontArtworks($limit)
    {
        $sentencia = $this->db->prepare("SELECT * FROM obra limit $limit");
        $sentencia->execute([$limit]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function DeleteArtwork($art_id)
    {
        $sentencia = $this->db->prepare("DELETE FROM obra WHERE id=?");
        $sentencia->execute([$art_id]);
    }

    function DeleteCategory($category_id)
    {
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id=?");
        $sentencia->execute([$category_id]);
    }

    function UpdateArtwork($nombre, $descripcion, $autor, $anio, $imagen, $category, $art_id)
    {
        $sentencia = $this->db->prepare("UPDATE obra
        SET nombre=?, descripcion=?, autor=?, anio=?, imagen=?, id_categoria=? 
        WHERE id=?");
        $sentencia->execute(array($nombre, $descripcion, $autor, $anio, $imagen, $category, $art_id));
    }

    function UpdateCategory($id, $nombre)
    {
        $sentencia = $this->db->prepare("UPDATE categoria SET nombre=? WHERE id=?");
        $sentencia->execute(array($nombre, $id));
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
