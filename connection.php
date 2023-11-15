<?

$host = '127.0.0.1';
$dbname = 'mdproject.com';
$username = 'root';
$password = '';
$port = 3306;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port;", $username, $password);
    return $pdo;
} catch (PDOException $exception) {
    echo "Error DB connection: {$exception->getMessage()}";
    return null;
}