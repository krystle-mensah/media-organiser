<!DOCTYPE html>

<?php include "db.php"; ?>  

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
      <!-- <li><a href="#">Username</a></li> -->
      <!-- <li><a href="#"><i class="fas fa-user"></i></a></li> -->
      <li><a href="home.php">Home</a></li>
      <!-- <li><a href="view_genres.php">Genres</a></li> -->
    </ul>
  </nav>

<?php //$connection = $pdo->open();?>

<!-- GET URL REQUEST FOR SONG ID  -->

<?php 
if(isset($_GET['s_id'])){
  
  $the_song_id = $_GET['s_id'];

  $query = "SELECT * FROM songs WHERE songID = $the_song_id";
  $select_songs_by_id = mysqli_query($connection,$query);

}

?>

<!-- UPDATE -->

<?php
if(isset($_POST['update_song'])){
  //TEST
  //echo 'hi';

  //UPDATE FORM NAME
  $song_title       = ($_POST['song_title']);
  $songGenre        = ($_POST['songGenre']);
  $Artist_song_name = ($_POST['Artist_song_name']);
  
  // UPDATE QUERY - colume name then update. 
  $query = "UPDATE songs SET songTitle  = '{$song_title}', songGenre = '{$songGenre}',  songArtistName  = '{$Artist_song_name}' WHERE songID = {$the_song_id}";
  $update_song = mysqli_query($connection,$query);

    if(!$update_song){
  
      // Print a message and terminate the current script:
      die("QUERY FAILED" . mysqli_error($connection));
  
    }

}

?> 

<!-- LOOP FOR ALL SONGS ID -->

<?php foreach($select_songs_by_id as $row) {?>
            <?php 
    $songTitle = $row['songTitle'];
    $songArtistName = $row['songArtistName'];
    $songGenre = $row['songGenre'];
            ?>

<?php }?>

<div id="main">
  <h1 class="title">Edit Song</h1>

  <div>
    <form action="" method="post" enctype="multipart/form-data"> 
      <label class="edit_song_label" for="fname">Song Title</label>
      <input value="<?php echo $songTitle; ?>" type="text" id="fname" name="song_title" placeholder="Enter new title">

      <label class="edit_song_label" for="lname">Artist Name</label>
      <input value="<?php echo $songArtistName; ?>" type="text" id="lname" name="Artist_song_name" placeholder="Enter new artist">

      <label class="edit_song_label" for="lname">Song Gerne</label>
      <select name="songGenre" id="">
      <?php 
      $query = "SELECT * FROM genres";
      $select_genres = mysqli_query($connection,$query);
      ?>

      <?php foreach($select_genres as $row){ 
        $GenresID = $row['genreID'];
        $genreTitle = $row['genreTitle'];
      ?>

      <?php if($GenresID == $songGenre): ?>
      <?php echo "<option selected value='{$GenresID}'>{$genreTitle}</option>"; ?>  
      <?php else: ?>
      <?php echo "<option value='{$GenresID}'>{$genreTitle}</option>"; ?>
      <?php endif;?>  
      <?php } ?>

      </select>
      
      <!-- SUBMIT UPDATE BUTTON -->

      <input type="submit"  name="update_song" value="Update Song">

    </form>
  </div>
</div>