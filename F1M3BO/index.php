<?php

if(isset($_GET['lang'])) {
    $lang = $_GET['lang'];
} 

else{
    $lang = "NL";
}

if($lang == "ENG"){
    $text = array("Languages", "Set the temperature", "Handy tips for saving money!", "With radiator foil behind the radiator you will not compensate for the higher gas price.
    Even so, installing it saves a few tens of dollars on an annual basis.", "
    With radiator foil behind the radiator you will not compensate for the higher gas price. Even so, installing it saves a few tens of dollars on an annual basis.", 
    "Do you have a refrigerator or freezer that is older than 15 years? Then consider purchasing a new and energy-efficient model. You will earn back the purchase 
    costs in the long run, because you save on energy costs.", "Enter your city name:", "Made by:");    
}
elseif($lang == "NL"){
    $text = array("Talen", "Temperatuur instellen", "Handige tips voor geld besparen", "Met radiatorfolie achter de radiator ga je de hogere gasprijs niet compenseren. 
    Toch levert plaatsing ervan enkele tientjes besparing op jaarbasis op.", "Met radiatorfolie achter de radiator ga je de hogere gasprijs niet compenseren. 
    Toch levert plaatsing ervan enkele tientjes besparing op jaarbasis op.", "Heb je een koelkast of vriezer die ouder is dan 15 jaar? Overweeg dan de aanschaf van een  
    nieuw en energiezuinig model. De aanschafkosten verdien je terug op termijn, omdat je energiekosten uitspaart.", "Voer hier jouw stadsnaam in:", "Gemaakt door:");
}
elseif($lang == "GER"){
    $text = array("Sprachen", "Temperatur einstellen", "Nützliche Tipps zum Sparen", "Mit Kühlerfolie hinter dem Kühler werden Sie den höheren Spritpreis nicht kompensieren.
    Trotzdem spart die Installation jährlich ein paar Dutzend Dollar.", "Mit Kühlerfolie hinter dem Kühler werden Sie den höheren Spritpreis nicht kompensieren. 
    Trotzdem spart die Installation jährlich ein paar Dutzend Dollar.", "
    Haben Sie einen Kühl- oder Gefrierschrank, der älter als 15 Jahre ist? Dann erwägen Sie den Kauf eines neuen und energieeffizienten Modells. 
    Langfristig verdienen Sie die Anschaffungskosten zurück, weil Sie Energiekosten sparen.", "Geben Sie hier Ihren Stadtnamen ein:", "Hergestellt von:");
}


?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F1M3BO - Jari & Tygo</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
</head>

<header id="hoofdje" class="header">

    <h1 class="headerTitle noselect">Dashboard</h1>
    
    <button id="js--menu" class="headerButton" class="noselect"><?php echo $text[0]; ?></button>

</header>

<body id="js--body">

    <nav id="js--nav" class="mainNav">
        <ul class="mainNavList">
            <li  class="mainNavListItem">
                <a class="a" href="index.php?lang=ENG">English</a>
            </li>
            <li  class="mainNavListItem">
                <a class="a" href="index.php?lang=NL">Dutch</a>
            </li>
            <li  class="mainNavListItem">
                <a class="a" href="index.php?lang=GER">German</a>
            </li>
            <li class="closeNav mainNavListItem" onclick="closeNav()">
                X
            </li>
        </ul>

    </nav>

</body>

<main>

    <ul class="kaartjes">

        <li class="cards card--1">

            <canvas class="diagram1" id="myChart"></canvas>

        </li>

        <li class="cards card--2">

            <canvas class="diagram1" id="myChart2"></canvas>

        </li>

        <li class="cards card--3">

            <h1 style="text-align: center; padding-top: 2rem; padding-bottom: 2rem; font-size: 4rem;">EST Clock :</h1>

            <div id="clockContainer">
                <div id="hour"></div>
                <div id="minute"></div>
                <div id="second"></div>
            </div>

        </li>

    </ul>

    <ul class="kaartjes1">
        <li class="cards1 card--4">

            <article class="card--slider">
                <h1 style="font-size: 3rem;"><?php echo $text[1]; ?></h1>
                <h2 id="js--rangeValue">0</h2>
                <input id="js--slider" type="range" min="1" max="30" step="1">
            </article>

            <article class="buttons--slider">
                <button id="js--button1" class="next-prev">-</button>
                <button id="js--button2" class="next-prev">+</button>
            </article>

        </li>
        <li class="cards1 card--5">
            <h1 class="tipsTitle"><?php echo $text[2]; ?></h1>
            
            <div class="hwrap"><div class="hmove">
                <div class="hslide">
                    <p>
                        <?php echo $text[3]; ?>
                    </p>
                </div>
                <div class="hslide">
                    <p>
                        <?php echo $text[4]; ?>
                    </p>
                </div>
                <div class="hslide">
                    <p>
                        <?php echo $text[5]; ?>
                    </p>
                </div>
            </div>

        </li>

        <li class="cards1 card--6">
            
            <div class="container-fluid">



                <section class="main">
    
    
        
                <section class="inputs">
                    <input type="text" placeholder="<?php echo $text[6]; ?>" id="cityinput">
                    <input type="submit" value="Submit" id="add">
                <button id="add"></button>
                </section>
    
         
                <section class="display">
                    <div class="wrapper">
                        <h2 id="cityoutput"></h2>
                        <p id="description"></p>
                        <p id="temp"></p>
                        <p id="wind"></p>
    
                    </div>
                </section>
                </section>
    
            </div>

        </li>

    </ul>

</main>

<footer class="footer">
            
    <ul class="footerNav" class="noselect">
        <li class="footerNavItem">
            <a href="index.php?lang=ENG">English</a>
        </li>
        <li class="footerNavItem">
            <a href="index.php?lang=NL">Dutch</a>
        </li>
        <li class="footerNavItem">
            <a href="index.php?lang=GER">German</a>
        </li>
    </ul>

    <ul class="openHours">
        <li class="openHoursTime1"><?php echo $text[7]; ?></li>
        <li class="openHoursTime2">Tygo Jedema</li>
        <li  class="openHoursTime2">Jari Kee</li>
    </ul>

    
    <a class="address" href="#hoofdje">
        TOP
    </a>
    

</footer>

</html>

