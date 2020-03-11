<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

    .carousel-inner img{
  height: 600px;
  width:100%;
  }



  </style>
</head>
<body style="background: #F0FFFF">
<div class="container-fluid text-center" style="width: 100%"><img src="../../assets/css/logo.jpg" width="300px"><img src="../../assets/css/front.jpg" width="500px" height="300px"><img src="../../assets/css/logo.jpg" width="300px"></div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="../../assets/css/lo.jpg" width="200%" height="180%"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"><h5><b>Home</b></h5></a></li>
        <li><a href="#"><h5><b>About</b></h5></a></li>
        <li><a href="#"><h5><b>Projects</b></h5></a></li>
        <li><a href="#"><h5><b>Contact</b></h5></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><b><span class="glyphicon glyphicon-log-in"></span> Login</a></b></li>
      </ul>
    </div>
  </div>
</nav>
  
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav" style="background: #20B2AA">
       
      
      <br><h4><a href="#">MEDICAL</a></h4><br>
     <br><h4><a href="#">NUTRITION</a></h4><br>
      <br><h4><a href="#">PSYCHOLOGY</a></h4><br>
      <br><h4><a href="#">PRIMARY CARE</a></h4><br>
       <br><h4><a href="#">THERAPY</a></h4><br>
    </div>
    
    <div class="col-sm-8 text-left">
    <?php echo $this->session->flashdata('success_msg'); ?>
    <?php echo $this->session->flashdata('error_msg'); ?> 
      <form role="form" method="post" enctype="multipart/form-data">
      <div class="panel">
        <div class="panel-body">

          <h2>Enter Symptoms</h2>
          
          <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name" value="<?php echo set_value('name');?>" />
                <?php if (form_error('name')) {
                  echo "<span style = 'color:red'>".form_error('name')."<span>";
                }?>
            </div>
            <div class="form-group">
                <label>Age</label>
                <input class="form-control" type="text" name="age" value="<?php echo set_value('age');?>"/>
                <?php if (form_error('age')) {
                  echo "<span style = 'color:red'>".form_error('age')."<span>";
                }?>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input class="form-control" type="text" name="gender"value="<?php echo set_value('gender');?>" />
                <?php if (form_error('gender')) {
                  echo "<span style = 'color:red'>".form_error('gender')."<span>";
                }?>
            </div>
            <div class="form-group">
                <label>Religion</label>
                <input class="form-control" type="text" name="religion" required="">
            </div>
            <div class="form-group">
                <label>Religion</label>
                <input class="form-control" type="text" name="religion" value="<?php echo set_value('religion');?>"/>
                <?php if (form_error('religion')) {
                  echo "<span style = 'color:red'>".form_error('religion')."<span>";
                }?>
            </div>
            <div class="form-group">
                <label>Symptoms</label>
                <input class="form-control" type="text" name="symptoms" value="<?php echo set_value('symptoms');?>"/>
                <?php if (form_error('symptoms')) {
                  echo "<span style = 'color:red'>".form_error('symptoms')."<span>";
                }?>
            </div>
            <div class="form-group">
                <label>Symptoms1</label>
                <input class="form-control" type="text" name="symptoms1" />
            </div>
            <div class="form-group">
                <label>Symptoms2</label>
                <input class="form-control" type="text" name="symptoms2" />
            </div>
            <div class="form-group">
                <label>Symptoms3</label>
                <input class="form-control" type="text" name="symptoms3" />
            </div>
            <div class="form-group">
            <label>Picture</label>
            <input class="form-control" type="file" name="picture"/>
          </div> 

            <div class="form-group">
            <input type="submit" class="btn btn-warning" name="userSubmit" value="Add">
          </div>

          <div class="form-group">
            <input type="submit" class="btn button" name="userView" value="View">
          </div>
        </div>
      </div>


    </div>
    <div class="col-sm-2 sidenav" style="background: #20B2AA">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center" style="background: #90EE90">
  <div class="container text-center">
  
  <div class="row">
    <div class="col-sm-4">
      <p><h4><strong>Ayurdevic Medicine</strong></h4></p><br>
      <img src="../../assets/css/aur.jpg" alt="Random Name" width="50%">
    </div>
    <div class="col-sm-4">
      <p><h4><strong>Homopethy Medicine</strong></h4></p><br>
      <img src="../../assets/css/homo.jpg" alt="Random Name" width="50%">
    </div>
    <div class="col-sm-4">
      <p><h4><strong>Aulopathy Medicine</strong></h4></p><br>
      <img src="../../assets/css/med.jpg" alt="Random Name" width="50%">
    </div>
  </div>
</div>
</footer>

</body>
</html>
