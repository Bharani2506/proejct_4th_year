<?php
/*session_start();*/
include_once 'db_connect.php';
?>

<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.php" class="logo">
        Staff Panel
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">

</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <?php if (isset($_SESSION['employeeId'])) { ?>
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username"><?php echo $_SESSION['employeeName']; ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <?php
        } 
        else
        {
        header('Location: adminLogin.php'); 
        } 

        ?>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
            <li>
                    <a class="active" href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
            
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>New Programme</span>
                    </a>
                    <ul class="sub">
						          <li><a href="7View.php">New Programme View</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Documents</span>
                    </a>
                    <ul class="sub">
						          <li><a href="1post.php">Documents Add</a></li>
						          <li><a href="1View.php">Documents View</a></li>
                    </ul>
                </li>


                <li>
                    <a class="active" href="3View.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Salary data</span>
                    </a>
                </li>

                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Review</span>
                    </a>
                    <ul class="sub">
						<li><a href="2View.php">Review View</a></li>
                    </ul>
                </li> -->
                

            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
