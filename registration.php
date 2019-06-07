<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php  include "/admin/functions.php"; ?>

    <?php include "includes/topbar.php"; ?>

       <?php include "includes/sidebar.php"; ?>


 <?php
 
 if(isset($_POST['submit']))
 {
    $username       = mysqli_real_escape_string($connection, trim($_POST['username']));
    $email          = mysqli_real_escape_string($connection, trim($_POST['email']));
    $password       = mysqli_real_escape_string($connection, trim($_POST['password']));

    if(username_exists($username))
    {
        echo "<h2 class='text-center text-danger'>User with this username already exists, try different username instead</h2>";
    }
    else
    {
        if(!empty($username) && !empty($email) && !empty($password))
        {
            
    
           $query = "SELECT randSalt FROM users";
           $select_randsalt_query = mysqli_query($connection, $query);
        
            if($select_randsalt_query){
                die ("QUERY FAILED" .  mysqli_error($connection));
                
            }
            
            $row = mysqli_fetch_array($select_randsalt_query);
            
            $salt = $row['randSalt'];
    
            
    
            $query = "INSERT INTO users (username, password, user_email, user_role) VALUES('$username', '$password', '$email', 'Subscriber')";
            $user_registration_query = mysqli_query($connection, $query);
    
            if(!$user_registration_query)
            {
                die("Query failed " . mysqli_error($connection));
            }
            else
            {
                echo "<h2 class='text-center text-success'>Your registration has been submitted</h2>";
            }
        }
        else
        {
            echo "<script>alert('Fields cannot be empty')</script>";
        }
    }
 }
 
 
 ?>

 
<div class="app-content content container-fluid">
<div class="content-wrapper">
<div class="content-header row">
</div>
<div class="content-body">
<section class="flexbox-container">
  <div class="col-md-6 offset-md-2 box-shadow-2 p-0">
		<div class="card border-grey border-lighten-3 m-0">
			<div class="card-header no-border">
      
        <div class="card-title text-xs-center">
            
            <div class="row py-1">
            <div class="text-xs-center">
                <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span class="icon-facebook3"></span></a>
                <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span class="icon-twitter3"></span></a>
                <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin"><span class="icon-linkedin3 font-medium-4"></span></a>
                <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-github"><span class="icon-github font-medium-4"></span></a>
            </div>
        </div>
              <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3"><span>Register Here</span></h6>
        </div>
       
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
                 <form role="form" class="form-horizontal form-simple" action="registration.php" method="post" id="login-form" autocomplete="off">
                        
                   <fieldset class="form-group position-relative has-icon-left mb-1">
                    <input type="text" name="username" id="username" class="form-control form-control-lg input-lg" placeholder="Your Username" required>
                    <div class="form-control-position">
                        <i class="icon-head"></i>
                    </div>
                </fieldset>
                 	<fieldset class="form-group position-relative has-icon-left mb-1">
							<input type="email" name="email" id="email" class="form-control form-control-lg input-lg" id="user-email" placeholder="Your Email Address" required>
							<div class="form-control-position">
							    <i class="icon-mail6"></i>
							</div>
						</fieldset>
                 
                  <fieldset class="form-group position-relative has-icon-left mb-1">
                    <input type="password" name="password" id="key" class="form-control form-control-lg input-lg"  placeholder="Enter Password" required>
                    <div class="form-control-position">
                        <i class="icon-key3"></i>
                    </div>
                </fieldset>


                <fieldset class="form-group row">
                    <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                        <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember">
                            <label for="remember-me"> Remember Me</label>
                        </fieldset>
                    </div>
                    <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
                </fieldset>
                <button type="submit" name="submit" id="btn-login" value="Register" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Register Here </button>
           </form>

        </div>
    </div>
    <div class="card-footer">
        <div class="">
        <p class="text-xs-center">Already have an account ? <a href="login_here.php" class="card-link">Login</a></p>
		</div>
		</div>
	</div>
    </div>
</section>

</div>
</div>
</div>
 <hr>


<?php include "includes/footer.php";?>
