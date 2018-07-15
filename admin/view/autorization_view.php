	<h1>Авторизация</h1>
	<form action="" method="post">
		<div><?php if(isset($message)) { echo $message; } ?></div>
		<div>
			<div><label for="login">Username</label></div>
			<div><input name="user_name" type="text"></div>
		</div>
		<div>
			<div><label for="password">Password</label></div>
			<div><input name="password" type="password"> </div>
		</div>
		<br>
		<div>
			<div><input type="submit" name="login" value="Login"></span></div>
		</div>
	</form>
