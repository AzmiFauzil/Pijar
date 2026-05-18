# TODO

## Step 1: Resolve routing / git conflict
- [x] Bersihkan conflict marker di `routes/web.php`
- [x] Pastikan route `/dashboard` tidak duplikat (sudah dipilih yang controller-based)
- [x] Jalankan `php artisan route:list` untuk verifikasi route tidak bentrok

## Step 2: Perbaiki controller Alat (agar tidak fatal error)
- [x] Perbaiki import model `KategoriAlat` di `app/Http/Controllers/AlatController.php`
- [x] Samakan nama variabel: `kategoriAlat` vs `kategoriAlats` dan `compact(...)`-nya
- [x] Perbaiki `destroy()` dari `alat->delete()` menjadi `$alat->delete()`

## Step 3: Commit & push
- [ ] `git status`
- [ ] resolve unmerged path (routes/web.php) dan staging
- [ ] `git add .`
- [ ] `git commit -m "fix: resolve routes conflict and alat controller"`
- [ ] `git push`

