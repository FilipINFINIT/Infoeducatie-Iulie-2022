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



            $color_statut="#f8de73";



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



    <link rel="stylesheet" href="cap3-1.css">

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



        <p class="titlu">Forțele comuniste scad</p>

        <div class="p1">

            <img class="poza1" src="../resources/img/15.jpg">

            <p class="contex"> 

            Până în octombrie, puterea de foc copleșitoare a forțelor ONU și debarcarea-surpriză din Inchon au pus trupele comuniste pe fugă.

            <br>

            <br>

            Forțele ONU au împins curând trupele comuniste epuizate înapoi dincolo de paralela 38, de unde începuse, cu câteva luni mai devreme, aventura militară a Coreei de Nord. După o dezbatere acerbă dacă trupele ONU ar trebui să se oprească la granița oficială dintre Coreea de Nord și Coreea de Sud, Washington a transmis conducerii sale militare din Coreea că „obiectivul vostru militar este distrugerea forțelor armate nord-coreene ... la nord de paralela 38."

            </p>

            

            <img class="poza2" src="../resources/img/16.jpg">

            <img class="poza2" src="../resources/img/17.jpg">

            <p class="contex">Mai apoi, însă, în conflict intră în secret și China, trimițând sute de mii de luptători „voluntari” ușor înarmați, dar cu experiență - în Coreea de Nord, așteptând ca forțele ONU să avanseze.</p>

            

            <a href="cap3-2.php" class="link">Pagina următoare</a>

           

        </div>



    </div>



    <div class="scrolling-image" style="z-index:-100;"></div>











</body>



</html>



