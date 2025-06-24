<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wanny-Style</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href=" {{asset('assets/css/bootstrap.min.css')}} " type="text/css">
    <link rel="stylesheet" href=" {{asset('assets/css/font-awesome.min.css')}} " type="text/css">
    <link rel="stylesheet" href=" {{asset('assets/css/elegant-icons.css')}} " type="text/css">
    <link rel="stylesheet" href=" {{asset('assets/css/jquery-ui.min.css')}} " type="text/css">
    <link rel="stylesheet" href=" {{asset('assets/css/magnific-popup.css')}} " type="text/css">
    <link rel="stylesheet" href=" {{asset('assets/css/owl.carousel.min.css')}} " type="text/css">
    <link rel="stylesheet" href=" {{asset('assets/css/slicknav.min.css')}} " type="text/css">
    <link rel="stylesheet" href=" {{asset('assets/css/style.css')}} " type="text/css">
</head>
@yield("style")
<body>
@yield("body")
 <!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    cilisis.</p>
                    <div class="footer__payment">
                        <a href="#"><img src="img/payment/payment-1.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-2.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-3.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-4.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-5.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h6>Liens utiles</h6>
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h6>Account</h6>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Orders Tracking</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Wishlist</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8">
                <div class="footer__newslatter">
                    <h6>NEWSLETTER</h6>
                    <form action="#">
                        <input type="text" placeholder="Email">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <div class="footer__copyright__text">
                    <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> Tous droits réserves | Wanny-Style </p>
                </div>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

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
<script src=" {{asset('assets/js/jquery-3.3.1.min.js')}} "></script>
<script src=" {{asset('assets/js/bootstrap.min.js')}} "></script>
<script src=" {{asset('assets/js/jquery.magnific-popup.min.js')}} "></script>
<script src=" {{asset('assets/js/jquery-ui.min.js')}} "></script>
<script src=" {{asset('assets/js/mixitup.min.js')}} "></script>
<script src=" {{asset('assets/js/jquery.countdown.min.js')}} "></script>
<script src=" {{asset('assets/js/jquery.slicknav.js')}} "></script>
<script src=" {{asset('assets/js/owl.carousel.min.js')}}  "></script>
<script src=" {{asset('assets/js/jquery.nicescroll.min.js')}} "></script>
<script src=" {{asset('assets/js/main.js')}} "></script>
@if(session('showLoginModal'))
    <script>
        // Si tu utilises des IDs pour tes boutons de modale :
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('sign_in')?.click();
        });
    </script>
@endif

@yield("script")
</body>

</html>
