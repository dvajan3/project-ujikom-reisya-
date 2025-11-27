<?php
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

// Setup SQLite connection
$sqliteDb = new Capsule;
$sqliteDb->addConnection([
    'driver' => 'sqlite',
    'database' => __DIR__ . '/database/database_new.sqlite',
]);
$sqliteDb->setAsGlobal();
$sqliteDb->bootEloquent();

// Setup MySQL connection
$mysqlDb = new Capsule;
$mysqlDb->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'database' => 'emading',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
], 'mysql');

echo "Starting backup from SQLite to MySQL...\n";

try {
    // Backup Users
    $users = $sqliteDb->table('user')->get();
    foreach ($users as $user) {
        $mysqlDb->connection('mysql')->table('user')->updateOrInsert(
            ['id_user' => $user->id_user],
            (array) $user
        );
    }
    echo "Users backed up: " . count($users) . "\n";

    // Backup Categories
    $categories = $sqliteDb->table('kategori')->get();
    foreach ($categories as $category) {
        $mysqlDb->connection('mysql')->table('kategori')->updateOrInsert(
            ['id_kategori' => $category->id_kategori],
            (array) $category
        );
    }
    echo "Categories backed up: " . count($categories) . "\n";

    // Backup Articles
    $articles = $sqliteDb->table('artikel')->get();
    foreach ($articles as $article) {
        $mysqlDb->connection('mysql')->table('artikel')->updateOrInsert(
            ['id_artikel' => $article->id_artikel],
            (array) $article
        );
    }
    echo "Articles backed up: " . count($articles) . "\n";

    // Backup Comments
    $comments = $sqliteDb->table('comments')->get();
    foreach ($comments as $comment) {
        $mysqlDb->connection('mysql')->table('comments')->updateOrInsert(
            ['id' => $comment->id],
            (array) $comment
        );
    }
    echo "Comments backed up: " . count($comments) . "\n";

    echo "Backup completed successfully!\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}