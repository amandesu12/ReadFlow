<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(to right, #fce3ec, #f9f1ff);
        margin: 0;
        padding: 0;
    }

    .profile-card {
        max-width: 700px;
        margin: 140px auto;
        background-color: white;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .profile-left {
        background-color: #CEE6F2;
        padding: 20px;
        text-align: center;
        width: 40%;
    }

    .profile-left img {
        width: 120px;
        height: 120px;
        border-radius: 100px;
        object-fit: cover;
        border: 4px solid white;
        margin-bottom: 15px;
    }

    .profile-left h2 {
        margin: 10px 0 5px;
        font-size: 20px;
        color: #333;
    }

    .profile-left p {
        font-size: 14px;
        color: #555;
    }

    .profile-right {
        padding: 30px;
        width: 60%;
    }

    .profile-info {
        margin-bottom: 20px;
    }

    .profile-info h3 {
        font-size: 16px;
        color: #777;
        margin-bottom: 5px;
    }

    .profile-info p {
        font-size: 15px;
        color: #333;
        margin: 0;
    }

    .profile-actions a {
        display: inline-block;
        margin-right: 10px;
        padding: 10px 20px;
        background-color: #a278f4;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-size: 14px;
        transition: background 0.2s;
    }

    .profile-actions a:hover {
        background-color: #865ef2;
    }

    @media (max-width: 768px) {
        .profile-card {
            flex-direction: column;
        }

        .profile-left, .profile-right {
            width: 100%;
        }
    }
</style>

<body>
<?= $this->include('layout/navbar') ?> 
<div class="profile-card">
    <div class="profile-left">
        <img src="<?= base_url('profile_pics/' . ($user['profile_pic'] ?? 'default.png')) ?>" alt="Profile Picture">
        <h2><?= esc($user['name']) ?></h2>
        <p><?= esc($user['bio'] ?: 'Belum menambahkan bio.') ?></p>
    </div>
    <div class="profile-right">
        <div class="profile-info">
            <h3>Email</h3>
            <p><?= esc($user['email'] ?? '-') ?></p>
        </div>

        <div class="profile-info">
            <h3>Tugas Terunggah</h3>
            <p>🔒 (Nanti bisa ditambah total upload)</p>
        </div>

        <div class="profile-actions">
            <a href="<?= base_url('/dashboard') ?>">Dashboard</a>
            <a href="<?= base_url('/profil/edit') ?>">Edit Profil</a>
            <a href="<?= base_url('/logout') ?>">Logout</a>
        </div>
    </div>
</div>

</body>
</html>