<?php
include_once 'db_connect.php';
session_start();


if(isset($_POST['submit'])){
        
    $emp_id= $_POST['emp_id'];
    $review= $_POST['review'];
    $rating= $_POST['rating'];


    $sql = "INSERT INTO performance ( `emp_id`, `review`, `rating`)
    VALUES ('$emp_id','$review','$rating')";
    
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
                        performance review  Forms
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form action = "" method = "post" role="form" enctype="multipart/form-data">
                      
                                <div class="form-group">
                    <label>Employee</label>
                    <select class="form-control" name="emp_id" required>
                    <option value="">-none-</option>
                    <?php 
                    $sql = mysqli_query($conn, "SELECT * FROM employee");
                    while ($row = $sql->fetch_assoc()){
                    echo "<option value=".$row['id'].">" . $row['mail'] . "</option>";
                    }
                    ?>
                    </select>
                    </div>


                  <div class="form-group">
                    <label class="control-label">Review:</label>
                      <input required type="text" class="form-control" name="review">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Rating ( 1 to 5):</label>
                      <input required type="number" class="form-control"  name="rating">
                  </div>

    
                <input type="submit" value="submit" class="btn btn-info" name="submit">

                            </form>
                            </div>

                        </div>
                    </section>

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
