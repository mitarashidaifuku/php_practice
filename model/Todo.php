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

    public static function InsertQuery($query){
        $dbh = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $dbh->query($query);
        return true;
    }
}
 ?>
