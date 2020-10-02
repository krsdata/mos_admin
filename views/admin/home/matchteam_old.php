<?php
include("connection.php");
$qry='SELECT * FROM `matches` WHERE `status`="1"';
$result1 = mysqli_query($con,$qry);
$rows = mysqli_num_rows($result1);
if($rows>0)
{
  while ($rows = mysqli_fetch_array($result1)) {
    $match3=$rows['matchid'];
    $finaldate=$rows['time'];
    $status=$rows['status'];
    $cdate=date("Y/m/d H:m:s");

    $datetime1 = new DateTime($cdate);
    $datetime2 = new DateTime($finaldate);
    $interval = $datetime1->diff($datetime2);
    if($interval->format('%R%a ')>0)
    {

    }
    else
    {
      $ss='UPDATE `matches` SET`status`="2" WHERE `matchid`='.$match3.'';
      $result2 = mysqli_query($con,$ss);
    }




  }
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  
  <!-- CSS Files -->
  <link href="./assets/css/material-kit.css?v=2.0.3" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
        <style>
        body
        {
            background: url(./assets/img/bg.jpg)no-repeat;
            background-color:#0078d7;
            background-size: 115%;
            background-position-x: 35%;
        }
    .navbar
        {
            width:555px;
            margin:auto;
        }
    .navbar-top
    {
        background-color:#0078D7 !important;
    }
    .navbar-brand
       {
           margin:auto;
           color: white !important;
           font-weight:bolder !important;
           font-size: 25px !important;
       }
    .middle
    {
        width: 555px;
    height: 89vh;
    margin: auto;
    margin-top: 70px;
    background-color: #cccccccc;
    padding: 15px;
    overflow: auto;
    }
    .navbar-bottom
    {
        padding: 10px;
        height: 70px;
    }
    .navbar-bottom .material-icons
    {
        margin-left: 8px;
        font-size: 45px;
        color: #0078d780;
        transition: .5s;
        cursor:pointer;
    }
    .navicon
    {
        width: 50px;
        height: 30px;
        margin-left: auto;
        margin-right: auto;
    }


/* Match cards starts */

.card
{
  margin-bottom: 0px;
    margin-top: 10px;
}
.left
{
  height: 100px;
    border-radius: 5px;
    display: inline;
    margin-right: 8px;
    margin-top: 0px;
}
 
.right
{
  height: 100px;
    border-radius: 5px;
    display: inline;
    margin-left: 2px;
    margin-right: 0px;
    margin-top: 0px;
}
  .font
  {
    font-size:15.5px;
    font-weight:bold;
  }
  small
  {
    color:black;
    font-weight:bold;
  }
  .main
  { 
    padding: 15px;
  height: 100vh;
  overflow: auto;
  
  }

  @media only screen and (min-width: 768px) {
   .card
   {
     width:500px;
   }
   .left
  {
    height: 100px;
    border-radius: 5px;
    display: inline;
    margin-right: 40px;
    margin-top: 0px;
  }
  .right
  {
    height: 100px;
    border-radius: 5px;
    display: inline;
    margin-left: 40px;
    margin-right: 0px;
    margin-top: 0px;
  }
   .main
  {
  
    padding: 15px;
    width:555px;
  height: 92vh;
  overflow: auto;
 
  }
  .mar
  {
    margin: -15px;
    width: 555px;
    color: white;
    font-weight: bold;
    background: #3582ff;
  }
}
.mar
  {
    margin: -15px;
    width: 109%;
    border-radius: 0px;
    background: #3582ff;
  }
  
/* Match cards ends */


       /* media query starts for bellow 600px*/
@media only screen and (max-width: 600px)
       {
        body
        {
            background: url(./assets/img/bg.jpg)no-repeat;
           background-color:#0078d7;
            background-position-x: 45%;
        }
        .navbar
        {
            width:100%;
            margin:auto;
           
        }
        .middle
    {
        width:100%;
        height:auto;
        margin:auto;
        margin-top:70px;
        background-color:#cccccccc;
    }
    .navbar-bottom .material-icons
    {
        margin-left: 8px;
        font-size: 35px;

    }
    .navicon
    {
        width: 50px;
        height: 30px;
        margin-left: auto;
        margin-right: auto;
    }
       }
       /* media query ends*/
.navbar-bottom .material-icons:hover
{
    color:#0078d7;
    transition: .5s;
}
.modal .modal-header .close i
  {
    color:white;
  }
  .modal-title
  {
    margin-bottom: 20px;
    color:white;
  }
  .modal-open .modal
  {
    margin-top: 140px;
  }
 .top
  {
      margin-top: 75px;
  }
  .btm
  {
    margin-top: 11px;
    margin-bottom: 11px;
  }
  
  .row {
    display: flex;
    flex-wrap: wrap;
    margin-right: auto;
    margin-left: auto;
  }
  .tit
  {
    font-size:12px;
    font-weight:bolder;
  }
  .blder
  {
    font-weight:bolder;
  }
.bttn
{
  border:none;
  background-color: #ffffff00;
}

.main
  {
    padding: 15px;
    margin-top: 46px;
  height: 86vh;
  overflow: auto;
  background: #03a9f4;
  }

  @media only screen and (min-width: 768px) {
   .card
   {
     width:500px;
   }
   .main
  {
  
    padding: 15px;
    width:555px;
  height: 92vh;
  overflow: auto;
  background: #03a9f4;
  }
}

@media only screen and (min-width: 768px) {
  .modal .modal-dialog
{
  margin-top:28%;
}
}


         </style>

    </head>
    <body>
      <?php
      include_once ("navmain.php");
      ?>

      <div class="middle">

<?php
$match_id=$_GET['match_id'];
$email=$_SESSION["email"] ;
$qry1="SELECT distinct(`contests_id`) as cont FROM `matches_joined` where `user_id`='$email' and  `match_id`='$match_id'";
$result1=mysqli_query($con,$qry1);
$rows1=mysqli_num_rows($result1);
while($rows1=mysqli_fetch_assoc($result1))
{
$contest_id11=$rows1['cont'];


$qry="SELECT `contests_id`, `amount`, `no_of_teams`, `fee` FROM `contests` where contests_id='$contest_id11'";
$result=mysqli_query($con,$qry);
$rows=mysqli_num_rows($result);
while($rows=mysqli_fetch_assoc($result))
{
  $contest_id=$rows['contests_id'];
  $amt=$rows['amount'];
  $no_of_teams=$rows['no_of_teams'];
  $fee=$rows['fee'];
  $winners=round($no_of_teams*(1/4));
  
  
$qry2="SELECT count(*) as cont1 FROM `matches_joined` where  contests_id='$contest_id11'  and  `match_id`='$match_id'";
$result2=mysqli_query($con,$qry2);
$rows2=mysqli_num_rows($result2);
while($rows2=mysqli_fetch_assoc($result2))
{

$contest_id111=$rows2['cont1'];
$diff1=  $no_of_teams - $contest_id111;
$perc1= (100-($diff1*100)/$no_of_teams);


  echo '<div class="card btm mx-auto">
  <div class="row">
<div class="col float-left" style="width: 255px;">
  <span class="tit" ></span><br><span class="blder"><button class="bttn"  data-toggle="modal" data-target="#myModal">Preview<span class="dropdown-toggle"></span></button></span>
  </div>
   <div class="col text-center" style="width: 150px;">
  <span class="tit" >Captain</span><br><span class="blder">'.$amt.'</span>
  </div>
   <div class="col  text-right float-right">
  <span class="tit">Vice Captain</span><br><span class="blder">'.$fee.'</span>
  </div>
  </div>


    <div class="container">
    <div style="display:inline">
    Team
    </div>
    <div style="display:inline;float: right;"><a href="joincontsets.php?match_id='.$match_id.'&contest_id='.$contest_id.'&team_id='.$team_id.'">
    <button class="btn btn-info ">Edit</button></a>
    </div>
    <div style="float: right;display: inline;margin-right: 20px;">
      </div>
   
    </div>
    
   </div>';

}

  
}

}
?>
<br /><br /><br />
</div>
<div>



   <!-- Classic Modal -->
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <span>Rank 1</span><span class="float-right">Rs. 50,000</span><br>
          <span>Rank 2</span><span class="float-right">Rs. 25,000</span><br>
          <span>Rank 3</span><span class="float-right">Rs. 10,000</span><br>
          <span>Rank 4-30</span><span class="float-right">Rs. 5,000</span><br>
          <span>Rank 31-60</span><span class="float-right">Rs. 1000</span><br>
          <span>Rank 61-90</span><span class="float-right">Rs. 500</span><br>
          <span>Rank 91-110</span><span class="float-right">Rs. 250</span><br>
          <span>Rank 111-140</span><span class="float-right">Rs. 100</span><br>
          <span>Rank 141-150</span><span class="float-right">Rs. 75</span><br>
          <span>Rank 151-170</span><span class="float-right">Rs. 10</span><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--  End Modal -->
</div>
          

 </div>




      </div>
      <?php
$email=$_SESSION["email"] ;

    $query="SELECT count(*) as count1 FROM `user_team` WHERE `user_id`='$email' and `match_id`='$match_id'";
$result=mysqli_query($con,$query);
$rows=mysqli_num_rows($result);
while ($rows = mysqli_fetch_array($result)) 
{
$count1=$rows['count1'];
}

if($count1>5)
{

   
      echo'
<div class="navbar navbar-bottom fixed-bottom">
      <div class="navicon">
<button type="button" disabled>CreateTeam(Maximum_6_Teams_ Allowed)</button>
 </div>
  <div class="navicon">
     <a href="#"></a>
      </div>
        <div>
';
}
else
{
   
      echo'
<div class="navbar navbar-bottom fixed-bottom">
      <div class="navicon">
     <a href="team1.php?match_id='.$match_id.'">CreateTeam('.($count1+1).')</a>
      </div>
     <div>';
}


      ?>
      
      
        <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-kit.js?v=2.0.3" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
      materialKit.initSliders();
    });


    function scrollToDownload() {
      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
    </body>
</html>