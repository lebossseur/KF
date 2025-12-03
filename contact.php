<?php
require_once 'includes/config.php';
$page_title = 'Contact';

$success_message = '';
$error_message = '';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $telephone = htmlspecialchars(trim($_POST['telephone'] ?? ''));
    $sujet = htmlspecialchars(trim($_POST['sujet'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    // Validation
    if (empty($nom) || empty($email) || empty($sujet) || empty($message)) {
        $error_message = 'Veuillez remplir tous les champs obligatoires.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Veuillez entrer une adresse email valide.';
    } else {
        try {
            // Insertion dans la base de données
            $stmt = $conn->prepare("INSERT INTO contacts (nom, email, telephone, sujet, message, date_envoi) VALUES (?, ?, ?, ?, ?, NOW())");
            $stmt->execute([$nom, $email, $telephone, $sujet, $message]);

            $success_message = 'Votre message a été envoyé avec succès ! Nous vous contacterons dans les plus brefs délais.';

            // Réinitialiser les variables
            $nom = $email = $telephone = $sujet = $message = '';
        } catch (PDOException $e) {
            $error_message = 'Une erreur est survenue lors de l\'envoi de votre message. Veuillez réessayer.';
        }
    }
}

include 'includes/header.php';
?>

<!-- Page Header -->
<section class="hero" style="height: 300px; background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);">
    <div class="hero-overlay" style="background: rgba(0,0,0,0.3);">
        <div class="hero-content">
            <h1>Contactez-nous</h1>
            <p>Nous sommes à votre écoute pour répondre à toutes vos questions</p>
        </div>
    </div>
</section>

<!-- Informations de contact -->
<section class="content-section">
    <div class="container">
        <div class="services-grid" style="grid-template-columns: repeat(3, 1fr); margin-bottom: 60px;">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <h3>Téléphone</h3>
                <p><?php echo SITE_PHONE; ?></p>
                <p>Lundi - Vendredi: 8h - 18h</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email</h3>
                <p><?php echo SITE_EMAIL; ?></p>
                <p>Réponse sous 24h</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>Adresse</h3>
                <p>Abidjan, Côte d'Ivoire</p>
                <p>Rendez-vous sur demande</p>
            </div>
        </div>
    </div>
</section>

<!-- Formulaire de contact -->
<section class="content-section alt">
    <div class="container">
        <h2 class="section-title">Envoyez-nous un Message</h2>
        <p class="section-subtitle">Remplissez le formulaire ci-dessous et nous vous répondrons rapidement</p>

        <?php if ($success_message): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <?php if ($error_message): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="contact-form">
            <div class="form-group">
                <label for="nom">Nom complet <span style="color: red;">*</span></label>
                <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Adresse email <span style="color: red;">*</span></label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" value="<?php echo htmlspecialchars($telephone ?? ''); ?>">
            </div>

            <div class="form-group">
                <label for="sujet">Sujet <span style="color: red;">*</span></label>
                <input type="text" id="sujet" name="sujet" value="<?php echo htmlspecialchars($sujet ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="message">Message <span style="color: red;">*</span></label>
                <textarea id="message" name="message" required><?php echo htmlspecialchars($message ?? ''); ?></textarea>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-paper-plane"></i> Envoyer le message
            </button>
        </form>
    </div>
</section>

<!-- FAQ -->
<section class="content-section">
    <div class="container">
        <h2 class="section-title">Questions Fréquentes</h2>
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="margin-bottom: 30px;">
                <h3 style="color: #3498db; margin-bottom: 10px;"><i class="fas fa-question-circle"></i> Quels sont vos délais de réponse ?</h3>
                <p>Nous nous engageons à répondre à toutes les demandes dans un délai maximum de 24 heures ouvrées.</p>
            </div>

            <div style="margin-bottom: 30px;">
                <h3 style="color: #3498db; margin-bottom: 10px;"><i class="fas fa-question-circle"></i> Proposez-vous des devis gratuits ?</h3>
                <p>Oui, tous nos devis sont gratuits et sans engagement. N'hésitez pas à nous contacter pour obtenir une estimation personnalisée.</p>
            </div>

            <div style="margin-bottom: 30px;">
                <h3 style="color: #3498db; margin-bottom: 10px;"><i class="fas fa-question-circle"></i> Dans quelles régions intervenez-vous ?</h3>
                <p>Nous intervenons principalement en Côte d'Ivoire, mais nous pouvons également travailler à distance pour des clients internationaux.</p>
            </div>

            <div style="margin-bottom: 30px;">
                <h3 style="color: #3498db; margin-bottom: 10px;"><i class="fas fa-question-circle"></i> Offrez-vous un support après-vente ?</h3>
                <p>Oui, nous offrons un support technique complet et une maintenance continue pour tous nos projets.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
