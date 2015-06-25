<?php 
require_once('controllers/oauth.php');
require_once('controllers/dbcontroller.php');
$user=$userObj->getUserData();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HOME</title>
	<meta name="viewport"
	content="width=device-width, minimum-scale=1.0,user-scalable=yes">

<script src="./bower_components/webcomponentsjs/webcomponents.js">
</script>

<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<link href="css">
<link rel="import" href="./bower_components/slide-page/slide-page.html">
<link rel="stylesheet" type="text/css" href="css/stylemat.css">
<script src="./js/handlebars-v3.0.3.js"></script>
</head>
<body>

<!--preloader starts-->
 

  <div class="progress">
      <div class="indeterminate"></div>
  </div>
        
        
<!--preloader Ends-->


<div class="fullpage" hidden>
   <slide-page>
		<section>
			<div class="center">
						<nav class="white">
  						  <div class="nav-wrapper">
      					 	 <a style="text-decoration: none;" href="#2" class="brand-logo">PROFILE</a>
                          </div>
  						</nav>
  						<div class="row"></div>
        				<div style="padding-left:25%;padding-right:25%"class="col s12 m6">
         					<div class="card blue-grey darken-1">
            					<div class="card-content white-text" id="profile">
                        
              						<span><img src="{{pic}}"></span>
              						<span class="card-title"><?php echo $user['name']?></span>
              						<p>About Me: <?php echo $user['about'];?></p>
              						<p>Branch: <?php echo $user['branch'];?></p>
              						<p>Year: <?php echo $user['year'];?></p>
              						<p>Clubs: {{#list}}{{clubs}}{{/list}}</p>
            					</div>
            					<div class="card-action">
              						<a href="#">fb aur google ki links</a>
            					</div>
          					</div>
        				</div>
						</div>
		</section>
		<section>
				<div class="center">
						<nav class="white">
  						  <div class="nav-wrapper">
      					 	 <a style="text-decoration: none;" href="#2" class="brand-logo">HOME</a>
                          </div>
  						</nav>
				  		<div class="col s12">	
				  			<div class="col s2">&nbsp</div>
				   			<div class="col s8">
				  	 			<div class="col s12">
      								<div class="row">
        							<div class="col s12">
        							
									 <!-- Modal Trigger -->
  									 <button data-target="modal1" class="btn modal-trigger">Public</button>
									 <button data-target="modal2" class="btn modal-trigger">Private</button>
									 <!-- Modal Structure -->
 										<div id="modal1" class="modal">
    										<div class="modal-content">
									     		<h4 style="color:#000000">Whats on Your Mind??</h4>
									     		<p><input style="color:#000000" type="text" placeholder="Write Your Text Here!!"></p>
										 	</div>
    									 <div class="modal-footer">
      									 	<input style="color:#000000"type="submit" value="Upload">
      									 </div>
  										</div>
				   					</div>
				   					</div>
				   					<div>
				   							<div class="row"></div>
        				<div style="padding-left:25%;padding-right:25%"class="col s12 m6">
         					<div class="card blue-grey darken-1">
            					<div class="card-content white-text">
              						<span><img src="{{pic}}"></span>
              						<span class="card-title">My Name: {{name}}</span>
              						<p>status ka maal pani</p>
            					</div>
            					<div class="card-action">
              						<a href="#">Next Status</a>
            					</div>
          					</div>
        				</div>
						</div>

				   					</div>
				   				</div>
				   			<div class="col s2">&nbsp</div>
						</div>
						</div>
		</section>
		<section>
				<div class="center">
						<nav class="white">
  						  <div class="nav-wrapper">
      					 	 <a style="text-decoration: none;" href="#3" class="brand-logo">CLUBS</a>
                          </div>
  				 <div class="row">
      			 <div class="col s6 m6 l6">
        			<div class="card-panel teal">
          			<span class="white-text"><h2>All Clubs</h2><ul>
          				<li>IEEE</li><br>
          				<li>GSC</li><br>
          				<li>FIREFOX CLUB</li><br>
          				<li>CORE GENX</li><br>
          				<li>IMPULSE</li><br>
          			</ul>
			        </span>
        			</div>
      			 </div>
   				 <div class="col s6 m6 l6">
        			<div class="card-panel teal">
          			<span class="white-text"><h2>My Clubs</h2><ul>
          				<li>IEEE</li><br>
          				<li>CORE GENX</li><br>
          				<li>IMPULSE</li><br>
          			</ul>
			        </span>
        			</div>
      			 </div>
   				 </div>
  				</div>
		</section>
   </slide-page>
 </div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
 <script type="text/javascript">
	 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });

	 $(document).ready(function(){
	 	$('div.fullpage').removeAttr('hidden');
	 });
   
</script>
 </body>
</html>