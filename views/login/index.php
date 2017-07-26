<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in to continue to London Projects</h1>
           
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                    
                <form class="form-signin" method="POST" action="<?php echo current_url(); ?>">
                 <?php echo (isset($message) ? '<span><i class="fa fa-warning"></i> '.$message.'</span>' : ''); ?>
	                <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
	                <input type="password" name="password" class="form-control" placeholder="Password" required>
	                <input type="submit" value="Sign in" class="btn btn-lg btn-primary btn-block"/>
	                <label class="checkbox pull-left">
	                    <input type="checkbox" value="remember-me">
	                    Remember me
	                </label>
	                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="<?php echo base_url('register'); ?>" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>
-=