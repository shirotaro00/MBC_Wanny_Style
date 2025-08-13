<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>:root {
    --main-color: #DD3F26;
    --light-bg: #ffffff;
    --text-color: #333333;
    --glass-bg: rgba(255, 255, 255, 0.8);
    --glass-border: rgba(220, 220, 220, 0.6);
}
.footer {
    position: relative;
    background: var(--light-bg);
    color: var(--text-color);
    padding: 60px 0 30px;
    overflow: hidden;
}

.footer::before {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 300px;
    height: 300px;
    background: var(--main-color);
    filter: blur(200px);
    opacity: 0.1;
}

.footer .container {
    max-width: 1100px;
    margin: auto;
    padding: 0 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
}

.footer__section {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    padding: 20px;
    flex: 1 1 230px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.footer__section:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
}

.footer__logo img {
    max-width: 140px;
    display: block;
    margin-bottom: 15px;
}

.footer__about p {
    font-size: 0.95rem;
    line-height: 1.6;
    color: var(--text-color);
}

.footer__payment {
    margin-top: 15px;
    display: flex;
    gap: 10px;
}

.footer__payment img {
    width: 50px;
    height: auto;
    border-radius: 8px;
    transition: transform 0.3s;
}

.footer__payment img:hover {
    transform: scale(1.05);
}

.footer__widget h6 {
    color: var(--main-color);
    font-weight: 700;
    margin-bottom: 15px;
}

.footer__widget ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer__widget ul li {
    margin-bottom: 8px;
}

.footer__widget ul li a {
    color: var(--text-color);
    text-decoration: none;
    font-size: 0.95rem;
    transition: color 0.3s;
}

.footer__widget ul li a:hover {
    color: var(--main-color);
}

.footer-bottom {
    text-align: center;
    margin-top: 20px;
    font-size: 0.9rem;
    color: var(--text-color);
    border-top: 1px solid #eee;
    padding-top: 15px;
}

/* Responsive */
@media (max-width: 768px) {
    .footer .container {
        flex-direction: column;
    }
}
</style>
</head>
<body>

<footer class="footer">
    <div class="container">

        <!-- About -->
        <div class="footer__section">
            <div class="footer__logo">
                <img src="{{ asset('assets/img/footer.jpg') }}" alt=" Wanny Style">
            </div>
            <div class="footer__about">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
            <div class="footer__payment">
                <img src="{{ asset('assets/img/payment/MVOLA.png') }}" alt="Mvola">
                <img src="{{ asset('assets/img/payment/airtel.jpg') }}" alt="Airtel">
                <img src="{{ asset('assets/img/payment/orange-money (2).png') }}" alt="Orange Money">
            </div>
        </div>

        <!-- Liens utiles -->
        <div class="footer__section footer__widget">
            <h6>Liens utiles</h6>
            <ul>
                <li><a href="{{ route('page.accueil') }}">Accueil</a></li>
                <li><a href="{{ route('page.article') }}">Articles</a></li>
            </ul>
        </div>

        <!-- À propos -->
        <div class="footer__section footer__widget">
            <h6>À propos</h6>
            <ul>
                <li><a href="{{ route('client.panier') }}">Vos paniers</a></li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        &copy; <script>document.write(new Date().getFullYear());</script> Tous droits réservés | <strong>Wanny-Style</strong>
    </div>
</footer>

</body>
</html>
