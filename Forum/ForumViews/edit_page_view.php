<?php
/**
 * @var $data \ForumData\Questions\QuestionAndAnswers;
 */
$tags = [];
foreach ($data->getQuestion()->getTags() as $tag){
    $tags[] = $tag->getName();
}
?>
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('ForumStyles/img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Welcome to Enywas Forum</h1>
                    <hr class="small">
                    <span class="subheading">Create Enywas Forum Topic</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <p>Edit Question Form</p>
            <form name="sentMessage" id="contactForm" novalidate method="post">
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Title" id="title" name="title" value="<?= $data->getQuestion()->getTitle() ?>" data-validation-required-message="Please enter your title here." required>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Body</label>
                        <textarea style="resize: both" rows="10" cols="30" class="form-control" placeholder="Body" id="body" name="body" data-validation-required-message="Please enter your body here." required><?= $data->getQuestion()->getBody() ?></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Tags</label>
                        <input type="text" class="form-control" placeholder="Comma separated tags" id="tags" name="tags" value="<?=implode(', ',$tags)?>" required>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <input type="hidden" name="question_id" value="<?=$data->getQuestion()->getId()?>">
                        <button type="submit" class="btn btn-primary btn-xs" name="edit_question">Edit</button>
                        <a class="btn btn-primary btn-xs" href="admin_panel.php">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
