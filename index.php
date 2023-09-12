<!DOCTYPE HTML>
<html>
<script>
        function redirigir() {
            window.location.href = 'loguear.php';
        }
    </script>
	<head>
		<title>SSPC Login in</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<h1>Policia Cibernética Municipal SSPC</h1>
				<p>Para tener acceso, se necesita usar el usuario brindado.<br />
				No olvide la clave solicitada para el acceso.</p>
			</header>

		<!-- Signup Form -->
		<form action="loguear.php" method="post" id="login-form">
			<div class="form-group">
				<input type="text" name="user" id="user" placeholder="Usuario" />
			</div>
			<div class="form-group">
				<input type="password" name="password" id="password" placeholder="Contraseña" />
			</div>
			<div class="form-group">
				<submit-button text="Iniciar sesión"></submit-button>
			</div>
		</form>

		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; UPSLP</li>
				</ul>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/main.js"></script>
			<script src="components/submit-button.js"></script>

	</body>
</html>