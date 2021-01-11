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
      <li><a href="#">Username</a></li>
      <li><a href="#"><i class="fas fa-user"></i></a></li>
      <li><a href="home.php">Home</a></li>
      <li><a href="genres.php">Genres</a></li>
    </ul>
  </nav>

<?php $connection = $pdo->open();?>

<!-- GET REQUEST FOR SONG ID -->

<?php 
if(isset($_GET['s_id'])){
  $the_song_id = $_GET['s_id'];

  //then select all from table where colum value matches the GET id.
  $get_song_id = $connection->prepare("SELECT * FROM songs WHERE songID = {$the_song_id} ");
  $get_song_id->execute(); 

}

?>

<!-- UPDATE -->

<?php 
if(isset($_GET['update_song'])){
  
  $song_title = ($_POST['song_title']);
  $Artist_song_name = ($_POST['Artist_song_name']);
  $song_genre_update = ($_POST['song_genre_update']);

  //UPDATE table_name
//SET column1 = value1, column2 = value2, ...
//WHERE condition;

  // UPDATE SONGS TABLE.
  //$SQL = $db_found->prepare("UPDATE members SET username=?, password=? WHERE email=?");
  //$update_query = $connection->prepare("UPDATE songs SET songTitle = {$song_title}, songArtistName = {$Artist_song_name}");
  //$update_query->execute();   

}

?> 

<!-- LOOP FOR ALL SONGS ID -->

<?php foreach($get_song_id as $row) {?>
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
      <?php 
      $GenresID = $connection->prepare("SELECT * FROM genres WHERE genreID = {$songGenre}"); 
      $GenresID->execute();
      ?>
      <?php foreach($GenresID as $row){ ?>
      <?php if($songGenre == $row['genreID']): ?>
      <input value="<?= $row['genreTitle'] ?>" type="text" id="lname" name="song_genre_update" placeholder="Enter new genre">
      <?php endif;?>
      <?php } ?>
      
      <input type="submit"  name="update_song" value="Update Song">

    </form>
  </div>
</div>

<!-- //UPDATING -->

<?php 



if( isset( $_POST['edit_song'] ) ) {

  // TEST
  echo $_POST['edit_song'];

  // pick up values and save them here
  $songTitle  = $_POST['song_title'];
  $Artist_song_name = $_POST['Artist_song_name'];
  $song_genre_update = $_POST['song_genre_update'];

  // Then update calltoaction and set title value to value from user and url location where the id matches the Get id 
  $update_song = $connection->prepare(" UPDATE songs  SET songTitle = '{$songTitle}', songArtistName = '{$Artist_song_name}' WHERE songID = {$the_song_id} ");
  $update_song->execute();

  //$update_song_genre = $connection->prepare(" UPDATE genres  SET genreTitle = '{$song_genre_update}' WHERE songID = {$the_song_id} ");
  //$update_song->execute();

}

?>