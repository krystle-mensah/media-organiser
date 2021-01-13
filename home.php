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
      <!-- <li><a href="#">Username</a></li> -->
      <!-- <li><a href="#"><i class="fas fa-user"></i></a></li> -->
      <li><a href="home.php">Home</a></li>
      <!-- <li><a href="view_genres.php">Genres</a></li> -->
    </ul>
  </nav>

  <!-- <div id="side-menu" class="side-nav">
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
    <a href="home.php">Home</a>
    <a href="genres.php">Genres</a>
  </div> -->

  <div id="main">

    <!-- FETCH ALL SONGS QUERY -->
    <?php 
    $query = "SELECT * FROM songs";
    $select_all_songs = mysqli_query($connection,$query); 
    ?>

    <h1 class="title">All Songs</h1>
    <table id="customers">
      <tr class="table_head">
        <th>Title</th>
        <th>Artist</th>
        <th>Genre</th>
      </tr>
      <?php foreach($select_all_songs as $row){ ?>
      
      <!-- FETCH ROWS FORM DATABASE -->
      <?php 
      $songTitle        = $row['songTitle'];
      $songArtistName   = $row['songArtistName'];
      $songGenre        = $row['songGenre'];
      $songID           = $row['songID'];
      $songFile         = $row['songFile'];
      ?>

      <!-- LOOP THROUGH ROWS FROM DATABASE -->

      <tr>
        <td>
          <div><?= $row['songTitle'] ?></div>
          
          <span>
            <audio width="400" height="350" controls>
              <source src="musicFiles/<?php echo $songFile;  ?>" type="audio/mp3">
            </audio>
          </span>
        </td>
        <td><?= $row['songArtistName'] ?></td>
        
        <!-- FETCH ALL GENRES TABLE -->
        <?php 
        $query = "SELECT * FROM genres";
        $select_genre_id = mysqli_query($connection,$query);
        ?>
        
        <!-- LOOP THROUGH GENRE ID FOR GENRE TITLE -->

        <?php foreach($select_genre_id as $row){ 
              if($songGenre == $row['genreID']){ 
        ?>
        <td><?= $row['genreTitle'] ?></td>

          <!-- BUTTONS - To edit/delete -->

          <td><a class="all_songs_delete" href="home.php?delete=<?= $songID ?>"> Delete </td></a>
          <td><a class="all_songs_edit" href="songs.php?source=edit_song&s_id=<?php echo $songID; ?>"> Edit </a></td>
          <?php } ?>
        <?php }  ?>
      </tr>
      <?php } ?>
    </table>
  </div>

  <?php
  
  // DELETE SONG - User has to refreash the page once the delete icon is clicked. 

  if(isset($_GET['delete'])){
    // TEST delete
    // //echo "hello";
    $theSongID = $_GET['delete'];

    // QUERY TO DELETE RECORD
    $query = "DELETE FROM songs WHERE songID = {$theSongID} ";
    $delete_query = mysqli_query($connection,$query);

    header("Location: home.php");
  
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
