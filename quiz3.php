<?php

    include("resources/side-php/connection.php");

    include("resources/side-php/global-functions.php");

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

    <link rel="stylesheet" href="resources/css/normalize.css">

    <link rel="stylesheet" href="resources/css/bootstrap.css">

    <link rel="stylesheet" href="resources/css/info.css">
    <link rel="stylesheet" href="resources/css/navbar.css">
    <link rel="stylesheet" href="resources/css/quizz.css">
    <link rel="stylesheet" href="resources/css/general.css">
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
                            <a href="sign-in.php">
                                Înregistrează-te
                            </a>
                        </li>
                        <li class="liu" id="login">
                            <a href="login.php">
                                Conectează-te
                            </a>
                        </li>
                        <li class="liu" id="logout">
                            <a href="logout.php">
                                Ieși afară din cont
                            </a>
                        </li>
                        <li class="liu">

                            <a href="index.php">
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

    <style>
    .content-container{
        text-align:center;
    }
    .alegerimultiple{
        text-align:center;
    }
    .rsp{
        -webkit-user-select: none; /* Safari */        
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* IE10+/Edge */
        user-select: none; /* Standard */
        background-color: rgba(6, 40, 61,0.8);
        padding:10px;
        border-radius:2em;
        color:#DEF2F1;
        padding-right:50px;
        padding-left:50;
        decoration:none;
        font-size:2em;
    }
    #nrintrebari{
        float:left;
        position:absolute;
    }
    .rsp{
        display: inline-block;
        margin:20px;
        position:relative;
    }
    a:hover{
        color:#DEF2F1;
    }

    </style>
    </script>
    <script>
        var nrIntrebare=0;
        var gresite=0;
        var punctaj=0;
        //modifica aici
        var progresMaxim=75;
        var titlu="Chestionar III";
        var numarIntrebari=5;
        var procentMinim=75;
        var Intrebare = [
            "Obiectivul vostru militar este distrugerea forțelor armate",
            "Până când puterea de foc copleșitoare a forțelor ONU și debarcarea-surpriză din Inchon au pus trupele comuniste pe fugă ?",
            "Cine intră în conflict în secret ?",
            "Ce avioane sovietice au intrat pe cerul Coreei de Nord ?",
            "Ce vorbe legendare a spus un general al SUA ?",
        ];
        var Raspunsuri= [
        ["americane","nord-coreene","sud-coreene","japoneze"],
        ["Octombrie","Septembrie","Noiembrie","Decembrie"],
        ["Rusia","România","China","Indienii"],
        ["MIG-18","MIG-17","MIG-15","MIG-16"],
        ["„am fost atacați din două părți”","„a fost doar o surpriză”","„a, fost doborâți”","„doar un atac în altă direcție”"]
        ];
        var RaspunsuriCorrecte=[
            2,
            1,
            3,
            3,
            4,
        ];   
        function update(){
            for(var i=1;i<=4;i++){
                document.getElementById(`rsp${i}`).style.backgroundColor="rgba(6, 40, 61, 0.8)";
                document.getElementById(`rsp${i}`).style.pointerEvents = 'auto'; 
            }
            nrIntrebare++;
            document.getElementById('nrintrebari').textContent=`${nrIntrebare+1}/${numarIntrebari}`;
            document.getElementById('intrebare').textContent=Intrebare[nrIntrebare];
            document.getElementById('rsp1').textContent=Raspunsuri[nrIntrebare][0];
            document.getElementById('rsp2').textContent=Raspunsuri[nrIntrebare][1];
            document.getElementById('rsp3').textContent=Raspunsuri[nrIntrebare][2];
            document.getElementById('rsp4').textContent=Raspunsuri[nrIntrebare][3];
        }
        function felicitari(){
           for(var i=1;i<=4;i++){
            document.getElementById(`rsp${i}`).style.display="none";
           }
           document.getElementById(`nrintrebari`).style.display="none";
           document.getElementById('titlu').textContent="Felicitari!"
           let procent=100-(gresite/numarIntrebari)*100;
           if(procent>=procentMinim){
                document.getElementById('aditional-title').textContent="Ai terminat evaluarea cu un procent de"
                document.getElementById('buttonpa').textContent="Urmatorul capitol";
                document.getElementById('buttonpa').className="btn btn-primary";  
                document.getElementById("buttonpa").onclick = function () {
                location.href = "wVExFHxMNU.php"
                
            };
                document.getElementById('intrebare').className="titlu"; 
                document.getElementById('buttonpa').style.display="initial";
                var progresss= "<?echo $progres?>";
                console.log(`${progresss} && ${progresMaxim}`);
           }
           else{
                document.getElementById('titlu').textContent="Din pacate!";
                document.getElementById('titlu').className="evident";
                document.getElementById('aditional-title').textContent=`Nu ai obtinut proccentul de ${procentMinim}%, mai incearca!`;
                document.getElementById('aditional-title').className="evident";
                document.getElementById('buttonpa').style.display="initial";
                document.getElementById('intrebare').className="evident";   
           }
           document.getElementById('intrebare').textContent=`${procent}%`;
           document.getElementById('intrebare').style.fontSize="5em";     
        }
        function raspund(numrIntrebare){
            if(numrIntrebare == RaspunsuriCorrecte[nrIntrebare]){;
                console.log("bravo");
                document.getElementById(`rsp${RaspunsuriCorrecte[nrIntrebare]}`).style.backgroundColor="green";
                if(nrIntrebare+1==numarIntrebari){
                    setTimeout(function(){felicitari();},2000);
                }
                else setTimeout(function(){update();},2000);
            }
            else{
                gresite++;
                document.getElementById(`rsp${RaspunsuriCorrecte[nrIntrebare]}`).style.backgroundColor="green";
                document.getElementById(`rsp${numrIntrebare}`).style.backgroundColor="red";
                
                if(nrIntrebare+1==numarIntrebari){
                    setTimeout(function(){felicitari();},2000);
                }
                else setTimeout(function(){update();},2000);
            }
            for(var i=1;i<=4;i++){
                document.getElementById(`rsp${i}`).style.pointerEvents = 'none';
            }
        }
        window.addEventListener('load', function() {
            document.getElementById('titlu').textContent=titlu;
            document.getElementById('nrintrebari').textContent=`${nrIntrebare+1}/${numarIntrebari}`;
            document.getElementById('intrebare').textContent=Intrebare[nrIntrebare];
            document.getElementById('rsp1').textContent=Raspunsuri[nrIntrebare][0];
            document.getElementById('rsp2').textContent=Raspunsuri[nrIntrebare][1];
            document.getElementById('rsp3').textContent=Raspunsuri[nrIntrebare][2];
            document.getElementById('rsp4').textContent=Raspunsuri[nrIntrebare][3];
        });
    </script>
    <div class="content-container">
    
        <p class="titlu" id="nrintrebari">1/5</p><br><br>
        <p class="titlu" id="titlu">Titlu<br></p>
        <p  class="titlu" id="aditional-title"></p>
        <br>
        <p class="titlu" id="intrebare">Intrebare</p>
        <div class="alegerimultiple">
            <a id="rsp1" onclick="raspund(1)" class="rsp">A.</a><br>
            <a id="rsp2" onclick="raspund(2)" class="rsp">B.</a><br>
            <a id="rsp3" onclick="raspund(3)" class="rsp">C.</a><br>
            <a id="rsp4" onclick="raspund(4)" class="rsp">D.</a><br>
        </div>
        <p class="titlu" id="informativ"></p>   
        <button type="button" style="position:relative;display:none;top:-15px;font-size:2em;" id="buttonpa" onclick='location.href="cap3-1.php"' class="btn btn-danger">Reia Capitolul</button>
        <br>
    </div>



    <div class="scrolling-image" style="z-index:-100;"></div>




</body>

</html>

