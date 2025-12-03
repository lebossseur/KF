-- Script de création de la base de données KF Business &amp; Informatique
-- Auteur: KF Business &amp; Informatique
-- Date: 2025

-- Création de la base de données
CREATE DATABASE IF NOT EXISTS kf_business CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE kf_business;

-- Table des contacts (formulaire de contact)
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telephone VARCHAR(20),
    sujet VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    date_envoi DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('nouveau', 'lu', 'traite') DEFAULT 'nouveau',
    INDEX idx_statut (statut),
    INDEX idx_date (date_envoi)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des services (pour gérer les services dynamiquement)
CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    icone VARCHAR(50),
    ordre INT DEFAULT 0,
    actif TINYINT(1) DEFAULT 1,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    date_modification DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_ordre (ordre),
    INDEX idx_actif (actif)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertion des services par défaut
INSERT INTO services (titre, description, icone, ordre) VALUES
('Développement Web', 'Création de sites web et applications sur mesure pour répondre à vos besoins spécifiques.', 'fa-laptop-code', 1),
('Infrastructure IT', 'Installation et maintenance de votre infrastructure informatique pour une performance optimale.', 'fa-network-wired', 2),
('Conseil Business', 'Accompagnement stratégique pour optimiser vos processus et accélérer votre croissance.', 'fa-chart-line', 3),
('Sécurité Informatique', 'Protection de vos données et systèmes avec les meilleures pratiques de cybersécurité.', 'fa-shield-alt', 4),
('Solutions Cloud', 'Migration et gestion de vos services dans le cloud pour plus de flexibilité.', 'fa-cloud', 5),
('Support Technique', 'Assistance technique réactive disponible pour résoudre vos problèmes rapidement.', 'fa-headset', 6);

-- Table des témoignages clients
CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    entreprise VARCHAR(150),
    poste VARCHAR(100),
    message TEXT NOT NULL,
    photo VARCHAR(255),
    note INT DEFAULT 5 CHECK (note BETWEEN 1 AND 5),
    actif TINYINT(1) DEFAULT 1,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_actif (actif)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des projets/portfolio
CREATE TABLE IF NOT EXISTS portfolio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    client VARCHAR(100),
    categorie VARCHAR(50),
    image VARCHAR(255),
    url VARCHAR(255),
    date_realisation DATE,
    actif TINYINT(1) DEFAULT 1,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_categorie (categorie),
    INDEX idx_actif (actif)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des utilisateurs administrateurs
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    nom VARCHAR(100) NOT NULL,
    role ENUM('admin', 'moderator') DEFAULT 'moderator',
    actif TINYINT(1) DEFAULT 1,
    derniere_connexion DATETIME,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_username (username),
    INDEX idx_actif (actif)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertion d'un utilisateur admin par défaut (mot de passe: admin123)
-- IMPORTANT: Changez ce mot de passe après la première connexion !
INSERT INTO admin_users (username, password, email, nom, role) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@kfbusiness.ci', 'Administrateur', 'admin');

-- Table des newsletters
CREATE TABLE IF NOT EXISTS newsletter_subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(150) NOT NULL UNIQUE,
    nom VARCHAR(100),
    actif TINYINT(1) DEFAULT 1,
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_actif (actif)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des paramètres du site
CREATE TABLE IF NOT EXISTS settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) NOT NULL UNIQUE,
    setting_value TEXT,
    description VARCHAR(255),
    date_modification DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_key (setting_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertion des paramètres par défaut
INSERT INTO settings (setting_key, setting_value, description) VALUES
('site_name', 'KF BUSINESS & INFORMATIQUE', 'Nom du site'),
('site_email', 'service-client@kfbusiness.ci', 'Email de contact principal'),
('site_phone', '+225 0555206034', 'Numéro de téléphone'),
('site_address', 'Abidjan, Côte d\'Ivoire', 'Adresse physique'),
('facebook_url', 'https://facebook.com', 'Page Facebook'),
('twitter_url', 'https://twitter.com', 'Compte Twitter'),
('linkedin_url', 'https://linkedin.com', 'Page LinkedIn'),
('instagram_url', 'https://instagram.com', 'Compte Instagram');

-- Table des logs d'activité (optionnel)
CREATE TABLE IF NOT EXISTS activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    action VARCHAR(100) NOT NULL,
    description TEXT,
    ip_address VARCHAR(45),
    date_action DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_user (user_id),
    INDEX idx_date (date_action),
    FOREIGN KEY (user_id) REFERENCES admin_users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Afficher un message de confirmation
SELECT 'Base de données créée avec succès!' as message;
