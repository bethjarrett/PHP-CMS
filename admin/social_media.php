<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM social_media
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'social_media has been deleted' );
  
  header( 'Location: social_media.php' );
  die();
  
}

$query = 'SELECT *
  FROM social_media
  ORDER BY ID ';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Social Media</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="left">URL</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        
        <img src="image.php?type=social_media&id=<?php echo $record['id']; ?>&width=100&height=100&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['name'] ); ?>        
      </td>
      <td align="center"><a href="<?php echo $record['url']; ?>"><?php echo $record['url']; ?></a></td>
     
      <td align="center"><a href="social_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="social_media_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="social_media.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this Social media?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="social_media_add.php"><i class="fas fa-plus-square"></i> Add Media</a></p>


<?php

include( 'includes/footer.php' );

?>