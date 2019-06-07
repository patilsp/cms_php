<?php include("includes/header.php"); ?>

<?php

if(isset($_SESSION['username']))
{
    $session_username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '$session_username'";
    $edit_user_profile = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($edit_user_profile))
    {
        $user_id            = $row['user_id'];
        $username           = $row['username'];
        $password           = $row['password'];
        $user_firstname     = $row['user_firstname'];
        $user_lastname      = $row['user_lastname'];
        $user_email         = $row['user_email'];
        $user_image         = $row['user_image'];
        $user_role          = $row['user_role'];
    }
}

?>

<?php

if(isset($_POST['update_user']))
{
   $username        = mysqli_real_escape_string($connection, trim($_POST['username']));
   $password        = mysqli_real_escape_string($connection, trim($_POST['password']));
   $user_firstname  = mysqli_real_escape_string($connection, trim($_POST['user_firstname']));
   $user_lastname   = mysqli_real_escape_string($connection, trim($_POST['user_lastname']));
   $user_email      = mysqli_real_escape_string($connection, trim($_POST['user_email']));
   $user_role       = mysqli_real_escape_string($connection, trim($_POST['user_role']));

   $user_image      = $_FILES['user_image']['name'];
   $user_image_tmp  = $_FILES['user_image']['tmp_name'];

   move_uploaded_file($user_image_tmp, "../images/$user_image");

   if(empty($user_image))
   {
        $query = "SELECT * FROM users WHERE username = $session_username";
        $select_image = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_image))
        {
            $user_image = $row['user_image'];
        }
   }

   $update_user_profile_query = "UPDATE users SET password = '$password', user_firstname = '$user_firstname', 
                                user_lastname = '$user_lastname', user_email = '$user_email', user_role = '$user_role', 
                                username = '$username', user_image = '$user_image' WHERE username = '$session_username'";

    $result = mysqli_query($connection, $update_user_profile_query);

    confirmQuery($result);
   
}

?>

    <?php include "includes/topbar.php"; ?>

       <?php include "includes/sidebar.php"; ?>

   <div class="app-content content container-fluid">
      <div class="content-wrapper">
      <div class="form-actions center">
      	       <h1 class="green">
                            Welcome To Admin
                            <small class="pink"><?php echo $_SESSION['username']; ?></small>
                        </h1>
          </div>
      <div class="row">
		<div class="col-md-6 offset-md-2">
			<div class="card">
				<div class="card-header">
					<h4 class="green" id="basic-layout-card-center">Add User</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
							<li><a data-action="reload"><i class="icon-reload"></i></a></li>
							<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							<li><a data-action="close"><i class="icon-cross2"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">
				

                        <form action="" method="post" enctype="multipart/form-data">
    
                            <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value="<?php echo $password; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_firstname">Firstname</label>
                                <input type="text" name="user_firstname" value="<?php echo $user_firstname; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_lastname">Lastname</label>
                                <input type="text" name="user_lastname" value="<?php echo $user_lastname; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_email">Email</label>
                                <input type="email" name="user_email" value="<?php echo $user_email; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_image">Image</label>
                                <img class="img-responsive" width="200" src="../images/<?php echo $user_image; ?>" alt="">
                                <input type="file" name="user_image" class="form-control">
                            </div>


                            <div class="form-group">
                                <select name="user_role" class="form-control">
                                    <option value="Subscriber"><?php echo $user_role?></option>
                                
                                <?php
                                
                                    if($user_role == "Admin")    
                                    {
                                        echo "<option value='Subscriber'>Subscriber</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='Admin'>Admin</option>";
                                    }
                                
                                ?>
                                    
                                    
                                    
                                </select>

                            </div>
                              <div class="form-actions center">
                                <div class="form-group">
                                <input type="submit" value="Update Profile" name="update_user" class="btn btn-primary">
                            </div>
                            </div>
                        </form>

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
