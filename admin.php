<!DOCTYPE html>
<?php
include 'class/connection.php';
include 'class/session.php';
header('Content-Type: text/html; charset=utf-8');

session_start();

//DATA OF STAT
$c = new connection();
$c->query('SELECT c_name FROM customers ORDER BY c_id DESC LIMIT 1;');
$newCustomers = $c->getResultByTag(0);
$c->query('SELECT SUM(s_amount) FROM sell');
$amount = $c->getResultByTag(0);
$c->query('SELECT u_name FROM users WHERE u_role="employee"');
$best = $c->getResultByTag(0);
$bad = $c->getResultByTag(0);
?>
<html>
    <head>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("visualization", "1.1", {packages: ["bar"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Year', 'sales'],
                    ['January',0],
                    ['February',0],
                    ['March', 0],
                    ['April', 0],
                    ['May', 0],
                    ['June', 0],
                    ['July', 0],
                    ['August', 0],
                    ['September', 0],
                    ['October', 0],
                    ['November', 0],
                    ['December', 0]
                ]);


                var xmlhttp;
                var xmlDoc;
                var x;
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        xmlDoc = xmlhttp.responseXML;
                        x = xmlDoc.getElementsByTagName("mes");
                        for (var i = 0; i < x.length; i++) {
                            var mes = x[i].getAttribute('mes');
                            switch (mes) {
                                case '01':
                                    var n = parseFloat(data.getValue(0, 1)) + parseFloat(x[i].textContent);
                                    data.setValue(0, 1, n);
                                    break;
                                case '02':
                                    var n = parseFloat(data.getValue(1, 1)) + parseFloat(x[i].textContent);
                                    data.setValue(1, 1, n);
                                    break;
                                case '03':
                                    var n = parseFloat(data.getValue(2, 1)) + parseFloat(x[i].textContent);
                                    data.setValue(2, 1, n);
                                    break;
                                case '04':
                                    var n = parseFloat(data.getValue(3, 1)) + parseFloat(x[i].textContent);
                                    data.setValue(3, 1, n);
                                    break;
                                case '05':
                                    var n = parseFloat(data.getValue(4, 1)) + parseFloat(x[i].textContent);
                                    data.setValue(4, 1, n);
                                    break;
                                case '06':
                                    var n = parseFloat(data.getValue(5, 1)) + parseFloat(x[i].textContent);
                                    data.setValue(5, 1, n);
                                    break;
                                case '07':
                                    var n = parseFloat(data.getValue(6, 1)) + parseFloat(x[i].textContent);
                                    data.setValue(6, 1, n);
                                    break;
                                case '08':
                                    var n = parseFloat(data.getValue(7, 1)) + parseFloat(x[i].textContent);
                                    data.setValue(7, 1, n);
                                    break;
                                case '09':
                                    var n = parseFloat(data.getValue(8, 1)) + parseFloat(x[i].textContent);
                                    data.setValue(8, 1, n);
                                    break;
                                case '10':
                                    var n = parseFloat(data.getValue(9, 1)) + parseFloat(x[i].textContent);
                                    data.setValue(9, 1, n);
                                    break;
                                case '11':
                                    var n = parseFloat(data.getValue(10, 1)) + parseFloat(x[i].textContent);
                                    data.setValue(10, 1, n);
                                    break;
                                case '12':
                                    var n = parseFloat(data.getValue(11, 1)) + parseFloat(x[i].textContent);
                                    data.setValue(11, 1, n);
                                    break;
                            }
                        }
                        chart.draw(data, options);
                    }
                }
                xmlhttp.open("GET", "./functions/getDataGraph.php", true);
                xmlhttp.send();

                var options = {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales',
                    }
                };
                var chart = new google.charts.Bar(document.getElementById('columnchart'));
                chart.draw(data, options);
            }
        </script>

        <title>BACKEND PROYECTO FINAl</title>
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

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    </head>
    <body>
        <?php
        $c = new connection();
        $c->query('SELECT code FROM content WHERE part="top"');
        $content = $c->getResult();
        echo utf8_encode($content['code']);
        ?>
        <div class="wrapper">
            <?php
            $c = new connection();
            $c->query('SELECT code FROM content WHERE part="menu"');
            $content = $c->getResult();
            echo $content['code'];
            ?>
            <div class="page-content" >
                <div class="content container" id="mainContent">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-title">Dashboarsd <small><?php echo 'User: ' . $_SESSION["name"] . ' Role: ' . $_SESSION["role"] ?></small></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>All Stats</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <h6 class="bigstats">Stats to the Admin</h6>
                                        <div class="cf" id="big_stats">
                                        
                                            <div class="stat"> <i class="icon-thumbs-up"></i><p>Best Petition</p><h3><?php echo $best ?></h3> </div>
                                            <!-- .stat -->

                                            <div class="stat"> <i class="icon-thumbs-down"></i><p>Worse Petition</p><h3><?php echo $bad ?></h3> </div>
                                            <!-- .stat --> 
                                        </div>
                                        <!-- /widget-content --> 

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="widget">
                                <div class="widget-header"> <i class="icon-tasks"></i>
                                    <h3>Dashboard Widget</h3>
                                </div>
                                <div class="widget-content">
                                    <div id="columnchart"></div>
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
        echo $content['code'];
        ?>      
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="js/jquery.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="js/smooth-sliding-menu.js"></script> 

    </body>
</html>
