<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/fonts/Fira sans.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/Lato.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/loginadmin.css') }}">
    <title>Admin|Login</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('create.log') }}" method="post">
                @csrf
                <div class="password-wrapper">
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"
                        id="nom" placeholder="@error('nom'){{ $message }}@else Nom @enderror" required />
                    <i class="fa fa-user toggle-user"></i>
                </div>

                <div class="password-wrapper">
                    <input type="text" class="form-control  @error('prenom') is-invalid @enderror" name="prenom"
                        id="prenom" placeholder="@error('prenom'){{ $message }}@else Prenom @enderror"
                        required />
                    <i class="fa fa-user  toggle-user"></i>
                </div>

                <div class="password-wrapper">
                    <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                        placeholder="@error('telephone'){{ $message }}@else Telephone @enderror" id="telephone"
                        required />
                    <i class="fa fa-phone toggle-phone"></i>
                </div>

                <div class="password-wrapper">
                    <input type="text" class="form-control @error('adresse') is-invalid @enderror " name="adresse"
                        id="adresse" placeholder="@error('adresse'){{ $message }}@else Adresse @enderror"
                        required />
                    <i class="fa fa-address-book toggle-address"></i>
                </div>

                <div class="password-wrapper">
                    <input type="email"class="form-control @error('email') is-invalid @enderror "name="email" id="email" placeholder="@error('email'){{ $message }}@else Email @enderror"
                        required />
                    <i class="fa fa-envelope toggle-envelope"></i>
                </div>

                <div class="password-wrapper">
                    <input type="password" class="form-control @error('password') is-invalid @enderror "
                        placeholder="@error('password'){{ $message }}@else Mot de passe @enderror" name="password"
                        id="password"   required />

                    <i class="fas fa-lock  toggle-lock"></i>

                    <i class="fas fa-eye toggle-password" data-target="password" aria-hidden="true"></i>
                </div>

                <div class="password-wrapper1">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="@error('password'){{ $message }}@else Confirme le mot de passe @enderror"
                        name="password_confirmation" id="password_confirmation" required />
                    <i class="fa fa-check toggle-check"></i>
                    <i class="fas fa-eye toggle-password_confirmation" data-target="password_confirmation"
                        aria-hidden="true"></i>
                </div>


                <button type="submit" style="margin-top:20px">Créer le compte</button>
            </form>
        </div>

        <div class="form-container sign-in-container">

            <form action="{{ route('admin.auth') }}" method="POST">
                @csrf
<div class="logo">
    <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo" >
</div>
                <h1 style="margin-bottom:20px;color:#002012"  >Connexion</h1>

                <div class="password-wrapper2">
                    <input type="email" class="form-control"  style="width: 100%;"   name="email" id="email" placeholder="Email"
                        required />
                    <i class="fas fa-envelope toggle-envelope"></i>
                </div>

                <div class="password-wrapper2">
                    <input type="password" class="form-control" name="password" id="passwords"
                        placeholder="Mot de passe" required />
                    <i class="fas fa-lock  toggle-lock2"></i>
                    <i class="fas fa-eye toggle-passwords" data-target="passwords" aria-hidden="true"></i>
                </div>
                 @if (session('error'))
                    <div class="alert alert-danger w-50" style="color: red">
                        {{ session('error') }}
                    </div>
                    @endif
                    <button type="submit" style="margin-top:20px" class="connexion"> <i class="fa-solid fa-right-to-bracket" style="font-size:15px"></i> Se connecter</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Creer un compte</h1>
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
<script src="{{ asset('assets/js/loginadmin.js') }}"></script>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        @if ($errors->any() || old('nom'))
            document.getElementById('container').classList.add('right-panel-active');
        @endif
    });
</script>

</html>
