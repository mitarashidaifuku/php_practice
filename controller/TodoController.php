<?php

class TodoController{
    public static function index($mode){
        if($mode === "search"){
            $query = TodoController::getSearchQuery();
        }else if($mode === "detail"){
            $query = TodoController::getDetailQuery();
        }

        if($query !== ""){
            $todo_list = Todo::findByQuery($query);
        }else{
            $todo_list = Todo::findAll();
        }
        return $todo_list;
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
        $call_id = $_GET['todo_id'];
        $query = "SELECT * FROM todos WHERE id =" .$call_id;
        return $query;
    }
}

?>
