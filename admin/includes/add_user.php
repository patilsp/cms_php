<?php

    if(isset($_POST['create_user']))
    {
       $username            = mysqli_real_escape_string($connection, trim($_POST['username']));
       $password            = mysqli_real_escape_string($connection, trim($_POST['password']));
       $user_firstname      = mysqli_real_escape_string($connection, trim($_POST['user_firstname']));
       $user_lastname       = mysqli_real_escape_string($connection, trim($_POST['user_lastname']));
       $user_email          = mysqli_real_escape_string($connection, trim($_POST['user_email']));

       $user_image          = $_FILES['user_image']['name'];
       $user_image_tmp      = $_FILES['user_image']['tmp_name'];
       $user_role           = mysqli_real_escape_string($connection, trim($_POST['user_role']));

       move_uploaded_file($user_image_tmp, "../images/$user_image");

      

       $query = "INSERT INTO users(username, password, user_firstname, user_lastname, user_email, 
                    user_image, user_role) VALUES('$username', '$password', '$user_firstname', '$user_lastname', 
                    '$user_email', '$user_image', '$user_role')";

        $create_user = mysqli_query($connection, $query);

        confirmQuery($create_user);

        echo "User Added Successfuly" . " " . "<a href='users.php'>View Users</a>";

    }

?>
<div class="row">
		<div class="col-md-6 offset-md-2">
			<div class="card">
				<div class="card-header">
					<h4 class="green" id="basic-layout-card-center">Add User Here</h4>
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
        <label for="user_firstname">Firstname</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" name="user_lastname" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" class="form-control">
    </div>
       <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control">
    </div>

    <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_image">Image</label>
        <img class="img-responsive" width="200" src="../images/<?php echo $user_image; ?>" alt="">
        <input type="file" name="user_image" class="form-control">
    </div>

    <div class="form-group">
        <select name="user_role" class="form-control">
            <option value="Subscriber">Select User Role</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
        </select>

    </div>

   	<div class="form-actions center">
    <div class="form-group">
        <input type="submit" value="Add User" name="create_user" class="btn btn-primary">
    </div>
    </div>
</form>


        </div>
            </div>
        </div>
    </div>
</div>


