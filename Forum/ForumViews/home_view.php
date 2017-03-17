
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('ForumStyles/img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Enywas Forum</h1>
                    <hr class="small">
                    <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->

<hr>
<!-- Pager -->
<?php if(!$sessionService->isLogged()):?>
<ul class="pager">
    <li>
        <a href="register.php" style="padding: 40px;">New to the site? <br> Register</a>
    </li>
    &nbsp; 	&nbsp;
    <li>
        <a href="login.php" style="padding: 59px 70px 40px 70px;">Log in</a>
    </li>
</ul>
<?php else: ?>
    <h1 style="text-align: center">Greetings <?=$sessionService->getUserName();?></h1>
        <ul class="pager">
               <li>
                   <a href="all_questions.php" style="padding: 40px;">To the questions</a>
               </li>
               &nbsp; 	&nbsp;
                <li>
                    <a href="ask_question.php" style="padding: 40px;">Ask a question</a>
                </li>
        </ul>
<?php endif; ?>
<hr>