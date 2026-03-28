<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Dashboard - GNS3 Lab</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
            margin-bottom: 40px;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .site-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            background: white;
            height: 100%;
        }
        .site-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        .card-icon {
            font-size: 3rem;
            color: #764ba2;
            margin-bottom: 15px;
        }
        .btn-custom {
            background-color: #764ba2;
            color: white;
            border-radius: 25px;
            padding: 10px 25px;
        }
        .btn-custom:hover { background-color: #5b3a7d; color: white; }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold"><i class="fas fa-server"></i> GNS3 Web Server</h1>
            <p class="lead">Bienvenue sur le portail central. Sélectionnez une application ci-dessous.</p>
        </div>
    </div>

    <!-- Liste des Sites -->
    <div class="container mb-5">
        <div class="row g-4">
            
            <!-- Site 1: Payment System (Le nouveau) -->
            <div class="col-md-4">
                <div class="card site-card p-4 text-center">
                    <div class="card-body">
                        <i class="fas fa-wallet card-icon"></i>
                        <h3 class="card-title">Qwen chat Gestion de Paiements site</h3>
                        <p class="card-text text-muted">Système complet avec rôles Admin et Utilisateur.</p>
                        <a href="/main/" class="btn btn-custom">Accéder <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Site 2: Payment (Existant) -->
            <div class="col-md-4">
                <div class="card site-card p-4 text-center">
                    <div class="card-body">
                        <i class="fas fa-credit-card card-icon"></i>
                        <h3 class="card-title">copilot Payment Portal</h3>
                        <p class="card-text text-muted">Interface de paiement standard.</p>
                        <a href="/payment/" class="btn btn-outline-primary rounded-pill">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Site 3: Payment System Site (Existant) -->
            <div class="col-md-4">
                <div class="card site-card p-4 text-center">
                    <div class="card-body">
                        <i class="fas fa-cogs card-icon"></i>
                        <h3 class="card-title">Chat GPT Payment System Site</h3>
                        <p class="card-text text-muted">Configuration et paramètres.</p>
                        <a href="/payment_system_site/" class="btn btn-outline-primary rounded-pill">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Site 4: Payment System Site (Existant) -->
            <div class="col-md-4">
                <div class="card site-card p-4 text-center">
                    <div class="card-body">
                        <i class="fas fa-cogs card-icon"></i>
                        <h3 class="card-title">deepseek website Payment System Site</h3>
                        <p class="card-text text-muted">Configuration et paramètres.</p>
                        <a href="/payment-system/" class="btn btn-outline-primary rounded-pill">Accéder</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="text-center text-muted py-4">
        <small>&copy; 2023 GNS3 Lab Server. Tous droits réservés.</small>
    </footer>

</body>
</html>
