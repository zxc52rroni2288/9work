<?php

require 'vendor/autoload.php';

use App\Database;

try {
    $database = new Database('localhost', 'your_database', 'your_username', 'your_password');
    $users = $database->getUsers();

    foreach ($users as $user) {
        echo sprintf("ID: %d, Name: %s, Email: %s\n", $user['id'], $user['name'], $user['email']);
    }
} catch (\RuntimeException $e) {
    echo $e->getMessage();
}
