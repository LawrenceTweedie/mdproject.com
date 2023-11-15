<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>User Dashboard</title>
</head>
<body>
<header>
<center>
 <a href="index.php"><img src="/../assets/images/i8.png" alt="Логотип" width="325" height="150"></a>
</center>
  </header>
  </header>
<main>
<nav class="navbar navbar-expand-sm navbar-light">
	  <div class="container-fluid ">
		<a class="navbar-brand " href="index.php">Главная</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
        <div class="container-fluid ">
		<a class="navbar-brand " href="login.php">Личный кабинет</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
	  </div>
	</nav>
</main>
<body>
<center>
    <br></br>
    <br></br>
<div class="container">
  <form action="register_back.php" method="POST">
  <h1 class="display-6">Регистрация</h1>
    <div class="mb-3">
      <div id="passwordHelpBlock" class="form-text">
      Адрес электронной почты
      </div>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <div id="emailHelpBlock" class="form-text">
      Пароль
      </div>
    <input name="pass" type="password" class="form-control" id="exampleInputPassword1">
    </div>
  <div id="passwordHelpBlock2" class="form-text">
  Подтверждение пароля
  <input name="pass_confirm" type="password" class="form-control" id="exampleInputPassword1">
  <br></br>
  <a href="login.php" class="btn btn-outline-primary col-6 col-sm-4 me-4">Войти</a>
  <button href="register.php" class="btn btn-primary col-6 col-sm-4 mpx-4">Регистрация</button>
  </center>
  </form>
</div>
</body>
</html>