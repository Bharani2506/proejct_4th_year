<?php
include_once 'db_connect.php';
session_start();






header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment;filename=\"skasc_staffsalary_report.xls\"");
header("Cache-Control: max-age=0");
?>

<table border="1">
<th colspan="7">SKASC STAFF SALARY REPORT</th>
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Staff Name</th>
                                        <th>Staff Email</th>
                                        <th>Salary Date </th>
                                        <th>PF</th>
                                        <th>HRA</th>
                                        <th>TotalSalary</th> </tr>
                                    </thead>
                                   
                                    <tbody>
                                    <?php
                                        $sql = "SELECT * FROM `salary`";
                                        $result = $conn->query($sql);
                                        $r=1;
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                        ?>
                            <tr>
                            <td><?php echo $r++; ?></td>

                            <td><?php
                            $id1 = $row["empid"];
                            $show=mysqli_query($conn,"select * from employee where id = '$id1' ");
                            $res=mysqli_fetch_array($show);
                            echo $res['name'];
                            ?></td>
                            <td><?php echo $res["mail"]; ?></td>

                            <td><?php echo $row["calcdate"]; ?></td>
                            <td><?php echo $row["pf"]; ?></td>
                            <td><?php echo $row["hra"]; ?></td>
                            <td><?php echo $row["total"]; ?></td>


                            </tr>
                            <?php

                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>