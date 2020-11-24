<?php
require_once './Model/CommentModel.php';
require_once 'ApiController.php';

class ApiCommentController extends ApiController
{


    function __construct()
    {
        parent::__construct();
        $this->model = new CommentModel();
        $this->view = new APIView();
    }

    public function GetCommentsByArtworkId($params = null)
    {
        $id = $params[':ID'];

        if ($id != null && is_numeric($id)) {
            $comments = $this->model->getAllByArtworkId($id);

            if (!empty($comments)) { // verifica si la tarea existe
                $this->view->response($comments, 200);
            } else {
                $this->view->response("La obra con el id=$id no tiene comentarios", 200);
            }
        } else $this->view->response("La obra no existe", 404);
    }

    public function DeleteTask($params = null)
    {
        $id = $params[':ID'];

        if ($id != null && is_numeric($id)) {
            $result = $this->model->DeleteTaskDelModelo($id);

            if ($result > 0) {
                $this->view->response("La tarea con el id=$id fue eliminada", 200);
            } else {
                $this->view->response("La tarea con el id=$id no existe", 404);
            }
            $this->view->response("La obra no existe", 404);
        }
    }

    public function InsertComment($params = null)
    {
        $body = $this->getData();

        // eh?
        $comment_id = $this->model->InsertComment($body->title, $body->description, $body->completed, $body->priority);

        if (!empty($comment_id)) // verifica si la tarea existe
            $this->view->response($this->model->getCommentById($comment_id), 201);
        else
            $this->view->response("La tarea no se pudo insertar", 404);
    }
}
