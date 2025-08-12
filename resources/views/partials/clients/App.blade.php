<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wanny-Style</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Css Styles -->
    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{ asset('assets/css/bootstrap.min.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/css/font-awesome.min.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/css/elegant-icons.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/css/jquery-ui.min.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/css/magnific-popup.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/css/owl.carousel.min.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/css/slicknav.min.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/css/style.css') }} " type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/fonts/Fira sans.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/Lato.css') }}">
    @toastifyCss
</head>
@yield('style')

<body>
    @yield('body')


    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src=" {{ asset('assets/js/jquery-3.3.1.min.js') }} "></script>
    <script src=" {{ asset('assets/js/bootstrap.min.js') }} "></script>
    <script src=" {{ asset('assets/js/jquery.magnific-popup.min.js') }} "></script>
    <script src=" {{ asset('assets/js/jquery-ui.min.js') }} "></script>
    <script src=" {{ asset('assets/js/mixitup.min.js') }} "></script>
    <script src=" {{ asset('assets/js/jquery.countdown.min.js') }} "></script>
    <script src=" {{ asset('assets/js/jquery.slicknav.js') }} "></script>
    <script src=" {{ asset('assets/js/owl.carousel.min.js') }}  "></script>
    <script src=" {{ asset('assets/js/jquery.nicescroll.min.js') }} "></script>
    <script src=" {{ asset('assets/js/main.js') }} "></script>
    @toastifyJs
    @if (session('showLoginModal'))
        <script>
            // Si tu utilises des IDs pour tes boutons de modale :
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('sign_in')?.click();
            });
        </script>
    @endif

    @yield('script')
    <!-- Place ce script juste avant </body> -->
    @if (session('login_error') || (old('form_type') === 'login' && $errors->any()))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let modalElement = document.getElementById('formModal');
                if (modalElement) {
                    let formModal = bootstrap.Modal.getOrCreateInstance(modalElement);
                    formModal.show();
                }
            });
        </script>
    @endif

</body>

</html>
