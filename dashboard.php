<?php
require 'config.php';
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit; }

// Gestion des actions (Ajout/Suppression/Modif)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'add') {
            $stmt = $pdo->prepare("INSERT INTO payments (amount, description, created_by) VALUES (?, ?, ?)");
            $stmt->execute([$_POST['amount'], $_POST['description'], $_SESSION['user']]);
        } elseif ($_POST['action'] == 'delete' && $_SESSION['role'] == 'admin') {
            $stmt = $pdo->prepare("DELETE FROM payments WHERE id = ?");
            $stmt->execute([$_POST['id']]);
        } elseif ($_POST['action'] == 'update' && $_SESSION['role'] == 'admin') {
            $stmt = $pdo->prepare("UPDATE payments SET amount = ?, description = ? WHERE id = ?");
            $stmt->execute([$_POST['amount'], $_POST['description'], $_POST['id']]);
        }
        header("Location: dashboard.php");
    }
}

// Récupération des données
$payments = $pdo->query("SELECT * FROM payments ORDER BY payment_date DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - <?php echo $_SESSION['role']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar { min-height: 100vh; background: #2c3e50; color: white; }
        .nav-link { color: rgba(255,255,255,0.8); }
        .nav-link:hover, .nav-link.active { color: white; background: rgba(255,255,255,0.1); }
        .card-stat { border-left: 5px solid #3498db; }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3 d-none d-md-block" style="width: 250px;">
        <h4>PaymentSys</h4>
        <hr>
        <p>Bonjour, <strong><?php echo $_SESSION['user']; ?></strong></p>
        <p><span class="badge bg-warning text-dark"><?php echo strtoupper($_SESSION['role']); ?></span></p>
        <ul class="nav flex-column mt-4">
            <li class="nav-item"><a href="#" class="nav-link active"><i class="fas fa-home me-2"></i> Dashboard</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt me-2"></i> Déconnexion</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="container-fluid p-4 bg-light" style="width: 100%;">
        <h2 class="mb-4">Gestion des Paiements</h2>

        <!-- Formulaire d'ajout (Visible par TOUS) -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-white fw-bold"><i class="fas fa-plus-circle"></i> Nouveau Paiement</div>
            <div class="card-body">
                <form method="POST" class="row g-3">
                    <input type="hidden" name="action" value="add">
                    <div class="col-md-4">
                        <input type="number" step="0.01" name="amount" class="form-control" placeholder="Montant (€)" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="description" class="form-control" placeholder="Description" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tableau des paiements -->
        <div class="card shadow-sm">
            <div class="card-header bg-white fw-bold"><i class="fas fa-list"></i> Historique</div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Montant</th>
                            <th>Ajouté par</th>
                            <?php if ($_SESSION['role'] == 'admin') echo "<th>Actions</th>"; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $pay): ?>
                        <tr>
                            <td>#<?php echo $pay['id']; ?></td>
                            <td><?php echo $pay['payment_date']; ?></td>
                            <td>
                                <?php if ($_SESSION['role'] == 'admin'): ?>
                                    <!-- Admin peut modifier inline ou via modal, ici simplifié -->
                                    <form method="POST" class="d-flex">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="id" value="<?php echo $pay['id']; ?>">
                                        <input type="text" name="description" value="<?php echo $pay['description']; ?>" class="form-control form-control-sm me-2">
                                        <input type="number" step="0.01" name="amount" value="<?php echo $pay['amount']; ?>" class="form-control form-control-sm me-2" style="width: 100px;">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i></button>
                                    </form>
                                <?php else: ?>
                                    <?php echo $pay['description']; ?>
                                <?php endif; ?>
                            </td>
                            <td class="fw-bold text-success"><?php echo $pay['amount']; ?> €</td>
                            <td><small class="text-muted"><?php echo $pay['created_by']; ?></small></td>
                            
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                            <td>
                                <form method="POST" onsubmit="return confirm('Supprimer ?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $pay['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>