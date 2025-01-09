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
            <link rel="icon" href="../Src_Img/Icon.png">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
            <link href="css/Search_Page.css" type="text/css" rel="stylesheet">
        </head>
        <body>
            <div class="textbox">
                <div class="top_bar">
                <!-- IEGŪST SKOLĒNA VĀRDU, UZVĀRDU UN KLASI -->
                <?php
                include("db.php");
                $sql = "SELECT * FROM visikopa WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $value);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $skolens = htmlspecialchars($row['fname']); // Ensure safe output
                    echo "<p>$skolens</p>";
                } else {
                    echo "<p>User not found</p>";
                }
                $stmt->close();
                $conn->close();
                ?>
                    <form action="proc.php" method="post">
                        <button type="submit">Iziet</button>
                    </form>
                </div>
                <h1>Pieteikties laimīgajai stundai</h1>
                <div class="search_box">
                    <div class="textbox1">
                        <h2>1. Izvēlies priekšmetu</h2>
                        <div class="wrapper" id="scroll_style">
                            <div class="input_group">
                                <input type="text" id="subjectInput" placeholder="Meklēt priekšmetu ...">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <ul id="subjects">
                                <?php
                                include("db.php");
                                $sql ="SELECT * FROM prieksmeti";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $subject = $row["prieksmets"];
                                        echo "<li>$subject</li>";
                                    }
                                }else {
                                        echo "<li>no results found</li>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="textbox2">
                        <h2>2. Izvēlies skolotāju</h2>
                        <div class="wrapper" id="scroll_style">
                            <div class="input_group">
                                <input type="text" id="teacherInput" placeholder="Meklēt skolotāju ...">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <ul id="teachers">
                            <?php
                                include("db.php");
                                $sql ="SELECT * FROM darbinieki";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $teacher = $row["fname"];
                                        echo "<li>$teacher</li>";
                                    }
                                }else {
                                        echo "<li>no results found</li>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <form action="Cal_Page.php" method="post">
                <button type="submit" class="button">3. Tālāk</button></form>
                <div class="bottom_bar">
                    <a href="Reg_Page.html">Mani pietiekumi</a>
                    <a href="https://stunduizmainas.marupe.edu.lv/" target="_blank">Stundu izmaiņas</a>
                    <a href="https://stunduizmainas.marupe.edu.lv/konsultacijas/" target="_blank">Konsultāciju grafiks</a>
                    <a href="https://marupe.edu.lv/" target="_blank">Skolas mājaslapa</a>
                </div>
                <div class="logo">
                    <img src="../Src_Img/logo.png" alt="logo">
                    <p id="mvg">MĀRUPES VALSTS</p>
                    <p id="mvg">ĢIMNĀZIJA</p>
                </div>
            </div>
            <script src="js/Search_Page.js"></script>
        </body>
    </html>
<?php
}
else {
    header("Location: index.php");
}
?>


<!-- SAGLABĀTS -->
                    <?php
                        #include("db.php");
                        #$sql = "SELECT * FROM visikopa WHERE id = '$value'";
                        #$result = $conn->query($sql);
                        #if ($result->num_rows > 0) {
                            #while ($row = $result->fetch_assoc()) {
                                #$skolens = $row['fname'];
                            #}
                        #echo "<p>$skolens</p>";
                        #}
                        #$conn-close();
                    ?>