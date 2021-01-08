<?php //include "db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Music</title>
  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/4c907bd459.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar">
    <!-- <span class="open-slide">
      <a href="#" onclick="openSlideMenu()">
        <svg width="30" height="30">
            <path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
            <path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
            <path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
        </svg>
      </a>
    </span> -->

    <ul class="navbar-nav">
      <li><a href="#">Username</a></li>
      <li><a href="#"><i class="fas fa-user"></i></a></li>
      <li><a href="home.php">Home</a></li>
      <li><a href="genres.php">Genres</a></li>
    </ul>
  </nav>
  <!-- //CATCH EDIT  -->
  <?php 


if(isset($_GET['s_id'])){


  $the_song_id = $_GET['s_id'];

  //then select all from table where colum value matches the GET id.
  $get_song_id = $connection->prepare("SELECT * FROM songs WHERE songID = {$the_song_id} ");
  $get_song_id->execute(); 

}
?>

<?php
$connection = $pdo->open();
// QUERY FOR ALL SONGS
$select_songs_by_id = $connection->prepare("SELECT * FROM songs"); 
$select_songs_by_id->execute();
?>

<?php //then Foreach match loop through as a row
  foreach($get_song_id as $row) {
    $songTitle = $row['songTitle'];
    //$admin_cta_url = $row['url_location'];
    ?>
    
   
   

  <?php }?>


<div id="main">
  <h1 class="title">Edit Song</h1>

  <div>
  <form action="/action_page.php">
    <label class="edit_song_label" for="fname">Song Title</label>
    <input type="text" id="fname" name="song_title" placeholder="Enter new title">
    
    

    <label class="edit_song_label" for="lname">Artist Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Enter new artist">

    <label class="edit_song_label" for="lname">Song Gerne</label>
    <input type="text" id="lname" name="lastname" placeholder="Enter new genre">

    <input type="submit" value="edit song">
  </form>
</div>
</div>

<?php 

//UPDATING

if( isset( $_POST['edit_cta'] ) ) {

  // TEST
  ////echo $_POST['edit_cta'];

  // pick up values and save them here
  $admin_cta_title = $_POST['title'];
  $admin_cta_url = $_POST['url'];

  // then update calltoaction and set title value to value from user and url location where the id matches the Get id 
  $update_cta_id = $connection->prepare(" UPDATE calltoaction  SET title = '{$admin_cta_title}', url_location = '{$admin_cta_url}' WHERE id = {$the_cta_id} ");
  //then Execute that
  $update_cta_id->execute(); 

}

?>