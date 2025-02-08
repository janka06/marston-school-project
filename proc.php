<html>
    <body>
        <?php
        session_start();
        session_unset();
        header("Location: index.php");
        ?>
    </body>
</html>