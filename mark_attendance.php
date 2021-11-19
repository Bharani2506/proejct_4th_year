<?php
include_once 'db_connect.php';
session_start();


if(isset($_POST['submit'])){

    //print_r($_POST);

    $sql = "delete from attendance where attendance_date='".$_POST['val_date']."'";
    $result = $conn->query($sql);

    $i=0;
    foreach($_POST['emp_id'] as $key=>$val){

        //echo $key.'=>'.$val.'=>'.$_POST['attd_status'][$i++];

        $sql = "insert into attendance (attendance_date, employee_id, attendance_status) values('".$_POST['val_date']."',".$val.",'".$_POST['attd_status'][$i++]."')";
        $result = $conn->query($sql);

    }



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
                        Mark Attendance
                        </header>
                        <div class="panel-body">
                            <div class="position-center">

                            <form action = "" method = "post" role="form" enctype="multipart/form-data">


                                <div class="row text-center">
                                    <div class="col-md-4 text-right"> <b>Attendance Date</b></div>
                                    <div class="col-md-4">
                                        <input type="date" size="18" name="attd_date_val" value="<?php if(isset($_POST['attd_date_val'])) echo $_POST['attd_date_val'];   ?>" />
                                    </div>
                                    <div class="col-md-4 text-left">
                                        <input type="submit" class="btn btn-info" name="attd_date" value="Search" />
                                    </div>

                                </div>
                                <br/>
                                </form>
                                <form action = "" method = "post" role="form" enctype="multipart/form-data">


                                <?php
                                if(isset($_POST['attd_date_val']) && $_POST['attd_date_val']!=''){

                                ?>
                                <input type="hidden" name="val_date" value="<?php echo $_POST['attd_date_val']; ?>" />
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="text text-center">#</th>
                                        <th scope="col" class="text text-center">Employee Name</th>
                                        <th scope="col" class="text text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = "select emp.id, emp.name, concat(emp.dept,' - ',emp.designation) dept_designation,  IFNULL(att.attendance_status,'') attendance_status   from employee emp
                                        left join (select * from attendance where date_format(attendance_date,'%Y-%m-%d')='".$_POST['attd_date_val']."')  att on att.employee_id = emp.id
                                        where emp.status='unblock'";
                                        $result = $conn->query($sql);
                                        $r=1;
                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        $i=1;
                                        while($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td> 
                                            <b><?php echo $row['name'] ?></b> (<?php echo $row['dept_designation']; ?>)
                                            <input type="hidden" name="emp_id[]" value="<?php echo $row['id']; ?>" />
                                        </td>
                                        <td>
                                            <select name="attd_status[]" class="form-control">
                                                <?php if($row['attendance_status']=='') echo '<option value="" selected>NA</option>'; else echo '<option value="" selected>NA</option>'; ?>
                                                <?php if($row['attendance_status']=='FP') echo '<option value="FP" selected>Present</option>'; else echo '<option value="FP">Present</option>'; ?>
                                                <?php if($row['attendance_status']=='PP') echo '<option value="PP" selected>Partially Present</option>'; else echo ' <option value="PP">Partially Present</option>'; ?>
                                                <?php if($row['attendance_status']=='AB') echo '<option value="AB" selected>Absent</option>'; else echo '<option value="AB">Absent</option>'; ?>                                               
                                            </select>
                                        </td>
                                        </tr>
                                    <?php
                                        }
                                    }else{

                                    ?>
                                        <tr>
                                        <th scope="row" class="text text-center" colspan="3"> No data found</th>
                                        
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>       
               
                                    <div class="row">
                                        <div class="cold-md-12 text-center"><input type="submit" value="submit" class="btn btn-info" name="submit"></div>
                                    </div>

                               <?php } 
                                if(isset($_POST['submit'])){
                                    echo '<div class="alert alert-success text-center" role="alert"> Attendance updated successfully! </div>';
                                }
                               ?>

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
