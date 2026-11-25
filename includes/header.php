<!-- Navbar -->
<nav class="navbar" id="navbar">
    <div class="container nav-container">
        <a href="index.php" class="nav-logo">
            <i class="fas fa-shoe-prints"></i>
            <span>Cashoes</span>
        </a>

        <button class="nav-toggle" id="navToggle" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <ul class="nav-links" id="navLinks">
            <li>
                <a href="index.php" class="nav-link <?= ($current_page ?? '') === 'home' ? 'active' : '' ?>">
                    <i class="fas fa-house"></i> Beranda
                </a>
            </li>
            <li>
                <a href="index.php#layanan" class="nav-link">
                    <i class="fas fa-spray-can-sparkles"></i> Layanan
                </a>
            </li>
            <li>
                <a href="order.php" class="nav-link <?= ($current_page ?? '') === 'order' ? 'active' : '' ?>">
                    <i class="fas fa-cart-shopping"></i> Order
                </a>
            </li>
            <li>
                <a href="index.php#tentang" class="nav-link">
                    <i class="fas fa-circle-info"></i> Tentang Kami
                </a>
            </li>
            <li>
                <a href="index.php#kontak" class="nav-link">
                    <i class="fas fa-envelope"></i> Kontak
                </a>
            </li>
            <li class="nav-user">
                <div class="nav-user-info">
                    <i class="fas fa-circle-user"></i>
                    <span><?= htmlspecialchars($loggedInName ?? 'User') ?></span>
                </div>
                <a href="logout.php" class="btn btn-logout" title="Logout">
                    <i class="fas fa-right-from-bracket"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
// Hamburger Menu Toggle
document.getElementById('navToggle').addEventListener('click', function() {
    this.classList.toggle('active');
    document.getElementById('navLinks').classList.toggle('active');
});

// Close menu when clicking a link (mobile)
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        document.getElementById('navToggle').classList.remove('active');
        document.getElementById('navLinks').classList.remove('active');
    });
});

// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});
</script>
