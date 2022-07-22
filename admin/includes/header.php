<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP CMS - Administrative Dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/css/w3.css">
  <link href="/admin/includes/styles.css" type="text/css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ca8a2a996a.js" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
</head>
<body>

<!-- Sidebar -->
<nav class="w3-sidebar w3-collapse w3-top w3-large w3-padding sidebar" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft closenav">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>CMS Dashboard</b></h3>
  </div>
  <div class="w3-bar-block">    
    <?php if(isset($_SESSION['id'])): ?>
    <ul class="dashboard">
      <li><a href="dashboard.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><i class="fa-solid fa-house-chimney"></i>&nbsp;&nbsp;Home</a></li>
      <li><a href="projects.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><i class="fa-solid fa-list-check"></i>&nbsp;&nbsp;Projects</a></li>
      <li><a href="skills.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;&nbsp;Skills</a></li>
      <li><a href="social_media.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><i class="fa-solid fa-hashtag"></i>&nbsp;&nbsp;Social Media</a></li>
      <li><a href="users.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><i class="fa-solid fa-users"></i>&nbsp;&nbsp;Users</a></li>
      <li><a href="content_blocks.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><i class="fa-solid fa-folder-open"></i>&nbsp;&nbsp;Content Blocks</a></li>
      <li><a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;&nbsp;Logout</a></li>
    </ul>
    <?php endif; ?>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-margin-right" onclick="w3_open()">☰</a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main content-container">
<?php echo get_message(); ?>