<?php

class TodoController{
    public static function index($query){
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
