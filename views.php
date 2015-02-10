<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DIT CLUBS</title>

    <!-- Bootstrap -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
		.height{
			height: 100%;
		}
        .pad
        {
            padding: 10px;
        }
        .imglogo1
        {
            height: 50px;
            width:50px;
            
        }
        .imglogo
        {
            height: 30px;
            width:50px;
            
        }
        .color{
            color: #222;

        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body background="images/bck.jpg">
    <nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
              <a class="navbar-brand" href="#">
                <img alt="Brand" class="imglogo" src="./images/logo.png"/> </a>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
                    <li><a href="#"><?php if(isset($event))echo $event['name'];?></a>
                    </li>
                    <li><img class="imglogo1" src="<?php echo $userData['picture']; ?>" alt=""/></li>
                </ul>
            </div> 
        </div>
    </nav>

    <div class="container-fluid ">
    	<div class="row ">
    		<div class="col-md-3 ">
    			<div class="well">
					<div class="lead">Your Groups</div>
                    <hr class="color">
					<ul class="list-unstyled">
						<a href="#"><li>Google Student Community</li></a>
						<a href="#"><li>IEEE</li></a>
						<a href="#"><li>CODEGENX</li></a>
					</ul>
				</div>
    		</div>
    		<div class="col-md-6 ">
                <div class="container-fluid well">
                        <p class="lead">Manthan Jamdagni</p>
            			<div class="well list-inline"><textarea class="form-control" rows="3" placeholder="Share Info To The Club Members"></textarea> 
                        <button class="btn btn-default list-inline type="submit" ">SayIt</button>
                        </div>  
                 </div>         
                <div class="container-fluid well">
                    <p class="lead">Mr XyZ</p>
                    <article>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium quis, neque. Autem quis illum hic dolores ad odit odio magnam nostrum, in aliquam quaerat nulla, explicabo repellat inventore corrupti vitae.</p>
                    </article>
                </div>
            </div>
            <div class="col-md-3">
    			<div class="well"><p class="lead">All Clubs</p>
                    <table class="table table-hover">
                        <tr>
                            <a href=""><td>CLUB1</td></a>
                        </tr>
                        <tr>
                            <a href=""><td>CLUB2</td></a>
                        </tr>
                        <tr>
                            <a href=""><td>CLUB3</td></a>
                        </tr>
                        <tr>
                            <a href=""><td>CLUB4</td></a>
                        </tr>
                        <tr>
                            <a href=""><td>CLUB5</td></a>
                        </tr>
                        <tr>
                            <a href=""><td>CLUB6</td></a>
                        </tr>
                        <tr>
                            <a href=""><td>CLUB7</td></a>
                        </tr>
                        <tr>
                            <a href=""><td>CLUB8</td></a>
                        </tr>
                        <tr>
                            <a href=""><td>CLUB9</td></a>
                        </tr>
                        <tr>
                            <a href=""><td>CLUB10</td></a>
                        </tr>
                    </table>
                </div>

    		</div>
    	</div>
    </div>
    <section class="nav navbar navbar-default ">
        <p class="lead text-center">Webapp Designed & Developed By <a href="https://www.facebook.com/aphulera">Google Student Community DIT</a></p>
            <p class="text-center">Email us at <a href="">developers@gscdit.com</a>.</p>
            
            <ul class="list-inline text-center">
                <li><strong>Follow Us On:</strong></li>
                <li><a href="">Google+</a></li>
                <li><a href="">Facebook</a></li>
                <li><a href="">Twitter</a></li>
            </ul>
            
        </section>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

