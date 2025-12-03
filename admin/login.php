&lt;?php
session_start();

// Si déjà connecté, rediriger vers le dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}

require_once '../includes/config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = 'Veuillez remplir tous les champs.';
    } else {
        try {
            $stmt = $conn-&gt;prepare("SELECT id, username, password, nom, role FROM admin_users WHERE username = ? AND actif = 1");
            $stmt-&gt;execute([$username]);
            $user = $stmt-&gt;fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Connexion réussie
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_username'] = $user['username'];
                $_SESSION['admin_nom'] = $user['nom'];
                $_SESSION['admin_role'] = $user['role'];

                // Mise à jour de la dernière connexion
                $update = $conn-&gt;prepare("UPDATE admin_users SET derniere_connexion = NOW() WHERE id = ?");
                $update-&gt;execute([$user['id']]);

                header('Location: dashboard.php');
                exit;
            } else {
                $error = 'Identifiants incorrects.';
            }
        } catch (PDOException $e) {
            $error = 'Erreur de connexion.';
        }
    }
}
?&gt;
&lt;!DOCTYPE html&gt;
&lt;html lang="fr"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Administration - KF Business&lt;/title&gt;
    &lt;link rel="stylesheet" href="../css/style.css"&gt;
    &lt;link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"&gt;
    &lt;style&gt;
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        }
        .login-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 400px;
        }
        .login-box h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }
        .login-box .logo {
            text-align: center;
            font-size: 48px;
            color: #3498db;
            margin-bottom: 20px;
        }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div class="login-container"&gt;
        &lt;div class="login-box"&gt;
            &lt;div class="logo"&gt;
                &lt;i class="fas fa-user-shield"&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;h2&gt;Administration&lt;/h2&gt;

            &lt;?php if ($error): ?&gt;
                &lt;div class="alert alert-error"&gt;
                    &lt;i class="fas fa-exclamation-circle"&gt;&lt;/i&gt; &lt;?php echo $error; ?&gt;
                &lt;/div&gt;
            &lt;?php endif; ?&gt;

            &lt;form method="POST" action=""&gt;
                &lt;div class="form-group"&gt;
                    &lt;label for="username"&gt;&lt;i class="fas fa-user"&gt;&lt;/i&gt; Nom d'utilisateur&lt;/label&gt;
                    &lt;input type="text" id="username" name="username" required autofocus&gt;
                &lt;/div&gt;

                &lt;div class="form-group"&gt;
                    &lt;label for="password"&gt;&lt;i class="fas fa-lock"&gt;&lt;/i&gt; Mot de passe&lt;/label&gt;
                    &lt;input type="password" id="password" name="password" required&gt;
                &lt;/div&gt;

                &lt;button type="submit" class="btn-submit" style="width: 100%;"&gt;
                    &lt;i class="fas fa-sign-in-alt"&gt;&lt;/i&gt; Se connecter
                &lt;/button&gt;
            &lt;/form&gt;

            &lt;p style="text-align: center; margin-top: 20px; color: #7f8c8d;"&gt;
                &lt;a href="../index.php" style="color: #3498db; text-decoration: none;"&gt;
                    &lt;i class="fas fa-arrow-left"&gt;&lt;/i&gt; Retour au site
                &lt;/a&gt;
            &lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;
