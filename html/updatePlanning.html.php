<form method="POST" name="form_update" action="showPlanning.php">
    Date : <input type="text" name="Date" value="<?php echo $_POST['lineDate'];?>" />
    Label : <input type="text" name="Label" value="<?php echo $_POST['label'] ?>"/>
    Formateur : <input type="text" name="Teacher" value="<?php echo $_POST['teacher']; ?>" />

    <input type="submit" value="Mettre a jour" name="mettreAJour"/>
</form>



