<html>
	<title>Авторизация</title>
</html>
<body>

	<center>
		<?php
			if (isset($_GET['fail'])) {
				echo "Неверный логин или пароль";
			}
		?>
		<form action="/index.php?_url=/login" method="POST">
			<input type="text" placeholder="Login" name="login" id="login">
			<input type="password" placeholder="Password" name="password" id="password">
			<input type="submit">
		</form>
	</center>
</body>
</html>