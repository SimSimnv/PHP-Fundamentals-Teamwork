<?php
require_once 'app.php';
$result = [];
if(isset($_GET['term'])){
    $stmt = $db->prepare('SELECT * FROM questions WHERE body LIKE ? OR title LIKE ?');
    $word = $_GET['term'];
    $stmt->execute(["%$word%","%$word%"]);
    while ($row = $stmt->fetch()){
        $result[] = $row['title'];
    }
    echo json_encode($result);
}
