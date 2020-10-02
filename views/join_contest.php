<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MatchOnSports</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <style>
	table {
    border: 1px solid red;
	}

	td span:last-child{
			float:right;
	}
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include("header.php");?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include("sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Team
        <small><?php echo $_REQUEST['mat_title'];?></small>
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Join Contests(<?php echo $_REQUEST['mat_short_title'];?>)</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
            $id1= $_REQUEST['mat_id'];
            require_once "../db/config.php";
            $qry="SELECT * FROM contests where matchid='$id1' and type='1'";
            $result = mysqli_query($conn,$qry);
            $rows = mysqli_num_rows($result);
            if ($rows == 0) {
              $_SESSION['TYPE'] = "3";
              echo "<script>window.history.back();</script>";
              exit;
            }
            while($row = $result->fetch_assoc()) 
            {
              $id3= $row['matchid'];
              $amount3= $row['amount'];
              $type3= $row['no_of_teams'];
              $fee3= $row['fee'];
              $pid3= $row['contests_id'];
              $repeat3= $row['repeat1'];
              $fill3= $row['fill1'];
              $fill34= $row['multi'];
            }
            $qry2="SELECT count(*) as cont1 FROM `matches_joined` where  contests_id='$pid3'  and  `match_id`='$id1'";
            $result2=mysqli_query($conn,$qry2);
            $rows2=mysqli_fetch_assoc($result2);
            $cont1=$rows2['cont1'];
            mysqli_close($conn);
            ?>
            <form role="form" action="../code/join_contest" method="post" autocomplete="off">
              <input type="hidden" name="mat_id" value="<?php echo $_REQUEST['mat_id'];?>">
              <input type="hidden" name="$id3" value="<?php echo $id1;?>">
              <input type="hidden" name="$amount3" value="<?php echo $pid3;?>">
              <input type="hidden" name="$type3" value="<?php echo $fill34;?>">
              <div class="box-body">
      			  <div class="row">
                      <!-- <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Amount</label>
                        <input type="number" name="amount" class="form-control" placeholder="Amount" required="">
                      </div> -->
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">No of Teams(Teams to Create and Join)</label>
                        <input type="number" name="$fill3" class="form-control" placeholder="No of Teams" required="" min="1" max="<?php //echo $fee3-$cont1;?>">
                      </div>
      				<!--<div class="form-group col-md-6">
                        <label for="exampleInputEmail1"></label>
                        <div class="form-group">
                      <label>
                        <input type="checkbox" name="LOCK_EXAM" class="minimal">
      				  Lock Exam
                      </label>
                    </div>
                      </div>-->
      				</div>
              <div class="row">
                      <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Fees</label>
                        <input type="number" name="$fee3" value="<?php echo $fee3;?>" class="form-control" readonly="" >
                      </div>
                      <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Joind Teams</label>
                        <input type="number" name="$cont1" value="<?php echo $cont1;?>" class="form-control" readonly="" >
                      </div>
                      <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Remaining Teams</label>
                        <input type="number" value="<?php echo $type3-$cont1;?>" class="form-control" readonly="" >
                      </div>
              </div>
				
				<div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </div>
              <!-- /.box-body -->
			</form>
          </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
      </div>
      <!-- /.box -->

      <div class="row">
        
      </div>
      <!-- /.row -->

    </section>
	<section class="content">

      <!-- SELECT2 EXAMPLE -->
      <!-- /.box -->

      <div class="row">
        
      </div>
      <!-- /.row -->

    </section> 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("footer.php");?>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<SCRIPT language="javascript">
	function addRow(tableID) {
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i=0; i<colCount; i++) {
			var newcell	= row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
			//alert(newcell.childNodes);
			switch(newcell.childNodes[0].type) {
				case "text":
						newcell.childNodes[0].value = "";
						break;
				case "checkbox":
						newcell.childNodes[0].checked = false;
						break;
				case "select-one":
						newcell.childNodes[0].selectedIndex = 0;
						break;
			}
		}
	}
	function deleteRow(tableID) {
		try {
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		for(var i=0; i<rowCount; i++) {
			var row = table.rows[i];
			var chkbox = row.cells[0].childNodes[0];
			if(null != chkbox && true == chkbox.checked) {
				if(rowCount <= 1) {
					alert("Cannot delete all the rows.");
					break;
				}
				table.deleteRow(i);
				rowCount--;
				i--;
			}
		}
		}catch(e) {
			alert(e);
		}
	}
	$('#submit').click(function () {
        var valid = true;
        $.each($('input[type="text"]'), function (index1, item1) {
            $.each($('input[type="text"]').not(this), function (index2, item2) {
                if ($(item1).val() == $(item2).val()) {
                    $(item1).css("border-color", "red");
                    valid = false;
                }
            });
        });
        return valid;
    });
	</SCRIPT>
	<SCRIPT language="javascript">
	function addRow1(tableID1) {
		var table = document.getElementById(tableID1);
		var rowCount = table.rows.length;
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i=0; i<colCount; i++) {
			var newcell	= row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
			//alert(newcell.childNodes);
			switch(newcell.childNodes[0].type) {
				case "text":
						newcell.childNodes[0].value = "";
						break;
				case "checkbox":
						newcell.childNodes[0].checked = false;
						break;
				case "select-one":
						newcell.childNodes[0].selectedIndex = 0;
						break;
			}
		}
	}
	function deleteRow1(tableID1) {
		try {
		var table = document.getElementById(tableID1);
		var rowCount = table.rows.length;
		for(var i=0; i<rowCount; i++) {
			var row = table.rows[i];
			var chkbox = row.cells[0].childNodes[0];
			if(null != chkbox && true == chkbox.checked) {
				if(rowCount <= 1) {
					alert("Cannot delete all the rows.");
					break;
				}
				table.deleteRow(i);
				rowCount--;
				i--;
			}
		}
		}catch(e) {
			alert(e);
		}
	}
	$('#submit').click(function () {
        var valid = true;
        $.each($('input[type="text"]'), function (index1, item1) {
            $.each($('input[type="text"]').not(this), function (index2, item2) {
                if ($(item1).val() == $(item2).val()) {
                    $(item1).css("border-color", "red");
                    valid = false;
                }
            });
        });
        return valid;
    });
	</SCRIPT>
</body>
</html>