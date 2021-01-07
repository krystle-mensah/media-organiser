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

  <?php
  
//FIRST INCLUDE DATABASE
include "db.php";

// then we need to check for a submit

if(isset($_POST['create_song'])){
  //now we can test the button
  //echo $_POST['song_name'];

//   assign all values from form to variables
//   $post_title        = escape($_POST['title']);
//   $post_author       = escape($_POST['author']);
//   $post_category_id  = escape($_POST['post_category_id']);
//   $post_status       = escape($_POST['post_status']);

//   $post_image        = escape($_FILES['image']['name']);
//             $post_image_temp   = escape($_FILES['image']['tmp_name']);


//             $post_tags         = escape($_POST['post_tags']);
//             $post_content      = escape($_POST['post_content']);
//             $post_date         = escape(date('d-m-y'));
//   // here when we create a post we are hard coding the value
//   $post_comment_count = 4;

//   // function to move files to new place. temp place the images folder 
//   move_uploaded_file($post_image_temp, "../images/$post_image" );

//   // query to insert to database
//   $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags, post_comment_count, post_status) ";

//   // values we are inserting from the from. we are not getting the hard code from the $post_comment_count = 4; here any more
//   $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}') "; 
  
//   // then we send the query in
//   $create_post_query = mysqli_query($connection, $query); 

//   // function to confirm result
//   confirmQuery($create_post_query);
  
//   // Test function
//   // confirmQuery($Hello);

//   $the_post_id = mysqli_insert_id($connection);

//   // let them no it was created
  
//   echo "<p class='success-button'>Post Created. <a href='posts.php'>Edit More Posts</a> or <a href='../post.php?p_id={$the_post_id}'>View Post</a>"; 

}

?>

  <div id="main">
    <h1 class="title">upload song</h1>
    <!-- SONG UPLOAD form -->
    <form action="add_song.php" method="post" enctype="multipart/form-data"> 

    <div class="form-group">
      <label for="title">Song Title</label>
      <input type="text" name="song_name" id="song_name"  placeholder="Enter song name"> 
    </div>

    <div class="form-group">
      <label for="title">Artist Name</label>
      <input type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
      <label for="song_mp3">Song mp3</label>
      <input type="file" accept=".mp3" name="song_mp3" id="song_mp3"> 
    </div>

    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="create_song" value="Publish Song">
    </div>

    </form>

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
