<?php include("includes/db.php"); ?>
 <?php include("includes/header.php"); ?>
  <?php include "includes/topbar.php"; ?>
   <?php include "includes/sidebar.php"; ?>

     <section id="shadow" class="card overflow-hidden">
      <div class="card-header">
        <h3 class="pink text-xs-center">Latest Updates</h3>
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

                    $per_page = 5;

                if(isset($_GET['page']))
                {
                   $page = $_GET['page'];
                }
                else
                {
                    $page = "";
                }

                if($page == "" || $page == 1)
                {
                    $page_1 = 0;
                }
                else
                {
                    $page_1 = ($page * $per_page) - $per_page;
                }

                if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin')
                {
                    $post_query_count = "SELECT * FROM posts";
                }
                else
                {
                    $post_query_count = "SELECT * FROM posts WHERE post_status = 'published'";
                }
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);

                if($count < 1)
                {
                    echo "<h2 class='text-center text-warning'>No Posts</h2>";
                }
                else
                {

                $count = ceil($count / $per_page);
            
                $query = "SELECT * FROM posts LIMIT $page_1, $per_page";
                $result = mysqli_query($connection, $query);

                while($row = mysqli_fetch_array($result))
                {
                    $post_id            = $row['post_id'];
                    $post_category_id   = $row['post_category_id'];
                    $post_title         = $row['post_title'];
                    $post_user        = $row['post_user'];
                    $post_date          = $row['post_date'];
                    $post_image         = $row['post_image'];
                    $post_content       = substr($row['post_content'], 0, 50);
                    $post_tags          = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_status        = $row['post_status'];
                ?>
      
                <h2>
                    <a class="green" href="post.php?p_id=<?php echo $post_id;?>"><?php echo  $post_title; ?></a>
                </h2>
                <p class="black">
                   Author <a href="author_posts.php?author=<?php echo $post_user; ?>&p_id=<?php echo $post_id;?>"><?php echo $post_user; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                    <img class="img-thumbnail img-fluid" src="images/<?php echo $post_image; ?>" alt="">
                </a>
                 <hr>  
                                                   
                <ul class="list-inline mb-1">
                    <li class="pr-1"><a href="#" class="text-muted"><span class="icon-ei-heart"></span> Like</a></li>
                    <li class="pr-1"><a href="#" class="text-muted"><span class="icon-chat2"></span> Comment</a></li>
                    
                    <li><a href="#" class="text-muted"><span class="icon-share4"></span> Share</a></li>
                </ul>
          
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
            <?php
                }}
            ?>
            

            </div>

            <?php include("includes/sidebar2.php"); ?>

        </div>

    <div class="col-xl-12">
              
                <div class="text-xs-center mb-3">
                    <nav aria-label="Page navigation">
						
                 <ul class="pagination ">
                         <?php
                            echo "<li class='page-item'><a class='page-link' href='index.php'>Previous</a></li>";
                            for ($i = 1; $i <= $count; $i++) 
                            { 
                                if($i == $page)
                                {
                                    echo "<li class='page-item'><a class='active_link' href='index.php?page=$i'> $i </a></li>";
                                }
                                else
                                {
                                    echo "<li class='page-item'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
                                }

                            }
                            echo "<li class='page-item'><a class='page-link' href='index.php?page=$page'>Next</a></li>";
                        ?>

                     </ul>
         		
                </nav>
            </div>
        </div>
        </div>
      </div>
    </div>
 </section>
<?php include "includes/footer.php"; ?>
