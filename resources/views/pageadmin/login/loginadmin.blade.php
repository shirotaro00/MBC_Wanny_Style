<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/loginadmin.css')}}">
    <title>Admin|Login</title>
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="{{ route('create.log') }}" method="post">
            @csrf
			<h1>Créer compte</h1>

			<input type="text" name="nom" id="nom" placeholder="Nom" required/>
            <input type="text" name="prenom" id="prenom" placeholder="Prenom" required/>
            <input type="text" name="telephone" id="telephone" placeholder="Telephone" required />
            <input type="text" name="adresse" id="adresse" placeholder="Adresse" required />
			<input type="email" name="email" id="email" placeholder="Email" required />
			<input type="password" name="password" id="password" placeholder="Mot de passe"  required/>
			<button type="submit">Créer le compte</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Connexion</h1>

			<input type="email" name="email" id="email" placeholder="Email" />
			<input type="password" name="password" id="password" placeholder="Mot de passe" />

			<button><i class="fa-solid fa-arrow-right-to-bracket"></i>Se connecter</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bienvenue !</h1>
				<p>Pour rester connecté, veuillez vous connecter avec vos informations personnelles.</p>
				<button class="ghost" id="signIn">Se connecter</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Bonjour !</h1>
				<p>Saisissez vos informations personnelles et commencez votre aventure avec nous.</p>
				<button class="ghost" id="signUp">Créer compte</button>
			</div>
		</div>
	</div>
</div>


</body>
<script src="{{ asset('assets/js/loginadmin.js')}}"></script>
</html>
