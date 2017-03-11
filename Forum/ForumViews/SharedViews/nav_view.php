<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Enywas Forum</title>

    <!-- Bootstrap Core CSS -->
    <link href="ForumStyles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="ForumStyles/css/clean-blog.min.css" rel="stylesheet">


    <link href="ForumStyles/css/custom-css.css" rel="stylesheet">

    <link rel="stylesheet" href="ForumStyles/css/forum-custom-styles.css" type="text/css">

    <!-- Custom Fonts -->
    <link href="ForumStyles/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="">Start Bootstrap</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="all_questions.php">Questions</a>
                </li>
                <?php if(!$sessionService->isLogged()): ?>
                <li>
                    <a href="login.php">Log in</a>
                </li>
                <li>
                    <a href="register.php">Register</a>
                </li>
                <?php else: ?>
                    <li>
                        <a href="ask_question.php">Ask Question</a>
                    </li>
                    <li>
                        <a href="editProfile.php">Edit Profile</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<?php /* @var $sessionService \ForumServices\SessionServices\SessionService*/
if ($sessionService->checkForMessage()): ?>

    <div class="<?=$sessionService->getMessage()->getType();?>"><?=$sessionService->getMessage()->getMessage();?></div>

<?php $sessionService->unsetMessage(); endif; ?>
