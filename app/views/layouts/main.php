<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My To-Do</title>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
		<!-- Optional theme -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  	<nav class="nav nav-pills">
      
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('home'); ?>">My To-do</a>
        </div>
        <div id="navbar" >
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url('home'); ?>">Home</a></li>
          <?php 
            if($this->session->userdata('logged_in')) :             
          ?>
            <li><a href="<?php echo base_url('lists/index'); ?>">Lists</a></li>
          <?php endif; ?>            
          </ul>
        </div><!--/.nav-collapse -->
      	<div style="float: right" class="active">
      		<ul class="nav navbar-nav">
          <?php 
            if(!$this->session->userdata('logged_in')) :             
          ?>
      			<li><a href="<?php echo base_url('users/register'); ?>">Register</a></li>
      		<?php endif; ?>
          </ul>
      	</div>
    </nav>

<div id="container"> 
	    <div class="container-fluid" >
	    	
	    		<div class="col-md-3" >
	    			<div class="well sidebar-nav" >
	    				<div style="margin: 0 0 10px 10px;">
	    				<!--Side Bar content-->	
	    					<?php $this->load->view('users/login'); ?>
	    				</div>	
	    			</div>	
	    		</div>
	    	
			    <div class="col-md-9">
			    <!--Main content-->
			    	<?php $this->load->view($main_content); ?>
				</div>
				
		</div>

</div><!--end container-->	

	<hr>
	<footer>
		<p>&copy; copyrights</p>
	</footer>

  </body>
</html>



