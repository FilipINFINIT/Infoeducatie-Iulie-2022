<html>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="resources/css/normalize.css">
    <link rel="stylesheet" href="resources/css/bootstrap.css">
    <link rel="stylesheet" href="resources/css/general.css">
    <link rel="stylesheet" href="resources/css/sign-in.css">
    <?php
    $name = "Popescu q Ioan ";
    ?>
        <head>
    <link rel="icon" href="icon.png" type="image">
    <title>Inregistrare</title>
    <head>
    <body>
    <div class="scrolling-image" style="z-index:-100;"></div>
        
    <div class="login-container">

        <h1 class="title" style="padding:50px;">Inregistreaza-te</h1>
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
    </div></body>
</html>
