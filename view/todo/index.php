<?php
require_once '../../config/db.php';
require_once '../../model/Todo.php';

$query =
$todo_list = Todo::findByQuery();
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
    <div class="">
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
        <div class="">データなし</div>
        <?php endif;?>
    </div>
</body>
</html>
