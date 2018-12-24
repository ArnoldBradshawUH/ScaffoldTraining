<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 2018-12-20
 * Time: 03:59
 * Scaffolding Training Page
 */

session_start();
include('header.php');
if (($_SERVER["REQUEST_METHOD"] == "POST") && ($_SESSION['userID'] == true)) {
    $_SESSION["train_id"] = $_POST["train_id"];
    header('Location: confirmation.php');
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('Location: login.php');
}
include('includes/db-connect.php');
$sql = "SELECT * FROM training WHERE train_start_date >= CURRENT_DATE";
$training_data = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>STC Training</title>
    <link rel="stylesheet" href="css/training.css">
</head>
<body>
<div class="main-page">
    <!--    Display a table caption with the current year    -->
    <br>
    <h2>Upcoming Training - <?php echo date(Y); ?></h2><br>
    <div class="training-container">
        <table>
            <?php
            if (mysqli_num_rows($training_data) == 0) {
                echo "<p class='training-message'>" . "Sorry we dont have any available training at present. Please call
                 our office (+1-868-xxx-xxxx) if you need any additional information. You can also check our facebook
                  page in the link below this page, in the footer section. Thank you for always choosing
                   STCLimited for all your scaffolding training needs." . "</p>";
            } else {
                while ($row = mysqli_fetch_assoc($training_data)) {
                    echo "<tr>";
                    echo "<td>";
                    $image_path = 'images/training/' . $row['image'] . '.jpeg';
                    echo "<img src= $image_path alt='Training' width='300'>" . "<br>";
                    echo "</td>";
                    echo "<td>";
                    echo "<b>" . "Course Code: " . $row['course_code'] . "</b>" . "<br>";
                    echo "<b>" . "Course Title: " . $row['train_title'] . "</b>" . "<br>";
                    setlocale(LC_MONETARY, "en_US");
                    echo "Cost (TTD): " . money_format("%.2n", $row['train_cost']) . "<br>";
                    echo "Course Description: " . $row['short_description'] . "<br>";
                    echo "<span style='color: #cd0a0a'>" . "Start Date: " . $row['train_start_date'] . "</span>" . "<br>";
                    echo "<span style='color: #cd0a0a'>" . "End Date: " . $row['train_end_date'] . "</span>" . "<br>";
                    echo "Instructor: " . $row['train_instructor'] . "<br>";
                    echo "<b>"."Spaces Available: " . $row['train_spaces'] . "</b>"."<br>";
                    echo "<form action='scaffold-training.php' method='post'>";
                    echo "<button type='submit' class='btn-book-now' >" . "Book Now" . "</button>" . "<br>";
                    $train_id = $row['train_id'];
                    echo "<input type='hidden' name='train_id' value = $train_id >";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conn);
            ?>
        </table>
    </div>
</div>
</body>
<footer>
    <?php include('footer.php'); ?>
</footer>
</html>
