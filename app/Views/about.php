<!-- app/Views/about.php -->
<?= $this->include('layout/navbar') ?>

<style>
.about-container {
    max-width: 800px;
    margin: 100px auto;
    background-color: #EDF4F2;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    font-family: 'Segoe UI', sans-serif;
    color: #31473A;
}

.about-container h1 {
    font-size: 32px;
    margin-bottom: 20px;
    color: #31473A;
    border-left: 6px solid #31473A;
    padding-left: 16px;
}

.about-container p {
    font-size: 16px;
    line-height: 1.7;
    margin-bottom: 20px;
}

.about-highlight {
    background-color: #d3ede8;
    padding: 12px 20px;
    border-left: 4px solid #4da59c;
    margin-top: 30px;
    border-radius: 8px;
}

.about-highlight strong {
    color: #31473A;
}

.about-container img {
    max-width: 100%;
    border-radius: 12px;
    margin: 20px 0;
}
</style>

<div class="about-container">
    <h1>About RedFlow</h1>
    <p><strong>RedFlow</strong> adalah platform eBook submission dan pembacaan tugas siswa yang dibangun dengan semangat berbagi pengetahuan dan inspirasi visual ala <em>comic-style</em> UI. Tujuan kami adalah menciptakan pengalaman membaca tugas yang lebih menarik, menyenangkan, dan terorganisir!</p>

    <img src="<?= base_url('images/ReadFlow-logo.png') ?>" alt="Logo" style="height: 40px;">
    <p>Dengan RedFlow, kamu bisa mengunggah tugasmu dalam format eBook, membuatnya mudah diakses dan dibaca oleh teman-teman sekelas. Kami mengadopsi konsep <em>comic-style</em> untuk membuat tampilan yang lebih hidup dan menarik, sehingga membaca tugas bukan lagi hal yang membosankan.</p>


    <div class="about-highlight">
        <strong>🌟 Dibuat oleh Mahasiswa, untuk Mahasiswa.</strong><br>
        Kami percaya bahwa tugas bukan sekadar formalitas, tapi karya yang pantas dilihat oleh banyak orang.
    </div>

    <p>Dengan fitur seperti <em>Bookmark</em>, <em>Favorit</em>, dan <em>Galeri Publik</em>, RedFlow membangun komunitas akademik digital yang hangat dan saling mendukung.</p>
    
    <p>Yuk, gabung dan kontribusi dengan cara paling seru dalam membaca dan berbagi tugas!</p>
</div>
