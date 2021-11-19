<?php
include_once 'db_connect.php';
session_start();

if(isset($_GET['edit_id']))
{
	$sql_query="SELECT * FROM userregistration WHERE UserId=".$_GET['edit_id'];
	$result_set=mysqli_query($conn,$sql_query);
	$fetched_row=mysqli_fetch_array($result_set);
}




if(isset($_POST['btn-update']))
{
	// variables for input data
     
      $UserName=$_POST['UserName'];
       $MailId=$_POST['MailId'];
       $PhoneNumber=$_POST['PhoneNumber'];
       $State=$_POST['State'];
       $City=$_POST['City'];
       $Location=$_POST['Location'];
       $PostalCode=$_POST['PostalCode'];

      $status = $_POST['status'];;
           
	// variables for input data
	
	// sql query for update data into database
	$sql_query = "UPDATE userregistration SET UserName='$UserName',MailId='$MailId',PhoneNumber='$PhoneNumber',State= '$State' ,City='$City', Location='$Location',PostalCode='$PostalCode',Status='$status' WHERE UserId=".$_GET['edit_id'];

	// sql query for update data into database
	
	// sql query execution function
	  if (mysqli_query($conn, $sql_query)) {           
    ?>
		<script type="text/javascript">
		alert('Data Are Updated Successfully');
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
                        <div class="panel-body">
                            <div class="position-center">
                                <form action = "" method = "post" role="form" enctype="multipart/form-data">
  

                                <div class="form-group">
                    <label>UserName</label>
                    <input class="form-control" type="text" name="UserName" value="<?php echo $fetched_row['UserName']; ?>" required />
                    <!-- <p class="help-block">Help text here.</p> -->
                </div>


                <div class="form-group">
                    <label>MailId</label>
                    <input class="form-control" value="<?php echo $fetched_row['MailId']; ?>" type="text" name="MailId" required />
                    <!-- <p class="help-block">Help text here.</p> -->
                </div>

               <div class="form-group">
                    <label>PhoneNumber</label>
                    <input class="form-control" value="<?php echo $fetched_row['PhoneNumber']; ?>" type="number" name="PhoneNumber" required />
                    <!-- <p class="help-block">Help text here.</p> -->
                </div>

                 <div class="form-group">
                    <label>State</label>
                    <input class="form-control" type="text" name="State" value="<?php echo $fetched_row['State']; ?>" required />
                    <!-- <p class="help-block">Help text here.</p> -->
                </div>


                <div class="form-group">
                    <label>City</label>
                    <input class="form-control" value="<?php echo $fetched_row['City']; ?>" type="text" name="City" required />
                    <!-- <p class="help-block">Help text here.</p> -->
                </div>

               <div class="form-group">
                    <label>Location</label>
                    <input class="form-control" value="<?php echo $fetched_row['Location']; ?>" type="text" name="Location" required />
                    <!-- <p class="help-block">Help text here.</p> -->
                </div>

                 <div class="form-group">
                    <label>PostalCode</label>
                    <input class="form-control" type="text" name="PostalCode" value="<?php echo $fetched_row['PostalCode']; ?>" required />
                    <!-- <p class="help-block">Help text here.</p> -->
                </div>


                <div class="form-group">
                <label>Select status</label>
                <select name="status" class="form-control" id="box1"  required>
                <option value="">None</option>
                <option value="unblock">unblock</option>
                <option value="block">block</option>
                
                </select>
                </div>

                  
                <input type="submit" class="btn btn-info" value="Update" name="btn-update">
                    
                    </form>
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


