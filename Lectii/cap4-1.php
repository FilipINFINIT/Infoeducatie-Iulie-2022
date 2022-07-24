<?php

    include("../resources/side-php/connection.php");

    include("../resources/side-php/global-functions.php");

    session_start();

    $userdata=checkLogin($conn);

    $name=$userdata['nume']." ".$userdata['prenume'];

    $status=$userdata['statut'];

    $progres=$userdata['progres'];
    $statut="";

    switch($status){

        case 0:

            $statut="Vizitator";

            break;

        case 1:

            $statut="Elev";

            $color_statut="blue";

            break;

        case 2:

            $statut="Profesor";

            $color_statut="yellow";

            break;

        case 3:

            $statut="atmin";

            $color_statut="red";

            break;

    }

    ?>

        <script>

             var ProgressBar = require('progressbar.js');

             var bar = new ProgressBar.Line('#container', {easing: 'easeInOut'});

            bar.animate(1);  // Value from 0.0 to 1.0

        </script>

<html>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="../resources/css/normalize.css">

    <link rel="stylesheet" href="../resources/css/bootstrap.css">

    <link rel="stylesheet" href="cap4-1.css">
    <link rel="stylesheet" href="../resources/css/navbar.css">

    <script>
        window.addEventListener('load', function() {
            var statut1 = "<?=$statut?>";
            console.log(statut1);
            if(statut1!="Vizitator"){
                document.getElementById('register').style.display="none";
                document.getElementById('login').style.display="none";
            }
            if(statut1=="Vizitator"){
                document.getElementById('logout').style.display="none";
                document.getElementById('lesson').style.display="none";
            }

        });
        var menu=0;

        function response(){

            if(menu==0){

                document.querySelector('.nav').style.display="initial";

                document.getElementById('pfp').className="lar la-user"

                document.getElementById('avatar-pfp').className="invavatar-pfp";

                document.querySelector('.avatar-bg').style.backgroundColor="#3b945e";

                document.getElementById('status').style.display="initial";

                menu=1;

            }

            else{

                document.querySelector('.nav').style.display="none";

                document.getElementById('pfp').className="las la-chevron-circle-down"

                document.getElementById('avatar-pfp').className="avatar-pfp";

                document.getElementById('status').style.display="none";

                document.querySelector('.avatar-bg').style.backgroundColor="#182628";

                menu=0;

            }

        }

    </script>

    <header>

        <div class="navcontainer">

            <div class="profile">

                <div class="avatar-container">              

                    <div class="avatar-name-container">

                        <div class="avatar-bg">

                            <p class="avatar-name"><?php echo $name?></p>

                            <div id="status" style="display:none;"> 

                                <p style="font-size:1.5em; color:<?php echo $color_statut;?>">

                                    <?php

                                    echo $statut;

                                    ?>

                                </p>

                            </div>

                        </div>

                        <a id="avatar-pfp"class="avatar-pfp" onclick="response()">

                            <i id="pfp" class="las la-chevron-circle-down"></i>

                        </a>

                    </div>

                </div>

            </div>

            <div class="nav">

                <div class="navv">

                    <ul class="ull">

                        <li class="liu" id="register">
                            <a href="../sign-in.php">
                                Înregistrează-te
                            </a>
                        </li>
                        <li class="liu" id="login">
                            <a href="../login.php">
                                Conectează-te
                            </a>
                        </li>
                        <li class="liu" id="logout">
                            <a href="../logout.php">
                                Ieși afară din cont
                            </a>
                        </li>
                        <li class="liu">

                            <a href="../index.php">
                                <i class="fa fa-home"></i>
                                Acasă, haideeeee

                            </a>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </header>

<body> 

        
    <div class="content-container">

        <p class="titlu">Gata și cu războiul</p>
        <div class="p1">
            <img class="poza1" src="../resources/img/22.jpg">
            <p class="contex"> 
            În vara anului 1951, liderii țărilor în război au convenit să înceapă negocieri pentru armistițiu.
            <br>
            <br>
            Dar negocierile pentru pace au progresat dureros de lent. La un moment dat, cele două delegații au stat și s-au uitat pur și simplu în tăcere peste masă timp de două ore și 11 minute. Lupta și imensa suferință a poporului coreean au continuat, deoarece ambele părți au folosit puterea militară pentru a încerca să obțină un avantaj la masa de negocieri.
            </p>
            
            <img class="poza2" src="../resources/img/23.jpg">
            <p class="contex">În cele din urmă, la 27 iulie 1953, Comandamentul ONU a semnat acordul de armistițiu coreean care a împărțit Coreea de-a lungul celei de-a 38-a paralele. Nu a fost semnat niciodată un tratat de pace, ceea ce înseamnă că, din punct de vedere tehnic, cele două state din peninsulă sunt încă în război.</p>
            <p class="contex">Războiul a răpit circa trei milioane de vieți - în mare parte, civili coreeni - și a distrus în mare măsură cele mai importante orașe din Peninsula Coreeană.
            <br>
            <br>
            Potrivit Departamentului Apărării al SUA, în război au murit 33 686 de soldați americani - aproximativ 90% din totalul pierderilor în rândul forțelor ONU.</p>
            <a href="../quiz4.php" class="link">Către evaluare</a>
           
        </div>

    </div>

    <div class="scrolling-image" style="z-index:-100;"></div>





</body>

</html>

