<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 2018-12-20
 * Time: 03:59
 * Scaffolding Weight Calculator
 */

include('header.php');
include('includes/db-connect.php');
$sql = "SELECT * FROM scaffold_weight";
$scaffoldWeightData = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scaffold Weight Calculator</title>
    <link rel="stylesheet" href="css/calculator.css">
</head>
<body>
<div class="calculator-page">
    <br>
    <h2>Scaffold Weight Calculator Ver.1.0</h2>
    <img src="images/stc-logo.png" alt="STC Logo" width="75">
    <br>
    <form name="scaffolding-calculator" method="POST" action="scaffold-calculator.php">
        <input type="submit" name="calculate" value="Calculate">
        <input type="submit" name="clear" value="Clear"><br>
        <table>
            <tr>
                <th>Material Description</th>
                <th>Category</th>
                <th style="text-align: center">Qty.</th>
                <th style="text-align: center">Unit Weight (Kg)</th>
                <th style="text-align: center">Weight (Kg)</th>
                <th style="text-align: center">Weight (lbs)</th>
                <th style="text-align: center">Weight (tons)</th>
            </tr>
            <?php
            while ($rowMaterial = mysqli_fetch_assoc($scaffoldWeightData)) {
                $materialID = $rowMaterial['material_id'];
                $description = $rowMaterial['description'];
                $category = $rowMaterial['category'];
                $unitWeight = $rowMaterial['unit_weight_kg'];
                if (isset($_POST['calculate'])) {
                    $weightKg = $_POST[$materialID] * $unitWeight;
                    $weightLbs = $weightKg * 2.20462;
                    $weightTons = $weightKg / 1000;
                    $totalWeightKg = $weightKg + $totalWeightKg;
                }
                if (isset($_POST['clear'])) {
                    header('Location: scaffold-calculator.php');
                }
                ?>
                <tr>
                    <td><?php echo $description ?></td>
                    <td><?php echo $category ?></td>
                    <td style="text-align: center"><input type="text" name="<?php echo $materialID; ?>"
                                                          value="<?php echo $_POST[$materialID]; ?>" placeholder="Qty">
                    </td>
                    <td style='text-align: right'><?php echo number_format($unitWeight, 2) ?></td>
                    <td style='text-align: right'><?php echo number_format($weightKg, 2) ?></td>
                    <td style='text-align: right'><?php echo number_format($weightLbs, 2) ?></td>
                    <td style='text-align: right'><?php echo number_format($weightTons, 2) ?></td>
                </tr>
                <?php
            }
            ?>
            <div class='head-calculations'>
                Total Weight in Kg: - <?php echo number_format($totalWeightKg, 2) ?><br>
                Total Weight in lbs: - <?php echo number_format($totalWeightKg * 2.20462, 2) ?> <br>
                <b> Total Weight in Tons: - <?php echo number_format($totalWeightKg / 1000, 2) ?> </b> <br>
                <br>
            </div>
    </form>
    </table>
</div>
</body>
<footer>
    <?php
    include('footer.php');
    ?>
</footer>
</html>