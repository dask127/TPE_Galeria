<?php

class ArtworkModel
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


    function UpdateArtwork($nombre, $descripcion, $autor, $anio, $imagen, $category, $art_id)
    {
        $sentencia = $this->db->prepare("UPDATE obra
        SET nombre=?, descripcion=?, autor=?, anio=?, imagen=?, id_categoria=? 
        WHERE id=?");
        $sentencia->execute(array($nombre, $descripcion, $autor, $anio, $imagen, $category, $art_id));
    }

}
