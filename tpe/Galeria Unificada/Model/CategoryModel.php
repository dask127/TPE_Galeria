<?php

class CategoryModel{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_arte;charset=utf8', 'root', '');
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

    function DeleteCategory($category_id)
    {
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id=?");
        $sentencia->execute([$category_id]);
    }

    function UpdateCategory($id, $nombre)
    {
        $sentencia = $this->db->prepare("UPDATE categoria SET nombre=? WHERE id=?");
        $sentencia->execute(array($nombre, $id));
    }
}
