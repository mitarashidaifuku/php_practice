const DNS = 'mysql:host = c248d86fe0a1';dbname = common;charset=utf-8;
const USERNAME = 'MITARASHI';
const PASSWORD = '1qazxsw2';

$pdo = new PDO(DNS, USERNAME, PASSWORD);
$stmh = $pdo->query('SELECT * FROM common.todos');

$todo_list = $stmh->fetchAll(PDO::FETCH_ASSOC);
var_dump($todo_list);
