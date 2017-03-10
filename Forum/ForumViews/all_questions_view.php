<?php /**
 * @var $data \ForumData\Questions\AllQuestions
 * @var $service \ForumServices\CrudServices\CrudService
 */ ?>
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
            <table border="3" style="width: 100%; height: 100%; text-align: center">
                <thead>
                <tr>
                    <th style="text-align: inherit">Author</th>
                    <th style="text-align: inherit">Title</th>
                    <th style="text-align: inherit">More</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($data->getQuestions() as $question) : ?>
                        <tr>
                            <td><?=htmlspecialchars($question->getUsername())?></td>
                            <td><?= $service->cutLongText(htmlspecialchars($question->getTitle())) ;?></td>
                            <td>
                                <a href="details_page.php?id=<?= $question->getId(); ?>">More details here</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


