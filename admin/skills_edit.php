<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: skills.php' );
  die();
  
}

if( isset( $_POST['skill'] ) )
{
  
  if( $_POST['skill'] )
  {
    
    $query = 'UPDATE skills SET
      skill = "'.mysqli_real_escape_string( $connect, $_POST['skill'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Skill has been updated' );
    
  }

  header( 'Location: skills.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM skills
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: skills.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

?>

<h2>Edit Skill</h2>
<hr class="w3-round">
<form method="post">
  
  <label for="skill">Skill:</label>
  <input type="text" name="skill" id="skill" value="<?php echo htmlentities( $record['skill'] ); ?>">
    
  <br>
 
  
  <input type="submit" value="Edit Skill">
  
</form>

<p><a href="skills.php"><i class="fas fa-arrow-circle-left"></i> Return to Skill List</a></p>


<?php

include( 'includes/footer.php' );

?>