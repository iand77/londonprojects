<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
			<div class="row main">
				
	               		<h1 class="title">Create an account</h1>
	               		<hr />
	               		
	               		
	            <?php echo (isset($message) ? '<div class="alert alert-danger">'.$message.'</div>' : ''); ?>   		
				<div class="main-login main-center">
					<form class="" method="post" action="<?php echo current_url(); ?>">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<?php echo form_error('name'); ?>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name'); ?>"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<?php echo form_error('email'); ?>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>
						<?php /*
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<?php echo form_error('username'); ?>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>" placeholder="Enter your Username"/>
								</div>
							</div>
						</div>
						*/ ?>
						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<?php echo form_error('password'); ?>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<?php echo form_error('confirm'); ?>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm" <?php echo set_value('confirm'); ?>  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>
						
						<div class="form-group ">
							<input type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block login-button" value="Register Today!"/>
						</div>
						<div class="login-register">
				            <a href="<?php  echo base_url('login'); ?>">Login</a>
				         </div>
					</form>
				</div>
			</div>
		</div>
