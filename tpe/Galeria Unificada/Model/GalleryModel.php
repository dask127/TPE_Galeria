<?php

class GalleryModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_arte;charset=utf8', 'root', '');
    }
         
      function GetArtworks(){
          $sentencia = $this->db->prepare("SELECT * FROM obra");
          $sentencia->execute();
          return $sentencia->fetchAll(PDO::FETCH_OBJ);
      }

      function GetArtwork($id_piece){
        $sentencia = $this->db->prepare("SELECT * FROM obra WHERE id=?");
        $sentencia->execute(array($id_piece));
        return $sentencia->fetch(PDO::FETCH_OBJ);
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
