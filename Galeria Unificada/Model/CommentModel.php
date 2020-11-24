<?php

class CommentModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_arte;charset=utf8', 'root', '');
    }

    //me traigo todos los comentarios de una obra especifica con su respectivo usuario por comentario
    function getAllByArtworkId($art_id)
    {
        $sentencia = $this->db->prepare("SELECT comentario.*, usuario.nombre  FROM comentario JOIN usuario ON comentario.user_comment_id = usuario.id WHERE artwork_id=?");
        $sentencia->execute([$art_id]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getCommentById($comment_id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM comentario WHERE comment_id=?");
        $sentencia->execute([$comment_id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function DeleteComment($comment_id)
    {
        $sentencia = $this->db->prepare("DELETE FROM comentario WHERE comment_id=?");
        $sentencia->execute([$comment_id]);
        return $sentencia->rowCount();
    }

    function InsertComment($text, $rating, $artwork_id, $user_id)
    {
        $sentencia = $this->db->prepare("INSERT INTO comentario(text, rating, artwork_id, user_comment_id) VALUES(?,?,?,?)");
        $sentencia->execute(array($text, $rating, $artwork_id, $user_id));
        return $this->db->lastInsertId();
    }
}
