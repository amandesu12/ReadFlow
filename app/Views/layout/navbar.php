<!-- app/Views/layout.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RedFlow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       /* --- RESET DAN DASAR --- */
       * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #EDF4F2;
            color: #333;
        }

        /* --- SIDEBAR --- */
        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            height: 100vh;
            background-color:#EDF4F2;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 24px 20px;
            box-shadow: 2px 0 8px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .sidebar .profile {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar .profile img {
            width: 72px;
            height: 72px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
            
        }

        .sidebar .profile p {
            font-size: 14px;
            line-height: 1.4;
            color: #313131FF;
        }

        .sidebar .profile strong {
            font-size: 16px;
            color: #313131FF;
        }

        .sidebar nav {
            display: flex;
            flex-direction: column;
            gap: 18px;
            color: #313131FF;
        }

        .sidebar nav a {
            text-decoration: none;
            color: #282B2AFF;
            font-size: 15px;
            padding: 10px 12px;
            border-radius: 8px;
            transition: background 0.2s;
        }

        .sidebar nav a:hover {
            background-color: #3e5a4d;
            color: #ffffff;
        }

        .sidebar > div:last-child {
            text-align: center;
            padding-top: 20px;
        }

        .sidebar a[href*="logout"] {
            display: block;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            background-color: #FF7A7A;
            color: white !important;
            padding: 10px 16px;
            border-radius: 6px;
            transition: background 0.3s;
        }

        .sidebar a[href*="logout"]:hover {
            background-color: #e25c5c;
        }


        /* --- NAVBAR --- */
        .navbar {
            position: fixed;
            top: 0;
            left: 220px; /* Mulai setelah sidebar */
            right: 0;
            height: 60px;
            background-color: #EDF4F2;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            z-index: 900;
        }

        .navbar .search-box {
            background: #EDF4F2;
            border-radius: 20px;
            padding: 5px 15px;
            width: 300px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar input[type="text"] {
            border: none;
            background: transparent;
            outline: none;
            flex-grow: 1;
        }

        /* --- MAIN CONTENT --- */
        .main-content {
            margin-left: 220px; /* Sidebar width */
            margin-top: 60px; /* Navbar height */
            padding: 30px;
        }
        .logo{
            font-size: 1.5rem;
            font-weight: bold;
            color: #C92103FF;
        }
        .search-box input {
            font-size: 1.1rem;
            padding: 10px 12px;
            width: 90%;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div>
            <?php
            // Ambil data user dari session
            $user = session('user');

            // Default profile picture
            $profilePic = base_url('profile_pics/default.jpg');

            // Jika user login dan punya foto profil, gunakan foto tersebut
            if ($user && !empty($user['profile_pics'])) {
                $customPicPath = FCPATH . 'profile_pics/' . $user['profile_pics'];
                if (file_exists($customPicPath)) {
                    $profilePic = base_url('profile_pics/' . $user['profile_pics']);
                }
            }

            // Nama user, fallback ke 'Guest' jika belum login
            $userName = $user && !empty($user['name']) ? $user['name'] : 'Guest';
            ?>
            <div class="profile">
                <img src="<?= esc($profilePic) ?>" alt="Profile">
                <p>Welcome<br><strong><?= esc($userName) ?></strong></p>
            </div>
            <?php
                // Dapatkan path saat ini
                $currentPath = service('uri')->getPath();
            ?>
            <nav>
                <a href="<?= base_url('/') ?>" class="<?= $currentPath === '' ? 'active' : '' ?>">🏠 Dashboard</a>
                <a href="<?= base_url('/bookmark') ?>" class="<?= strpos($currentPath, 'bookmark') === 0 ? 'active' : '' ?>">🔖 Bookmark</a>
                <a href="<?= base_url('/galeri') ?>" class="<?= strpos($currentPath, 'galeri') === 0 ? 'active' : '' ?>">📚 Collection</a>
                <a href="<?= base_url('/profil') ?>" class="<?= strpos($currentPath, 'profil') === 0 ? 'active' : '' ?>">👤 Profile</a>
                <a href="<?= base_url('/about') ?>" class="<?= strpos($currentPath, 'about') === 0 ? 'active' : '' ?>">🧾 About Me</a>
                <a href="<?= base_url('/developer') ?>" class="<?= strpos($currentPath, 'developer') === 0 ? 'active' : '' ?>">👨‍💻 Developer</a>
            </nav>
            <style>
                .sidebar nav a.active {
                    background-color: #3e5a4d;
                    color: #fff !important;
                }
            </style>
        </div>
        <div>
            <a href="<?= base_url('/logout') ?>" style="color: #FF7A7A;">🚪 Logout</a>
        </div>
    </div>

    <!-- NAVBAR -->
    <div class="navbar">
        <div class="logo"><img src="<?= base_url('images/ReadFlow-logo.png') ?>" alt="Logo" style="height: 40px;"></div>
        <div class="search-box">
            <form action="<?= base_url('/search') ?>" method="get">
                <input type="text" id="navbar-search" name="q" placeholder="Search..." aria-label="Search" autocomplete="off">
                🔍
            </form>
        </div>
    </div>
    <script>
        // Debounce function to limit search requests
        function debounce(fn, delay) {
            let timer = null;
            return function(...args) {
                clearTimeout(timer);
                timer = setTimeout(() => fn.apply(this, args), delay);
            };
        }

        // Handle search input
        document.getElementById('navbar-search').addEventListener('input', debounce(function(e) {
            const query = e.target.value.trim();
            // Redirect to search page with query as parameter
            if(query.length > 0) {
                window.location.href = '<?= base_url('/galeri/cari') ?>?q=' + encodeURIComponent(query);
            }
        }, 500));
    </script>
    
    <!-- CONTENT -->
    
    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

</body>
</html>
