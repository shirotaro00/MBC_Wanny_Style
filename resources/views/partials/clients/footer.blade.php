<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    :root {
        --main-color: #DD3F26;
        --dark-bg: #0f1d1c;
        --light-text: #f8f8f8;
        --glass-bg: rgba(255, 255, 255, 0.05);
        --glass-border: rgba(255, 255, 255, 0.15);
    }


    .footer {
        position: relative;
        background: #ddd;
        color: var(--light-text);
        padding: 60px 0 30px;
        overflow: hidden;
    }

    /* Effet dégradé lumineux en arrière-plan */
    .footer::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: var(--main-color);
        filter: blur(180px);
        opacity: 0.4;
    }

    .footer .container {
        max-width: 1100px;
        margin: auto;
        padding: 0 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
    }

    /* Section glassmorphism */
    .footer__section {
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        backdrop-filter: blur(12px);
        border-radius: 12px;
        padding: 20px;
        flex: 1 1 230px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }

    .footer__logo img {
        max-width: 140px;
        display: block;
        margin-bottom: 15px;
    }

    .footer__about p {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #002012;
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
        color: #002012;
        text-decoration: none;
        font-size: 0.95rem;
        transition: color 0.3s;
    }

    .footer__widget ul li a:hover {
        color: var(--main-color);
    }

    .footer__newslatter input {
        flex: 1;
        padding: 10px 15px;
        border: none;
        border-radius: 30px 0 0 30px;
        outline: none;
        font-size: 0.95rem;
    }

    .footer__newslatter button {
        background: var(--main-color);
        border: none;
        padding: 10px 20px;
        color: white;
        font-weight: 700;
        border-radius: 0 30px 30px 0;
        cursor: pointer;
        transition: background 0.3s;
    }

    .footer__newslatter button:hover {
        background: #b22f1c;
    }

    .footer__social {
        margin-top: 15px;
    }

    .footer__social a {
        font-size: 1.3rem;
        color: #ccc;
        margin-right: 12px;
        transition: color 0.3s, transform 0.3s;
    }

    .footer__social a:hover {
        color: var(--main-color);
        transform: translateY(-3px);
    }

    .footer-bottom {
        text-align: center;
        margin-top: 20px;
        font-size: 0.9rem;
        color: #002012;
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
            <h6>À propos de vous</h6>
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
