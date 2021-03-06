<?php
require_once '../../config/db.php';
require_once '../../model/Todo.php';
require_once '../../controller/TodoController.php';

$todo_detail = TodoController::detail();
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>詳細画面</title>
    </head>
    <body>
        <table border=1>
            <!-- <tr>
                <th>タイトル</th>
                <th>詳細</th>
            </tr>
            <tr> -->
            <?php foreach($todo_detail as $detail): ?>
                <tr>
                    <th>タイトル</th>
                    <td>
                        <p><? echo $detail['title']; ?></p>
                    </td>
                </tr>
                <tr>
                    <th>詳細</th>
                    <td>
                        <textarea cols="25" rows="2"><?php echo $detail['content']; ?></textarea>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tr>
        </table>
        <!-- <input type="submit" value="更新"> -->
    </body>
</html>
