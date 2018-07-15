<br>

<!-- Blog Sidebar Widgets Column -->
    <div class="col-md-6">
	<h3>Регистрация</h3>
        <!-- Blog Search Well -->
        <div class="well">
			<?php if(!empty($success_message)) { ?>	
			<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
			<?php }else { ?>		
				<form name="frmRegistration" method="post" action="">					
						<?php if(!empty($error_message)) { ?>	
						<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
						<?php } ?>
						<div class="field-group">
							<div><label>User Name</label></div>
							<div><input type="text" name="userName" class="form-control" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"></div>
						</div>
						<div class="field-group">
							<div><label>First Name</label></div>
							<div><input type="text" name="firstName" class="form-control" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></div>
						</div>
						<div class="field-group">
							<div><label>Last Name</label></div>
							<div><input type="text" name="lastName" class="form-control" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></div>
						</div>
						<div class="field-group">
							<div><label>Password</label></div>
							<div><input type="password" name="password" class="form-control" value=""></div>
						</div>
						<div class="field-group">
							<div><label>Confirm Password</div></label>
							<div><input type="password" name="confirm_password" class="form-control" value=""></div>
						</div>
						<div class="field-group">
							<div><label>Email</div></label>
							<div><input type="text" name="userEmail" class="form-control" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"></div>
						</div>
						<br>
						<div class="field-group">
							<div><input type="submit" name="register_user" value="Register" class="btn btn-default"></div>
						</div>
				</form>
			<?php } ?>
		</div>
    </div>
<!-- /.row -->
