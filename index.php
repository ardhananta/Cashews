<?php
/**
 * Homepage - Cashoes
 */
$current_page = 'home';
require_once __DIR__ . '/includes/auth.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashoes - Jasa Cuci Sepatu Profesional</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php require_once __DIR__ . '/includes/header.php'; ?>

<!-- ===== HERO ===== -->
<section class="hero">
    <div class="hero-bg"></div>
    <div class="container hero-content">
        <h1 class="hero-title">Sepatu Kotor?<br>Serahkan pada <span class="highlight">Cashoes!</span></h1>
        <p class="hero-subtitle">Layanan cuci sepatu profesional dengan hasil maksimal.<br>Bersih, wangi, dan seperti baru lagi!</p>
        <div class="hero-buttons">
            <a href="order.php" class="btn btn-primary btn-lg">
                <i class="fas fa-bag-shopping"></i> Pesan Sekarang
            </a>
            <a href="#keunggulan" class="btn btn-outline btn-lg">
                <i class="fas fa-arrow-down"></i> Pelajari Lebih
            </a>
        </div>
        <div class="hero-stats">
            <div class="stat">
                <span class="stat-number">500+</span>
                <span class="stat-label">Sepatu Dicuci</span>
            </div>
            <div class="stat">
                <span class="stat-number">4.9</span>
                <span class="stat-label">Rating</span>
            </div>
            <div class="stat">
                <span class="stat-number">100%</span>
                <span class="stat-label">Puas</span>
            </div>
        </div>
    </div>
</section>

<!-- ===== KEUNGGULAN ===== -->
<section class="section section-alt" id="keunggulan">
    <div class="container">
        <h2 class="section-title">Kenapa <span class="highlight">Cashoes</span>?</h2>
        <p class="section-subtitle">Kami memberikan layanan terbaik untuk sepatu kesayangan Anda</p>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Proses Cepat</h3>
                <p>Layanan fast clean selesai dalam 1 hari kerja. Tidak perlu menunggu lama!</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3>Hasil Bersih</h3>
                <p>Menggunakan produk cleaning premium untuk hasil yang maksimal dan tahan lama.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <h3>Antar Jemput</h3>
                <p>Layanan jemput dan antar sepatu langsung ke rumah Anda. Praktis dan mudah!</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <h3>Harga Terjangkau</h3>
                <p>Kualitas premium dengan harga yang ramah di kantong. Mulai dari Rp25.000!</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== LAYANAN ===== -->
<section class="section" id="layanan">
    <div class="container">
        <h2 class="section-title">Layanan <span class="highlight">Kami</span></h2>
        <p class="section-subtitle">Pilih layanan yang sesuai dengan kebutuhan sepatu Anda</p>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon"><i class="fas fa-broom"></i></div>
                <h3>Fast Clean</h3>
                <p>Pembersihan cepat bagian luar sepatu. Cocok untuk sepatu yang tidak terlalu kotor.</p>
                <div class="service-meta">
                    <span class="service-duration"><i class="fas fa-clock"></i> 1 hari</span>
                    <span class="service-price">Rp25.000</span>
                </div>
            </div>
            <div class="service-card featured">
                <div class="service-badge">Populer</div>
                <div class="service-icon"><i class="fas fa-droplet"></i></div>
                <h3>Deep Clean</h3>
                <p>Pembersihan menyeluruh luar dan dalam sepatu. Termasuk insole dan tali sepatu.</p>
                <div class="service-meta">
                    <span class="service-duration"><i class="fas fa-clock"></i> 2-3 hari</span>
                    <span class="service-price">Rp40.000</span>
                </div>
            </div>
            <div class="service-card">
                <div class="service-icon"><i class="fas fa-sun"></i></div>
                <h3>Unyellowing</h3>
                <p>Menghilangkan noda kuning pada sol dan bagian putih sepatu agar kembali cerah.</p>
                <div class="service-meta">
                    <span class="service-duration"><i class="fas fa-clock"></i> 3-5 hari</span>
                    <span class="service-price">Rp60.000</span>
                </div>
            </div>
            <div class="service-card">
                <div class="service-icon"><i class="fas fa-paintbrush"></i></div>
                <h3>Repaint</h3>
                <p>Pengecatan ulang sepatu dengan warna pilihan. Sepatu tampak baru kembali!</p>
                <div class="service-meta">
                    <span class="service-duration"><i class="fas fa-clock"></i> 5-7 hari</span>
                    <span class="service-price">Rp100.000</span>
                </div>
            </div>
        </div>
        <div class="section-cta">
            <a href="order.php" class="btn btn-primary btn-lg">
                <i class="fas fa-cart-shopping"></i> Lihat Semua & Order
            </a>
        </div>
    </div>
</section>

<!-- ===== CARA ORDER ===== -->
<section class="section section-alt" id="tentang">
    <div class="container">
        <h2 class="section-title">Cara <span class="highlight">Order</span></h2>
        <p class="section-subtitle">Pesan layanan cuci sepatu hanya dalam 4 langkah mudah</p>
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-number">1</div>
                <div class="step-icon"><i class="fas fa-hand-pointer"></i></div>
                <h3>Pilih Layanan</h3>
                <p>Pilih jenis layanan cuci sepatu yang Anda butuhkan dari daftar kami.</p>
            </div>
            <div class="step-card">
                <div class="step-number">2</div>
                <div class="step-icon"><i class="fas fa-pen-to-square"></i></div>
                <h3>Isi Data</h3>
                <p>Lengkapi data diri, alamat, dan metode pengiriman sepatu.</p>
            </div>
            <div class="step-card">
                <div class="step-number">3</div>
                <div class="step-icon"><i class="fab fa-whatsapp"></i></div>
                <h3>Kirim ke WhatsApp</h3>
                <p>Pesanan otomatis dikirim ke WhatsApp admin untuk konfirmasi.</p>
            </div>
            <div class="step-card">
                <div class="step-number">4</div>
                <div class="step-icon"><i class="fas fa-circle-check"></i></div>
                <h3>Konfirmasi</h3>
                <p>Admin konfirmasi pesanan, lalu sepatu Anda segera diproses!</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== TESTIMONI ===== -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Apa Kata <span class="highlight">Mereka</span>?</h2>
        <p class="section-subtitle">Testimoni dari pelanggan setia Cashoes</p>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"Sepatu putih saya yang udah kuning banget jadi bersih lagi kayak baru! Proses cepat dan hasilnya memuaskan. Recommended banget!"</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">AS</div>
                    <div>
                        <strong>Andi Setiawan</strong>
                        <span>Deep Clean + Unyellowing</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"Layanan antar jemputnya praktis banget! Tinggal order lewat WA, sepatu dijemput, beberapa hari kemudian udah bersih. Top!"</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">DP</div>
                    <div>
                        <strong>Dina Pratiwi</strong>
                        <span>Fast Clean</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-stroke"></i>
                </div>
                <p class="testimonial-text">"Repaint sepatu saya hasilnya bagus banget, warnanya rata dan rapih. Harga juga worth it. Pasti bakal repeat order!"</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">RH</div>
                    <div>
                        <strong>Rizky Hakim</strong>
                        <span>Repaint</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
