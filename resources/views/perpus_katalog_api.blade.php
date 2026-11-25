<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Buku E-Perpustakaan (Konsumen API)</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 40px; }
        .card { max-width: 860px; margin: auto; background: white; padding: 28px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        .header-row { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #eee; padding-bottom: 12px; }
        h2 { margin: 0; color: #2c3e50; }
        .badge-status { background: #8e44ad; color: white; padding: 6px 14px; border-radius: 12px; font-size: 12px; font-weight: bold; }
        .alert { display: none; padding: 10px 14px; border-radius: 5px; font-size: 13px; margin-top: 15px; }
        .alert-sukses { background: #d4edda; color: #155724; }
        .alert-error { background: #f8d7da; color: #721c24; }
        .form-row { display: flex; gap: 10px; margin-top: 18px; }
        .form-row input { flex: 1; padding: 9px; border: 1px solid #ccc; border-radius: 5px; }
        .btn-simpan { background: #8e44ad; color: white; border: none; padding: 9px 18px; border-radius: 5px; font-weight: bold; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 14px; }
        th { background: #2c3e50; color: white; text-align: left; padding: 10px; }
        td { padding: 10px; border-bottom: 1px solid #eee; }
        .btn-hapus { background: #e74c3c; color: white; border: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
    <div class="card">
        <div class="header-row">
            <h2>Katalog Buku E-Perpustakaan</h2>
            <span class="badge-status">KONSUMEN RESTFUL API /api/buku</span>
        </div>

        <div id="kotakPesan" class="alert"></div>

        <!-- Form Tambah Buku (POST /api/buku) -->
        <form id="formApiBuku" class="form-row">
            <input type="text" id="kode_buku" placeholder="Kode Buku (BK-001)">
            <input type="text" id="judul_buku" placeholder="Judul Buku">
            <input type="text" id="penulis" placeholder="Penulis">
            <input type="number" id="stok" placeholder="Stok" min="0">
            <button type="submit" class="btn-simpan">+ Simpan ke API</button>
        </form>

        <!-- Tabel dari Response JSON GET /api/buku -->
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Stok</th>
                    <th>Aksi API</th>
                </tr>
            </thead>
            <tbody id="tabelBodyBuku">
                <tr><td colspan="5">Memuat data dari endpoint /api/buku...</td></tr>
            </tbody>
        </table>
    </div>

    <script>
        const API_URL = '/api/buku';

        function tampilkanPesan(teks, sukses = true) {
            const box = document.getElementById('kotakPesan');
            box.style.display = 'block';
            box.className = 'alert ' + (sukses ? 'alert-sukses' : 'alert-error');
            box.innerText = (sukses ? '✓ ' : '✗ ') + teks;
        }

        // 1. Mengkonsumsi GET /api/buku
        async function muatDataBuku() {
            const res = await fetch(API_URL, { headers: { 'Accept': 'application/json' } });
            const json = await res.json();
            const tbody = document.getElementById('tabelBodyBuku');
            tbody.innerHTML = '';

            if (json.data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5">Belum ada buku di dalam API.</td></tr>';
                return;
            }

            json.data.forEach(buku => {
                tbody.innerHTML += `
                    <tr>
                        <td>${buku.kode_buku}</td>
                        <td>${buku.judul_buku}</td>
                        <td>${buku.penulis}</td>
                        <td>${buku.stok}</td>
                        <td>
                            <button class="btn-hapus" onclick="hapusBuku(${buku.id})">Hapus (DELETE)</button>
                        </td>
                    </tr>
                `;
            });
        }

        // 2. Mengkonsumsi POST /api/buku
        document.getElementById('formApiBuku').addEventListener('submit', async function(e) {
            e.preventDefault();

            const payload = {
                kode_buku: document.getElementById('kode_buku').value,
                judul_buku: document.getElementById('judul_buku').value,
                penulis: document.getElementById('penulis').value,
                stok: document.getElementById('stok').value
            };

            const res = await fetch(API_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
            });

            const json = await res.json();

            if (res.status === 201) {
                tampilkanPesan(json.pesan, true);
                this.reset();
                muatDataBuku();
            } else {
                let detail = '';
                if (json.errors) {
                    detail = ' ' + Object.values(json.errors).flat().join(' ');
                }
                tampilkanPesan(json.pesan + detail, false);
            }
        });

        // 3. Mengkonsumsi DELETE /api/buku/{id}
        async function hapusBuku(id) {
            const res = await fetch(`${API_URL}/${id}`, {
                method: 'DELETE',
                headers: { 'Accept': 'application/json' }
            });

            const json = await res.json();
            tampilkanPesan(json.pesan, res.ok);
            muatDataBuku();
        }

        // Panggil GET saat halaman pertama kali dibuka
        muatDataBuku();
    </script>
</body>
</html>