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
            <h3><a href="question.php?id=<?= $question->getId(); ?>"><?= $service->cutLongText(htmlspecialchars($question->getTitle()),150)?></a><div class="box"><iframe frameborder="0" class="page-hint" src="question.php?id=<?= $question->getId(); ?>"></iframe></div></h3>
                <?php foreach ($question->getTags() as $tag):?>
                    <a href="" class="forum-tag"><?=htmlspecialchars($tag->getName());?></a>
                <?php endforeach;?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="container text-center">

    <?php if($service->getCurrentPage()>1):?>
        <a href="all_questions.php?page=<?=$service->getCurrentPage()-1?>">Previous</a>
    <?php endif;?>

    <?php for($i=1; $i<=$service->getMaxPage(); $i++):?>
        <a href="all_questions.php?page=<?=$i;?>" class="<?=($service->getCurrentPage()==$i)?'current-page':'page';?>">[<?=$i?>]</a>
    <?php endfor;?>

    <?php if($service->getCurrentPage()<$service->getMaxPage()):?>
        <a href="all_questions.php?page=<?=$service->getCurrentPage()+1?>">Next</a>
    <?php endif;?>

</div>


