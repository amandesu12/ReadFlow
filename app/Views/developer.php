<?= $this->include('layout/navbar') ?>
<style>
    .about-developer {
    background: #EDF4F2;
    padding: 32px;
    border-radius: 12px;
    margin: 40px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.developer-container h2 {
    color: #31473A;
    margin-bottom: 16px;
}

.developer-profile {
    display: flex;
    align-items: center;
    margin-top: 24px;
}

.developer-profile img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-right: 24px;
    border: 3px solid #31473A;
}

.profile-info h3 {
    margin: 0;
    color: #31473A;
}

.developer-socials a {
    display: inline-block;
    margin-right: 16px;
    margin-top: 20px;
    color: #31473A;
    text-decoration: none;
    font-weight: bold;
}

.developer-socials a:hover {
    text-decoration: underline;
}

</style>
<main class="main-content">
    <section class="about-developer">
        <div class="developer-container">
            <h2>👨‍💻 Tentang Developer</h2>
            <p>Halo! Saya adalah developer di balik platform <strong>RedFlow</strong> — tempat mengumpulkan dan berbagi tugas dengan gaya yang menyenangkan.</p>

            <?php
            // Misal, data user sudah tersedia di variabel $user
            // Pastikan $user['photo'] berisi nama file foto profil user
            $profilePhoto = !empty($user['photo']) ? base_url('profile_pics/' . $user['photo']) : base_url('profile_pics/default.jpg');
            ?>
            <div class="developer-profile">
                <img src="<?= esc($profilePhoto) ?>" alt="Developer">
                <div class="profile-info">
                    <h3><?= esc($user['name'] ?? 'Yuuka Device') ?></h3>
                    <p><?= esc($user['role'] ?? 'Fullstack Developer & UI Designer') ?></p>
                    <p><?= esc($user['bio'] ?? 'Saya suka membangun aplikasi web sederhana dengan gaya visual yang menyenangkan dan fungsional!') ?></p>
                </div>
            </div>

            <div class="developer-socials">
                <a href="https://github.com/" target="_blank">🌐 GitHub</a>
                <a href="mailto:armanahrdiansyah19@gmail.com">✉️ Email</a>
            </div>
        </div>
    </section>
</main>
