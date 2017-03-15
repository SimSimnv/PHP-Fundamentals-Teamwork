<?php
require_once 'app.php';
if(basename($_SERVER['PHP_SELF']) === basename(__FILE__)){
    $sessionService->setMessage('Cannot access this page.','error');
    $sessionService->redirect('home.php');
}
$result = [];
if(isset($_GET['term'])){
    $stmt = $db->prepare('
SELECT * FROM 
questions 
WHERE body LIKE ?
 OR title LIKE ?
 OR title IN (	SELECT  
              questions.title
            FROM
              tags
            INNER JOIN
              questions_tags
            ON
              tags.id=questions_tags.tag_id
             INNER JOIN
				  questions
             ON questions.id = questions_tags.question_id
             WHERE tags.name LIKE ?)
 OR title IN ( SELECT
    title
  FROM 
    questions
  INNER JOIN 
    answers
  ON
    answers.question_id = questions.id
  WHERE answers.body LIKE ?
 )');
    $word = $_GET['term'];
    $stmt->execute(["%$word%","%$word%","%$word%","%$word%"]);
    while ($row = $stmt->fetch()){
        $result[] = $row['title'];
    }
    echo json_encode($result);
}
