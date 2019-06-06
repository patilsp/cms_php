
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
                    <div class="col-lg-6">
                        <h1 class="page-header">
                            Category Page
                            
                        </h1>
                        <div class="col-xs-6">
                        
                        <?php
                            // Code to add categories
                            insertCategories()
                        ?>
                            <!-- Form for Add Categories -->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" name="cat_title" class="form-control" placeholder="Category">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                                </div>
                            </form>

                            <?php
                                // Including update_categories.php file here
                                if(isset($_GET['edit']))
                                {
                                    $cat_id = $_GET['edit'];

                                    include("includes/update_categories.php");
                                }

                            ?>

                        </div>

                       
                        <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                          <div class="table-responsive">
                    <table class="table table-inverse mb-0">
                        <thead>
                            <tr>
                               
                                  <th>ID</th>
                                <th>Category Title</th>
                            </tr>
                        </thead>
                  
                                <tbody>
                                
                                <?php
                                    // Code to display categories
                                    showAllCategories();
                                ?>

                                <?php
                                // Code to delete categories
                                deleteCategories();
                                
                                ?>

                                </tbody>
                            </table>
                        </div>
                            </div>
                        </div>
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