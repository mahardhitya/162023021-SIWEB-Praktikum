<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Majo Stage | Manajemen Konser</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><i class="bi bi-music-note-beamed me-2"></i>Majo Fest</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tambah-event">Kelola Event</a></li>
                    <li class="nav-item d-flex align-items-center">
                        <button id="themeToggle" class="btn btn-outline-light btn-sm me-2">Light Mode</button>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <button id="cartBtn" class="btn btn-outline-light position-relative btn-sm">
                            <i class="bi bi-heart"></i>
                            <span id="cartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
                        </button>
                    </li>
<?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item d-flex align-items-center ms-3">
                        <span class="navbar-text text-white me-2">Hi, <?= htmlspecialchars($_SESSION['username']) ?></span>
                        <a href="controller/logout.php" class="btn btn-outline-light btn-sm">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item d-flex align-items-center ms-3">
                        <a href="login.php" class="btn btn-warning btn-sm">Login</a>
                    </li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

  <header class="hero-section d-flex align-items-center">
    <div class="container text-center text-white">
        <h1 class="display-3 fw-bold shadow-text">Atur Panggung Anda</h1>
        <p class="lead shadow-text">Sistem manajemen terpadu untuk pengelolaan event konser dan penjualan tiket</p>
        <a href="#tambah-event" class="btn btn-primary btn-lg mt-3 shadow-sm">Mulai Kelola</a>
    </div>
</header>

    <section id="dashboard" class="container py-5">
        <h2 class="text-center mb-5 fw-bold">Ringkasan Statistik</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 stat-card">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-event display-4 text-primary mb-3"></i>
                        <h5 class="card-title">Total Event</h5>
                        <p class="display-6 fw-bold">24</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 stat-card">
                    <div class="card-body text-center">
                        <i class="bi bi-ticket-perforated display-4 text-success mb-3"></i>
                        <h5 class="card-title">Tiket Terjual</h5>
                        <p class="display-6 fw-bold">12.500</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 stat-card">
                    <div class="card-body text-center">
                        <i class="bi bi-currency-dollar display-4 text-warning mb-3"></i>
                        <h5 class="card-title">Pendapatan</h5>
                        <p class="display-6 fw-bold">Rp 2.4M</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="event-list" class="container py-5">
    <h2 class="text-center mb-5 fw-bold">Jadwal Konser Mendatang</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 concert-item" data-name="Rock Legend Tour" data-stock="20">
                <img src="assets/rock.png" class="card-img-top" alt="Konser Rock">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-primary">Music</span>
                        <h6 class="text-muted mb-0"><i class="bi bi-calendar3 me-1"></i> 20 Mar 2026</h6>
                    </div>
                    <h5 class="card-title fw-bold">Rock Legend Tour</h5>
                    <p class="card-text text-secondary">Stadion Gelora Bung Karno, Jakarta</p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-bold text-dark">Rp 750.000</span>
                        <button class="btn btn-outline-dark btn-sm">Detail</button>
                    </div>
                    <p>Stok: <span class="stock-count">20</span></p>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-success btn-sm buy-btn">Beli</button>
                        <button class="btn btn-outline-primary btn-sm wishlist-btn">Tambah ke Wishlist</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 concert-item" data-name="IVE Fest" data-stock="15">
                <img src="assets/ive.jpg" class="card-img-top" alt="Konser Pop">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-info text-dark">Pop</span>
                        <h6 class="text-muted mb-0"><i class="bi bi-calendar3 me-1"></i> 12 Apr 2026</h6>
                    </div>
                    <h5 class="card-title fw-bold">IVE Fest</h5>
                    <p class="card-text text-secondary">ICE BSD, Tangerang</p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-bold text-dark">Rp 1.450.000</span>
                        <button class="btn btn-outline-dark btn-sm">Detail</button>
                    </div>
                    <p>Stok: <span class="stock-count">15</span></p>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-success btn-sm buy-btn">Beli</button>
                        <button class="btn btn-outline-primary btn-sm wishlist-btn">Tambah ke Wishlist</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 concert-item" data-name="Midnight Jazz Session" data-stock="10">
                <img src="assets/jazz.png" class="card-img-top" alt="Konser Jazz">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-secondary">Jazz</span>
                        <h6 class="text-muted mb-0"><i class="bi bi-calendar3 me-1"></i> 05 Mei 2026</h6>
                    </div>
                    <h5 class="card-title fw-bold">Midnight Jazz Session</h5>
                    <p class="card-text text-secondary">Motion Blue, Jakarta</p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-bold text-dark">Rp 1.200.000</span>
                        <button class="btn btn-outline-dark btn-sm">Detail</button>
                    </div>
                    <p>Stok: <span class="stock-count">10</span></p>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-success btn-sm buy-btn">Beli</button>
                        <button class="btn btn-outline-primary btn-sm wishlist-btn">Tambah ke Wishlist</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section id="tambah-event" class="bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow p-4 border-0">
                        <h3 class="mb-4 text-center">Daftarkan Event Konser Baru</h3>
                        <form id="concertForm" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label">Nama Konser</label>
                                    <input type="text" class="form-control" id="namaKonser" required>
                                    <div class="invalid-feedback">Mohon isi nama konser.</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Artis / Band Utama</label>
                                    <input type="text" class="form-control" id="artis" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Pelaksanaan</label>
                                    <input type="date" class="form-control" id="tanggal" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Lokasi (Venue)</label>
                                    <select class="form-select" id="lokasi" required>
                                        <option value="">Pilih Lokasi...</option>
                                        <option>Stadion Gelora Bung Karno</option>
                                        <option>ICE BSD</option>
                                        <option>Jakarta International Stadium</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Harga Tiket Dasar (Rp)</label>
                                    <input type="number" class="form-control" id="harga" placeholder="Contoh: 500000" required>
                                </div>
                                <div class="col-12 mt-4 text-center">
                                    <button type="submit" class="btn btn-dark px-5">Simpan Data Konser</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 Manajemen Event Konser</p>
        </div>
    </footer>

    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Daftar Wishlist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="cartModalBody">
                    <p class="mb-0">Tidak ada item.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>