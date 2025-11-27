<?php
// Backup SQLite to MySQL
$sqliteFile = __DIR__ . '/database/database_new.sqlite';
$sqliteDb = new PDO('sqlite:' . $sqliteFile);

$mysqlDb = new PDO('mysql:host=127.0.0.1;dbname=emading', 'root', '');

echo "Starting backup from SQLite to MySQL...\n";

// Backup Users
$users = $sqliteDb->query("SELECT * FROM user")->fetchAll(PDO::FETCH_ASSOC);
foreach ($users as $user) {
    $stmt = $mysqlDb->prepare("INSERT INTO user (id_user, nama, username, email, password, role, foto, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE nama=VALUES(nama), username=VALUES(username), email=VALUES(email), password=VALUES(password), role=VALUES(role), foto=VALUES(foto)");
    $email = $user['email'] ?? $user['username'] . '@example.com';
    $stmt->execute([$user['id_user'], $user['nama'], $user['username'], $email, $user['password'], $user['role'], $user['foto'] ?? null, $user['created_at'], $user['updated_at']]);
}
echo "Users: " . count($users) . "\n";

// Backup Categories
$categories = $sqliteDb->query("SELECT * FROM kategori")->fetchAll(PDO::FETCH_ASSOC);
foreach ($categories as $cat) {
    $stmt = $mysqlDb->prepare("INSERT INTO kategori (id_kategori, nama_kategori, created_at, updated_at) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE nama_kategori=VALUES(nama_kategori)");
    $stmt->execute([$cat['id_kategori'], $cat['nama_kategori'], $cat['created_at'], $cat['updated_at']]);
}
echo "Categories: " . count($categories) . "\n";

// Backup Articles
$articles = $sqliteDb->query("SELECT * FROM artikel")->fetchAll(PDO::FETCH_ASSOC);
foreach ($articles as $article) {
    $stmt = $mysqlDb->prepare("INSERT INTO artikel (id_artikel, judul, isi, tanggal, id_user, id_kategori, foto, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE judul=VALUES(judul), isi=VALUES(isi), tanggal=VALUES(tanggal), id_user=VALUES(id_user), id_kategori=VALUES(id_kategori), foto=VALUES(foto), status=VALUES(status)");
    $stmt->execute([$article['id_artikel'], $article['judul'], $article['isi'], $article['tanggal'], $article['id_user'], $article['id_kategori'], $article['foto'], $article['status'] ?? 'published', $article['created_at'], $article['updated_at']]);
}
echo "Articles: " . count($articles) . "\n";

// Backup Comments
$comments = $sqliteDb->query("SELECT * FROM comments")->fetchAll(PDO::FETCH_ASSOC);
foreach ($comments as $comment) {
    $stmt = $mysqlDb->prepare("INSERT INTO comments (id, user_id, artikel_id, content, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE content=VALUES(content), status=VALUES(status)");
    $stmt->execute([$comment['id'], $comment['user_id'], $comment['artikel_id'], $comment['content'], $comment['status'], $comment['created_at'], $comment['updated_at']]);
}
echo "Comments: " . count($comments) . "\n";

echo "Backup completed!\n";