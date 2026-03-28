-- 1. Créer la base de données (L'armoire)
CREATE DATABASE IF NOT EXISTS payment_db;

-- 2. Dire à MySQL qu'on veut travailler dans cette base
USE payment_db;

-- 3. Créer la table 'users' (Le tiroir pour les comptes)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
);

-- 4. Créer la table 'payments' (Le tiroir pour les paiements)
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10, 2) NOT NULL,
    description VARCHAR(255),
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_by VARCHAR(50)
);