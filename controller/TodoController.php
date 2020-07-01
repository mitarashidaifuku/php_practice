<?php
require_once '../../validation/TodoValidation.php';

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

    public static function new(){
        $title = $_POST['title'];
        $content = $_POST['content'];
        // $query = TodoController::getNewTodoQuery();
        $error_msg = "";
        //タイトルに関するバリデーション
        $bool = TodoValidation::blanckChckValidation($title);
        if ($bool == false){
            $error_msg = TodoController::addErrorMessage($error_msg, 1, "タイトル", "");

        }
        $bool = TodoValidation::wordLengthValidation($title, 50);
        if ($bool === false){
            $error_msg = TodoController::addErrorMessage($error_msg, 2, "タイトル", 50);
        }
        //詳細に関するバリデーション
        $bool = TodoValidation::wordLengthValidation($content, 100);
        if ($bool === false){
            $error_msg = TodoController::addErrorMessage($error_msg, 2, "詳細", 100);
        }
        if($error_msg == ""){
            $Insert_todo = Todo::InsertQuery($title, $content);
            return $Insert_todo;
        }else{
            $error_msg = substr($error_msg, 1);
            return $error_msg;
        }


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

    // addErrorMessage(他のエラメッセージ, エラータイプ, エラー項目, 字数)
    public static function addErrorMessage($error_msg, $typeVal, $error_title, $str_Length){
        // type1:入力チェック(入力してください)
        // type2:字数制限チェック(XX文字以下で入力してください)
        if($typeVal === 1){
            $error_msg = $error_msg . "|" . $error_title ."：入力してください";
        }
        if($typeVal === 2){
            $error_msg = $error_msg . "|" . $error_title ."：" .$str_Length ."文字以下で入力してください";
         }
         return $error_msg;
    }


    // public static function getNewTodoQuery(){
    //     $title = $_GET['title'];
    //     $content = $_GET['content'];
    //     $query = "INSERT INTO todos(user_id, title, content, status, completed_at, created_at, updated_at, deleted_at)VALUES(1," .$title ."," .$content .",0 ,null, NOW(), null, null)";
    //     return $query;
    // }
}

?>
