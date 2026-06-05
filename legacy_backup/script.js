// Script untuk validasi form Bootstrap 
(function () {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                } else {
                    event.preventDefault();
                    alert('Data Konser Berhasil Disimpan!');
                    form.reset();
                    form.classList.remove('was-validated');
                }

                form.classList.add('was-validated')
            }, false)
        })
})()

// ----------- Tema Dark/Light (localStorage) -----------
const themeToggle = document.getElementById('themeToggle');
const setTheme = (mode) => {
    if (mode === 'dark') {
        document.body.classList.add('dark-mode');
        themeToggle.textContent = 'Dark Mode';
    } else {
        document.body.classList.remove('dark-mode');
        themeToggle.textContent = 'Light Mode';
    }
    localStorage.setItem('theme', mode);
};

const savedTheme = localStorage.getItem('theme') || 'light';
setTheme(savedTheme);

themeToggle.addEventListener('click', () => {
    const current = document.body.classList.contains('dark-mode') ? 'dark' : 'light';
    setTheme(current === 'dark' ? 'light' : 'dark');
});

// ----------- Wishlist / Cart (sessionStorage) -----------
function getWishlist() {
    const data = sessionStorage.getItem('wishlist');
    return data ? JSON.parse(data) : [];
}
function saveWishlist(arr) {
    sessionStorage.setItem('wishlist', JSON.stringify(arr));
}
function updateCartBadge() {
    const count = getWishlist().length;
    document.getElementById('cartCount').textContent = count;
}

function populateModal() {
    const items = getWishlist();
    const body = document.getElementById('cartModalBody');
    if (items.length === 0) {
        body.innerHTML = '<p class="mb-0">Tidak ada item.</p>';
        return;
    }

    body.innerHTML = '<ul class="list-group"></ul>';
    const ul = body.querySelector('ul');
    items.forEach((name, index) => {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';
        li.textContent = name;

        const btn = document.createElement('button');
        btn.className = 'btn btn-sm btn-danger remove-btn';
        btn.textContent = 'Hapus';
        btn.dataset.index = index; 

        // removal handler
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            removeFromWishlist(parseInt(btn.dataset.index, 10));
            populateModal();
            updateCartBadge();
        });

        li.appendChild(btn);
        ul.appendChild(li);
    });
}

function removeFromWishlist(idx) {
    const arr = getWishlist();
    if (idx >= 0 && idx < arr.length) {
        arr.splice(idx, 1);
        saveWishlist(arr);
    }
}

const cartBtn = document.getElementById('cartBtn');
if (cartBtn) {
    cartBtn.addEventListener('click', () => {
        populateModal();
        const modal = new bootstrap.Modal(document.getElementById('cartModal'));
        modal.show();
    });
}

document.querySelectorAll('.concert-item').forEach(card => {
    const stockSpan = card.querySelector('.stock-count');
    const buyBtn = card.querySelector('.buy-btn');
    const name = card.getAttribute('data-name') || card.querySelector('.card-title').innerText;

    if (buyBtn && stockSpan) {
        buyBtn.addEventListener('click', () => {
            let stock = parseInt(stockSpan.textContent, 10);
            if (stock > 0) {
                stock -= 1;
                stockSpan.textContent = stock;
                alert(`Pembelian sukses untuk "${name}". Sisa stok: ${stock}`);
            } else {
                alert('Stok habis!');
            }
        });
    }

    const wishBtn = card.querySelector('.wishlist-btn');
    if (wishBtn) {
        wishBtn.addEventListener('click', () => {
            const list = getWishlist();
            if (!list.includes(name)) {
                list.push(name);
                saveWishlist(list);
                updateCartBadge();
                alert(`"${name}" ditambahkan ke wishlist.`);
            } else {
                alert(`"${name}" sudah ada di wishlist.`);
            }
        });
    }
});

updateCartBadge();