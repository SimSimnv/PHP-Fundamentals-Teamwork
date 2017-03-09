<?php

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
                    <span class="subheading">Sign Up</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->

<hr>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h3>Your profile has been successfully updated! </h3>
        </div>
    </div>
</div>
<!-- Update User Form -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <p>Update Your Profile</p>
            <form name="updateProfile" id="contactForm" novalidate method="post">
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name" id="name" name="username" required data-validation-required-message="Please enter your name.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter Your Email Address" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Enter your Password" id="password" name="password" required data-validation-required-message="Please enter your old password.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-default" name="update">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- Change Password Form -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <p>Change your password</p>
            <form name="changePassword" id="contactForm" novalidate method="post">
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Old Password</label>
                        <input type="password" class="form-control" placeholder="Old Password" id="oldpassword" name="oldpassword" required data-validation-required-message="Please enter your old password.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>New Password</label>
                        <input type="password" class="form-control" placeholder="New Password" id="newpassword" name="newpassword" required data-validation-required-message="Please enter your new password.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm New Password" id="confirm" name="confirm" required data-validation-required-message="Please enter your new password again.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-default" name="changePassword">Change Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
