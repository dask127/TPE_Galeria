<?php

class UserModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_arte;charset=utf8', 'root', '');
    }

    function getByUsername($username)
    {
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE nombre=?");
        $sentencia->execute([$username]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getById($user_id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE id=?");
        $sentencia->execute([$user_id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function RegisterUser($username, $hash)
    {
        $sentencia = $this->db->prepare("INSERT INTO usuario(nombre,password) VALUES(?,?)");
        $sentencia->execute(array($username, $hash));
    }
}
