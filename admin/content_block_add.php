<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['name'] ) )
{

  if( $_POST['name'] and $_POST['description'] )
  {

    $query = 'INSERT INTO content_block (
        name,
        description,
        type
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'"
      )';
    mysqli_query( $connect, $query );

    set_message( 'Content block information has been added' );

  }

  header( 'Location: content_blocks.php' );
  die();

}

?>

<h2>Add Content Block</h2>
<hr class="w3-round">

<form method="post">


  <label for="name">Name:</label>
  <input type="text" name="name" id="name">

  <br>
  <label for="type">Type:</label>
  <input type="text" name="type" id="type">

  <br>

  <label for="description">Content block:</label>
  <textarea type="text" name="description" id="description" rows="10"></textarea>

  <script>

  ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

  </script>

  <br>

  <input type="submit" value="Add Content block">

</form>

<p><a href="content_blocks.php"><i class="fas fa-arrow-circle-left"></i> Return to Content block page</a></p>


<?php

include( 'includes/footer.php' );

?>

