<?php
require_once 'includes/config.php';
$page_title = 'Accueil';
include 'includes/header.php';
?>

<!-- Hero Section avec Slider -->
<section class="hero">
    <div class="hero-slider">
        <!-- Slide 1 -->
        <div class="slider-item">
            <img src="images/Component 2.png" alt="KF Business & Informatique - Solutions IT" class="hero-image">
        </div>

        <!-- Slide 2 -->
        <div class="slider-item">
            <img src="images/Component 3.png" alt="KF Business & Informatique - Conseil Business" class="hero-image">
        </div>

        <!-- Slide 3 -->
        <div class="slider-item">
            <img src="images/Component 4.png" alt="KF Business & Informatique - Développement Web" class="hero-image">
        </div>

        <!-- Slide 4 -->
        <div class="slider-item">
            <img src="images/Component 5.png" alt="KF Business & Informatique - Infrastructure IT" class="hero-image">
        </div>

        <!-- Slide 5 -->
        <div class="slider-item">
            <img src="images/Component 6.png" alt="KF Business & Informatique - Support Technique" class="hero-image">
        </div>

        <!-- Overlay avec contenu -->
        <div class="hero-overlay">
            <div class="hero-content">
                <h1>Bienvenue chez KF BUSINESS & INFORMATIQUE</h1>
                <p>Votre partenaire de confiance en solutions business et informatiques</p>
                <a href="contact.php" class="btn-devis" style="display: inline-block; margin-top: 10px;">Demander un devis</a>
            </div>
        </div>
    </div>
</section>

<!-- Section Présentation -->
<section class="content-section">
    <div class="container">
        <h2 class="section-title">Nos Domaines d'Expertise</h2>
        <p class="section-subtitle">Des solutions complètes pour accompagner votre croissance</p>

        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <h3>Développement Web</h3>
                <p>Création de sites web et applications sur mesure pour répondre à vos besoins spécifiques.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-network-wired"></i>
                </div>
                <h3>Infrastructure IT</h3>
                <p>Installation et maintenance de votre infrastructure informatique pour une performance optimale.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Conseil Business</h3>
                <p>Accompagnement stratégique pour optimiser vos processus et accélérer votre croissance.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Sécurité Informatique</h3>
                <p>Protection de vos données et systèmes avec les meilleures pratiques de cybersécurité.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-cloud"></i>
                </div>
                <h3>Solutions Cloud</h3>
                <p>Migration et gestion de vos services dans le cloud pour plus de flexibilité.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>Support Technique</h3>
                <p>Assistance technique réactive disponible pour résoudre vos problèmes rapidement.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section Pourquoi nous choisir -->
<section class="content-section alt">
    <div class="container">
        <h2 class="section-title">Pourquoi Choisir KF Business & Informatique ?</h2>
        <div class="about-content">
            <div class="about-text">
                <h3><i class="fas fa-check-circle" style="color: #3498db;"></i> Expertise Reconnue</h3>
                <p>Notre équipe possède une expertise approfondie dans les domaines du business et de l'informatique.</p>

                <h3><i class="fas fa-check-circle" style="color: #3498db;"></i> Solutions Sur Mesure</h3>
                <p>Chaque projet est unique. Nous adaptons nos solutions à vos besoins spécifiques.</p>

                <h3><i class="fas fa-check-circle" style="color: #3498db;"></i> Support Réactif</h3>
                <p>Notre équipe est disponible pour vous accompagner à chaque étape de votre projet.</p>
            </div>
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=500&h=400&fit=crop" alt="Équipe KF">
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="content-section" style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); color: white; text-align: center;">
    <div class="container">
        <h2 style="color: white; margin-bottom: 20px;">Prêt à Démarrer Votre Projet ?</h2>
        <p style="font-size: 18px; margin-bottom: 30px;">Contactez-nous dès aujourd'hui pour discuter de vos besoins</p>
        <a href="contact.php" class="btn-submit" style="background: white; color: #3498db;">Nous Contacter</a>
    </div>
</section>

<!-- Script du Slider -->
<script src="js/slider.js"></script>

<?php include 'includes/footer.php'; ?>
