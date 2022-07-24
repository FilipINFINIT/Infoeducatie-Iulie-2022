<?php
    include("resources/side-php/connection.php");
    include("resources/side-php/global-functions.php");
        session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $failed=0;
    $string1='';
    if(!filter_var($username, FILTER_VALIDATE_EMAIL)){
        $failed=1;
    }
    if($failed!=1 && empty($password)!=true&& empty($username)!=true){
        $result=mysqli_query($conn,"SELECT * FROM users WHERE email = '$username' limit 1");
        if($result && mysqli_num_rows($result) > 0){
            $user_data=mysqli_fetch_assoc($result);
            if($user_data['parola']==md5($password)){
                $_SESSION['user_id']= $user_data['id'];
                redirect("http://siteed.ro/index.php",false);
            }
            else{
                $string1 = "Parola sau e-mailul sunt incorrecte!<br>";
                $color="FF0000";
            }
        }
        else{
            $color="FF0000";
            $string1 = "Parola sau e-mailul sunt incorrecte!<br>";
        }
    }
    else{
        $color="FF0000";
        $string1 = "Parola sau e-mailul sunt incorrecte!<br>";
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
    <link rel="stylesheet" href="resources/css/login.css">
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
            position:relative;
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
        
        <h1 class="title" style="padding-top:50px;">Logheaza-te</h1>
        <i class="las la-sign-in-alt" style="padding-bottom:20px;font-size:100px;color:#47B5FF;"></i>
        <form class="login-form" action="procces.php" method="POST">
            <p>E-mail</p>
            <input type="text" name="username" placeholder="Introdu e-mailul">
            <p><br>Parola</p>
            <input type="password" name="password" placeholder="Introdu parola">
            <br>            <br>            <br>            <br>            <br>
            <center><input type="submit" name="" value="Login"></center>
            <br>
            <a style="float:left;position:relative;" href="#">Ti-ai uitat parola?</a>
            <a style="float:right;position:relative;" href="sign-in.php">Nu te-ai inregistrat?</a><br>
            <br>
            <a href="index.php" class="back-button" style="font-size:3em;"><i class="las la-chevron-circle-left"></i></a>
        </form>
    </div></body>
</html>
