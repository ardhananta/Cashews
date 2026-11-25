<?php
/**
 * Order Page - Cashoes
 */
$current_page = 'order';
require_once __DIR__ . '/includes/auth.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order - Cashoes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php require_once __DIR__ . '/includes/header.php'; ?>

<!-- ===== ORDER PAGE ===== -->
<section class="section order-section">
    <div class="container">
        <h2 class="section-title">Pilih <span class="highlight">Layanan</span></h2>
        <p class="section-subtitle">Tambahkan layanan ke keranjang, lalu pesan langsung via WhatsApp</p>

        <div class="order-layout">
            <!-- Service Grid -->
            <div class="order-services">
                <div class="service-order-grid" id="serviceGrid">

                    <div class="service-order-card" data-id="1">
                        <div class="service-order-icon"><i class="fas fa-broom"></i></div>
                        <div class="service-order-info">
                            <h3>Fast Clean</h3>
                            <p>Pembersihan cepat bagian luar sepatu. Cocok untuk sepatu yang tidak terlalu kotor.</p>
                            <div class="service-order-meta">
                                <span class="duration"><i class="fas fa-clock"></i> 1 hari</span>
                                <span class="price">Rp25.000</span>
                            </div>
                        </div>
                        <button class="btn btn-add" onclick="addToCart(1)">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>

                    <div class="service-order-card" data-id="2">
                        <div class="soc-badge">Populer</div>
                        <div class="service-order-icon"><i class="fas fa-droplet"></i></div>
                        <div class="service-order-info">
                            <h3>Deep Clean</h3>
                            <p>Pembersihan menyeluruh luar dan dalam, termasuk insole dan tali sepatu.</p>
                            <div class="service-order-meta">
                                <span class="duration"><i class="fas fa-clock"></i> 2-3 hari</span>
                                <span class="price">Rp40.000</span>
                            </div>
                        </div>
                        <button class="btn btn-add" onclick="addToCart(2)">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>

                    <div class="service-order-card" data-id="3">
                        <div class="service-order-icon"><i class="fas fa-sun"></i></div>
                        <div class="service-order-info">
                            <h3>Unyellowing</h3>
                            <p>Menghilangkan noda kuning pada sol dan bagian putih agar kembali cerah.</p>
                            <div class="service-order-meta">
                                <span class="duration"><i class="fas fa-clock"></i> 3-5 hari</span>
                                <span class="price">Rp60.000</span>
                            </div>
                        </div>
                        <button class="btn btn-add" onclick="addToCart(3)">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>

                    <div class="service-order-card" data-id="4">
                        <div class="service-order-icon"><i class="fas fa-paintbrush"></i></div>
                        <div class="service-order-info">
                            <h3>Repaint</h3>
                            <p>Pengecatan ulang sepatu dengan warna pilihan. Sepatu tampak baru kembali!</p>
                            <div class="service-order-meta">
                                <span class="duration"><i class="fas fa-clock"></i> 5-7 hari</span>
                                <span class="price">Rp100.000</span>
                            </div>
                        </div>
                        <button class="btn btn-add" onclick="addToCart(4)">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>

                    <div class="service-order-card" data-id="5">
                        <div class="service-order-icon"><i class="fas fa-wrench"></i></div>
                        <div class="service-order-info">
                            <h3>Repair / Reglue</h3>
                            <p>Perbaikan sol lepas, jahitan rusak, atau bagian sepatu yang perlu diperbaiki.</p>
                            <div class="service-order-meta">
                                <span class="duration"><i class="fas fa-clock"></i> 3-5 hari</span>
                                <span class="price">Rp50.000</span>
                            </div>
                        </div>
                        <button class="btn btn-add" onclick="addToCart(5)">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>

                </div>
            </div>

            <!-- Cart & Form Sidebar -->
            <div class="order-sidebar">
                <div class="cart-card">
                    <div class="cart-header">
                        <h3><i class="fas fa-cart-shopping"></i> Keranjang</h3>
                        <span class="cart-badge" id="cartCount">0</span>
                    </div>

                    <div class="cart-body">
                        <div class="cart-empty" id="cartEmpty">
                            <i class="fas fa-basket-shopping"></i>
                            <p>Keranjang masih kosong</p>
                            <small>Pilih layanan dari daftar di samping</small>
                        </div>
                        <div class="cart-items" id="cartItems"></div>
                    </div>

                    <div class="cart-footer" id="cartFooter" style="display: none;">
                        <div class="cart-total">
                            <span>Total</span>
                            <span class="cart-total-price" id="cartTotal">Rp0</span>
                        </div>
                    </div>
                </div>

                <!-- Customer Form -->
                <div class="customer-card" id="customerCard">
                    <div class="cart-header">
                        <h3><i class="fas fa-user-pen"></i> Data Pelanggan</h3>
                    </div>

                    <div class="customer-form">
                        <div class="form-group">
                            <label for="custName">Nama Lengkap <span class="required">*</span></label>
                            <input type="text" id="custName" class="form-input" placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="custPhone">Nomor HP <span class="required">*</span></label>
                            <input type="tel" id="custPhone" class="form-input" placeholder="08xxxxxxxxxx" required>
                        </div>
                        <div class="form-group">
                            <label for="custAddress">Alamat <span class="required">*</span></label>
                            <textarea id="custAddress" class="form-input" rows="2" placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="custMethod">Metode <span class="required">*</span></label>
                            <select id="custMethod" class="form-input">
                                <option value="Antar Sendiri">Antar Sendiri</option>
                                <option value="Jemput">Jemput (area Semarang)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="custNotes">Catatan</label>
                            <textarea id="custNotes" class="form-input" rows="2" placeholder="Catatan tambahan (opsional)"></textarea>
                        </div>
                    </div>

                    <button class="btn btn-wa btn-full" id="orderBtn" onclick="sendToWhatsApp()">
                        <i class="fab fa-whatsapp"></i> Pesan via WhatsApp
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

<script src="assets/js/order.js"></script>

</body>
</html>
