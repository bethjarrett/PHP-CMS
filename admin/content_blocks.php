<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{

  $query = 'DELETE FROM content_block
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );

  set_message( 'About has been deleted' );

  header( 'Location: content_blocks.php' );
  die();

}

$query = 'SELECT *
  FROM content_block';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Content Blocks</h2>
<hr class="w3-round">

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">Description</th>
    <th align="center">Type</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        <img src="image.php?type=content_block&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
        <td align="left"> <?php echo htmlentities( $record['name'] ); ?></td>
      <td align="left">
        <small><?php echo $record['description']; ?></small>
      </td>
        <td align="left">
        <small><?php echo $record['type']; ?></small>
      </td>
      <td align="center"><a href="content_block_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="content_block_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="content_blocks.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this information?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="content_block_add.php"><i class="fas fa-plus-square"></i> Add Content block </a></p>


<?php

include( 'includes/footer.php' );

?>
