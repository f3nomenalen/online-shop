<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Форма регистрации</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<h1>РЕГИСТРАЦИЯ</h1>
<div id="container">
        <form id="signin" method="" action="handle_registration_form.php">
        <input type="text" id="name" name="name" placeholder="Имя" />
                 <?php if (isset($errors['name'])):  ?>
                 <label style="color: red"><?php echo $errors['name'];?></label>
                 <?php endif; ?>


        <input type="text" id="email" name="email" placeholder="Email" />
                <?php if (isset($errors['email'])): ?>
                <?php echo $errors['email']; ?>
                <?php endif; ?>

        <input type="password" id="psw" name="psw" placeholder="Пароль" />
                <?php if (isset($errors['psw'])): ?>
                <?php echo $errors['psw']; ?>
                <?php endif; ?>

        <input type="password" placeholder="Повторите пароль" name="psw-repeat" id="psw-repeat" required>
                <?php if (isset($errors['psw-repeat'])): ?>
                <?php echo $errors['psw-repeat']; ?>
                <?php endif; ?>

        <button type="submit">&#xf0da;</button>
        <p>forgot your password? <a href="#">click here</a></p>
    </form>
</div>


</body>
</html>

<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css');

    *{
        font-family: 'Open Sans', 'sans-serif', 'FontAwesome';
    }
    body{
        background: rgb(42, 56, 61);
    }
    h1{
        color: rgb(0, 126, 165);
        margin: 350px auto 0;
        width: 250px;

    }
    #container{
        position: absolute;
        width: 320px;
        left: 50%;
        margin-left: -160px;
        top: 50%;
        margin-top: -75px;
    }

    /* === Sign in Form === */
    #signin {
        height: 90px;
        width: 300px;
        border-radius: 8px;
        position: relative;
    }
    #signin::before {
        display: block;
        position: relative;
        height: 2px;
        background: rgb(52, 56, 61);
        content: '';
        top: 44px;
        margin-left: 20px;
        z-index: 1;
    }
    #signin input:first-of-type{
        border-top-right-radius: 8px;
        border-top-left-radius: 8px;
    }
    #signin input:last-of-type{
        border-bottom-right-radius: 8px;
        border-bottom-left-radius: 8px;
    }
    #signin  input[type="text"], #signin  input[type="password"], #signin button[type="submit"]{
        background: rgb(28, 30, 33);
        box-shadow: inset -100px -100px 0 rgb(28, 36, 48); /*Prevent yellow autofill color*/
        color: rgb(112, 255, 119);
    }
    #signin  input[type="text"], #signin  input[type="password"]{
        position: relative;
        display: block;
        width: 280px;
        height: 45px;
        border: 0;
        outline: 0;
        top: -2px;
        padding: 0 0 0 20px;
        font-weight: 700;
    }
    #signin  input[type="text"]:focus, #signin  input[type="password"]:focus{
        color: rgb(255, 255, 255);
    }
    #signin button[type="submit"]{
        display: block;
        position: absolute;
        width: 52px;
        height: 52px;
        color: rgb(0, 126, 165);
        border-radius: 50px;
        outline: 0;
        z-index: 2;
        top: 19px;
        right: -24px;
        border: 6px solid rgb(0, 126, 165);
        font-size: 25px;
        text-indent: 0px;
        padding-left: 9px;
        padding-bottom: 3px;
        text-align: center;
    }
    #signin button[type="submit"]:hover{
        color: rgb(76, 255, 54);
        text-shadow: 0 0 10px rgb(76, 255, 54);
        cursor: pointer;
    }
    #signin p {
        color: rgb(79, 85, 97);
        padding: 0 20px;
        font-weight: 700;
        font-size: 12px;
        margin: 5px 0 0 0;
    }
    #signin p > a{
        color: rgb(111, 119, 135);
        text-decoration: none;
    }
    #signin p > a:hover{
        border-bottom: 1px solid;
    }
</style>