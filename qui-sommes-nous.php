<?php
require_once 'includes/config.php';
$page_title = 'Qui sommes nous';
include 'includes/header.php';
?>

<!-- Page Header -->
<section class="hero" style="height: 300px; background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);">
    <div class="hero-overlay" style="background: rgba(0,0,0,0.3);">
        <div class="hero-content">
            <h1>Qui Sommes Nous ?</h1>
            <p>Découvrez l'histoire et les valeurs de KF Business & Informatique</p>
        </div>
    </div>
</section>

<!-- Notre Histoire -->
<section class="content-section">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>Notre Histoire</h2>
                <p>Fondée avec la vision de révolutionner le secteur du business et de l'informatique, KF BUSINESS & INFORMATIQUE s'est rapidement imposée comme un acteur incontournable dans son domaine.</p>
                <p>Depuis nos débuts, nous nous sommes engagés à fournir des solutions innovantes et sur mesure qui répondent aux défis uniques de chaque client. Notre approche centrée sur le client et notre expertise technique nous permettent de transformer vos idées en réalité.</p>
                <p>Aujourd'hui, nous sommes fiers de compter parmi nos clients des entreprises de toutes tailles, des startups aux grandes organisations, toutes faisant confiance à notre expertise pour leurs projets les plus critiques.</p>
            </div>
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=500&h=400&fit=crop" alt="Notre Histoire">
            </div>
        </div>
    </div>
</section>

<!-- Nos Valeurs -->
<section class="content-section alt">
    <div class="container">
        <h2 class="section-title">Nos Valeurs</h2>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Confiance</h3>
                <p>Nous bâtissons des relations durables basées sur la transparence et l'intégrité.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Innovation</h3>
                <p>Nous restons à la pointe de la technologie pour offrir les meilleures solutions.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3>Excellence</h3>
                <p>Nous visons l'excellence dans chaque projet que nous entreprenons.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Collaboration</h3>
                <p>Nous travaillons en étroite collaboration avec nos clients pour atteindre leurs objectifs.</p>
            </div>
        </div>
    </div>
</section>

<!-- Notre Mission -->
<section class="content-section">
    <div class="container">
        <div class="about-content" style="grid-template-columns: 1fr 1fr;">
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=500&h=400&fit=crop" alt="Notre Mission">
            </div>
            <div class="about-text">
                <h2>Notre Mission</h2>
                <p>Notre mission est simple mais ambitieuse : <strong>accompagner les entreprises dans leur transformation digitale</strong> en leur fournissant des solutions technologiques innovantes et adaptées à leurs besoins spécifiques.</p>
                <p>Nous croyons fermement que la technologie, lorsqu'elle est bien utilisée, peut transformer radicalement la façon dont les entreprises opèrent et créent de la valeur pour leurs clients.</p>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Solutions personnalisées</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Accompagnement complet</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Support technique 24/7</li>
                    <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #27ae60; margin-right: 10px;"></i>Formation continue</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Notre Équipe -->
<section class="content-section alt">
    <div class="container">
        <h2 class="section-title">Notre Équipe</h2>
        <p class="section-subtitle">Des professionnels passionnés et expérimentés à votre service</p>
        <div style="text-align: center; max-width: 800px; margin: 0 auto;">
            <p>Notre équipe est composée d'experts en développement web, en infrastructure IT, en conseil business et en cybersécurité. Chacun apporte son expertise unique pour garantir le succès de vos projets.</p>
            <p>Nous sommes animés par la passion de la technologie et le désir d'aider nos clients à atteindre leurs objectifs. Notre approche collaborative nous permet de créer des solutions qui dépassent les attentes.</p>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="content-section" style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); color: white; text-align: center;">
    <div class="container">
        <h2 style="color: white; margin-bottom: 20px;">Travaillons Ensemble</h2>
        <p style="font-size: 18px; margin-bottom: 30px;">Rejoignez les nombreuses entreprises qui nous font confiance</p>
        <a href="contact.php" class="btn-submit" style="background: white; color: #3498db;">Contactez-nous</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
