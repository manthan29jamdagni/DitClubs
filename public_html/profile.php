<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Page</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<style type="text/css">
    body
    {
      background:#1B7E5A;
      font-size: 16px;
      line-height: 1.5;
    }
    .container
    {
      padding: 25px
    }
    .col-md-12
    {
      text-align: center;
      text-decoration: underline;
      color: skyblue;
    }
    .col-md-3
    {
      padding: 10px;
      background:#232323;
      font-size: 18px;
      line-height: 40px;
      color:#FFFFFF;
    }
    ul
    {
      margin: 0;
    }
    li
    {
      list-style-type: none;
      border-bottom: 1px solid #2e2e2e;
    }
    li:hover
    {
      background: #161616;
      -webkit-transition: 0.3s linear;
      -moz-transition: 0.3s linear;
      -ms-transition: 0.3s linear;
      -o-transition: 0.3s linear;
      transition: 0.3s linear;
    }
    .avatar
    {
      width: 100%;
    }
    </style>
<body>
  <div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
          <h1>Yaha NavBar Ayega Homepage wala</h1>
        </div>  
    </div>
    <div class="row">
      <div class="col-md-12">
          <h1>User Profile Page</h1>
      </div>
    </div>
    <!--Profile Row Starts-->
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <div class="User-wrapper">
              <img class="avatar" src="test.jpg">
              <div class="description">
                <h5>Agnes Gru</h5>
                <h4><strong>Associated Clubs</strong></h4>
                  <ul>
                    <li>
                      <span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
                      IEEE
                    </li>
                    <li>
                      <span class="glyphicon glyphicon-yen" aria-hidden="true"></span>      
                      GSC
                    </li>
                  </ul>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="well">
              <h3>Head of:</h3>
              <hr></hr>
              Xyz club
            </div>
            <div class="aboutme well">
              <h3>About Me:</h3>
              <hr></hr>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione minus pariatur odio rem amet repellendus aliquid, vero provident. Iusto libero voluptatibus qui eum eveniet eligendi earum, repudiandae error, corrupti sequi?
            </div>
            <div class="well sociallinks">
              <div>
              <h3>Social Links:</h3>
              <hr></hr>
                <div>
                    <a href="#" class="btn btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>&nbsp; Facebook </a>

                    <a href="#" class="btn btn-social btn-google">
                            <i class="fa fa-google-plus"></i>&nbsp; Google</a>

                    <a href="#" class="btn btn-social btn-twitter">
                            <i class="fa fa-twitter"></i>&nbsp; Twitter </a>
                </div>
              </div> 
            </div>
        </div>
        <div class="col-md-3">
            <h2>All Clubs</h2>
            <ul>
              <li>IEEE</li>
              <li>GSC</li>
              <li>CodeGenX</li>
              <li>Clickarrahithi</li>
              <li>InkStorm</li>
            </ul>
        </div>
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>