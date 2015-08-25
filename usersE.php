<!DOCTYPE html>
<?php
include 'class/connection.php';
include 'class/session.php';

session_start();
$c = new connection();
?>
<html>
    <head>
        <title>Thin Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet" media="screen" />
        <link href="css/thin-admin.css" rel="stylesheet" media="screen" />
        <link href="css/font-awesome.css" rel="stylesheet" media="screen" />
        <link href="style/style.css" rel="stylesheet" />
        <link href="style/dashboard.css" rel="stylesheet" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/users.js" type="text/javascript"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="../../assets/js/html5shiv.js"></script>
              <script src="../../assets/js/respond.min.js"></script>
            <![endif]-->

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
        <?php
        $c = new connection();
        $c->query('SELECT code FROM content WHERE part="topE"');
        $content = $c->getResult();
        echo utf8_encode($content['code']);
        ?>
        <div class="wrapper">
            <?php
            $c = new connection();
            $c->query('SELECT code FROM content WHERE part="menuE"');
            $content = $c->getResult();
            echo $content['code'];
            ?>

            <div class="page-content" >
                <div class="content container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-title">User Profile</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="widget">
                                <div class="widget-header"> <i class="icon-user"></i>
                                    <h3>Employee Profile</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="body">
                                        <form data-validate="parsley" action="functions/modifyData.php" method="post" novalidate="" class="form-horizontal label-left" id="user-form" />
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3 class="no-margin"><?php echo $_SESSION["name"] ?></h3>
                                                <address>
                                                    <strong><?php echo $_SESSION["role"] ?><br />
                                                        <abbr title="Work email">e-mail:</abbr> <a href="mailto:#"><?php echo $_SESSION["email"] ?></a><br />
                                                        <abbr title="Work Phone">phone:</abbr> <?php
                                                        $c->query('SELECT * FROM users WHERE u_id=' . $_SESSION['id'] . ";");
                                                        echo $c->getResultByTag("u_phone");
                                                        ?>
                                                </address>
                                            </div>
                                        </div>
                                        <fieldset>
                                            <legend class="section">Personal Info</legend>
                                            <div class="control-group">
                                                <label for="first-name" class="control-label">First Name <span class="required">*</span></label>
                                                <div class="controls form-group">
                                                    <input type="text" class="col-xs-12 parsley-validated" required="" name="Uname" id="first-name" />
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="section">Contact Info</legend>
                                            <div class="control-group">
                                                <label class="control-label" for="" id="email-label">Password <span class="required">*</span></label>
                                                <div class="controls form-group">
                                                    <div class="col-xs-12 col-sm-8">
                                                        <div class="input-group">
                                                            <input type="password" name="psw" class="form-control parsley-validated" required="" data-trigger="change" id="psw" />
                                                            <span class="input-group-btn">
                                                            </span> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="phone">Phone <span class="required">*</span></label>
                                                <div class="controls form-group">
                                                    <div class="col-xs-12 col-sm-8">
                                                        <div class="input-group">
                                                            <input type="text" maxlength="28" name="phone" required="" class="form-control  mask parsley-validated" id="phone" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-actions">
                                            <button class="btn btn-primary" type="submit">Validate &amp; Submit</button>
                                            <button class="btn btn-default" type="reset">Cancel</button>
                                            <a class="btn btn-s-md btn-danger" href="functions/deleteEmployee.php?uId=<?php echo $_SESSION['id']; ?>">DELETE</a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $c = new connection();
        $c->query('SELECT code FROM content WHERE part="footer"');
        $content = $c->getResult();
        echo ($content['code']);
        ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="js/jquery.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="js/smooth-sliding-menu.js"></script> 

    </body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

