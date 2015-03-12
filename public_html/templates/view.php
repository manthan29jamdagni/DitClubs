<?php if (isset($authUrl)): ?>
<div class="lead well center">DIGI CAMPUS DIT</div>
<div class="box">
  
	<!-- Show Login if the OAuth Request URL is set TRYST15WK11/N9B33G-->
    
	  <img src="images/user.png" width="100px" size="100px" /><br/>
      <a class='login' href='<?php echo $authUrl; ?>'><img class='login' src="images/sign-in-with-google.png" width="250px" size="54px" /></a>
   </div>   
<?php elseif(isset($_SESSION['access_token'])) :?>	
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
                        <p class="lead"><?php if (isset($userData['name'])) {
                            echo $userData['name'];
                        }?></p>
            			
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">    
                            <div class="col-xs-9">
                                <textarea class="form-control" name="post" required="required" rows="3" placeholder="Share Info To The Club Members"></textarea> 
                            </div>
                            <div class="col-xs-3">
                                <button class="btn btn-default list-inline" type="submit" name="submit">SayIt</button>
                            </div>
                            </form>
                         
                 </div>         
                <?php
                //This Piece of code retrieves status from the data base
                    $res=$db->fetch_status();
                    
                    foreach ($res as $key) 
                    {
                        $que="SELECT name FROM user WHERE uid=".$key['uid'];
                        //$uname="SELECT name FROM user WHERE "
                        $reslt=mysqli_query($db->conn,$que);
                        $row=mysqli_fetch_assoc($reslt);
                        echo "<div class=\"container-fluid well\">";
                        echo "<p class=\"lead\">".$row['name']."</p>";
                        echo "<article>
                        <p>".$key['post']."</p>";
                        echo"<form method=\"POST\" action=".$_SERVER['PHP_SELF'].
                            "/?pid=".$key['pid']."><div class=\"input-group\">
                                <input type=\"text\" class=\"form-control\" placeholder=\"Wanna Comment\" name=\"comment\">
                                    <span class=\"input-group-btn\">
                                     <button class=\"btn btn-default\" type=\"submit\" name=\"commSubmit\" type=\"button\">Comment</button>
                                    </span>
                                </div>
                            </form> </article> </div>";  
                    }
                    //$comnt=$db->fetch_comment('5');
                    //foreach ($comnt as $key) {
                    //	echo $key['comment'];
                    //}
                    


                 ?>
                 </div>
            
            <div class="col-md-3 navbar-fixed">
    			<div class="well"><p class="lead">All Clubs</p>
                    <table class="table table-hover">
                        <tr>
                            <td><a href="">CLUB1</a></td>
                        </tr>
                        <tr>
                            <td><a href="">CLUB2</a></td>
                        </tr>
                        <tr>
                            <td><a href="">CLUB3</a></td>
                        </tr>
                        <tr>
                            <td><a href="">CLUB4</a></td>
                        </tr>
                        <tr>
                            <td><a href="">CLUB5</a></td>
                        </tr>
                        <tr>
                            <td><a href="">CLUB6</a></td>
                        </tr>
                        <tr>
                            <td><a href="">CLUB7</a></td>
                        </tr>
                        <tr>
                            <td><a href="">CLUB8</a></td>
                        </tr>
                        <tr>
                            <td><a href="">CLUB9</a></td>
                        </tr>
                        <tr>
                            <td><a href="">CLUB10</a></td>
                        </tr>
                    </table>
                </div>

    		</div>
    	</div>
    </div>

<?php endif ?>
