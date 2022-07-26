<html>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="resources/css/normalize.css">
    <link rel="stylesheet" href="resources/css/bootstrap.css">
    <link rel="stylesheet" href="resources/css/general.css">
    <link rel="stylesheet" href="resources/css/login.css">
    <?php
    $name = "Popescu q Ioan ";
    ?>
    <head>
    <link rel="icon" href="icon.png" type="image">
    <title>Conectare</title>
    <head>
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
            <a href="reset.php" style="float:left;position:relative;" href="#">Ti-ai uitat parola?</a>
            <a style="float:right;position:relative;" href="sign-in.php">Nu te-ai inregistrat?</a><br>
            <br>
            <a href="index.php" class="back-button" style="font-size:3em;"><i class="las la-chevron-circle-left"></i></a>
        </form>
    </div></body>
</html>
