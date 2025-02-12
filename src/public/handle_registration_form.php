<?php






function validateName($name)
{
    if ((strlen($name) >= 2) && preg_match('/^[a-zA-Zа-яА-ЯёЁ]+$/u', $name)) {
        return true;
    } else {
        echo "Имя должно содержать более одной буквы и состоять только из букв<br>";
    }
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    if (validateName($name) !== null) {
        $errors ['name'] = validateName($name);
    }
} else {
    $errors ['name'] = 'Имя должно быть заполнено';
}

function validateEmail ($email)
{
    $pdo = new PDO ('pgsql:host=postgres;port=5432; dbname=mydb',  'user',  'pass');
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $identEmail = $stmt->fetch();
    if (strlen($email) < 3)
    {
     return 'Email должен быть больше 3 символов';
    }
    elseif (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return "Email '$email' не корректный<br>";
    }
    elseif ($identEmail > 0)
    {
        return 'Email уже существует';
    }
}


if (isset($_POST['email']))
{
    $email = $_POST['email'];
    if(validateEmail($email) !== null)
    {
        $errors ['email'] = validateEmail($email);
    } else {
        $errors['email'] = 'Email должен быть заполнен';
    }
}

function validatePassword ($password)
{
    if (strlen($password) >= 5 && strlen($password) <= 20 && preg_match('/[A-Z]/', $password))
    {
        return "Некорректный пароль. Пароль должен содержать хотя бы одну заглавную букву, длина пароля от 5 до 20 символов.<br>";
    }
}

if(isset($_POST['psw']) && isset($_POST['psw-repeat']))
{
    $password = $_POST['psw'];
    $passwordRep = $_POST['psw-repeat'];
    if (validatePassword($password) !== null)
    {
        $errors ['psw'] = validatePassword($password);
    } elseif ($passwordRep !== $passwordRep)
    {
        $errors ['psw-repeat'] = "Пароли не совпадают<br>";
    } else {
        $errors ['psw'] = 'Пароль должен быть заполнен';
    }
}

if (empty($errors))
{
    $pdo = new PDO ('pgsql:host=postgres;port=5432; dbname=mydb',  'user',  'pass');
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password]);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $result = $stmt->fetch();

    print_r($result);
}

require_once './registration_form1.php';