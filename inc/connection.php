<?php

try {
    $db = new PDO("sqlite:/www/" . getenv('REPOSITORY'));
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}