<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); 
adminOnly();

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
        <link rel="stylesheet" href="../../assets/css/style.css">

        <!--  Admin style-->
        <link rel="stylesheet" href="../../assets/css/admin.css">

        <!-- google font-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Candal|Lora">
    <title>Admin Section - Manage Posts</title>
</head>
<body>
    <!-- ADMIN HRADER HERE -->
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php");  ?>

    <!-- Admin Page wrapper-->
  <div class ="admin-wrapper">
  

    <!-- Left Sidebar-->
  
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php");  ?>

    <!-- // Left Sidebar-->
    <!-- Admin Content-->
   

    <div class="admin-content">
    <div class="button-group">
         <a href="create.php" class="btn btn-big">Add Post</a>
         <a href="index.php" class="btn btn-big">Manage Posts</a>
     </div>

     <div class="content">
        <h2 class="page-title"> Manage Posts</h2>

        <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

        <table>
            <thead>
                <th>SN</th>
                <th>Title</th>
                <th>Author</th>
                <th colspan="3">Action</th>
            </thead>

           <tbody>
            <?php foreach ($posts as $key => $post): ?>
                <tr>
                     <td><?php echo $key + 1; ?></td>
                     <td><?php echo $post['title'] ?></td>
                     <td>Kowshik</td>
                     <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
                     <td><a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">delete</a></td>

                     <?php if ($post['published']): ?>
                     <td><a href="edit.php?published=0&p_id=<?php echo $post['id'] ?>" class="unpublish">unpublish</a></td>
                     <?php else: ?>
                        <td><a href="edit.php?published=1&p_id=<?php echo $post['id'] ?>" class="publish">publish</a></td>
                    <?php endif; ?>

                
                </tr>

            <?php endforeach; ?>    





             

           

           </tbody>




        </table>
     </div>


    </div>



 <!--// Admin Content-->

</div>
<!--//  Admin post wrapper-->



<!--Jquery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!--  CKeditor-->
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

<!---Custom script-->
<script src="../../assets/js/scripts.js"></script>
</body>

</html>