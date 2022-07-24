<?php

    include("resources/side-php/connection.php");

    include("resources/side-php/global-functions.php");

    session_start();
    header("Location: http://siteed.ro/hub.php");
    $userdata=checkLogin($conn);

    $name=$userdata['nume']." ".$userdata['prenume'];

    $status=$userdata['statut'];
    $progres=$userdata['progres'];
    if($progres<75){
        setStats($conn,"progres",$progres+25);
    }
exit();
    ?>
<html>
</html>

