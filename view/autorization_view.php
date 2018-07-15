        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">
		<br><br>
			<!-- Blog Search Well -->
            <div class="well">
                <h4>Авторизация</h4>
				<!-- /.input-group -->
                <?php if(empty($_SESSION["user_id"])) { ?>
                    <form action="" method="post" id="frmLogin">
                        <div class="error-message"><?php if(!empty($message)) { echo $message; } ?></div>
                        <div class="field-group">
                            <div><label for="login">Username</label></div>
                            <div><input name="user_name" type="text" class="form-control"></div>
                        </div>
                        <div class="field-group">
                            <div><label for="password">Password</label></div>
                            <div><input name="password" type="password" class="form-control"> </div>
                        </div>
                        <br>
                        <div class="field-group">
                            <div><input type="submit" name="login" value="Login" class="btn btn-default"></span></div>
                        </div>
                    </form>
					<br>
					<p><a href="index.php?route=registration">Регистрация</a></p>
                <?php
					} else {
				?>
						<form action="" method="post" id="frmLogout">
							<div class="member-dashboard">Welcome <?php echo ucwords(userName());?>, you have successfully logged in!<br>
								<br><input type="submit" name="logout" value="Logout" class="btn btn-default">
							</div>
						</form>
				<?php } ?>
		    </div>
        </div>
		<!-- /.row -->

