<?php

    include("resources/side-php/connection.php");

    include("resources/side-php/global-functions.php");

    session_start();

    $userdata=checkLogin($conn);

    $name=$userdata['nume']." ".$userdata['prenume'];

    $status=$userdata['statut'];

    $progres=$userdata['progres']/100;

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

<html>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="resources/css/normalize.css">

    <link rel="stylesheet" href="resources/css/bootstrap.css">

    <script src="resources/js/progressbar.js"></script>

    <link rel="stylesheet" href="resources/css/general.css">

    <link rel="stylesheet" href="resources/css/navbar.css">



    <script>

            window.addEventListener('load', function() {

            var statut1 = "<?=$statut?>";

            console.log(statut1);

            if(statut1!="Vizitator"){

                document.getElementById('register').style.display="none";

                document.getElementById('login').style.display="none";

            }

            if(statut1!="Profesor"){

                document.getElementById('prof').style.display="none";

            }

           if(statut1=="Vizitator")

            {

                document.getElementById('logout').style.display="none";

                document.getElementById('lesson').style.display="none";

                document.getElementById('cart1').style.display="none";

                document.getElementById('cart2').style.display="none";

                document.getElementById('cart3').style.display="none";

                document.getElementById('cart4').style.display="none";

                document.getElementById('ram').style.display="none";

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

                            <a href="sign-in.php">

                                Înregistrează-te

                            </a>

                        </li>

                        <li class="liu" id="login">

                            <a href="login.php">

                                Conectează-te

                            </a>

                        </li>

                        <li class="liu" id="prof">

                            <a href="sign-in.php">

                                Interfata profesor

                            </a>

                        </li>

                        <li class="liu" id="lesson">



                            <a href="hub.php">



                                Lectii



                            </a>



                        </li>

                        <li class="liu">



                            <a href="https://pnrtscr.com/r2k3fw">



                                Ai grijă



                            </a>



                        </li>

                        <li class="liu" id="logout">

                            <a href="logout.php">

                                Acasă, haideeeeee

                            </a>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </header>

    <body> 

        

    <div class="content-container">

        <center><p class="text">

        <?php

                    switch($status){

                        case 0:

                            echo("<span class='titlu1'>Bun venit la Site ED.</span>");

                            echo("<br>");

                            echo("Aici puteti învăța și mai puteți să vă verificați cunoștințele acumulate.");

                            echo("<br>");

                            echo("Pentru a începe trebuie mai întâi să vă ");

                            echo("<a href='login.php'><span class='evident'> conectați </span></a>");

                            echo(" sau să vă ");

                            echo("<a href='sign-in.php'  class='evident'> înregistrați </a>");

                            echo(" dacă nu aveți cont. ");

                            echo("<br><br> Pe acest site găsești lecții bine explicate care au multe imagini sugestive. <br> După fiecare capitol poți pacurge un test prin care poți să vezi cât de mult ai reușit să înveți.");

                            echo("<img class='pozik' src='resources/img/30.png' class='imagini'>");

                            break;

                        case 1:

                            echo("Progresul tau până când te-ai plictisit");

                            break;

                    }

        

        ?>

        </p>

        <script>

            window.addEventListener('load', function() {

            var progres="<?=$progres?>"*100;

            console.log(progres);

            if(progres==100)

            {

                document.getElementById('cart1').style.display="none";

                document.getElementById('cart2').style.display="none";

                document.getElementById('cart3').style.display="none";

                document.getElementById('cart4').style.display="none";

                document.getElementById('ram').style.display="none";

            }

            else if(progres<100 && progres>74) {

                document.getElementById('cart1').style.display="none";

                document.getElementById('cart2').style.display="none";

                document.getElementById('cart3').style.display="none";

            }

            else if(progres<75 && progres>49) {

                document.getElementById('cart1').style.display="none";

                document.getElementById('cart2').style.display="none";

                document.getElementById('cart4').style.display="none";   

            }

            else if(progres<50 && progres>24) {

                document.getElementById('cart1').style.display="none";

                document.getElementById('cart3').style.display="none";

                document.getElementById('cart4').style.display="none";

            }

            else if(progres<25 && progres>=0) {

                document.getElementById('cart2').style.display="none";

                document.getElementById('cart3').style.display="none";

                document.getElementById('cart4').style.display="none";

            }

            



        });



        </script>

        

        <!--

        echo("<p class='titlu'>Bun venit la Site ED.</p>");

                            echo("<br>");

                            echo("<p class='text'>Aici puteti învăța și mai puteți să vă verificați cunoștințele acumulate.</p>");

                            echo("");

                            echo("<p class='text'>Pentru a începe trebuie mai întâi să vă </p>");

                            echo("<a href='login.php'  class='evident'> conectați </a>");

                            echo("<p class='text'> sau să vă </p>");

                            echo("<a href='sign-in.php'  class='evident'> înregistrați </a>");

                            echo("<p class='text'> dacă nu aveți cont.</p>");

        -->

        

        <div id="progress"></div>

            <div id="progress"></div>

        <p id="ram" class="text">Countinuă de unde ai rămas:</p>

        <div class="card-wrap">

            <div id="cart1" class="card" style="width: 18rem;text-align:center;"> 

                <div class="card-body">

                <h5 class="card-title">Capitolul I</h5>

                <p class="card-text">Ce e mă războiul ?</p>

                <a href="info.php" id="capitol1" class="btn btn-primary" aria-disabled="true">Hai să aflăm împreună</a>

                </div>

            </div>

            <div id="cart2" class="card" style="width: 18rem;text-align:center;"> 

                <div class="card-body">

                <h5 class="card-title">Capitolul II</h5>

                <p class="card-text">Pace ?</p>

                <a href="Lectii/cap2-1.php" id="capitol2" class="btn btn-primary" aria-disabled="true">Hai să aflăm împreună</a>

                </div>

            </div>

            <div id="cart3" class="card" style="width: 18rem;text-align:center;">  

                <div class="card-body">

                <h5 class="card-title">Capitolul III</h5>

                <p class="card-text">Forțele comuniste scad</p>

                <a href="Lectii/cap3-1.php" id="capitol3" class="btn btn-primary" aria-disabled="true">Hai să aflăm împreună</a>

                </div>

            </div>

            <div id="cart4" class="card" style="width: 18rem;text-align:center;">  

                <div class="card-body">

                <h5 class="card-title">Capitolul IV</h5>

                <p class="card-text">Gata și cu războiul din Coreea. Ne vedem la Ucraina.</p>

                <a href="Lectii/cap4-1.php" id="capitol4" class="btn btn-primary" aria-disabled="true">Hai să aflăm împreună</a>

                </div>

            </div>

        </div>

        <div class="contact">

            <p class="text1">

                Site-ul a fost creat de 2 elevi:

            </p>

            <p class="text1">Filip Claudiu, poate fi contactat pe <a href="https://www.instagram.com/filippclaudiu/">Instagram</a> sau email: claudiufilip72@yahoo.com </p>

            <p class="text1">Stemate Cătălin, poate fi contactat pe <a href="https://www.instagram.com/skayuofficial/">Instagram</a> sau email: ytcatalin@gmail.com </p>

        </div>

        <script>

        var bar = new ProgressBar.Circle(progress, {

        color: '#FFEA82',

        duration: 1400,

        easing: 'bounce',

        strokeWidth: 6,

        from: {color: '#FFEA82', a:0},

        to: {color: '#ED6A5A', a:1},

        text: {

            autoStyleContainer: false

        },

        step: function(state, circle) {

            circle.path.setAttribute('stroke', state.color);

            var value = Math.round(circle.value() * 100);

            if (value === 0) {

            circle.setText('');

            } else {

            circle.setText(value);

            }



        }

        });

        

        var jsvar = '<?=$progres?>';



        bar.animate(jsvar);  

        </script>       

        </center>

    </div> 

    <div class="scrolling-image" style="z-index:-100;"></div>





</body>

</html>

