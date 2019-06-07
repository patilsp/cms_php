<?php include "includes/header.php"; ?>
  <?php include "includes/topbar.php"; ?>
    <?php include "includes/sidebar.php"; ?>
     <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
         <div class="content-body">
            <div class="row">
                    <div class="col-lg-12">
                  
                        <?php
              
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
            </div>
        </div>
    </div>
<?php include("includes/footer.php"); ?>
