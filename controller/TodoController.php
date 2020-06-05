<?php

class TodoController{
    public static function index(){
        $todo_list = Todo::findAll();
        return $todo_list;
    }
}

?>
