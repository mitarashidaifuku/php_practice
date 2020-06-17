<?php

class TodoController{
    public static function index(){
        $query = TodoController::getSearchQuery();
        if($query !== ""){
            $todo_list = Todo::findByQuery($query);
        }else{
            $todo_list = Todo::findAll();
        }
        return $todo_list;
    }

    public static function detail(){
        $query = TodoController::getDetailQuery();
        $todo_detail = Todo::findByQuery($query);
        return $todo_detail;
        }

    public static function newTodo(){
        $query = TodoController::getNewTodoQuery();
        $Insert_todo = Todo::InsertQuery($query);
        return $Insert_todo;

    }

    public static function getSearchQuery(){
        if(isset($_GET['searchword'])){
            $searchword = $_GET['searchword'];
            if($searchword !== ""){
                $query = "SELECT * FROM todos WHERE title LIKE '%" .$searchword ."%'";
            }else{
                $query = "";
            }
        }
        return $query;
    }

    public static function getDetailQuery(){
        $idno = $_GET['id'];
        $query = "SELECT * FROM todos WHERE id =" .$idno;
        return $query;
    }

    public static function getNewTodoQuery(){
        $title = $_GET['title'];
        $content = $_GET['content'];
        $query = "INSERT INTO todos(user_id, title, content, status, completed_at, created_at, updated_at, deleted_at)VALUES(1," .$title ."," .$content .",0 ,null, NOW(), null, null)";
        return $query;
    }
}

?>
