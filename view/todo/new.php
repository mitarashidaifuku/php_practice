<?php
require_once '../../config/db.php';
require_once '../../model/Todo.php';
require_once '../../controller/TodoController.php';

if($_GET['title'] !== "" && $_GET['content'] !== ""){
    $result = TodoController::newTodo();
    if($result === true){
        echo "新規追加しました！";
    }
}

 ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Todo新規追加</title>
    </head>
    <body>
        <h2>Todo新規追加</h2>
        <form class="" action="new.php" method="GET">
            <table>
                <tr>
                    <th>タイトル</th>
                    <td>
                        <input type="text" name="title" value="">
                    </td>
                </tr>
                <tr>
                    <th>詳細</th>
                    <td>
                        <textarea name="content" rows="5" cols="20"></textarea>
                    </td>
                </tr>
            </table>
            <input type="submit" value="追加">
        </form>
    </body>
</html>
