<?php /* @var $data \ForumData\Questions\QuestionAndAnswers*/?>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('ForumStyles/img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Welcome to Enywas Forum</h1>
                    <hr class="small">
                    <span class="subheading">Answer question</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->

<h1><?= $data->getQuestion()->getTitle();?></h1>
<h3><?= $data->getQuestion()->getUsername();?></h3>
<p><?= $data->getQuestion()->getBody();?></p>


<div class="container">
    <h1>Answers</h1>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <table border="3" style="width: 100%; height: 100%">
                <thead>
                <tr>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($data->getAllAnswers()->getAnswers() as $answer) :?>
                    <tr>
                        <td><?=htmlspecialchars($answer->getAuthor())?></td>
                        <td><?=htmlspecialchars($answer->getEmail())?></td>
                        <td><?=htmlspecialchars($answer->getBody())?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<hr>
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