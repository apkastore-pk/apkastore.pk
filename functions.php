<?php
// Database connection and functions

function getDB() {
    $db = new SQLite3('database.db');
    return $db;
}

// Get all products
function getProducts() {
    $db = getDB();
    $results = $db->query("SELECT * FROM products ORDER BY id DESC");
    
    $products = [];
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        $products[] = $row;
    }
    return $products;
}

// Add demo products if table is empty
function initDB() {
    $db = getDB();
    $db->exec("CREATE TABLE IF NOT EXISTS products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        desc TEXT,
        image TEXT,
        download TEXT
    )");
    
    $count = $db->querySingle("SELECT COUNT(*) from products");
    if($count == 0) {
        $db->exec("INSERT INTO products (name, desc, image, download) VALUES 
        ('WhatsApp Plus', 'Latest mod with extra features', 'https://i.imgur.com/1.jpg', '#'),
        ('Instagram Pro', 'No ads + Download stories', 'https://i.imgur.com/2.jpg', '#'),
        ('YouTube Vanced', 'Background play + No ads', 'https://i.imgur.com/3.jpg', '#')
        ");
    }
}

initDB();
?>
