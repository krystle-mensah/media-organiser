<?php //include "db.php"; ?>

<?php 

//check if the 'source' has been declared
if(isset($_GET['source'])){

  // if ture assign variable
  $source = $_GET['source'];

// we have to put an else because im getting an undefined variable.  
} else {

  // variable assigned to eptmy string
  $source = '';

}

// compare variable with each case.
switch($source){
  // if source is equal to add post
  //case 'add_post';

  //then display this
  //include "includes/add_post.php";

  // stop
  //break;

  // if source is equal to this page
  case 'edit_song';

  //then display this
  include "edit_song.php";

  // stop
  break;

  // if case's fail then default to this page.
  //default: 

  //include "includes/view_all_posts.php";
  
  // stop running  
  //break;

}

?>
