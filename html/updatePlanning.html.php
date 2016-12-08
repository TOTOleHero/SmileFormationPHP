<div><?php echo $err_message ?></div>

<form method="POST" name="form_update" action="/src/updatePlanning.php">


    <input type="hidden" name="lineDate" value="<?php echo $lineDate ?>" />
    <input type="hidden" name="action" value="update" />

    Date : <?php echo $lineDate ?><br/>
    Label : <input type="text" name="label" value="<?php echo $label ?>"/><br/>
    Formateur : <input type="text" name="teacher" value="<?php echo $teacher ?>" /><br/>

    <input type="submit" value="Mettre a jour" name="mettreAJour"/>
</form>



