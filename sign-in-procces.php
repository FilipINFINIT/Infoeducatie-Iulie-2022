<?php
    include("resources/side-php/connection.php");
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $done=0;
    $failed=0;
    $string1 = "";
    $find= mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
     if(strlen($password)< 10){
        $failed=1;
        $string1 .="Parola trebuie sa contina peste 10 caractere!<br>";
    }
     if (!preg_match('~[0-9]+~', $password)){
        $failed=1;
        $string1 .="Parola trebuie sa contina cel putin un numar!<br>";
    }
     if (!preg_match('/[^a-zA-Z]+/', $password)){
        $failed=1;
        $string1 .="Parola trebuie sa contina cel putin un simbol!<br>";

     }
     if (!preg_match('~[A-Z]~', $password)){
        $failed=1;
        $string1 .="Parola trebuie sa contina cel putin o litera mare!<br>";
     }
     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $failed=1;
        $string1 = "Formatul e-mailului este invalid!<br>";
    }
      if(mysqli_num_rows($find)){
        $failed=1;
        $string1="Emailul introdus este deja folosit pentru un alt cont!<br>";
    }
    if($failed!=1){
        $md5enc=md5($password);
        $sql = "INSERT INTO users (email, nume, prenume, parola) VALUES ('$email','$nume','$prenume','$md5enc')";
        $result = mysqli_query($conn, $sql);
        $string1="Contul a fost creat cu succes!";
        $color="61FF00";
    }
    else{
        $color="FF0000";
    }
?>
<html>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="resources/css/normalize.css">
    <link rel="stylesheet" href="resources/css/bootstrap.css">
    <link rel="stylesheet" href="resources/css/general.css">
    <link rel="stylesheet" href="resources/css/sign-in.css">
    <head>
    <link rel="icon" href="icon.png" type="image">
    <title>Inregistrare</title>
    <head>
    <style>
        
        @keyframes notify {
            0%{
                right:-200px;
            }
            50%{
                right:20px;
            }
            100%{
                right:12px;
            }
        }
        .error{
            overflow:hidden;
            position:absolute;
            float:right;
            color:<?php echo $color?>;    
            background-color:rgba(23, 37, 42,0.6);
            border-radius:20px;
            top:10px;
            right:12px;
            padding: 10px ;
            animation: notify 3s ease-in-out;        
            font-size:20px;
        }
    </style>
    <header>
    <div class="error-container" style="overflow:hidden;">
            <p class="error"><?php echo $string1?></p>
        <div>
    </header>
    <body>
        <div class="scrolling-image" style="z-index:-100;"></div>
        <div class="login-container">
            <h1 class="title">Inregistreaza-te</h1>
            <form class="login-form" action="sign-in-procces.php" method="POST">
                <p>Nume</p>
                <input type="text" name="nume" placeholder="Introdu numele">
                <p><br>Prenume</p>
                <input type="text" name="prenume" placeholder="Introdu prenumele">
                <p><br>E-mail</p>
                <input type="text" name="email" placeholder="Introdu e-mailul">
                <p><br>Parola</p>
                <input type="password" name="password" placeholder="Introdu parola">
                <br>            <br>            <br>            <br>            <br>
                <center><input type="submit" name="" value="Register"></center>
                <br>
                <a class="back-button" style="font-size:3em;" href="login.php"><i class="las la-chevron-circle-left"></i></a>
            </form>
        </div>
    </body>
</html>

