<?php
/**
 * Auth Guard - Cashoes
 * Include file ini di awal setiap halaman yang membutuhkan login.
 * Jika user belum login, akan di-redirect ke login.php.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$loggedInUser = $_SESSION['user'];
$loggedInName = $_SESSION['name'] ?? $loggedInUser;
