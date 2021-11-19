<?php
include_once 'db_connect.php';
session_start();

if(isset($_GET['edit_id']))
{
	$sql_query="SELECT * FROM ordertable WHERE id=".$_GET['edit_id'];
	$result_set=mysqli_query($conn,$sql_query);
	$fetched_row=mysqli_fetch_array($result_set);
}


if(isset($_POST['btn-update']))
{
  
$status = $_POST['status'];

$sql_query = "UPDATE ordertable SET  status = '$status' WHERE id=".$_GET['edit_id'];

	  if (mysqli_query($conn, $sql_query)) {           
    ?>
		<script type="text/javascript">
		alert('Successfully');
    window.location.href='index.php';
		</script>

    <?php
    } 
    else {
    echo "Error: " . $sql_query . "" . mysqli_error($conn);
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
<title></title>

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


<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                        Customer's Update Registration Forms
                        </header>

                        <div class="col-md-12">
        <h1>properties Info</h1>

<table class="table">
    <thead>
      <tr>
        <th>properties Name</th>
        <th>properties Image </th>
        <th>Location Map</th>
        <th>schedule Status</th>        
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><?php
$id1 = $fetched_row["post_id"];
$show=mysqli_query($conn,"select * from post_job where id = '$id1' ");
$res=mysqli_fetch_array($show);
echo $res['company_name'];
?></td>
<td><?php echo '<img width="100px" height="100px" alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($res['complany_logo']).'"/>'?></td>
<td>
<a href="<?php echo $row['website']; ?>" target=”_blank” class="btn btn-default pull-left" >Location</a>

</td>
<td><?php echo $fetched_row["status"]; ?></td>



      </tr>
    </tbody>
  </table>

<!-- customer -->

  <h1>User Info</h1>

  <table class="table">
    <thead>
      <tr>
        <th>Customer Id</th>
        <th>Customer Name</th>
        <th>Customer Phone no</th>
        <th>State</th>
        <th>City</th>
        <th>Location</th>
        <th>Postal Code</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><?php echo $fetched_row["id"]; ?></td>
      <td><?php
      $id = $fetched_row["user_id"];
      $show1=mysqli_query($conn,"select * from userregistration where UserId = '$id' ");
      $res23=mysqli_fetch_array($show1);
      echo $res23['UserName'];
      ?></td>
      <td><?php echo $res23["PhoneNumber"]; ?></td>
      <td><?php echo $res23["State"]; ?></td>
      <td><?php echo $res23["City"]; ?></td>
      <td><?php echo $res23["Location"]; ?></td>
      <td><?php echo $res23["PostalCode"]; ?></td>      
      </tr>

    </tbody>
  </table>
    </div>


    <div class="row">
         <div class="col-md-3 col-sm-3 col-xs-3">
         </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
           <div class="panel panel-info">
                        <div class="panel-heading">
                        properties Update FORM
                        </div>
            <div class="panel-body">

            <form  action = "" method = "post" role="form"  enctype="multipart/form-data" >

                <div class="form-group">
                <label>Select Enquiry status</label>
                <select name="status" class="form-control"  required>
                <option value="">None</option>
                <option value="Accepted">Accepted</option>
                <option value="Rejected">Rejected</option>
                </select>
                </div>
                  
                <input type="submit" class="btn btn-info" value="Update" name="btn-update">
                    
                    </form>
                </div>
                        </div>
            </div>
        </div>


        <!-- page end-->
        </div>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>


