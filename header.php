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
        Admin
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
        <?php if (isset($_SESSION['companyId'])) { ?>
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username"><?php echo $_SESSION['companyName']; ?></span>
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
                        <span>Staff</span>
                    </a>
                    <ul class="sub">
                      <li><a href="2Post.php">Staff Add</a></li>
                      <li><a href="2View.php">Staff View</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Programme</span>
                    </a>
                    <ul class="sub">
						          <li><a href="1post.php">New Programme Add</a></li>
						          <li><a href="1View.php">Programme View</a></li>
                                  <li><a href="pview.php">Report</a></li>
                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Department</span>
                    </a>
                    <ul class="sub">
                                  <li><a href="dept_view.php">Department View</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Docments</span>
                    </a>
                    <ul class="sub">
						          <li><a href="doc_post.php">Document Add</a></li>
						          <li><a href="doc_view.php">Document View</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Salary Calc</span>
                    </a>
                    <ul class="sub">
						          <li><a href="5View.php">Salary Calc View</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Attendance</span>
                    </a>
                    <ul class="sub">
						          <li><a href="mark_attendance.php">Mark Attendance</a></li>
                    </ul>
                </li>

<!--                 
                <li>
                    <a class="active" href="6View.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Education Document</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span> performance review</span>
                    </a>
                    <ul class="sub">
						<li><a href="3Post.php"> performance review Post</a></li>
						<li><a href="3View.php"> performance review View</a></li>
                    </ul>
                </li>
                <li>
                    <a class="active" href="salary.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Salary</span>
                    </a>
                </li> -->
                

            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
