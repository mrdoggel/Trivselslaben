<head>
    <link rel="stylesheet" href="assets/css/common/filter.css">
</head>
<?php
switch ($side) {
    case 1:
        echo '<form class="filter" action="alleKurs.php" method="post">';
        break;
    case 2:
        echo '<form class="filter" action="alleModuler.php" method="post">';
        break;
    case 3:
        echo '<form class="filter" action="alleQuizer.php" method="post">';
        break;
}
?>

    <?php
    $checked1 = "";
    $checked2 = "";
    $checked3 = "";
    $checked4 = "";
    if(isset($_POST['filterInput1'])) {
        $checked1 = "checked";
    }
    if(isset($_POST['filterInput2'])) {
        $checked2 = "checked";
    }
    if(isset($_POST['filterInput3'])) {
        $checked3 = "checked";
    }
    if(isset($_POST['filterInput4'])) {
        $checked4 = "checked";
    }
    ?>
    <?php echo '<input type="checkbox" id="org-tema" name="filterInput1" value="1"'; echo $checked1; echo'>'; ?>
    <label for="org-tema" id="org-tema">Organisasjonsformer</label>

    <?php echo '<input type="checkbox" id="øko-tema" name="filterInput2" value="2"'; echo $checked2; echo'>'; ?>
    <label for="øko-tema" id="øko-tema">Økonomi</label>

    <?php echo '<input type="checkbox" id="konsept-tema" name="filterInput3" value="3"'; echo $checked3; echo'>'; ?>
    <label for="konsept-tema" id="konsept-tema">Konseptutvikling</label>

    <?php echo '<input type="checkbox" id="reg-tema" name="filterInput4" value="4"'; echo $checked4; echo'>'; ?>
    <label for="reg-tema" id="reg-tema">Kontrakter og registrering</label>

    <input type="submit" name="filter-knapp" id="" value="filtrer">

</form>