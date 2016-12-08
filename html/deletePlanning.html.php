<p>Confirmer le delete</p>

<form method="POST" name="form_update" action="/src/deletePlanning.php">
    
    <input type="hidden" name="lineDate" value="<?php echo $lineDate;?>" />
    <input type="hidden" name="label" value="<?php echo $label;?>" />
    <input type="hidden" name="teacher" value="<?php echo $teacher;?>" />
  
    
    
    
    
    Date : <?php echo $_POST['lineDate'];?>
    <br />    Label : <?php echo $_POST['label'] ?>
    <br />    Formateur : <?php echo $_POST['teacher']; ?>
    <br />
    <input type="submit" value="Delete" name="confirmDelete"/>
</form>



