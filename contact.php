<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
 <?php include "includes/topbar.php"; ?>
 <?php include "includes/sidebar.php"; ?>
 <?php
 
 if(isset($_POST['submit']))
 {
    $to      = "santoshpatil9696@yahoo.com";
    $header  = mysqli_real_escape_string($connection, trim($_POST['email']));
    $subject = mysqli_real_escape_string($connection, trim(wordwrap($_POST['subject'], 70)));
    $body    = mysqli_real_escape_string($connection, trim($_POST['body']));

    mail($to, $subject, $body, "From: " . $header);

    echo "Your email has been sent. :)";
   
 }
 
 
 ?>
 <div class="app-content content container-fluid">
<div class="content-wrapper">
        <div class="row ">
		<div class="col-md-6 offset-md-2">
			<div class="card">
				<div class="card-header">
					<h4 class="green" id="basic-layout-card-center">Contact US</h4>
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
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="I want to...">
                        </div>
                         <div class="form-group">
                            <label for="body" class="sr-only">Body</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Your message here..."></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Send Email">
                    </form>
				</div>
				</div>
			</div>
		</div>
	</div>
   </div>
</div>

<?php include "includes/footer.php";?>
