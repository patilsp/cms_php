<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php  include "/admin/functions.php"; ?>

    <?php include "includes/topbar.php"; ?>

       <?php include "includes/sidebar.php"; ?>


 
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
            <div class="p-1"><img src="images/avatar.png" alt="branding logo"></div>
        </div>
        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login Here</span></h6>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <?php if(isset($_SESSION['user_role'])): ?>

                <h4>Logged in as <?php echo $_SESSION['username']; ?></h4>
                <a href="includes/logout.php" class='btn btn-warning'>Logout</a>

            <?php else: ?>

                <form class="form-horizontal form-simple" action="includes/login.php" method="post">
                      <fieldset class="form-group position-relative has-icon-left mb-1">
                    <input type="text" class="form-control form-control-lg input-lg" name="username" placeholder="Your Username" required>
                    <div class="form-control-position">
                        <i class="icon-head"></i>
                    </div>
                </fieldset>
                  <fieldset class="form-group position-relative has-icon-left mb-1">
                    <input type="password" class="form-control form-control-lg input-lg" name="password" placeholder="Enter Password" required>
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
                <button type="submit" name="login" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Login</button>


                </form>

            <?php endif; ?>

        </div>
    </div>
    <div class="card-footer">
        <div class="">
            <p class="float-sm-left text-xs-center m-0"><a href="recover-password.html" class="card-link">Recover password</a></p>
            <p class="float-sm-right text-xs-center m-0">New to Robust? <a href="registration.php" class="card-link">Sign Up</a></p>
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