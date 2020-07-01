<?php

class Todo{
    public static function findByQuery($query){
        $dbh = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $dbh->query($query);
        if($stmh){
            $result = $stmh->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $result = [];
        }
        return $result;
    }

    public static function findAll(){
        $dbh = new PDO(DSN, USERNAME, PASSWORD);
        $query = "SELECT * FROM todos";
        $stmh = $dbh->query($query);
        if($stmh){
            $result = $stmh->fetchAll(PDO::FETCH_ASSOC);
        }else {
            $result = [];
        }
        return $result;
    }

    public static function InsertQuery($title, $content){
        $query = "INSERT INTO todos(user_id, title, content, status, completed_at, created_at, updated_at, deleted_at)VALUES(1,'" .$title ."','" .$content ."',0 ,null, NOW(), null, null)";
        // var_dump($query);
        $dbh = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $dbh->query($query);
        return true;
    }
}
 ?>
