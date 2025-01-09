<?php
session_start();
$ses = $_SESSION["OK"];
$value = $_SESSION["user"];
if ($ses == TRUE) {
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laimīgā Stunda</title>
        <link href="css/Cal_Page.css" type="text/css" rel="stylesheet">
        <link rel="icon" href="../Src_Img/Icon.png">
    </head>
    <body>
        <div class="textbox">
            <div class="top_bar">
                <a href="Reg_Page.html">Mani pietiekumi</a>
                <a href="https://stunduizmainas.marupe.edu.lv/" target="_blank">Stundu izmaiņas</a>
                <a href="https://stunduizmainas.marupe.edu.lv/konsultacijas/" target="_blank">Konsultāciju grafiks</a>
                <a href="https://marupe.edu.lv/" target="_blank">Skolas mājaslapa</a>
            </div>
            <h1>Pieteikties laimīgajai stundai</h1>
            <h2>4. Ieraksti pārbaudes darba nosaukumu</h2>
            <div class="input_mid">
                <input type="text" class="pd_name" placeholder="Pārbaudes darba nosaukums" title="Ieraksti pārbaudes darba nosaukumu">
            </div>
            <h2>5. Izvēlies datumu</h2>
            <div class="date_list" id="scroll_style">
                <div class="date">
                    <div class="textbox">
                        <h3>6. septembris</h3>
                        <h4>9.stunda konferenču zāle</h4>
                        <p class="aizpildīts">Aizpildīts</p>
                        <button type="submit" class="button">Pieteikties</button>
                    </div>
                </div>
                <div class="date">
                    <div class="textbox">
                        <h3>6. septembris</h3>
                        <h4>10.stunda konferenču zāle</h4>
                        <p class="vidēji_aizpildīts">Vidēji aizpildīts</p>
                        <button type="submit" class="button">Pieteikties</button>
                    </div>
                </div>
                <div class="date">
                    <div class="textbox">
                        <h3>13. septembris</h3>
                        <h4>9.stunda konferenču zāle</h4>
                        <p class="vidēji_aizpildīts">Vidēji aizpildīts</p>
                        <button type="submit" class="button">Pieteikties</button>
                    </div>
                </div>
                <div class="date">
                    <div class="textbox">
                        <h3>13. septembris</h3>
                        <h4>10.stunda konferenču zāle</h4>
                        <p class="vidēji_aizpildīts">Vidēji aizpildīts</p>
                        <button type="submit" class="button">Pieteikties</button>
                    </div>
                </div>
                <div class="date">
                    <div class="textbox">
                        <h3>20. septembris</h3>
                        <h4>9.stunda konferenču zāle</h4>
                        <p class="brīvs">Brīvs</p>
                        <button type="submit" class="button">Pieteikties</button>
                    </div>
                </div>
                <div class="date">
                    <div class="textbox">
                        <h3>20. septembris</h3>
                        <h4>10.stunda konferenču zāle</h4>
                        <p class="brīvs">Brīvs</p>
                        <button type="submit" class="button">Pieteikties</button>
                    </div>
                </div>
                <div class="date">
                    <div class="textbox">
                        <h3>27. septembris</h3>
                        <h4>9.stunda konferenču zāle</h4>
                        <p class="vidēji_aizpildīts">Vidēji aizpildīts</p>
                        <button type="submit" class="button">Pieteikties</button>
                    </div>
                </div>
                <div class="date">
                    <div class="textbox">
                        <h3>27. septembris</h3>
                        <h4>10.stunda konferenču zāle</h4>
                        <p class="brīvs">Brīvs</p>
                        <button type="submit" class="button">Pieteikties</button>
                    </div>
                </div>
            </div>
            </br>
            </br>
            <div class="bottom_bar">
                <p>Vārds, Uzvārds</p>
                <p>Personas kods</p>
                <p>Klase</p>
                <a href="Login_Page.html">Iziet</a>
            </div>
            <div class="logo">
                <img src="../Src_Img/logo.png" alt="logo">
                <p id="mvg">MĀRUPES VALSTS</p>
                <p id="mvg">ĢIMNĀZIJA</p>
            </div>
        </div>  
    </body>
</html>
<?php
}
else {
    header("Location: index.php");
}
?>