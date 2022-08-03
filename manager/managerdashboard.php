<?php
session_start();
include '../assets/conn/dbconnect.php';
// include_once 'connection/server.php';
if(!isset($_SESSION['managerSession']))
{
    header("Location: ../adminlogin.php");
}

header("Location: appointments.php");

$usersession = $_SESSION['managerSession'];
$res=mysqli_query($con,"SELECT * FROM admin WHERE id='$usersession'");
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);


include "./navbar.php"
?>
<div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                       <!-- Dashboard-->
                    </h2>
                </div>
            </div>
            <!-- Page Heading end-->

            <!-- panel start -->
            <div class="panel panel-primary filterable">
                <!-- Default panel contents -->
                <div class="panel-heading">


                </div>
                <table class="text-center" style="width: 1050px;">
                    <tr>
                        <td>
                            <a href="department.php"> <div class="user-wrapper" style="width: 200px;">
                                    <img src="assets/img/dept.jpg" class="img-responsive" />
                                    <div class="description">
                                        <h4 class="text-center">الاقسام</h4>
                                    </div>
                                </div></a>

                        </td>
                        <td style="margin-right: 20px">
                            <a href="job.php"   style="margin-right: 20px"> <div class="user-wrapper" style="width: 200px;">
                                    <img src="assets/img/Pointofsale_jobs.jpg" class="img-responsive" />
                                    <div class="description">
                                        <h4 class="text-center">الوظائف</h4>
                                    </div>
                                </div></a>
                        </td>
                        <td style="margin-right: 20px;padding-top: 50px">

                            <a href="bouns.php"   style="margin-right: 20px"> <div class="user-wrapper" style="width: 200px;">
                                    <img src="assets/img/bouns.jfif" class="img-responsive" />
                                    <div class="description">
                                        <h4 class="text-center">الحوافز</h4>
                                    </div>
                                </div></a>
                        </td>

                        <td style="margin-right: 20px;">
                            <a href="allowance.php"   style="margin-right: 20px"> <div class="user-wrapper" style="width: 200px;">
                                    <img src="assets/img/allow.jpg" class="img-responsive" />
                                    <div class="description">
                                        <h4 class="text-center">البدلات</h4>
                                    </div>
                                </div></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="min.php"> <div class="user-wrapper" style="width: 200px;">
                                    <img src="assets/img/دليل-القبول-في-الجامعات-السودانية.jpg" class="img-responsive" />
                                    <div class="description">
                                        <h4 class="text-center">الاستقطاعات</h4>
                                    </div>
                                </div></a>

                        </td>
                        <td style="margin-right: 20px">
                            <a href="employee.php"   style="margin-right: 20px"> <div class="user-wrapper" style="width: 200px;">
                                    <img src="assets/img/emp.jpg" class="img-responsive" />
                                    <div class="description">
                                        <h4 class="text-center">الموظفين</h4>
                                    </div>
                                </div></a>
                        </td>
                        <td style="margin-right: 20px;padding-top: 50px">

                            <a href="salary.php"   style="margin-right: 20px"> <div class="user-wrapper" style="width: 200px;">
                                    <img src="assets/img/salary.jpg" class="img-responsive" />
                                    <div class="description">
                                        <h4 class="text-center">المرتبات</h4>
                                    </div>
                                </div></a>
                        </td>

                        <td style="margin-right: 20px;">
                            <a href="reports.php"   style="margin-right: 20px"> <div class="user-wrapper" style="width: 200px;">
                                    <img src="assets/img/map-pin.png" class="img-responsive" />
                                    <div class="description">
                                        <h4 class="text-center">التقارير</h4>
                                    </div>
                                </div></a>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- panel end -->


        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->



<!-- jQuery -->
<script src="../assets/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../assets/js/bootstrap.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<!-- script for jquery datatable start-->
<!-- script for jquery datatable end-->

</body>
</html>