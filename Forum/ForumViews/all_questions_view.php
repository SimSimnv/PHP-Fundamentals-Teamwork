<?php /**
 * @var $data \ForumData\Questions\AllQuestions
 * @var $service \ForumServices\CrudServices\CrudService
 * @var $tag \ForumData\Tags\Tag
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
        <?php foreach ($data->getQuestions() as $question) : ?>
            <div class="question-and-answer-container">
            <p><?= htmlspecialchars($question->getUsername()) ?></p>
            <h3><a href="question.php?id=<?= $question->getId(); ?>"><?= $service->cutLongText(htmlspecialchars($question->getTitle()),150)?></a></h3>
            <p>Views: <?=$question->getViews();?></p>
                <?php foreach ($question->getTags() as $tag):?>
                    <a href="" class="forum-tag"><?=htmlspecialchars($tag->getName());?></a>
                <?php endforeach;?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="container text-center">
    <ul class="pagination">
        <?php if($service->getCurrentPage()>1):?>
            <li>
                <a href="all_questions.php?page=<?=$service->getCurrentPage()-1?>">&laquo;</a>
            </li>
        <?php endif;?>

        <?php for($i=1; $i<=$service->getMaxPage(); $i++):?>
            <li><a href="all_questions.php?page=<?=$i;?>" class="<?=($service->getCurrentPage()==$i)?'current-page':'page';?>"><?=$i?></a></li>
        <?php endfor;?>

        <?php if($service->getCurrentPage()<$service->getMaxPage()):?>
            <li><a href="all_questions.php?page=<?=$service->getCurrentPage()+1?>">&raquo;</a></li>
        <?php endif;?>

    </ul>
</div>

