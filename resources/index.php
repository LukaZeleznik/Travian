<?php
    //Start the Session
    session_start();
    if (!isset($_SESSION['username'])){
        header('location: /login');    
    }



    require_once($_SERVER['DOCUMENT_ROOT'].'/connect.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/refreshResources.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/getResourceFieldsLevel.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/getResourceFieldsType.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/calculateProduction.php');

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Travian - Resources</title>
    <meta name="description" content="Travian Resources">

    <link rel="icon" href="/favicon.ico">
    <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/hexcss.css" type="text/css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</head>
<body>

    <!-- Navigation -->    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">TRAVIAN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link" href="/resources">Resources</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/village">Village</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/map">Map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Stats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/report">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Messages</a>
                </li>
            </ul>
        </div>
        <a class="navbar-brand" href="/logout">Logout</a>
    </nav>

    <!-- Current Resources -->
    <div class="container">
        <div class="d-flex justify-content-center" id="currentResources">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item">
                    <img style="width: 1.2rem;height: 0.9rem;" src="/img/wood.gif">
                    <span id="currentWood"> <?php echo (int)$currentRes[1]; ?></span>/<?php echo (int)$maxRes[1]; ?>                    
                </li>
                <li class="list-group-item">
                    <img style="width: 1.2rem;height: 0.9rem;" src="/img/clay.gif">
                    <span id="currentClay"> <?php echo (int)$currentRes[2]; ?></span>/<?php echo (int)$maxRes[2]; ?>                    
                </li>
                <li class="list-group-item">
                    <img style="width: 1.2rem;height: 0.9rem;" src="/img/iron.gif">
                    <span id="currentIron"> <?php echo (int)$currentRes[3]; ?></span>/<?php echo (int)$maxRes[3]; ?>                    
                </li>
                <li class="list-group-item">
                    <img style="width: 1.2rem;height: 0.9rem;" src="/img/crop.gif">
                    <span id="currentCrop"> <?php echo (int)$currentRes[4]; ?></span>/<?php echo (int)$maxRes[4 ]; ?>                    
                </li>
            </ul>
        </div>
    </div>

    <div class="container" style="min-height:30px"></div>

    <!-- Main Body -->
    <div class="container">
        <div class="row">
            <!-- Resource Fields -->
            <div class="col-md-8">
                <p class="h2 text-center"><strong> <?php echo $_SESSION['username']." (capital)"; //tuki more bit village name ?></strong></p>
                <div class="grid">
                    <ul id="hexGrid" style="padding-left: 0px;">
                        <!-- Row 1 -->
                        <li class="hex">
                            <div class="hexIn">
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[1]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[1]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[2]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[2]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[3]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[3]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            </div>
                        </li>
                        <!-- Row 2 -->
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[4]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[4]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[5]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[5]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[6]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[6]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[7]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[7]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <!-- Row 3 -->
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[8]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[8]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[9]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[9]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="/village">
                                <div class='img' style='background-color:White'>
                                    <p style="top:35%;opacity:1;color:black;">Village</p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[10]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[10]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[11]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[11]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <!-- Row 4 -->
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[12]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[12]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[13]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[13]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[14]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[14]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[15]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[15]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <!-- Row 5 -->
                        <li class="hex">
                            <div class="hexIn">
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[16]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[16]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[17]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[17]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                        <li class="hex">
                            <div class="hexIn">
                            <a class="hexLink" href="resourceField?rfid=1">
                                <div class='img' style='background-color:<?php echo $resFieldColor[18]; ?>'>
                                    <p style="top:35%;opacity:1;color:black"><?php echo $resFieldLevel[18]; ?></p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Troop Movements and other stuff on the right -->
            <div class="col-md-3 text-center">
                <p></p>
                <p class="h3">Troop Movements:</p>
                <div class="d-flex justify-content-between">
                    <h5 style="color:Red"><img style="width: 1.2rem;" src="/img/att_inc.gif"><strong> 1 Attack</strong></h5>
                    <h5>in 0:15:06 hrs.</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 style="color:Orange"><img style="width: 1.2rem;" src="/img/att_out.gif"><strong> 2 Attacks</strong></h5>
                    <h5>in 1:05:35 hrs.</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 style="color:Green"><img style="width: 1.2rem;" src="/img/def_1.gif"><strong> 45 Reinf.</strong></h5>
                    <h5>in 0:55:30 hrs.</h5>
                </div>
                <p></p>
                <p class="h3">Production:</p>
                <div class="d-flex justify-content-between">
                    <h5><img style="width: 1.5rem;height: 1rem;" src="/img/wood.gif"> Wood:</h5>
                    <h5><strong><?php echo (int)$Production[1] ?></strong> per hour</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5><img style="width: 1.5rem;height: 1rem;" src="/img/clay.gif"> Clay:</h5>
                    <h5><strong><?php echo (int)$Production[2] ?></strong> per hour</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5><img style="width: 1.5rem;height: 1rem;" src="/img/iron.gif"> Iron:</h5>
                    <h5><strong><?php echo (int)$Production[3] ?></strong> per hour</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5><img style="width: 1.5rem;height: 1rem;" src="/img/crop.gif"> Crop:</h5>
                    <h5><strong><?php echo (int)$Production[4] ?></strong> per hour</h5>
                </div>
                <p></p>
                <p class="h3">Troops:</p>
                <p class="h5">
                <?php if(1){
                    echo '
                    <div class="d-flex justify-content-center">
                        <h5><img src="/img/maceman.gif"> 48 Macemen</h5>
                    </div>
                    ';
                } // check troops from database
                else{
                    echo '
                    <div class="text-center">
                    <h5>None</h5>
                    </div>
                    ';
                }
                ?>
                </p>
            </div>
        </div>
    </div>


    <script>
    
        setInterval(()=> {
            document.getElementById("currentWood").innerHTML=parseInt(document.getElementById("currentWood").innerHTML)+1;
        }, <?php echo 1000*3600/$productionWood ?>);
        setInterval(()=> {
            document.getElementById("currentClay").innerHTML=parseInt(document.getElementById("currentClay").innerHTML)+1;
        }, <?php echo 1000*3600/$productionClay ?>);
        setInterval(()=> {
            document.getElementById("currentIron").innerHTML=parseInt(document.getElementById("currentIron").innerHTML)+1;
        }, <?php echo 1000*3600/$productionIron ?>);
        setInterval(()=> {
            document.getElementById("currentCrop").innerHTML=parseInt(document.getElementById("currentCrop").innerHTML)+1;
        }, <?php echo 1000*3600/$productionCrop ?>);
        
    </script>
        
</body>