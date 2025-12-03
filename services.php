<?php
require_once 'includes/config.php';
$page_title = 'Services';
include 'includes/header.php';
?>

<!-- Page Header -->
<section class="hero" style="height: 300px; background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);">
    <div class="hero-overlay" style="background: rgba(0,0,0,0.3);">
        <div class="hero-content">
            <h1>Nos Services</h1>
            <p>Des solutions complètes pour tous vos besoins business et informatiques</p>
        </div>
    </div>
</section>

<!-- Services détaillés -->
<section class="content-section">
    <div class="container">
        <h2 class="section-title">Nos Expertises</h2>
        <p class="section-subtitle">Des services sur mesure pour accompagner votre croissance</p>

        <!-- Développement Web -->
        <div class="about-content" style="margin-bottom: 60px;">
            <div class="about-text">
                <h2><i class="fas fa-laptop-code" style="color: #3498db;"></i> Développement Web</h2>
                <p>Nous concevons et développons des sites web et applications web modernes, performants et adaptés à vos besoins spécifiques.</p>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Sites vitrine et corporate</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Applications web sur mesure</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Sites e-commerce</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Systèmes de gestion (CRM, ERP)</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Responsive design</li>
                </ul>
            </div>
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=500&h=400&fit=crop" alt="Développement Web">
            </div>
        </div>

        <!-- Infrastructure IT -->
        <div class="about-content" style="margin-bottom: 60px; grid-template-columns: 1fr 1fr;">
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=500&h=400&fit=crop" alt="Infrastructure IT">
            </div>
            <div class="about-text">
                <h2><i class="fas fa-network-wired" style="color: #3498db;"></i> Infrastructure IT</h2>
                <p>Nous mettons en place et maintenons votre infrastructure informatique pour garantir performance et fiabilité.</p>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Installation et configuration de serveurs</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Configuration de réseaux</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Virtualisation</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Maintenance préventive et corrective</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Monitoring et supervision</li>
                </ul>
            </div>
        </div>

        <!-- Conseil Business -->
        <div class="about-content" style="margin-bottom: 60px;">
            <div class="about-text">
                <h2><i class="fas fa-chart-line" style="color: #3498db;"></i> Conseil Business</h2>
                <p>Nous vous accompagnons dans l'optimisation de vos processus et la définition de votre stratégie digitale.</p>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Audit et diagnostic IT</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Stratégie de transformation digitale</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Optimisation des processus</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Gestion de projet</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Formation et accompagnement</li>
                </ul>
            </div>
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=500&h=400&fit=crop" alt="Conseil Business">
            </div>
        </div>
    </div>
</section>

<!-- Autres Services -->
<section class="content-section alt">
    <div class="container">
        <h2 class="section-title">Services Complémentaires</h2>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Sécurité Informatique</h3>
                <p>Audit de sécurité, mise en place de pare-feu, protection contre les cyberattaques, formation à la cybersécurité.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-cloud"></i>
                </div>
                <h3>Solutions Cloud</h3>
                <p>Migration vers le cloud, hébergement cloud, sauvegarde et récupération de données, solutions SaaS.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Applications Mobiles</h3>
                <p>Développement d'applications iOS et Android natives ou cross-platform pour votre business.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-database"></i>
                </div>
                <h3>Gestion de Données</h3>
                <p>Conception de bases de données, optimisation, migration de données, business intelligence.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>SEO & Marketing Digital</h3>
                <p>Optimisation pour les moteurs de recherche, stratégie de contenu, campagnes publicitaires en ligne.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>Support & Maintenance</h3>
                <p>Support technique réactif, maintenance préventive, mises à jour régulières, assistance 24/7.</p>
            </div>
        </div>
    </div>
</section>

<!-- Processus -->
<section class="content-section">
    <div class="container">
        <h2 class="section-title">Notre Processus</h2>
        <p class="section-subtitle">Une méthodologie éprouvée pour garantir le succès de vos projets</p>
        <div class="services-grid" style="grid-template-columns: repeat(4, 1fr);">
            <div class="service-card">
                <div style="font-size: 48px; color: #3498db; font-weight: bold; margin-bottom: 15px;">1</div>
                <h3>Analyse</h3>
                <p>Étude approfondie de vos besoins et de vos objectifs.</p>
            </div>

            <div class="service-card">
                <div style="font-size: 48px; color: #3498db; font-weight: bold; margin-bottom: 15px;">2</div>
                <h3>Conception</h3>
                <p>Élaboration de solutions adaptées à votre contexte.</p>
            </div>

            <div class="service-card">
                <div style="font-size: 48px; color: #3498db; font-weight: bold; margin-bottom: 15px;">3</div>
                <h3>Développement</h3>
                <p>Mise en œuvre de la solution avec suivi régulier.</p>
            </div>

            <div class="service-card">
                <div style="font-size: 48px; color: #3498db; font-weight: bold; margin-bottom: 15px;">4</div>
                <h3>Support</h3>
                <p>Accompagnement continu et maintenance.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="content-section" style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); color: white; text-align: center;">
    <div class="container">
        <h2 style="color: white; margin-bottom: 20px;">Besoin d'un Service Spécifique ?</h2>
        <p style="font-size: 18px; margin-bottom: 30px;">Contactez-nous pour discuter de votre projet</p>
        <a href="contact.php" class="btn-submit" style="background: white; color: #3498db;">Demander un Devis</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
