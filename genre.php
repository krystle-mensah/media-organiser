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

<?php include "db.php"; ?>

<body>
  <nav class="navbar">
    <span class="open-slide">
      <a href="#" onclick="openSlideMenu()">
        <svg width="30" height="30">
          <path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
          <path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
          <path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
        </svg>
      </a>
    </span>

    <ul class="navbar-nav">
      <li><a href="#">Username</a></li>
      <li><a href="#"><i class="fas fa-user"></i></a></li>
      <li><a href="home.php">Home</a></li>
      <li><a href="view_genres.php">Genres</a></li>
    </ul>
  </nav>

  <!-- <div id="side-menu" class="side-nav">
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
    <a href="home.php">Home</a>
    <a href="genres.php">Genres</a>
  </div> -->

  

<!-- GET URL REQUEST FOR SONG ID  -->

<?php 
if(isset($_GET['G_id'])){
  
  $the_Genre_id = $_GET['G_id'];
  $query = "SELECT * FROM songs WHERE songGenre = $the_Genre_id";
  $select_songs_by_genre = mysqli_query($connection,$query);

  if(!$select_songs_by_genre){
  
    // Print a message and terminate the current script:
    die("QUERY FAILED" . mysqli_error($connection));

  }


// <!-- LOOP FOR ALL SONGS ID -->

  foreach($select_songs_by_genre as $row) {
            
     echo $songTitle = $row['songTitle'];
    $songArtistName = $row['songArtistName'];
    $songGenre = $row['songGenre'];

  }

  

}

?>

  <div id="main">
    <h1 class="title">Acoustic</h1>
    <table id="customers">
      <tr>
        <th>Title</th>
        <th>Artist</th>
      </tr>
      <tr>
        <td>Song 1</td>
        <td>Artist Name 1</td>
        
      </tr>
      <tr>
        <td>Song 2</td>
        <td>Artist Name 2</td>
      </tr>
      <tr>
        <td>Song 3</td>
        <td>Artist Name 3</td>
      </tr>
    </table>
  </div>

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
