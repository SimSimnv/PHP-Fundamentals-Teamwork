<?php
require_once 'app.php';
$result = [];
if(isset($_GET['term'])){
    $stmt = $db->prepare('SELECT * FROM questions WHERE title LIKE ?');
    $word = $_GET['term'];
    $stmt->execute(["%$word%"]);
    while ($row = $stmt->fetch()){
        $result[] = $row['title'];
    }
    echo json_encode($result);
}
