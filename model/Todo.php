<?php

class Todo{
    public static function findByQuery(){
        $dbh = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $dbh->query('SELECT * FROM todos WHERE user_id = 1');
        if($stmh){
            $result = $stmh->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $result = [];
        }
        return $result;
    }
}
 ?>
