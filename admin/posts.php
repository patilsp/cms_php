
<?php include "includes/header.php"; ?>

    <!-- navbar-fixed-top-->
    <?php include "includes/topbar.php"; ?>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
       <?php include "includes/sidebar.php"; ?>
    <!-- / main menu-->

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View All Posts
                        </h1>
                        <?php
                            // Displaying pages based on condition
                            if (isset($_GET['source'])) 
                            {
                                $source = $_GET['source'];
                            }
                            else
                            {
                                $source = "";
                            }

                            switch ($source) {
                                case 'add_post':
                                    include("includes/add_post.php");
                                    break;
                                
                                case 'edit_post':
                                    include("includes/edit_post.php");
                                    break;
                                
                                default:
                                    include("includes/view_all_posts.php");
                                    break;
                            }

                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("includes/footer.php"); ?>
