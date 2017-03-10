<?php /** @var $data \ForumData\Questions\QuestionAndAnswers */ ?>
<header class="intro-header" style="background-image: url('ForumStyles/img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Welcome to Enywas Forum</h1>
                    <hr class="small">
                    <span class="subheading">All Questions</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div style="text-align: center">
            <h1>
                <a href="all_questions.php">Back to Questions</a>
            </h1>
            <h3>Question</h3>
            <div style="background: #f7ecb5;">
                <p><?= htmlspecialchars($data->getQuestion()->getUsername()) ?></p>
                <h2><?= htmlspecialchars($data->getQuestion()->getTitle()) ?></h2>
                <p><?= htmlspecialchars($data->getQuestion()->getBody())?></p>
            </div>
            <?php if ($data->areThereAnyAnswers()) : ?>
                <h3>Answers</h3>
            <?php endif; ?>
            <?php foreach ($data->getAllAnswers() as $answer) : ?>
                <div style="background: #f7ecb5;">
                    <p><?= htmlspecialchars($answer->getAuthor() == null ? 'Anonymous' : $answer->getAuthor()); ?></p>
                    <h2><?= htmlspecialchars($answer->getBody()); ?></h2>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


