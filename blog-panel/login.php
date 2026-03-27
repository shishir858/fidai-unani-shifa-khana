<?php
// Admin Login Page - Clean, modern UI
session_start();
if (isset($_SESSION['admin_id'])) {
    header('Location: dashboard.php');
    exit;
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once dirname(__DIR__) . '/includes/db.php';
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ? LIMIT 1');
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password']) && $user['role'] === 'admin') {
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_name'] = $user['display_name'] ?: $user['username'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid credentials or not an admin.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Fidai Blog Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary-color: #75b798;
            --secondary-color: #004e92;
        }
        * { box-sizing: border-box; }
        body { 
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
            padding: 20px;
        }
        .login-wrap {
            width: 100%;
            max-width: 450px;
        }
        .login-card { 
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .login-brand {
            background: linear-gradient(135deg, var(--primary-color), #0dcaf0);
            color: #fff;
            text-align: center;
            padding: 40px 30px;
        }
        .login-brand h1 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }
        .login-brand p {
            margin: 10px 0 0 0;
            opacity: 0.95;
        }
        .login-body {
            padding: 40px 30px;
        }
        .form-label { 
            font-weight: 600; 
            color: #333;
            margin-bottom: 8px;
        }
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 15px;
        }
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(117, 183, 152, 0.15);
        }
        .input-group-text {
            background: transparent;
            border: 2px solid #e9ecef;
            border-right: none;
            border-radius: 10px 0 0 10px;
        }
        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }
        .password-field {
            position: relative;
        }
        .password-field .form-control {
            padding-left: 42px;
            padding-right: 42px;
            border-left: 2px solid #e9ecef !important;
            border-radius: 10px !important;
        }
        .password-field .left-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            z-index: 2;
        }
        .password-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #6c757d;
            z-index: 2;
        }
        .submit-btn {
            background: linear-gradient(135deg, var(--primary-color),rgba(142, 240, 13, 0.75));
            color: #fff;
            font-weight: 600;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            padding: 12px;
            width: 100%;
            transition: transform 0.2s;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(117, 183, 152, 0.3);
        }
        .alert {
            border-radius: 10px;
            border: none;
        }
        .login-footer {
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-wrap">
        <div class="login-card">
            <div class="login-brand">
                <img src="../admin/assets/images/logo-light.png" alt="Fidai Unani Shifa Khana" style="height:60px;max-width:100%;margin-bottom:12px;">
                <!-- <h1>Fidai Blog Panel</h1> -->
                <p>Blog Admin Panel</p>
            </div>
            <div class="login-body">
                <?php if ($error): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
                <form method="post" autocomplete="off">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="username" name="username" required autofocus>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="password-field">
                            <span class="left-icon"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <button type="button" class="password-toggle" id="togglePassword" aria-label="Show password">
                                <i class="fa-solid fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </form>
            </div>
            <div class="login-footer">
                &copy; <?php echo date('Y'); ?> Fidai Unani Shifa Khana. All rights reserved.
            </div>
        </div>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var pwd = document.getElementById('password');
            var icon = document.getElementById('toggleIcon');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
                this.setAttribute('aria-label', 'Hide password');
            } else {
                pwd.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
                this.setAttribute('aria-label', 'Show password');
            }
        });
    </script>
</body>
</html>
