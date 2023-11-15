<?
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass_confirm = $_POST['pass_confirm'];

$pdo = include_once __DIR__ . '/connection.php';

echo $email.' 1: '.$pass.' 2: '.$pass_confirm;

$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute([
 'email' => $email
]);
$email = $stmt->fetch(PDO::FETCH_ASSOC);

if($email == false) {
    if ($email <=64) {
        if ($pass == $pass_confirm) {
            if ($pass <= 16) {
                if ($pass >= 8) {
                    $pass_hash = password_hash($pass);
                    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
                    $stmt = $pdo->prepare($sql);

                    try {
                    $stmt->execute([
                        'email' => $email,
                        'password' => $pass_hash
                    ]);
                    echo "Регистрация успешно";
                    } catch (PDOException $exception) {
                    $error = "Ошибка при добавлении нового пользователя: {$exception->getMessage()}";
                    }
                } else {
                    $error = "Минимальная длина пароля 8 символов.";
                }
            } else {
                $error= "Максимальная длина пароля 16 символов.";
            }
        } else {
            $error = "Пароли не совпадают.";
        }
    } else {
        $error = "Максимальная длина почты 64 символа.";
    }
} else {
    $error = "Такой пользователь уже существует.";
}

if (isset($error)) {
    echo $error;
}