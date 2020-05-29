<?php
const DSN = 'mysql:host=c248d86fe0a1;dbname=PHP_PRACTICE;charset=utf8';
const USERNAME = 'MITARASHI';
const PASSWORD = '1qazxsw2';

$pdo = new PDO(DSN, USERNAME, PASSWORD);
$stmh = $pdo->query('SELECT * FROM todos');

$todo_list = $stmh->fetchAll(PDO::FETCH_ASSOC);
// var_dump($todo_list);
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
        s<div class="">データなし</div>
        <?php endif;?>
    </div>
</body>
</html>
