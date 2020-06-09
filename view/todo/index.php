<?php
require_once '../../config/db.php';
require_once '../../model/Todo.php';
require_once '../../controller/TodoController.php';
// $todo_list = TodoController::index();
// $query = "SELECT * FROM todos WHERE user_id = 1";
// $todo_list = Todo::findByQuery($query);
$mode = $_GET['mode'];
$todo_list = TodoController::index("");
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DB接続</title>
</head>
<body>
    <form class="" action="index.php" method="GET">
        <input type="text" name="searchword">
        <input type="hidden" name="mode" value="SEARCH">
        <input type="submit" value="検索">
    </form>
    <?php if(is_null($mode)): ?>
        <div class="">検索してください。</div>
    <?php else: ?>
        <?php if($todo_list): ?>
        <ul>
            <table border=1>
                <tr>
                    <th>user_id</th>
                    <th>title</th>
                    <th>content</th>
                </tr>
                <?php foreach($todo_list as $todo): ?>
                    <tr>
                        <td><?php echo $todo['user_id']; ?></td>
                        <td><?php echo $todo['title']; ?></td>
                        <td><?php echo $todo['content']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </ul>
        <?php else: ?>
            <div class="">該当なし</div>
        <?php endif;?>
    <?php endif; ?>
</body>
</html>
