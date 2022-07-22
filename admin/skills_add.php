<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['skill'] ) )
{
  
  if( $_POST['skill'] )
  {
    
    $query = 'INSERT INTO skills (
        skill
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['skill'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Skill has been added' );
    
  }
  
  header( 'Location: skills.php' );
  die();
  
}

?>

<h2>Add Skill</h2>
<hr class="w3-round">

<form method="post">
  
  <label for="skill">Skill:</label>
  <input type="text" name="skill" id="skill">
    
 
  
  <input type="submit" value="Add Skill">
  
</form>

<p><a href="skills.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include( 'includes/footer.php' );

?>