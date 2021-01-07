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
    </ul>
  </nav>

  <div id="side-menu" class="side-nav">
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
    <a href="home.php">Home</a>
    <a href="genres.php">Genres</a>
  </div>

  <div id="main">
    <h1 class="title">All Music</h1>
    <?php
    // first open a connection to the database
    $connection = $pdo->open();
    // then a try catch for errors
    try {
      // then query table from the database
      $allSongs = $connection->prepare("SELECT * FROM songs");
      // then excute query
      $allSongs->execute();
      // then I want a foreach loop
      foreach($allSongs as $row){
        // then say what row
        $songTitle = $row['songTitle'];
        //
        

      }

    }
    catch(PDOException $e){
      echo "There is some problem in connection: " . $e->getMessage();
    }

    ?>
    <table id="customers">
      <tr>
        <th>Title</th>
        <th>Artist</th>
        <th>Genre</th>
      </tr>
      <tr>
        <td>Song 1</td>
        <td>Artist Name 1</td>
        <td>pop</td>
      </tr>
      <tr>
        <td>Song 2</td>
        <td>Artist Name 2</td>
        <td>Jazz</td>
      </tr>
      <tr>
        <td>Song 3</td>
        <td>Artist Name 3</td>
        <td>Acoustic</td>
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
