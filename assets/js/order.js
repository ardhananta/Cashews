/**
 * Order & Cart Logic - Cashoes
 * Mengelola keranjang pesanan dan integrasi WhatsApp.
 */

// ===== CONFIG =====
const WA_NUMBER = '628xxxxxxxxxx'; // Ganti dengan nomor WhatsApp admin

// ===== DATA LAYANAN =====
const services = [
    {
        id: 1,
        name: 'Fast Clean',
        price: 25000,
        duration: '1 hari',
        icon: 'fa-broom'
    },
    {
        id: 2,
        name: 'Deep Clean',
        price: 40000,
        duration: '2-3 hari',
        icon: 'fa-droplet'
    },
    {
        id: 3,
        name: 'Unyellowing',
        price: 60000,
        duration: '3-5 hari',
        icon: 'fa-sun'
    },
    {
        id: 4,
        name: 'Repaint',
        price: 100000,
        duration: '5-7 hari',
        icon: 'fa-paintbrush'
    },
    {
        id: 5,
        name: 'Repair / Reglue',
        price: 50000,
        duration: '3-5 hari',
        icon: 'fa-wrench'
    }
];

// ===== STATE =====
let cart = [];

// ===== FORMAT RUPIAH =====
function formatRupiah(number) {
    return 'Rp' + number.toLocaleString('id-ID');
}

// ===== ADD TO CART =====
function addToCart(serviceId) {
    const service = services.find(s => s.id === serviceId);
    if (!service) return;

    const existing = cart.find(item => item.id === serviceId);
    if (existing) {
        existing.qty++;
    } else {
        cart.push({ ...service, qty: 1 });
    }

    renderCart();
    showNotification(`${service.name} ditambahkan ke keranjang!`);

    // Animate the add button
    const card = document.querySelector(`.service-order-card[data-id="${serviceId}"]`);
    if (card) {
        card.classList.add('added');
        setTimeout(() => card.classList.remove('added'), 500);
    }
}

// ===== REMOVE FROM CART =====
function removeFromCart(serviceId) {
    cart = cart.filter(item => item.id !== serviceId);
    renderCart();
}

// ===== UPDATE QUANTITY =====
function updateQty(serviceId, delta) {
    const item = cart.find(item => item.id === serviceId);
    if (!item) return;

    item.qty += delta;
    if (item.qty <= 0) {
        removeFromCart(serviceId);
        return;
    }

    renderCart();
}

// ===== CALCULATE TOTAL =====
function calculateTotal() {
    return cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
}

// ===== RENDER CART =====
function renderCart() {
    const cartItems = document.getElementById('cartItems');
    const cartEmpty = document.getElementById('cartEmpty');
    const cartFooter = document.getElementById('cartFooter');
    const cartCount = document.getElementById('cartCount');
    const cartTotal = document.getElementById('cartTotal');

    const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
    cartCount.textContent = totalItems;

    if (cart.length === 0) {
        cartEmpty.style.display = 'flex';
        cartItems.innerHTML = '';
        cartFooter.style.display = 'none';
        return;
    }

    cartEmpty.style.display = 'none';
    cartFooter.style.display = 'flex';

    cartItems.innerHTML = cart.map(item => `
        <div class="cart-item">
            <div class="cart-item-info">
                <span class="cart-item-name">${item.name}</span>
                <span class="cart-item-price">${formatRupiah(item.price)} / pasang</span>
            </div>
            <div class="cart-item-controls">
                <div class="qty-control">
                    <button class="qty-btn" onclick="updateQty(${item.id}, -1)" aria-label="Kurangi">
                        <i class="fas fa-minus"></i>
                    </button>
                    <span class="qty-value">${item.qty}</span>
                    <button class="qty-btn" onclick="updateQty(${item.id}, 1)" aria-label="Tambah">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <span class="cart-item-subtotal">${formatRupiah(item.price * item.qty)}</span>
                <button class="btn-remove" onclick="removeFromCart(${item.id})" aria-label="Hapus">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `).join('');

    cartTotal.textContent = formatRupiah(calculateTotal());
}

// ===== VALIDATE FORM =====
function validateForm() {
    const name = document.getElementById('custName').value.trim();
    const phone = document.getElementById('custPhone').value.trim();
    const address = document.getElementById('custAddress').value.trim();

    const errors = [];

    if (cart.length === 0) {
        errors.push('Keranjang masih kosong. Pilih layanan terlebih dahulu.');
    }
    if (!name) {
        errors.push('Nama lengkap harus diisi.');
    }
    if (!phone) {
        errors.push('Nomor HP harus diisi.');
    } else if (!/^08[0-9]{8,13}$/.test(phone)) {
        errors.push('Nomor HP tidak valid. Gunakan format 08xxxxxxxxxx.');
    }
    if (!address) {
        errors.push('Alamat harus diisi.');
    }

    return errors;
}

// ===== GENERATE WA MESSAGE =====
function generateMessage() {
    const name = document.getElementById('custName').value.trim();
    const phone = document.getElementById('custPhone').value.trim();
    const address = document.getElementById('custAddress').value.trim();
    const method = document.getElementById('custMethod').value;
    const notes = document.getElementById('custNotes').value.trim();

    let message = `Halo Admin Cashoes, saya ingin order cuci sepatu.\n\n`;
    message += `*Data Pelanggan:*\n`;
    message += `Nama: ${name}\n`;
    message += `No HP: ${phone}\n`;
    message += `Alamat: ${address}\n`;
    message += `Metode: ${method}\n\n`;
    message += `*Pesanan:*\n`;

    cart.forEach((item, index) => {
        const subtotal = formatRupiah(item.price * item.qty);
        message += `${index + 1}. ${item.name} x${item.qty} = ${subtotal}\n`;
    });

    message += `\n*Total: ${formatRupiah(calculateTotal())}*`;

    if (notes) {
        message += `\n\nCatatan: ${notes}`;
    }

    message += `\n\nTerima kasih! 🙏`;

    return message;
}

// ===== SEND TO WHATSAPP =====
function sendToWhatsApp() {
    const errors = validateForm();

    if (errors.length > 0) {
        showNotification(errors[0], 'error');

        // Highlight empty required fields
        ['custName', 'custPhone', 'custAddress'].forEach(id => {
            const el = document.getElementById(id);
            if (!el.value.trim()) {
                el.classList.add('input-error');
                el.addEventListener('input', () => el.classList.remove('input-error'), { once: true });
            }
        });
        return;
    }

    const message = generateMessage();
    const url = `https://wa.me/${WA_NUMBER}?text=${encodeURIComponent(message)}`;
    window.open(url, '_blank');

    showNotification('Pesanan dikirim ke WhatsApp! Silakan kirim pesan.', 'success');
}

// ===== NOTIFICATION =====
function showNotification(message, type = 'success') {
    // Remove existing notification
    const existing = document.querySelector('.toast-notification');
    if (existing) existing.remove();

    const toast = document.createElement('div');
    toast.className = `toast-notification toast-${type}`;
    toast.innerHTML = `
        <i class="fas ${type === 'error' ? 'fa-circle-exclamation' : 'fa-circle-check'}"></i>
        <span>${message}</span>
    `;

    document.body.appendChild(toast);

    // Trigger animation
    requestAnimationFrame(() => {
        toast.classList.add('show');
    });

    // Auto remove
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// ===== INIT =====
document.addEventListener('DOMContentLoaded', () => {
    renderCart();
});
