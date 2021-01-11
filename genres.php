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

  <!-- <div id="side-menu" class="side-nav">
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
    <a href="home.php">Home</a>
    <a href="genres.php">Genres</a>
  </div> -->

  <div id="main">

    <section class="genres_main_section">
      <div class="call_to_action">
        <h1 class="title">Genres</h1>

        <div class="icon_section"></div>

      </div>
      <div></div>

    </section>
    <?php 
      include "db.php"; 
      $connection = $pdo->open(); 
      $allGenres = $connection->prepare("SELECT * FROM genres"); 
      $allGenres->execute(); 
    ?>
    <?php 

if (isset($_GET['genre'])) {
  // compare variable with each case.
  switch($_GET['genre']){
    // if source is equal to add post
    case 'acoustic';

    //then display this
    include "genre_pages/genre_acoustic.php";

    // stop
    break;

    // if source is equal to this page
    case 'hipHop';

    //then display this
    include "genre_pages/genre_hipHop.php";

    // stop
    break;
    
    case 'house';

    //then display this
    include "genre_pages/genre_house.php";

    // stop
    break;
  }
}

?>
    
    <!-- Home cards 1 -->
    <section class="home-cards">
    <?php    
      $allSongs = $connection->prepare("SELECT * FROM songs"); 
      $allSongs->execute();  
    ?>

      <?php foreach($allSongs as $row){ 
        //$sortingGenre = $row['sorting'];
      ?>

      <a class="icon_link" href="#">
      
        <div>
          <?= $row['songGenre_icon'] ?>
          <h3><?= $row['songGenreName'] ?></h3>
        </div>
      </a>
      <?php }?>
      <!-- <a href="#">Learn More <i class="fas fa-chevron-right"></i></a> -->
    </section>
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
