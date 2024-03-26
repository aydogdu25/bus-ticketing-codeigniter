<!DOCTYPE html>
<html lang="tr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/frontend/css/log.css">
    
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="post">
            <div class="logo-container">
                <img src="assets/frontend/img/admin.png" alt="Admin Logo">
                <h2>Admin Paneli</h2>
            </div>
            <div class="input-container">
                <input type="text" id="username" name="username" placeholder="Kullanıcı Adı" required>
                <input type="password" id="password" name="password" placeholder="Şifre" required>
            </div>
            <button type="submit">Giriş</button><br>
            <a href="<?php echo base_url() ?>"><h5 style="text-align: center;">Anasayfa</h5> </a>
            <?php if(isset($error_message)) { ?>
                <div style="color: #d81324;"><br><?php echo $error_message; ?></div>
            <?php } ?>
        </form>
    </div>
</body>
</html>
