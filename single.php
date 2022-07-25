<?php include("path.php") ?>
<?php include(ROOT_PATH . '/app/controllers/posts.php'); 

if (isset($_GET['id'])) {

    $post = selectone('posts', ['id' => $_GET['id']]);
   
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);

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
    <title><?php echo $post['title']; ?> | Jashore Association of KUET</title>
</head>
<body>

    <!-- FACEBOOK PAGE CONNECTION-->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v14.0" nonce="RNF89GT6"></script>





<!--INCLUDE HEADER-->
<?php include (ROOT_PATH . "/app/includes/header.php"); ?>




    <!--Page wrapper-->
  <div class ="page-wrapper">
  
    
   <!--content-->
  <div class ="content clearfix">

    <!--MAIN CONTENT WRAPPER-->
    <div class="main-content-wrapper">
     <div class="main-content single">
   <h1 class="post-title"><?php echo $post['title']; ?></h1>

   <div class="post-content">
    <?php echo html_entity_decode($post['body']); ?>

     </div>

  </div>
</div>
 <!--// MAIN CONTENT-->
 <!--SIDEBAR-->
    <div class ="sidebar single">
     
        <!--FACEBOOK PAGE CONNECTION-->
        <div class="fb-page" data-href="https://www.facebook.com/groups/jsa.kuet" data-tabs="message" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>










         <div class="section popular">
            <h2 class="section-title">Popular</h2>

            <?php foreach ($posts as $p): ?>

                <div class="post clearfix">
                <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
                <a href="" class="title">
                <h4><?php echo $p['title'] ?></h4></a>
            </div>
               
          <?php endforeach; ?>

            


         </div>

<div class="section topics">
    <h2 class="section-title">Topics</h2>
<ul>
    <?php foreach ($topics as $topic): ?>

        <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
    <?php endforeach; ?>  
    
    
</ul>
</div>

  </div>
  <!--// SIDEBAR-->
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