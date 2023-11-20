<?
session_start();
if (isset($_SESSION['email'])) {
    header('Location: /index.php');
}
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
$check_email = $stmt->fetch(PDO::FETCH_ASSOC);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if($check_email['email'] != $email) {
        if (strlen($email) <=64) {
            if ($pass == $pass_confirm) {
                if (strlen($pass) <= 16) {
                    if (strlen($pass) >= 8) {
                        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
                        $stmt = $pdo->prepare($sql);

                        try {
                        $stmt->execute([
                            'email' => $email,
                            'password' => $pass_hash
                        ]);
                        $_SESSION['email'] = $email;
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
} else {
    $error = "Почта введена неправильно.";
}

if (isset($error)) {
    echo $error;
}