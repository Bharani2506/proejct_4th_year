<?php
include_once 'db_connect.php';
session_start();



$query= "SELECT * FROM `newdept`";

$eqry=mysqli_query($conn,$query);


header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment;filename=\"skasc_programme_report.xls\"");
header("Cache-Control: max-age=0");
?>

<table border="1">
<th colspan="3">SKASC  PROGRAMME REPORT</th>
                                    <thead>
                                        <tr>
                                           <th>Sno.</th>
                                            <th>PROGRAMME NAME</th>
                                            <th>DEPARTMENT</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                    <?php
                                        $sno=1;
                                        while($row=mysqli_fetch_array($eqry)){
                                        
                                    ?>
                                    
                                        <tr>
                                        <td><?php echo $sno++; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['dept']; ?></td>
                                     
                                        </tr>
                                       
                                        <?php } ?>
                                    </tbody>
                                </table>