<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - RedFlow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            background: #fef6f0;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 400px;
            overflow: hidden;
        }

        h2 {
            margin-bottom: 20px;
            color: #ff6f61;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fdf9f7;
            font-size: 16px;
        }

        .toggle {
            position: relative;
            width: 100%;
        }
        .toggle input {
            width: 100%;
            padding: 10px 40px 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fdf9f7;
            font-size: 16px;
            box-sizing: border-box;
            overflow: hidden;
        }
        .toggle span {
            position: absolute;
            right: 12px;
            top: 35%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #ff6f61;
            user-select: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #ffb7a1;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #ff967e;
        }

        .link {
            text-align: center;
            margin-top: 15px;
        }

        .link a {
            color: #ff6f61;
            text-decoration: none;
        }

        .alert {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: center;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Daftar ke RedFlow</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form method="post" action="/register-post">
        <input type="text" name="name" placeholder="Nama Lengkap" value="<?= old('name') ?>" required>
        <input type="email" name="email" placeholder="Email" value="<?= old('email') ?>" required>

        <div class="toggle">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <span onclick="togglePassword()">👁️</span>
        </div>

        <button type="submit">Daftar</button>
    </form>

    <div class="link">
        Sudah punya akun? <a href="/login">Login</a>
    </div>
</div>

<script>
function togglePassword() {
    const pass = document.getElementById('password');
    const icon = document.getElementById('toggleIcon');
    if (pass.type === "password") {
        pass.type = "text";
        icon.textContent = '❌';
    } else {
        pass.type = "password";
        icon.textContent = '👁️';
    }
}
</script>

</script>

</body>
</html>
