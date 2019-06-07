<?php include("includes/db.php"); ?>
  <?php include "includes/header.php"; ?>
    <?php include "includes/topbar.php"; ?>
     <?php include "includes/sidebar.php"; ?>
     

     <section id="shadow" class="card overflow-hidden">
      <div class="card-header">
        <h3 class="card-title green">Latest Updates</h3>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
        <ul class="list-inline mb-0">
            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
            <li><a data-action="close"><i class="icon-cross2"></i></a></li>
        </ul>
    </div>
    </div>
     
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row"></div>
            <div class="content-body">
            <div class="row">
               <div class="col-md-8">

            <?php 

                if(isset($_GET['category']))
                {
                    $the_get_category_id = $_GET['category'];

                    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin')
                    {
                        $query = "SELECT * FROM posts WHERE post_category_id = $the_get_category_id";
                    }
                   else
                   {
                        $query = "SELECT * FROM posts WHERE post_category_id = $the_get_category_id AND post_status = 'published'";
                   }
                
            
                
                $result = mysqli_query($connection, $query);

                if(mysqli_num_rows($result) < 1)
                {
                    echo "<h2 class='text-center text-danger'>No posts</h2>";
                }
                else
                {

                

                while($row = mysqli_fetch_array($result))
                {
                    $post_id            = $row['post_id'];
                    $post_category_id   = $row['post_category_id'];
                    $post_title         = $row['post_title'];
                    $post_author        = $row['post_author'];
                    $post_date          = $row['post_date'];
                    $post_image         = $row['post_image'];
                    $post_content       = substr($row['post_content'], 0, 50);
                    $post_tags          = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_status        = $row['post_status'];
            ?>

                <h2>
                    <a class="green" href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    Author <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
              
                        <ul class="list-inline mb-1">
                            <li class="pr-1"><a href="#" class="text-muted"><span class="icon-ei-heart"></span> Like</a></li>
                            <li class="pr-1"><a href="#" class="text-muted"><span class="icon-chat2"></span> Comment</a></li>
                            <li><a href="#" class="text-muted"><span class="icon-share4"></span> Share</a></li>
                        </ul>
              
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php
                 } }} else
                {
                    header("Location: index.php");
                }
            ?>

        </div>
            <?php include("includes/sidebar2.php"); ?>

        </div>
      </div>
    </div>
         </div>
</section>
<?php include("includes/footer.php"); ?>