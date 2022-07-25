
<?php

include("path.php");

 include(ROOT_PATH . "/app/controllers/topics.php"); 

 $posts = array();
 $postsTitle = 'Recent Posts';


 if (isset($_GET['t_id'])) {

    $posts =  getPostsByTopicId($_GET['t_id']);
    $postsTitle ="You searched for posts under '" . $_GET['name'] . "'";
 }

 
 
else if (isset($_POST['search-term'])) {
    $postsTitle ="You searched for '" . $_POST['search-term'] . "'";
    $posts = searchPosts($_POST['search-term']);
}
else {

    $posts = getPublishedPosts();

}






//echo print_r($_SESSION);
if(isset($_SESSION['curr'])){
    $_SESSION['recent'] = time();
    // echo print_r($_SESSION);
    
if(($_SESSION['recent'] - $_SESSION['curr'] > 10)){
    session_destroy();
    header("Location:index.php");
}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
        <!-- Using awesome font-->
        <script src="https://kit.fontawesome.com/21cfdc1486.js" crossorigin="anonymous"></script>  
        <!--  Custom style-->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- google font-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Candal|Lora">
    <title>Blog</title>
</head>
<body>
    

<!--INCLUDE HEADER-->
<?php include (ROOT_PATH . "/app/includes/header.php"); ?>
<?php include (ROOT_PATH . "/app/includes/messages.php"); ?>




    <!--Page wrapper-->
  <div class ="page-wrapper">
  
    <!--Post slider-->
    <div class="post-slider">

   <h1 class="slider-title">Trending Posts</h1>
   <i class ="fas fa-chevron-left prev"></i>
   <i class ="fas fa-chevron-right next"></i>
   
   <div class="post-wrapper">

   <?php foreach ($posts as $post): ?>
    <div class="post">
      <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="slider-image">
      <div class="post-info">
         <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
         <i class="far fa-user"><p style="color:gray"><?php echo $post['username']; ?></p></i>
         &nbsp;
         <i class="far fa-calender"><p style="color:gray"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></p></i>
      </div>  
    </div>

    <?php endforeach; ?>

    
    
    
    

       </div>

    </div>
    <!--//Post slider -->
   <!--content-->
  <div class ="content clearfix">

    <!--MAIN CONTENT-->
     <div class="main-content">
        <h1 class ="recent-post-title"><?php echo $postsTitle ?></h1>


        <?php foreach ($posts as $post): ?>

            <div class ="post clearfix">
            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image">
            <div class="post-preview">
                <h2> <a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
                <i class="far fa-user"><p style="color:gray"><?php echo $post['username']; ?></p></i>
                &nbsp;
                <i class="far fa-calender"><p style="color:gray"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></p></i>
                <p class="preview-text">
                    <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
                    </p>
                <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More......</a>
           
            </div>
        </div>
            
         <?php endforeach; ?>   
        

        


        

    </div>

 <!--// MAIN CONTENT-->
    <div class ="sidebar">

   

<div class ="section search">
    <h2 class="section-title">Search</h2>
<form action="index.php" method="post">
    <input type="text" name="search-term" class="text-input" placeholder="search...">

</form>
</div>

<div class="section topics">
    <h2 class="section-title">Topics</h2>
<ul>
<?php foreach ($topics as $key => $topic): ?>
    
    <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
<?php endforeach; ?>

    


</ul>
</div>

  </div>
</div>
<!--//content-->

   </div>
   <!--//post wrapper-->



<!-- FOOTER ELEMENT-->
<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


   <!--Jquery-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   
   <!--slick Carosel-->
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
   
   <!---Custom script-->
    <script src="assets/js/scripts.js"></script>
</body>

</html>