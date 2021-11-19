<?php
include_once 'db_connect.php';
session_start();

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

$sql = "select emp.* from employee emp where emp.id=".$_GET['id']." and emp.status='unblock'";
$row = $conn->query($sql)->fetch_assoc();
//$row = $result->fetch_assoc()



?>


<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">

        <form action = "" method = "post" role="form" enctype="multipart/form-data">

                                    <div class="row text-center">
                                        <div class="col-md-4 text-right"> <b>Payslip Date</b></div>
                                        <div class="col-md-4">
                                            <input type="date" size="18" name="payslip_date_val" value="<?php if(isset($_POST['payslip_date_val'])) echo $_POST['payslip_date_val'];   ?>" />
                                        </div>
                                        <div class="col-md-4 text-left">
                                            <input type="submit" class="btn btn-info" name="get_payslip" value="Get Payslip" />
                                        </div>

                                    </div>
                                    <br/>
        </form>

        <?php
        if(isset($_POST['payslip_date_val']) && $_POST['payslip_date_val']!=''){


            $sql="select res.id, res.basic_pay, res.pf, res.hra, sum(res.no_days) no_days, 
            date_format(LAST_DAY('".$_POST['payslip_date_val']."'),'%d') total_days,  date_format('".$_POST['payslip_date_val']."','%M %Y') pay_month,
             (res.basic_pay / date_format(LAST_DAY('".$_POST['payslip_date_val']."'),'%d') * sum(res.no_days) ) total_salary  from (
            select emp.id, emp.per_day basic_pay, emp.pf, emp.hra, att.attendance_status, 
            case when att.attendance_status='FP' then 1.0
                 when att.attendance_status='PP' then 0.5
                 when att.attendance_status='AB' then 0
                 else 0 end no_days
                 from employee emp
            inner join attendance att on att.employee_id = emp.id
            where emp.status='unblock' and date_format(att.attendance_date,'%Y%m') = date_format('".$_POST['payslip_date_val']."','%Y%m') and emp.id=".$row['id'].") res 
            group by res.id, res.basic_pay, res.pf, res.hra";

            $result = $conn->query($sql);
            if($result->num_rows>0){

            $payslip_row=$result->fetch_assoc();


        ?>

        <div class="panel panel-default">    
                                        

            <div class="panel-heading">
            SRI KRISHNA ARTS & SCIENCE COLLEGE
            </div>
            

            <div class="table-responsive">
            <table class="table table-bordered" ui-jq="footable" ui-options='{
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
                    <th colspan="4" style="background-color:gray"><h4 align="center" style="color:white">Pay Slip for <?php echo $payslip_row['pay_month']; ?> </h4></th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th><?php echo $row['name']; ?></th>
                    <th>Department</th>
                    <th><?php echo $row['dept']; ?></th>
                </tr>
                <tr>
                    <th>Designation</th>
                    <th><?php echo $row['designation']; ?></th>
                    <th>Working days / Total </th>
                    <th><?php echo $payslip_row['no_days']; ?> / <?php echo $payslip_row['total_days']; ?></th>
                </tr>
                <tr>
                        <td colspan="4"></td>
                    </tr>
                    <center>
                    <tr>
                        <th>  Earnings</th>
                        <th>  Amount(Rs)</th>
                        <th>  Deduction</th>
                        <th>  Amount(Rs)</th>


                    </tr>
                    </center>
                </thead>
                <tbody>
                
                    <tr>
                        <td>Basic Pay</td>
                        <td><?php echo number_format($payslip_row['total_salary'],2); ?></td>
                        <td>Provident Fund</td>
                        <td><?php echo $pf_amount=number_format(( $payslip_row['total_salary'] * $payslip_row['pf'] / 100 ), 2); ?></td>

                    </tr>

                    <tr>
                        <td>HRA</td>
                        <td><?php echo $hra_amount=number_format(( $payslip_row['total_salary'] * $payslip_row['hra'] / 100 ), 2); ?></td>
                        <td></td>
                        <td></td>

                    </tr>

                    <tr>
                        <td>Gross Earning</td>
                        <td><?php echo number_format(($payslip_row['total_salary']+$hra_amount),2); ?></td>
                        <td>Gross Deduction</td>
                        <td><?php echo $pf_amount; ?></td>

                    </tr>
                
                </tbody>
                <tfoot>
                    <tr style="background-color:gray">
                        <th  style="color: white" colspan="2" ><h4 align="right"></h6></td>
                        
                        <th style="color: white" colspan="2"><b>Net Salar <?php echo  number_format(   (($payslip_row['total_salary']+$hra_amount)-$pf_amount),2); ?></b></td>
                        
                </tfoot>
            </table>
            </div>
            </div>
        </div>

                                    <div class="row text-center">
                                        <div class="col-md-4 text-right"> </div>
                                        <div class="col-md-4">
                                            <?php echo '<a target="_blank" href="payslip_report.php?id='.$row['id'].'&payslip_date_val='.$_POST['payslip_date_val'].'" class="btn btn-info"><i class="fa fa-print" aria-hidden="true"></i> Print</a>'?>
                                        </div>
                                        <div class="col-md-4 text-left">
                                            
                                        </div>

                                    </div>

        <?php 

                $sql = "delete from salary where date_format(calcdate,'%Y%M')=date_format('".$_POST['payslip_date_val']."','%Y%M') and empid=".$row['id'];
                $result = $conn->query($sql);

                $sql = "insert into salary (empid, calcdate, per_day, pf, hra, total) values(".$row['id'].",'".$_POST['payslip_date_val']."',".$payslip_row['basic_pay'].",".$pf_amount.",".$hra_amount.",".(($payslip_row['total_salary']+$hra_amount)-$pf_amount).")";
                $result = $conn->query($sql);

               } else {  echo '<div class="alert alert-danger text-center" role="alert"> Insufficient data! </div>';  }
            }
        ?>
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
    if(confirm('Salary Calc ?'))
    {
        window.location.href='2ViewUpdate.php?edit_id='+id;
    }
}
</script>
</body>
</html>





