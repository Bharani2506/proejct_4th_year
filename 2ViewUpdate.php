<?php
include_once 'db_connect.php';
session_start();

//if(isset($_GET['edit_id']))
//{
	$sql_query="SELECT * FROM employee WHERE id=".$_GET['id'];
	$result_set=mysqli_query($conn,$sql_query);
	$fetched_row=mysqli_fetch_array($result_set);
//}
if(isset($_POST['btn-update']))
{
    // variables for input data
    
    //$empid = $_GET['edit_id'];
    // $empid = $_GET['id'];
    // $calcdate = date('Y-m-d H:i:s');

    // $present = $_POST['present'] ;
    // $salary= $_POST['salary'];
    // $pf= $_POST['pf'];
    // $hra= $_POST['hra'];

    // $total = ($present * $salary);
    // $total += $hra;
    // $total -= $pf;


    // $mainamt = $total;

	// sql query for update data into database

  // $sql = "INSERT INTO salary (`empid`, `calcdate`, `per_day`, `pf`, `hra`, `total`)
  // VALUES ('$empid','$calcdate','$salary','$pf','$hra','$mainamt')";
    //$empid = $_GET['edit_id'];
    $empid = $_GET['id'];
    
    $staff_name = $_POST['staff_name'] ;
    $staff_mail= $_POST['staff_mail'];
    $salary= $_POST['salary'];
    $pf= $_POST['pf'];
    $hra= $_POST['hra'];

  $sql = "UPDATE employee SET  name = '$staff_name', mail = '$staff_mail', per_day = '$salary', pf = '$pf', hra = '$hra' WHERE id = '$empid'";
  
    if (mysqli_query($conn, $sql)) {
      ?>
  <script type="text/javascript">
  alert('Data Are Inserted Successfully');
  window.location.href='index.php';
  </script>

  <?php
  } else {
    "Error: " . $sql . "" . mysqli_error($conn);
  }
  $conn->close();
  }


if(isset($_POST['btn-cancel']))
{
	header("Location: index.php");
}
?>

<!DOCTYPE html>
<head>
<title>Admin Management</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<?php
include 'header.php';
?>




 <!-- MENU SECTION END-->
<div class="content-wrapper">
     <div class="container">
    <div class="row pad-botm">
        <div class="col-md-12">
            <h4 class="header-line">Salary Calc Form</h4>
        </div>

</div>

     <div class="row">
         <div class="col-md-3 col-sm-3 col-xs-3">
         </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
           <div class="panel panel-info">
                        <div class="panel-heading">
                           Salary Calc
                        </div>
            <div class="panel-body">

            <form  action = "" method = "post" role="form">
 

                <div class="form-group">
                    <label>Staff Name:</label>
                    <input class="form-control" type="text" name="staff_name" value="<?php echo $fetched_row['name']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Staff Mail:</label>
                    <input class="form-control" type="text" name="staff_mail" value="<?php echo $fetched_row['mail']; ?>" required />
                </div> 

                <div class="form-group">
                  <label class="control-label">Basic Salary:</label>
                    <input required type="text" class="form-control"  name="salary" value="<?php echo $fetched_row['per_day']; ?>" >
                </div>

                <div class="form-group">
                  <label class="control-label">PF(%):</label>
                    <input required type="text" class="form-control"  name="pf" value="<?php echo $fetched_row['pf']; ?>" > 
                </div>

                <div class="form-group">
                  <label class="control-label">HRA(%):</label>
                    <input required type="text" class="form-control"  name="hra" value="<?php echo $fetched_row['hra']; ?>">
                </div>

                 <!--  <div class="form-group">
                    <label class="control-label">Present days</label>
                      <input required type="number" class="form-control"  name="present" required >
                  </div> -->




                  
                <input type="submit" class="btn btn-info" value="Update" name="btn-update">
                    
                    </form>
                </div>
                        </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>