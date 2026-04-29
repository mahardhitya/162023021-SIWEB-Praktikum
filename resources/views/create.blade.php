<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk Baru</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf 
        
        <div>
            <label>Kode Produk:</label><br>
            <input type="text" name="kode_produk" required>
        </div>
        <br>
        
        <div>
            <label>Nama Produk:</label><br>
            <input type="text" name="nama_produk" required>
        </div>
        <br>

        <div>
            <label>Stok:</label><br>
            <input type="number" name="stok" required>
        </div>
        <br>

        <div>
            <label>Harga (Rp):</label><br>
            <input type="number" name="harga" required>
        </div>
        <br>

        <button type="submit">Simpan Produk</button>
        <a href="{{ url('/products') }}">
            <button type="button">Batal</button>
        </a>
    </form>
</body>
</html>