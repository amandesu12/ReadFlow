<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link href="https://fonts.googleapis.com/css?family=Inter:400,600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #EDF4F2;
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 820px;   
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            padding: 14;
            display: flex;
            overflow: hidden;
            margin: 40px auto;
            flex-direction: row;
            gap: 20px;
        }
        .visual-side {
            background: #CEE6F2;
            width: 45%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 40px 20px;
        }
        .visual-side img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 12px; ;
            border: 4px solid #fff;
            box-shadow: 0 2px 12px rgba(94, 167, 204, 0.13);
            background: #f0f0f0;
            margin-bottom: 18px;
        }
        .visual-side h3 {
            color: #22223b;
            font-weight: 600;
            margin: 0;
            font-size: 1.25rem;
            text-align: center;
        }
        .form-side {
            width: 55%;
            padding: 40px 32px 32px 32px;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        h2 {
            text-align: center;
            color: #22223b;
            margin-bottom: 24px;
            font-weight: 600;
        }
        label {
            display: block;
            margin-bottom: 6px;
            color: #4a4e69;
            font-weight: 500;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #c9c9c9;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 1rem;
            background: #f8f9fa;
            transition: border 0.2s;
        }
        input[type="text"]:focus, textarea:focus {
            border: 1.5px solid #5f6fff;
            outline: none;
        }
        textarea {
            resize: vertical;
        }
        .profile-pic-wrapper {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 18px;
        }
        .profile-pic-wrapper img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #CEE6F2;
            background: #f0f0f0;
        }
        input[type="file"] {
            font-size: 0.95rem;
        }
        button[type="submit"] {
            width: 100%;
            background: linear-gradient(90deg, #5f6fff 0%, #4ea8de 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 0;
            font-size: 1.08rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 10px;
        }
        button[type="submit"]:hover {
            background: linear-gradient(90deg, #4ea8de 0%, #5f6fff 100%);
        }
        .flash-success {
            background: #e6ffed;
            color: #1b7f3a;
            border: 1px solid #b7f5c2;
            padding: 10px 14px;
            border-radius: 7px;
            margin-bottom: 18px;
            text-align: center;
            font-size: 0.98rem;
        }
        @media (max-width: 900px) {
            .container {
                flex-direction: column;
                max-width: 98vw;
            }
            .visual-side, .form-side {
                width: 100%;
                padding: 32px 16px;
            }
            .visual-side img {
                width: 120px;
                height: 120px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="visual-side">
        <?php if ($user['profile_pic']): ?>
            <img id="main-profile-pic" src="<?= base_url('profile_pic/' . $user['profile_pic']) ?>" alt="Foto Profil">
        <?php else: ?>
            <img id="main-profile-pic" src="<?= base_url('profile_pics/default.png') ?>" alt="Default Foto Profil">
        <?php endif; ?>
    </div>
    <div class="form-side">
        <h2>Edit Profil Saya</h2>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="flash-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <form action="<?= base_url('profil/update') ?>" method="post" enctype="multipart/form-data">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" value="<?= esc($user['name']) ?>" required>

            <label for="bio">Bio</label>
            <textarea id="bio" name="bio" rows="4" placeholder="Ceritakan tentang dirimu..."><?= esc($user['bio']) ?></textarea>

            <label>Foto Profil</label>
            <div class="profile-pic-wrapper">
                <?php if ($user['profile_pic']): ?>
                    <img id="preview-profile-pic" src="<?= base_url('profile_pic/' . $user['profile_pic']) ?>" alt="Foto Profil">
                <?php else: ?>
                    <img id="preview-profile-pic" src="<?= base_url('profile_pics/default.png') ?>" alt="Default Foto Profil">
                <?php endif; ?>
                <input type="file" name="profile_pic" accept="image/*" id="profile-pic-input">
            </div>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</div>
<script>
document.getElementById('profile-pic-input').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (!file) return;
    if (!file.type.startsWith('image/')) return;

    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('preview-profile-pic').src = e.target.result;
        document.getElementById('main-profile-pic').src = e.target.result;
    };
    reader.readAsDataURL(file);
});
document.addEventListener('DOMContentLoaded', function() {
    const visualSide = document.querySelector('.visual-side');
    const profilePicInput = document.getElementById('profile-pic-input');

    profilePicInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (!file || !file.type.startsWith('image/')) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            visualSide.style.background = `url('${e.target.result}') center center / cover no-repeat`;
        };
        reader.readAsDataURL(file);
    });
});
</script>
</body>
</html>