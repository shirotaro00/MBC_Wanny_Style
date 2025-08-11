<!-- Footer Section Begin -->
<footer class="footer" style=" color: #ddd; padding: 60px 0 30px 0; font-family: 'Poppins', sans-serif;">
    <div class="container">
        <div class="row">

            <!-- About & Logo -->
            <div class="col-lg-4 col-md-6 col-sm-7 mb-4">
                <div class="footer__about">
                    <div class="footer__logo mb-3">
                        <a href="{{ route('page.accueil') }}">
                            <img src="{{ asset('assets/img/footer.jpg') }}" alt="Wanny Style Logo"
                                style="max-width: 140px; height: auto; display: block;">
                        </a>
                    </div>
                    <p style="color: #002012; font-size: 0.95rem; line-height: 1.6;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="footer__payment d-flex align-items-center mt-4" style="gap: 15px;">
                        <a href="#" aria-label="Mvola">
                            <img src="{{ asset('assets/img/payment/MVOLA.png') }}" alt="MVOLA"
                                style="width: 50px; height: auto; object-fit: contain;">
                        </a>
                        <a href="#" aria-label="Airtel Money">
                            <img src="{{ asset('assets/img/payment/airtel.jpg') }}" alt="Airtel Money"
                                style="width: 50px; height: auto; object-fit: contain;">
                        </a>
                        <a href="#" aria-label="Orange Money">
                            <img src="{{ asset('assets/img/payment/orange-money (2).png') }}" alt="Orange Money"
                                style="width: 50px; height: auto; object-fit: contain;">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Useful Links -->
            <div class="col-lg-2 col-md-3 col-sm-5 mb-4">
                <div class="footer__widget">
                    <h6 style="color: #DD3F26; font-weight: 700; margin-bottom: 20px;">Liens utiles</h6>
                    <ul style="list-style: none; padding: 0; margin: 0; color: #ccc; font-size: 0.95rem;">
                        <li><a href="#" style="color: #002012; text-decoration: none;">Accueil</a></li>
                        <li><a href="#" style="color: #002012; text-decoration: none;">Articles</a></li>
                        <li><a href="#" style="color: #002012; text-decoration: none;">Contact</a></li>
                    </ul>
                </div>
            </div>

            <!-- About You -->
            <div class="col-lg-2 col-md-3 col-sm-4 mb-4">
                <div class="footer__widget">
                    <h6 style="color: #DD3F26; font-weight: 700; margin-bottom: 20px;">À propos de vous</h6>
                    <ul style="list-style: none; padding: 0; margin: 0; color: #ccc; font-size: 0.95rem;">
                        <li><a href="#" style="color: #002012; text-decoration: none;">Vos paniers</a></li>
                        <li><a href="#" style="color: #002012; text-decoration: none;">Orders Tracking</a></li>
                    </ul>
                </div>
            </div>

            <!-- Newsletter & Social -->
            <div class="col-lg-4 col-md-8 col-sm-8 mb-4">
                <div class="footer__newslatter">
                    <h6 style="color: #DD3F26; font-weight: 700; margin-bottom: 20px;">NEWSLETTER</h6>
                    <form action="#" style="display: flex; max-width: 320px;">
                        <input type="email" placeholder="Votre email" required
                            style="flex-grow: 1; padding: 10px 15px; border: none; border-radius: 30px 0 0 30px; outline: none; font-size: 0.95rem;">
                        <button type="submit" class="site-btn"
                            style="background: #DD3F26; border: none; padding: 10px 25px; color: white; font-weight: 700; border-radius: 0 30px 30px 0; cursor: pointer; transition: background 0.3s;">
                            S'abonner
                        </button>
                    </form>
                    <div class="footer__social mt-4" style="font-size: 1.4rem;">
                        <a href="#" style="margin-right: 15px"><i class="fa fa-facebook"></i></a>
                        <a href="#" style="margin-right: 15px;"><i class="fa fa-twitter"></i></a>
                        <a href="#" style="margin-right: 15px; color"><i class="fa fa-youtube-play"></i></a>
                        <a href="#" style="margin-right: 15px; color:"><i class="fa fa-instagram"></i></a>
                        <a href="#" style=""><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 text-center pt-3">
                <p style="color: #002012; font-size: 0.9rem; margin-bottom: 0;">
                    &copy; <script>document.write(new Date().getFullYear());</script> Tous droits réservés | <strong>Wanny-Style</strong>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
