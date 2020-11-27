<?php
require_once './Model/CommentModel.php';
require_once './Model/UserModel.php';
require_once 'ApiController.php';

class ApiCommentController extends ApiController
{

    private $userModel;

    function __construct()
    {
        $this->userModel = new UserModel();

        parent::__construct();
        $this->model = new CommentModel();
        $this->view = new APIView();
    }


    public function GetCommentsByArtworkId($params = null)
    {
        $id = $params[':ID'];

        if ($id != null && is_numeric($id)) {
            $comments = $this->model->getAllByArtworkId($id);
            
            // verifica si los comentarios existen
            if (!empty($comments)) { 
                $this->view->response($comments, 200);
            } else {
                $obj = (object) array('message' => "La obra con el id=$id no tiene comentarios");
                $this->view->response($obj, 200);
                die();
            }
        } else {
            $obj = (object) array('message' => "La obra no existe o el id es incorrecto");
            $this->view->response($obj, 404);
            die();
        }
    }

    function GetUserData()
    {

        if (isset($_SESSION["ID_USER"])) {
            $id = $_SESSION["ID_USER"];
        } else {
            session_start();
            if (isset($_SESSION["ID_USER"])) {
                $id = $_SESSION["ID_USER"];
            } else {
                $obj = (object) array('message' => "El usuario no está loggeado");
                $this->view->response($obj, 200);
                die();
            }
        }

        $user = $this->userModel->getInfoById($id);
        if (!empty($user)) {
            $this->view->response($user, 200);
        } else {
            $obj = (object) array('message' => "El usuario no existe");
            $this->view->response($obj, 404);
            die();
        }
    }

    public function DeleteComment($params = null)
    {
        $id = $params[':ID'];

        if ($id != null && is_numeric($id)) {
            $result = $this->model->DeleteComment($id);

            if ($result > 0) {
                $this->view->response("La tarea con el id=$id fue eliminada", 200);
            } else {
                $this->view->response("La tarea con el id=$id no existe", 404);
            }
        } else $this->view->response("La obra no existe", 404);
    }

    public function InsertComment($params = null)
    {
        $body = $this->getData();

        // eh?
        $comment_id = $this->model->InsertComment($body->text, $body->rating, $body->artwork_id, $body->user_comment_id);

        if (!empty($comment_id)) // verifica si la tarea existe
            $this->view->response($this->model->getCommentById($comment_id), 201);
        else
            $this->view->response("La tarea no se pudo insertar", 404);
    }
}
