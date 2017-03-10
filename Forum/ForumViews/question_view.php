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
<!-- Registration form -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <p>Answer form</p>
            <form name="sentMessage" id="contactForm" novalidate method="post">
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Author</label>
                        <input type="text" class="form-control" placeholder="Enter your name" id="name" name="author" >
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Answer</label>
                        <textarea style="resize: both" rows="10" cols="30" class="form-control" placeholder="Body" id="body" name="body" data-validation-required-message="Please enter your answer here." required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-default" name="answerQuestion">Answer Question</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

