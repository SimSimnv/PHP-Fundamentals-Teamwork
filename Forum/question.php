<?php
require_once 'app.php';
if(isset($_GET['id'])){
    $crudService=new \ForumServices\CrudServices\CrudService($db);
    $id = $_GET['id'];
    if(isset($_POST['answerQuestion'])){
        if(empty($_POST['body'])){
            $sessionService->setMessage('Answer body cannot be empty.','error');
            $sessionService->redirect("question.php?id=$id");
        }
        $crudService->answerQuestion($id, $_POST['author'], $_POST['email'], $_POST['body']);
        $sessionService->setMessage('Answered question.','info');
    }
    $questionDetails=$crudService->listQuestionDetails($id);
    $viewsRenderer->renderView('question_view',$questionDetails);
}
elseif(isset($_POST['title'])){
    $crudService=new \ForumServices\CrudServices\CrudService($db);
    $id = null;
    $questionDetails = null;
    $title = $_POST['title'];
    $questionDetails = $crudService->listQuestionDetailsByTitle($title);
    if($questionDetails === false){
        $sessionService->setMessage('Invalid search argument.','error');
        $sessionService->redirect(basename($_SERVER['PHP_SELF']));
    }

    if(isset($_POST['answerQuestion'])){
        if(empty($_POST['body'])){
            $sessionService->setMessage('Answer body cannot be empty.','error');
            $sessionService->redirect("question.php?id=$id");
        }

        $title = $_POST['title'];
        $id = $questionDetails->getQuestion()->getId();
        $crudService->answerQuestion($id, $_POST['author'], $_POST['email'], $_POST['body']);
        $sessionService->setMessage('Answered question.','info');
    }
    $viewsRenderer->renderView('question_view',$questionDetails);
}else{
    var_dump($_POST['title']);
//    $sessionService->setMessage('Don\'t try this at home.','error');
//    $sessionService->redirect('all_questions.php');
}

