<!-- VAJADZĪGS CITS CAPTCHA TOKEN! -->
<?php
session_start();
session_abort();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laimīgā Stunda</title>
        <link href="css/index.css" type="text/css" rel="stylesheet">
        <link rel="icon" href="../Src_Img/Icon.png">
        <script src="https://www.google.com/recaptcha/api.js?render=6LeMjC8qAAAAAJ0wCrlMcktHY_egcofWWGlCjtxC" async defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    </head>
    <body>
        <div class="textbox">
            <form action="cfg.php" method="post">
                <h1>LAIMĪGĀ STUNDA</h1>
                <h2>REĢISTRĀCIJA</h2>
                <div class="personas-kods">
                    <input type="password" name="pkods" id="personaskods" required minlength="12" maxlength="12" placeholder="Personas Kods" title="Ieraksti savu personas kodu">
                    <i id="togglepassword" class="fa-regular fa-eye password-icon"></i>
                </div>
                <button class="button" data-sitekey="6LeMjC8qAAAAAJ0wCrlMcktHY_egcofWWGlCjtxC" data-callback="onSubmit">Pieslēgties</button>
            </form>
            <br>
            <div class="logo">
                <img src="../Src_Img/logo.png" alt="logo">
                <p id="mvg">MĀRUPES VALSTS</p>
                <p id="mvg">ĢIMNĀZIJA</p>
            </div>
        </div>
        <script src="js/index.js"></script>
    </body>
</html>