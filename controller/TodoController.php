<?php

class TodoController{
    public static function index(){
        if(isset($_GET['searchword'])){
            $searchword = $_GET['searchword'];
            if($searchword !== ""){
                $query = "SELECT * FROM todos WHERE title LIKE '%" .$searchword ."%'";
                // echo $query;
            }else{
                $query = "";
            }
        }

        if($query !== ""){
            $todo_list = Todo::findByQuery($query);
            return $todo_list;
        }else{
            $todo_list = Todo::findAll();
            return $todo_list;
        }
    }
}

?>
