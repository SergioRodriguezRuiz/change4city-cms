<!DOCTYPE html>
<?php
include 'class/connection.php';
include 'class/session.php';
header('Content-Type: text/html; charset=utf-8');

session_start();
?>
<html>
    <head>
        <title>BACKEND PROYECTO</title>
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
                <div class="content container" id="mainContent">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-title">Dashboard <small><?php echo 'User: ' . $_SESSION["name"] . ' | Role: ' . $_SESSION["role"] . ' | #ID Employee: ' . $_SESSION['idE'] ?></small></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="widget">
                                <div class="widget-header"> <i class="icon-align-left"></i>
                                    <h3>New event</h3>
                                </div>
                                <div class="widget-content">
                                    <form method="post" class="form-horizontal" action="functions/saveSell.php">
                                        <fieldset>
                                                <div class="col-md-12">
                                                    <label for="disabled-input" class="control-label ">#ID of Employee</label>
                                                    <div class="form-group">
                                                        <input name="idEmployee" readonly="" type="text" value="<?php echo $_SESSION['idE'] ?>" class="form-control" id="disabled-input">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="disabled-input" class="control-label ">Theme</label>
                                                    <div class="form-group">
						      <input name="typeEvent" type="text" class="form-control" id="combined-input">                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="disabled-input" class="control-label">Name</label>
                                                    <div class="form-group">
                                                            <input name="nameEvent" type="text" class="form-control" id="combined-input">
                                                    </div>
                                                </div>
					    <div class="control-group">
						<div class="col-md-12">
                                                    <label for="combined-input" class="control-label">Date</label>
                                                    <div class="form-group">
                                                            <input name="dateEvent" type="date" class="form-control" id="combined-input">
                                                    </div>
                                                </div>
					    </div>
					    <div class="control-group">
                                                <div class="col-md-12">
                                                    <label for="combined-input" class="control-label">Place</label>
                                                    <div class="form-group">
                                                            <input name="placeEvent" type="text" class="form-control" id="combined-input">
                                                    </div>
                                                </div>
                                            </div>    
					    <div class="control-group">	    
                                                <div class="col-md-12">
                                                    <label for="combined-input" class="control-label">Relevance</label>
                                                    <div class="form-group">
                                                            <input name="relevanceEvent" type="number" class="form-control" id="combined-input">
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="control-group">	 
                                                <div class="col-md-12">
                                                    <label for="combined-input" class="control-label">Description</label>
                                                    <div class="form-group">
                                                            <textarea id="descriptionEvent" rows="20" name="descriptionEvent" class="form-control"></textarea>
                                                    </div>
                                                </div>
					    </div>      
                                        </fieldset>
                                        <div class="form-actions">
                                            <div>
                                                <button class="btn btn-primary" type="submit">Save Event</button>
                                                <button class="btn btn-default" type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-lg-4">
                            <div class="widget">
                                <div class="widget-header"> <i class="icon-align-left"></i>
                                    <h3>New Petition</h3>
                                </div>
                                <div class="widget-content">
                                    <form method="post" class="form-horizontal" action="functions/savePetition.php">
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="col-md-12">
                                                    <label for="combined-input" class="control-label">Name</label>
                                                    <div class="form-group">
                                                            <input name="namePet" type="text" class="form-control" id="combined-input">
                                                    </div>
                                                </div>

						<div class="col-md-12">
                                                    <label for="combined-input" class="control-label">Date</label>
                                                    <div class="form-group">
                                                            <input name="datePet" type="date" class="form-control" id="combined-input">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <label for="combined-input" class="control-label">Theme</label>
                                                    <div class="form-group">
                                                            <input name="themePet" type="text" class="form-control" id="combined-input">
                                                    </div>
                                                </div>
                                               
                                                
                                                <div class="col-md-12">
                                                    <label for="combined-input" class="control-label">Description</label>
                                                    <div class="form-group">
                                                            <textarea id="descriptionPet" rows="20" name="descriptionPet" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                        </fieldset>
                                        <div class="form-actions">
                                            <div>
                                                <button class="btn btn-primary" type="submit">Save Petition</button>
                                                <button class="btn btn-default" type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="widget">
                                <div class="widget-header"> <i class="icon-align-left"></i>
                                    <h3>New Video</h3>
                                </div>
                                <div class="widget-content">
                                    <form method="post" class="form-horizontal" action="functions/saveVideo.php">
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="col-md-12">
                                                    <label for="combined-input" class="control-label">Name</label>
                                                    <div class="form-group">
                                                            <input name="namePet" type="text" class="form-control" id="combined-input">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="combined-input" class="control-label">Theme</label>
                                                    <div class="form-group">
                                                            <input name="themePet" type="text" class="form-control" id="combined-input">
                                                    </div>
                                                </div>
                                        </fieldset>
                                        <div class="form-actions">
                                            <div>
                                                <button class="btn btn-primary" type="submit">Save Video</button>
                                                <button class="btn btn-default" type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
		    
        
                        <div class="col-lg-12">
                            <div class="widget">
                                <div class="widget-header"> <i class="icon-columns"></i>
                                    <h3 id='event'>List of Events</h3>
                                </div>
                                <div class="widget-content">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name of event</th>
                                                <th>Theme</th>
                                                <th>Place</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                                // The data to send to the API

					    $ch = curl_init('api-city.herokuapp.com/api/events');
					    
					    
					    curl_setopt_array($ch, array(
					    CURLOPT_RETURNTRANSFER => TRUE,
					    CURLOPT_HTTPHEADER => array(
						'Content-Type: application/json'
					    ),
					    ));
					    
					    // Send the request
					    $response = curl_exec($ch);
					    
					    if($response === FALSE){
					    echo 'error post php tp api';
					    } else {
					      $array = json_decode($response);
					    }
					    
					    foreach($array as $obj) {
						    echo '<tr>';
                                                    echo '<td>' . $obj->name . '</td>';
                                                    echo '<td>' . $obj->type . '</td>';
                                                    echo '<td>' . $obj->place . '</td>';
                                                    echo '<td>' . $obj->date . '</td>';
                                                    echo '<td><a class="btn btn-s-md btn-danger" href="functions/deleteEvent.php?eId='.$obj->_id.'">DELETE</a></td>';
                                                    echo '</tr>';
					    }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
			<div class="col-lg-12">
			 <div class="widget">
                                <div class="widget-header"> <i class="icon-columns"></i>
                                    <h3 id='petition'>List of Petitions</h3>
                                </div>
                                <div class="widget-content">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name of event</th>
                                                <th>Theme</th>
                                                <th>Date</th>
                                                <th>Pros</th>
                                                <th>Cons</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                                // The data to send to the API

					    $ch = curl_init('api-city.herokuapp.com/api/petitions');
					    
					    
					    curl_setopt_array($ch, array(
					    CURLOPT_RETURNTRANSFER => TRUE,
					    CURLOPT_HTTPHEADER => array(
						'Content-Type: application/json'
					    ),
					    ));
					    
					    // Send the request
					    $response = curl_exec($ch);
					    
					    if($response === FALSE){
					    echo 'error post php tp api';
					    } else {
					      $array = json_decode($response);
					    }
					    
					    foreach($array as $obj) {
						    if($obj->close) {
						    echo '<tr class="closePet">';
						    } else {
						    echo '<tr>';
						    }
						    
                                                    echo '<td>' . $obj->name . '</td>';
                                                    echo '<td>' . $obj->theme . '</td>';
                                                    echo '<td>' . $obj->date . '</td>';
                                                    echo '<td>' . $obj->positive . '</td>';
                                                    echo '<td>' . $obj->negative . '</td>';
                                                    echo '<td><a class="btn btn-s-md btn-danger" href="functions/deletePetition.php?eId='.$obj->_id.'">DELETE</a></td>';
                                                    if(!$obj->close) {
						      echo '<td><a class="btn btn-s-md btn-primary boclo" href="functions/closePetition.php?eId='.$obj->_id.'">CLOSE</a></td>';
                                                    }
                                                    echo '</tr>';
					    }
                                            ?>
                                        </tbody>
                                    </table>
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
        <?php
        //CLOSE CONNECTION
        $c->close();
        ?>
    </body>
</html>
