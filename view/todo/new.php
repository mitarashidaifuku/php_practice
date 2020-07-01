<?php
require_once '../../config/db.php';
require_once '../../model/Todo.php';
require_once '../../controller/TodoController.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $result = TodoController::new();
    if($result === true){
        echo "新規追加しました！";
    }else{
        // echo $_POST['title'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $error_messages = explode("|", $result);
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
            <?php if($error_messages != ""): ?>
                <p>エラー内容</p>
                <ul>
                <?php foreach($error_messages as $key => $message): ?>
                    <li class="error_msg"><?php echo $message ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        <form class="" action="new.php" method="POST">
            <table>
                <tr>
                    <th>タイトル</th>
                    <td>
                        <?php if($result !== true): ?>
                            <input type="text" name="title" value="<?php echo $title; ?>">
                        <?php else: ?>
                            <input type="text" name="title" value="">
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>詳細</th>
                    <td>
                        <?php if($result !== true): ?>
                            <textarea name="content" rows="5" cols="20"><?php echo $content; ?></textarea>
                        <?php else: ?>
                            <textarea name="content" rows="5" cols="20"></textarea>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <input type="submit" value="追加">
            <input type="button" value="一覧" onclick="location.href='./index.php'">
        </form>
    </body>
</html>
