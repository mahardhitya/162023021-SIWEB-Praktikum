<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h1>Dashboard Manajemen Gudang</h1>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>

    <a href="{{ route('products.create') }}">
        <button type="button">Tambah Produk Baru</button>
    </a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $key => $product)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $product->kode_produk }}</td>
                <td>{{ $product->nama_produk }}</td>
                <td>{{ $product->stok }}</td>
                <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                <td>
                    <button>Edit</button>
                    <button>Hapus</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">Belum ada data produk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>