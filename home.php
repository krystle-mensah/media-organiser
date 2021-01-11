<!DOCTYPE html>

<?php include "db.php";?>

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

  <!-- <div id="side-menu" class="side-nav">
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
    <a href="home.php">Home</a>
    <a href="genres.php">Genres</a>
  </div> -->

  <div id="main">

<!-- SELECT ALL SONGS QUERY -->

<?php 
$query = "SELECT * FROM songs";
$select_all_songs = mysqli_query($connection,$query); 
?>
    <h1 class="title">All Songs</h1>
    <table id="customers">
      <tr>
        <th>Title</th>
        <th>Artist</th>
        <th>Genre</th>
      </tr>
      <?php foreach($select_all_songs as $row){ ?>
      <!-- fetch ROWS -->
      <?php 
      $songTitle        = $row['songTitle'];
      $songArtistName   = $row['songArtistName'];
      $songGenre        = $row['songGenre'];

      //$songID   = $row['songID'];
      ?>

      <!-- LOOP THROUGH ROWS -->

      <tr>
        <td><?= $row['songTitle'] ?></td>
        <td><?= $row['songArtistName'] ?></td>
        <?php 
        $query = "SELECT * FROM genres";
        $select_genre_id = mysqli_query($connection,$query);
        ?>
        <?php foreach($select_genre_id as $row){ ?>
          <?php if($songGenre == $row['genreID']): ?>
          <td><?= $row['genreTitle'] ?></td>

          <!-- BUTTONS -->

          <td><a class="all_songs_delete" href="home.php?delete=<?php echo $songID ?>"> Delete </td></a>
          <td><a class="all_songs_edit" href="songs.php?source=edit_song&s_id=<?php echo $songID; ?>"> Edit </a></td>
          <?php endif; ?>
        <?php }  ?>
      </tr>
      <?php } ?>
    </table>
  </div>

  <?php
  
  // this works when the page is refreashed. i Need ti change this

  if(isset($_GET['delete'])){
    echo $theSongID = $_GET['delete'];

    $delete_song_query = $connection->prepare("DELETE FROM songs WHERE songID = {$theSongID}");
    $delete_song_query->execute(); 
  

    //header("Location: home.php");
  
  }
  ?>

  <script>
    function openSlideMenu(){
      document.getElementById('side-menu').style.width = '250px';
      // document.getElementById('main').style.marginLeft = '250px';
    }

    function closeSlideMenu(){
      document.getElementById('side-menu').style.width = '0';
      document.getElementById('main').style.marginLeft = '0';
    }
  </script>
</body>
</html>
