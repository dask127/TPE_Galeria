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

    function AddCategory($nombre)
    {
        $sentencia = $this->db->prepare("INSERT INTO categoria(nombre_category) VALUES(?)");
        $sentencia->execute(array($nombre));
    }

    function DeleteCategory($category_id)
    {
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id=?");
        $sentencia->execute([$category_id]);
        return $sentencia->rowCount();
    }

    function UpdateCategory($id, $nombre)
    {
        $sentencia = $this->db->prepare("UPDATE categoria SET nombre_category=? WHERE id=?");
        $sentencia->execute(array($nombre, $id));
    }
}
