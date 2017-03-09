<?php /** @var $data \ForumData\Questions\AllQuestions */ ?>
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
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <table border="3" style="width: 100%; height: 100%">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Author</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($data->getQuestions() as $question) :?>
                        <tr>
                            <td><?=htmlspecialchars($question->getTitle())?></td>
                            <td><?=htmlspecialchars($question->getBody())?></td>
                            <td><?=htmlspecialchars($question->getUsername())?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


