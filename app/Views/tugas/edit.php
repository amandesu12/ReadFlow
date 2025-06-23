<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas - RedFlow</title>
    <style>
        body {
            background: #f6f8fa;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .edit-container {
            display: flex;
            justify-content: center;
            gap: 32px;
            flex-wrap: wrap;
            max-width: 800px;
            margin: 40px auto;
        }
        .preview-col, .form-col {

            margin-top: 70px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 32px 28px 24px 28px;
        }
        .preview-col {
            min-width: 220px;
            max-width: 260px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-col {
            flex: 1;
            min-width: 260px;
            max-width: 420px;
            
        }
        label {
            font-weight: 500;
            color: #22223b;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            background: #f9f9f9;
            transition: border 0.2s;
        }
        input[type="text"]:focus, textarea:focus {
            border: 1.5px solid #d7263d;
            outline: none;
            background: #fff;
        }
        input[type="file"] {
            margin-top: 8px;
            margin-bottom: 18px;
        }
        img {
            display: block;
            margin: 10px 0 18px 0;
            box-shadow: 0 2px 8px rgba(215,38,61,0.08);
        }
        button[type="submit"] {
            background: #d7263d;
            color: #fff;
            border: none;
            padding: 10px 26px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            margin-right: 10px;
        }
        button[type="submit"]:hover {
            background: #a61b2b;
        }
        a {
            color: #22223b;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 6px;
            transition: background 0.2s;
        }
        a:hover {
            background: #f1f1f1;
        }
        @media (max-width: 900px) {
            .edit-container {
                flex-direction: column;
                gap: 18px;
                max-width: 98vw;
            }
            .preview-col, .form-col {
                max-width: 98vw;
                padding: 18px 8px 16px 8px;
            }
        }
    </style>
    </head>
    <body>
    <div class="edit-container">
        <!-- Kolom Kiri: Preview Profile/Cover -->
        <div class="preview-col">
            <label style="font-weight: 500; color: #22223b;">Preview Cover:</label><br>
            <img id="coverPreview" src="<?= !empty($tugas['cover']) ? base_url('covers/' . $tugas['cover']) : 'https://via.placeholder.com/150x200?text=No+Cover' ?>" alt="Cover" style="width: 150px; border-radius: 8px; margin: 18px auto;">
            <p style="color: #888; font-size: 0.95em; margin-top: 8px;">
                Gambar akan diperbarui saat Anda memilih file baru.
            </p>
        </div>

        <!-- Kolom Kanan: Form Edit -->
        <form class="form-col" action="/tugas/update/<?= $tugas['id'] ?>" method="post" enctype="multipart/form-data">
            <label>Judul:</label><br>
            <input type="text" name="title" value="<?= esc($tugas['title']) ?>" required><br><br>

            <label>Deskripsi:</label><br>
            <textarea name="description" rows="4"><?= esc($tugas['description']) ?></textarea><br><br>

            <label>Ganti Cover (optional):</label><br>
            <input type="file" name="cover" accept="image/*" id="coverInput"><br><br>

            <button type="submit">Simpan Perubahan</button>
            <a href="/dashboard">Kembali</a>
        </form>
    </div>
<script>
document.getElementById('coverInput').addEventListener('change', function(e) {
    const [file] = e.target.files;
    if (file) {
        const reader = new FileReader();
        reader.onload = function(evt) {
            document.getElementById('coverPreview').src = evt.target.result;
        };
        reader.readAsDataURL(file);
    }
});
</script>
</body>
</html>
