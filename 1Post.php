<?php
include_once 'db_connect.php';
session_start();

//check if form is submitted

if(isset($_POST['submit'])){
     
    $name = $_POST['name'] ;
    $dept = $_POST['dept'] ;
    $filename = $_FILES['file1']['name'];

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from newdept';
            $result = mysqli_query($conn, $sql);
            if ($result)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['id']+1) . '-' . $filename;
            }
            else
                $filename = '1' . '-' . $filename;

            //set target directory
            $path = 'uploads/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
            
            // insert file details into database
            $sql = "INSERT INTO newdept(name , dept ,filename, created) VALUES('$name','$dept','$filename', '$created')";
            mysqli_query($conn, $sql);
            ?>
            <script>alert('Registered Successfully..');</script>
            <script>window.open('index.php','_self')</script>;
            <?php
        }
        else
        {
            header("Location: index.php?st=error");
        }
    }
    else
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
                  New Programme Details
                  </header>


                  <div class="panel-body">
                  <div class="position-center">
                  <form action = "" method = "post" role="form" enctype="multipart/form-data">

                  <div class="form-group">
                  <label>New Programme Name</label>
                  <input class="form-control" type="text" name="name" required />
                  <!-- <p class="help-block">Help text here.</p> -->
                  </div>
                  <div class="form-group">
                    <label class="control-label">Department :</label>
                            <div class="form-floating mb-3 mb-md-0">
                                <select class="form-control select2" name="dept"  style="width: 100%;">
                                
                                <option value="none" >------------Select Department-------------</option>
                                    <option value="Mathematics & Statistics" >Mathematics & Statistics</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Computer Applications">Computer Applications</option>
                                    <option value="Information and Computer Technology">Information and Computer Technology</option>
                                    <option value="Electronics and Communication Systems">Electronics and Communication Systems</option>
                                    <option value="Costume Design and Fashion">Costume Design and Fashion</option>
                                    <option value="Catering Science & Hotel Management">Catering Science & Hotel Management</option>
                                    <option value="Bioscience">Bioscience</option>
                                    <option value="Commerce Finance">Commerce Finance</option>
                                    <option value="Commerce Business Application">Commerce Business Application</option>
                                    <option value="Industry Integrated Commerce">Industry Integrated Commerce</option>
                                    <option value="Management Science ">Management Science </option>
                                    <option value="Commerce Non Finance">Commerce Non Finance</option>
                                    <option value="Social Work/Psychology/Travel and Tourism/Public Administration">Social Work/Psychology/Travel and Tourism/Public Administration</option>
                                    <option value="Physical Education">Physical Education</option>
                                    <option value="Languages">Languages</option>
                                  </select>
                            </div>
                  </div>


                  <div class="form-group">
                  <label>New Programme File</label>
                  <input name="file1" id="image"  type="file" required>
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
