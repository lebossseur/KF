&lt;?php
session_start();

// Vérifier l'authentification
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once '../includes/config.php';

// Récupérer les statistiques
try {
    // Nombre total de contacts
    $stmt = $conn-&gt;query("SELECT COUNT(*) as total FROM contacts");
    $total_contacts = $stmt-&gt;fetch()['total'];

    // Nouveaux contacts (statut = nouveau)
    $stmt = $conn-&gt;query("SELECT COUNT(*) as total FROM contacts WHERE statut = 'nouveau'");
    $new_contacts = $stmt-&gt;fetch()['total'];

    // Contacts récents (7 derniers jours)
    $stmt = $conn-&gt;query("SELECT COUNT(*) as total FROM contacts WHERE date_envoi &gt;= DATE_SUB(NOW(), INTERVAL 7 DAY)");
    $recent_contacts = $stmt-&gt;fetch()['total'];

    // Liste des derniers contacts
    $stmt = $conn-&gt;query("SELECT * FROM contacts ORDER BY date_envoi DESC LIMIT 10");
    $contacts = $stmt-&gt;fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $error = "Erreur lors de la récupération des données.";
}
?&gt;
&lt;!DOCTYPE html&gt;
&lt;html lang="fr"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Dashboard - Administration KF Business&lt;/title&gt;
    &lt;link rel="stylesheet" href="../css/style.css"&gt;
    &lt;link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"&gt;
    &lt;style&gt;
        .admin-header {
            background: linear-gradient(90deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .admin-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .admin-nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .admin-nav a:hover {
            background: rgba(255,255,255,0.1);
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            border-left: 4px solid #3498db;
        }
        .stat-card h3 {
            color: #7f8c8d;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .stat-card .number {
            font-size: 36px;
            font-weight: bold;
            color: #2c3e50;
        }
        .stat-card .icon {
            float: right;
            font-size: 40px;
            color: #3498db;
            opacity: 0.3;
        }
        .contacts-table {
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .contacts-table table {
            width: 100%;
            border-collapse: collapse;
        }
        .contacts-table th {
            background: #3498db;
            color: white;
            padding: 15px;
            text-align: left;
        }
        .contacts-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ecf0f1;
        }
        .contacts-table tr:hover {
            background: #f8f9fa;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }
        .badge-new {
            background: #e74c3c;
            color: white;
        }
        .badge-read {
            background: #f39c12;
            color: white;
        }
        .badge-done {
            background: #27ae60;
            color: white;
        }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div class="admin-header"&gt;
        &lt;div class="container"&gt;
            &lt;div&gt;
                &lt;h2&gt;&lt;i class="fas fa-tachometer-alt"&gt;&lt;/i&gt; Dashboard - Administration&lt;/h2&gt;
                &lt;p style="margin: 0; opacity: 0.8;"&gt;Bienvenue, &lt;?php echo htmlspecialchars($_SESSION['admin_nom']); ?&gt;&lt;/p&gt;
            &lt;/div&gt;
            &lt;nav class="admin-nav"&gt;
                &lt;a href="dashboard.php"&gt;&lt;i class="fas fa-home"&gt;&lt;/i&gt; Tableau de bord&lt;/a&gt;
                &lt;a href="contacts.php"&gt;&lt;i class="fas fa-envelope"&gt;&lt;/i&gt; Messages&lt;/a&gt;
                &lt;a href="../index.php" target="_blank"&gt;&lt;i class="fas fa-globe"&gt;&lt;/i&gt; Voir le site&lt;/a&gt;
                &lt;a href="logout.php"&gt;&lt;i class="fas fa-sign-out-alt"&gt;&lt;/i&gt; Déconnexion&lt;/a&gt;
            &lt;/nav&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;section class="content-section"&gt;
        &lt;div class="container"&gt;
            &lt;h2&gt;Statistiques&lt;/h2&gt;

            &lt;div class="stats-grid"&gt;
                &lt;div class="stat-card"&gt;
                    &lt;div class="icon"&gt;&lt;i class="fas fa-envelope"&gt;&lt;/i&gt;&lt;/div&gt;
                    &lt;h3&gt;Total Messages&lt;/h3&gt;
                    &lt;div class="number"&gt;&lt;?php echo $total_contacts; ?&gt;&lt;/div&gt;
                &lt;/div&gt;

                &lt;div class="stat-card" style="border-left-color: #e74c3c;"&gt;
                    &lt;div class="icon"&gt;&lt;i class="fas fa-bell"&gt;&lt;/i&gt;&lt;/div&gt;
                    &lt;h3&gt;Nouveaux Messages&lt;/h3&gt;
                    &lt;div class="number"&gt;&lt;?php echo $new_contacts; ?&gt;&lt;/div&gt;
                &lt;/div&gt;

                &lt;div class="stat-card" style="border-left-color: #27ae60;"&gt;
                    &lt;div class="icon"&gt;&lt;i class="fas fa-calendar-week"&gt;&lt;/i&gt;&lt;/div&gt;
                    &lt;h3&gt;Cette Semaine&lt;/h3&gt;
                    &lt;div class="number"&gt;&lt;?php echo $recent_contacts; ?&gt;&lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;

            &lt;h2 style="margin-top: 40px;"&gt;Messages Récents&lt;/h2&gt;

            &lt;div class="contacts-table"&gt;
                &lt;table&gt;
                    &lt;thead&gt;
                        &lt;tr&gt;
                            &lt;th&gt;Date&lt;/th&gt;
                            &lt;th&gt;Nom&lt;/th&gt;
                            &lt;th&gt;Email&lt;/th&gt;
                            &lt;th&gt;Sujet&lt;/th&gt;
                            &lt;th&gt;Statut&lt;/th&gt;
                            &lt;th&gt;Actions&lt;/th&gt;
                        &lt;/tr&gt;
                    &lt;/thead&gt;
                    &lt;tbody&gt;
                        &lt;?php if (empty($contacts)): ?&gt;
                            &lt;tr&gt;
                                &lt;td colspan="6" style="text-align: center; padding: 30px;"&gt;
                                    &lt;i class="fas fa-inbox" style="font-size: 48px; color: #bdc3c7; margin-bottom: 10px;"&gt;&lt;/i&gt;
                                    &lt;p style="color: #7f8c8d;"&gt;Aucun message pour le moment.&lt;/p&gt;
                                &lt;/td&gt;
                            &lt;/tr&gt;
                        &lt;?php else: ?&gt;
                            &lt;?php foreach ($contacts as $contact): ?&gt;
                                &lt;tr&gt;
                                    &lt;td&gt;&lt;?php echo date('d/m/Y H:i', strtotime($contact['date_envoi'])); ?&gt;&lt;/td&gt;
                                    &lt;td&gt;&lt;?php echo htmlspecialchars($contact['nom']); ?&gt;&lt;/td&gt;
                                    &lt;td&gt;&lt;?php echo htmlspecialchars($contact['email']); ?&gt;&lt;/td&gt;
                                    &lt;td&gt;&lt;?php echo htmlspecialchars($contact['sujet']); ?&gt;&lt;/td&gt;
                                    &lt;td&gt;
                                        &lt;?php
                                        $badge_class = 'badge-new';
                                        $statut_text = 'Nouveau';
                                        if ($contact['statut'] === 'lu') {
                                            $badge_class = 'badge-read';
                                            $statut_text = 'Lu';
                                        } elseif ($contact['statut'] === 'traite') {
                                            $badge_class = 'badge-done';
                                            $statut_text = 'Traité';
                                        }
                                        ?&gt;
                                        &lt;span class="badge &lt;?php echo $badge_class; ?&gt;"&gt;&lt;?php echo $statut_text; ?&gt;&lt;/span&gt;
                                    &lt;/td&gt;
                                    &lt;td&gt;
                                        &lt;a href="view-contact.php?id=&lt;?php echo $contact['id']; ?&gt;" style="color: #3498db; text-decoration: none;"&gt;
                                            &lt;i class="fas fa-eye"&gt;&lt;/i&gt; Voir
                                        &lt;/a&gt;
                                    &lt;/td&gt;
                                &lt;/tr&gt;
                            &lt;?php endforeach; ?&gt;
                        &lt;?php endif; ?&gt;
                    &lt;/tbody&gt;
                &lt;/table&gt;
            &lt;/div&gt;

            &lt;p style="text-align: center; margin-top: 20px;"&gt;
                &lt;a href="contacts.php" class="btn-submit"&gt;Voir tous les messages &lt;i class="fas fa-arrow-right"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/p&gt;
        &lt;/div&gt;
    &lt;/section&gt;
&lt;/body&gt;
&lt;/html&gt;
