
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

    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View All Users
                           
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
                                case 'add_user':
                                    include("includes/add_user.php");
                                    break;
                                
                                case 'edit_user':
                                    include("includes/edit_user.php");
                                    break;
                                
                                default:
                                    include("includes/view_all_users.php");
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
