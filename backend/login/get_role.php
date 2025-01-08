<?php

require_once '../../db/connect-db.php';

try {
    $sql = "SELECT * FROM `role`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($roles as $index => $val) {
        if ($val['role'] === 'admin') {
            unset($roles[$index]);
        }
    };

    unset($roles['role']['admin']);

} catch (PDOException $error) {
    echo "Error";
}