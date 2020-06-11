<?php
require_once '../../config/db.php';
require_once '../../model/Todo.php';
require_once '../../controller/TodoController.php';

$mode =$_GET['mode'];
$todo_list = TodoController::index($mode);
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>詳細画面</title>
    </head>
    <body>
        <table border=1>
            <tr>
                <th>タイトル</th>
                <th>詳細</th>
            </tr>
            <tr>
            <?php foreach($todo_list as $todo): ?>
                <td>
                    <input type="textarea" value="<? echo $todo['title']; ?>">
                </td>
                <td>
                    <textarea cols="25" rows="2"><?php echo $todo['content']; ?></textarea>

                </td>
            <?php endforeach; ?>
            </tr>
        </table>
        <input type="submit" value="更新">
    </body>
</html>
