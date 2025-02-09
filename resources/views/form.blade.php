<form method="POST" action="/submit">
    @csrf  <!-- Token CSRF wajib -->
    <input type="text" name="nama" placeholder="Masukkan Nama">
    <button type="submit">Kirim</button>
</form>
