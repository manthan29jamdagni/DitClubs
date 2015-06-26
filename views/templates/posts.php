 <?php
                //This Piece of code retrieves status from the data base
                    $res=$db->fetch_status();
                    $num=$res->num_rows;
                    if($num>20)
                        $num_posts=20;
                    else
                        $num_posts=$num;
                    
                    for($i=1;$i<=$num_posts;$i++)
                    {   
                        $ress=mysqli_fetch_assoc($res);
                        $que="SELECT name FROM user WHERE uid=".$ress['uid'];
                        $reslt=$db->conn->query($que);
                        $row=mysqli_fetch_assoc($reslt);
                        $ress['name']=$row['name'];
                        $arr_posts[]=$ress;
                        
                    }  
                    $posts=json_encode($arr_posts);

?>
<script type="text/javascript">
    var xy=<?php echo $posts; ?>;
    console.log(xy[0].name);

</script>
