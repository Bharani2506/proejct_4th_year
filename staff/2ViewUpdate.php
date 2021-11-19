<?php
include_once 'db_connect.php';
session_start();

if(isset($_GET['edit_id']))
{
	$sql_query="SELECT * FROM post_job WHERE id=".$_GET['edit_id'];
	$result_set=mysqli_query($conn,$sql_query);
	$fetched_row=mysqli_fetch_array($result_set);
}
if(isset($_POST['btn-update']))
{
    // variables for input data
    
    $company_name = $_POST['company_name'] ;
    $address = $_POST['address'] ;
    $city = $_POST['city'] ;
    $state = $_POST['state'] ;
    $post_code = $_POST['post_code'] ;
    $position = $_POST['position'] ;
   
    $website = $_POST['website'] ;
    $job_description = $_POST['job_description'] ;
    $location = $_POST['location'];

    $status = $_POST['status'];;

	// sql query for update data into database
    $sql_query = "UPDATE post_job SET 
    `company_name` = '$company_name', `address` = '$address', `city` = '$city', `state` = '$state',
     `post_code` = '$post_code', `position` = '$position', `website` = '$website', `job_description` = '$job_description',
     `location` = '$location', status='$status' WHERE id=".$_GET['edit_id'];

	// sql query execution function
	  if (mysqli_query($conn, $sql_query)) {           
    ?>
		<script type="text/javascript">
		alert('Data Are Updated Successfully');
		window.location.href='bikeView.php';
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
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">

body {
    font-family: 'Open Sans', sans-serif;
    line-height:28px;
   
}

        .menu-section {
    background-color: #f7f7f7;
    border-bottom: 5px solid #9170E4;
    width: 100%;
}
.disabled {
    opacity: 0.6;
    cursor: not-allowed;
}


</style>
<script type="text/javascript">
    $(document).ready(function(){
    // Initialize Tooltip
    $('[data-toggle="tooltip"]').tooltip(); 
})
</script>

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
            <h4 class="header-line">Update Form</h4>
        </div>

</div>

     <div class="row">
         <div class="col-md-3 col-sm-3 col-xs-3">
         </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
           <div class="panel panel-info">
                        <div class="panel-heading">
                           Update FORM
                        </div>
            <div class="panel-body">

            <form  action = "" method = "post" role="form">
 

                <div class="form-group">
                    <label>Orphanage Name</label>
                    <input class="form-control" type="text" name="company_name" value="<?php echo $fetched_row['company_name']; ?>" required />
                </div>
                <div class="form-group">
                    <label>address</label>
                    <input class="form-control" type="text" name="address" value="<?php echo $fetched_row['address']; ?>" required />
                </div>
                <div class="form-group">
                    <label>city</label>
                    <input class="form-control" type="text" name="city" value="<?php echo $fetched_row['city']; ?>" required />
                </div>
                <div class="form-group">
                    <label>state</label>
                    <input class="form-control" type="text" name="state" value="<?php echo $fetched_row['state']; ?>" required />
                </div>
                <div class="form-group">
                    <label>post_code</label>
                    <input class="form-control" type="text" name="post_code" value="<?php echo $fetched_row['post_code']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Orphanage Deatils</label>
                    <input class="form-control" type="text" name="position" value="<?php echo $fetched_row['position']; ?>" required />
                </div>
            
                <div class="form-group">
                    <label>Location Map</label>
                    <input class="form-control" type="text" name="website" value="<?php echo $fetched_row['website']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Orphanage description</label>
                    <input class="form-control" type="text" name="job_description" value="<?php echo $fetched_row['job_description']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Orphanage Location</label>
                    <input class="form-control" type="text" name="location" value="<?php echo $fetched_row['location']; ?>" required />
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
            </div>
        </div>
    </div>
</div>


</body>
</html>