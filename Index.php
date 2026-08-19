<?php
// APKASTORE.PK - Main Page
session_start();
include 'functions.php';

$products = getProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApkaStore.PK - Free APK Downloads</title>
    <style>
        body{font-family:Arial,sans-serif;background:#0f172a;color:#fff;margin:0;padding:20px}
        h1{text-align:center;color:#22c55e}
        .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:15px}
        .card{background:#1e293b;padding:15px;border-radius:10px}
        .card img{width:100%;border-radius:8px}
        .btn{background:#22c55e;color:#fff;padding:10px 15px;border:none;border-radius:6px;text-decoration:none;display:inline-block;margin-top:10px}
    </style>
</head>
<body>
    <h1>📱 ApkaStore.PK</h1>
    <p style="text-align:center">Download Latest APKs for Free</p>
    
    <div class="grid">
    <?php foreach($products as $p): ?>
        <div class="card">
            <img src="<?php echo $p['image']; ?>" alt="<?php echo $p['name']; ?>">
            <h3><?php echo $p['name']; ?></h3>
            <p><?php echo $p['desc']; ?></p>
            <a href="<?php echo $p['download']; ?>" class="btn">Download APK</a>
        </div>
    <?php endforeach; ?>
    </div>
</body>
</html>
