<?php
session_start();
$ses = $_SESSION["OK"];
$value = $_SESSION["user"];

if ($ses == TRUE) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["subject"] = $_POST["subject"];
        $_SESSION["teacher"] = $_POST["teacher"];
    }
    $subject = isset($_SESSION["subject"]) ? $_SESSION["subject"] : '';
    $teacher = isset($_SESSION["teacher"]) ? $_SESSION["teacher"] : '';

    // Set time to Latvian time
    setlocale(LC_TIME, 'lv_LV.UTF-8', 'lv_LV', 'lv');

    // Function to calculate Fridays
    function getFridays($year, $month, $count = 4) {
        $fridays = [];
        $date = strtotime("first friday of $year-$month");
        while (count($fridays) < $count) {
            $fridays[] = strftime('%e. %B', $date); // Format in Latvian
            $date = strtotime('+1 week', $date);
        }
        return $fridays;
    }

    // Current month and year
    $currentMonth = date('n');
    $currentYear = date('Y');

    // Calculate Fridays for the current and next month
    $fridays = getFridays($currentYear, $currentMonth);
    if (count($fridays) < 4) {
        $fridays = array_merge($fridays, getFridays($currentYear, $currentMonth + 1, 4 - count($fridays)));
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laimīgā Stunda</title>
        <link href="css/Cal_Page.css" type="text/css" rel="stylesheet">
        <link rel="icon" href="../Src_Img/Icon.png">
        <script type="text/javascript">
            // Debug purposes
            window.onload = function() {
                var subject = "<?php echo $subject; ?>";
                var teacher = "<?php echo $teacher; ?>";
                if (subject && teacher) {
                    alert("Subject: " + subject + "\nTeacher: " + teacher);
                }
            };
        </script>
    </head>
    <body>
    <div class="textbox">
        <div class="top_bar">
            <div class="user_name">
                <?php
                include("db.php");
                $sql = "SELECT * FROM visikopa WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $value);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $skolens = htmlspecialchars($row['fname']);
                    echo "<h4>$skolens</h4>";
                } else {
                    echo "<h4>User not found</h4>";
                }
                $stmt->close();
                $conn->close();
                ?>
            </div>
            <form action="proc.php" method="post">
                <button type="submit" class="top_button">Iziet</button>
            </form>
        </div>
        <h1>Pieteikties laimīgajai stundai</h1>
        <h2>4. Ieraksti pārbaudes darba nosaukumu</h2> <!-- student enters the test name -->
        <div class="input_mid">
            <input type="text" class="pd_name" placeholder="Pārbaudes darba nosaukums" title="Ieraksti pārbaudes darba nosaukumu" name="pd_name">
        </div>
        <h2>5. Izvēlies datumu</h2> <!-- contains fridays for witch the user applies for -->
        <div class="date_list" id="scroll_style">
            <?php foreach ($fridays as $friday): ?>
                <div class="date">
                    <div class="textbox">
                        <h3><?php echo $friday; ?></h3>
                        <h4>10.stunda konferenču zāle</h4>
                        <p class="aizpildīts">Aizpildīts</p>
                        <form action="config/apply.php" method="post">
                            <input type="hidden" name="stunda" value="10.stunda konferenču zāle">
                            <input type="hidden" name="pd_name" class="pd_name" placeholder="Pārbaudes darba nosaukums" title="Ieraksti pārbaudes darba nosaukumu">
                            <button type="submit" class="button">Pieteikties</button>
                        </form>
                    </div>
                </div>
                <div class="date">
                    <div class="textbox">
                        <h3><?php echo $friday; ?></h3>
                        <h4>11.stunda konferenču zāle</h4>
                        <p class="vidēji_aizpildīts">Vidēji aizpildīts</p>
                        <form action="config/apply.php" method="post">
                            <input type="hidden" name="stunda" value="11.stunda konferenču zāle">
                            <input type="hidden" name="pd_name" class="pd_name" placeholder="Pārbaudes darba nosaukums" title="Ieraksti pārbaudes darba nosaukumu">
                            <button type="submit" class="button">Pieteikties</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        </br>
        </br>
        <div class="bottom_bar"> <!-- bottom bar with redirects to other school pages -->
            <a href="Reg_Page.php">Mani pietiekumi</a>
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
    </body>
    </html>
    <?php
} else {
    header("Location: index.php");
}
?>
