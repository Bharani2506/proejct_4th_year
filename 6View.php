<?php
include_once 'db_connect.php';
session_start();
if(isset($_POST['btn-update']))
{
$replay = $_POST['replay'];
$id = $_POST['id'];
$status = 'completed';

$sql_query = "UPDATE `complaint` SET replay = '$replay', status = '$status' WHERE id= '$id' ";
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


<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
    Education Document table
    </div>
    <div>

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
<input type="submit" value="submit" class="btn btn-info" name="search">
</form>
</div>
</div>


      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>mail</th>
            <th>designation</th>
            <th>Document Deatils</th>
            <th>Document</th>
          </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_POST['search'])){

                $id=$_POST['emp_id'];
                
                $sql = "SELECT * FROM apply_doc where emp_id = '$id'  ";
                
                }else{
                    $sql = "SELECT * FROM `apply_doc` ";
                }
            $result = $conn->query($sql);
            $r=1;
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $r++; ?></td>
<td><?php
$id1 = $row["emp_id"];
$show=mysqli_query($conn,"select * from employee where id = '$id1' ");
$res=mysqli_fetch_array($show);
echo $res['name'];
?></td>
<td><?php echo $res["mail"]; ?></td>
<td><?php echo $res["designation"]; ?></td>
             
<td><?php echo $row["head"]; ?></td>
<td><?php echo '<img width="100px" height="100px"  src="data:image/jpeg;base64,'.base64_encode($row['doc']).'"/>'?></td>

            </tr>
            <?php
            }
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>



<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<script type="text/javascript">
(function(){
    'use strict';
    var $ = jQuery;
    $.fn.extend({
        filterTable: function(){
            return this.each(function(){
                $(this).on('keyup', function(e){
                    $('.filterTable_no_results').remove();
                    var $this = $(this), 
                        search = $this.val().toLowerCase(), 
                        target = $this.attr('data-filters'), 
                        $target = $(target), 
                        $rows = $target.find('tbody tr');
                        
                    if(search == '') {
                        $rows.show(); 
                    } else {
                        $rows.each(function(){
                            var $this = $(this);
                            $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                        })
                        if($target.find('tbody tr:visible').size() === 0) {
                            var col_count = $target.find('tr').first().find('td').size();
                            var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
                            $target.find('tbody').append(no_results);
                        }
                    }
                });
            });
        }
    });
    $('[data-action="filter"]').filterTable();
})(jQuery);

$(function(){
    // attach table filter plugin to inputs
    $('[data-action="filter"]').filterTable();
    
    $('.container').on('click', '.panel-heading span.filter', function(e){
        var $this = $(this), 
            $panel = $this.parents('.panel');
        
        $panel.find('.panel-body').slideToggle();
        if($this.css('display') != 'none') {
            $panel.find('.panel-body input').focus();
        }
    });
    $('[data-toggle="tooltip"]').tooltip();
})
function edt_id(id)
{
    if(confirm('Sure to edit ?'))
    {
        window.location.href='bikeViewUpdate.php?edit_id='+id;
    }
}
</script>
</body>
</html>





