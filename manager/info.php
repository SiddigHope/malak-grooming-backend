<?php
session_start();
include_once '../assets/conn/dbconnect.php';
// include_once 'connection/server.php';
if(!isset($_SESSION['managerSession']))
{
    header("Location: ../adminlogin.php");
}
$usersession = $_SESSION['managerSession'];
$res=mysqli_query($con,"SELECT * FROM admin WHERE id=".$usersession);

$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);

$message = "";


include "./navbar.php"
?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h3 class="page-header" style="display:block; background-color: '#e3e'">
                            <b style="text-align :right;display:block; background-color: 'red'"> صفحة المعلومات </b>
                            <?php 
                                echo "<a href='?do=edit' class='pull-left btn btn-primary'><i class='fa fa-plus'></i> Add</a>";
                            ?>
                        </h3>
                    </div>
                </div>
            </div>
            <!-- Page Heading end-->


            <!-- panel start -->

            <!-- panel start -->
            <div class="panel panel-primary filterable">

                <!-- panel heading starat -->
                <div class="panel-heading">
                    <h3 class="panel-title"> Info Page </h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                    </div>
                </div>
                <!-- panel heading end -->

                <div class="panel-body">
                    <!-- panel content start -->
                    <?php

                        if(isset($_GET['do'])) {
                            $do = isset($_GET['do']) ? $_GET['do'] : 'manage';
                            $id = isset($_GET['userid'])  ? intval($_GET['userid']) : 0;

                            if($do == 'edit') {

                                ?>
                                <div class="panel-heading" target="edit">
                                    <h3 class="panel-title"><b> Add an Image to Galllery</b></h3>
                                </div>
                                <!-- panel heading end -->


                                <div class="content" data-toggle="class">
                                    <table class="table table-hover table-bordered text-center" style="width: 760px">
                                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                                            <!-- starting of username input -->
                                            <tr>
                                                    <input type="file" name="image[]" class="form-con" placeholder="add image t gallery"
                                                        required="required"/>
                                            </tr>

                                                <!-- starting of submit input -->
                                                <td style="width: 370px">
                                                    <input type="submit" name="add" value="ADD"
                                                        class="btn btn-primary btn-lg "/>
                                                </td>
                                            </tr>
                                            <!-- ending of submit input -->
                                        </form>
                                    </table>
                                </div>
                                <?php


                                if (isset($_POST['add'])) {

                                     $output_dir = "upload";/* Path for file upload */
                                        $RandomNum   = time();
                                        $ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
                                        $ImageType      = $_FILES['image']['type'][0];
                                     
                                        $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                                        $ImageExt       = str_replace('.','',$ImageExt);
                                        $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                                        $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
                                        $ret[$NewImageName]= $output_dir.$NewImageName;
                                        
                                        /* Try to create the directory if it does not exist */
                                        if (!file_exists($output_dir))
                                        {
                                            @mkdir($output_dir, 0777);
                                        }               
                                        move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );
                                             $sql = "INSERT INTO `images` (`image`) VALUES ('$NewImageName')";
                                            $execute = mysqli_query($con, $sql);
                                            if ($execute) {
                                        ?>
                                            <script type="text/javascript">
                                                alert('تم تحديث العميل بنجاح');
                                            </script>
                                        <?php
                                        echo "<meta http-equiv=\"refresh\" content=\"0; url=info.php\">";
                                        } else {
                                        ?>
                                            <script type="text/javascript">
                                                alert('لم تتم التحديث');
                                            </script>
                                        <?php
                                        }
                                    
                                    
                                        
                                        }



                                }elseif ($do == 'delete'){

                                $query = "DELETE FROM users WHERE id = '$id'";
                                $execute = mysqli_query($con,$query);
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=users.php\">";
                            }
                        }

                        ?>

                    <!-- Table -->
                    <table class="table table-hover table-bordered text-center">
                        <!-- <thead>
                        <tr class="filters">
                            <th width="5%"><input type="text" class="form-control" placeholder="#id" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Day" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Hour" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Available?" disabled></th>
                            <th><input type="text" class="form-control" placeholder="ادارة" disabled></th>
                        </tr>
                        </thead> -->

                        <?php
                        $result=mysqli_query($con,"SELECT * FROM `images`");


                        $count = 1;
                        while ($user=mysqli_fetch_array($result)) {

                            echo "<tbody>";
                            echo "<tr>";
                            // echo "<td>" . $count . "</td>";
                            echo "<td><img src='upload/" . $user['image'] . "' style='width: 50%; height: 550px' /></td>";
                            echo "<form method='POST'>";

                            
                                echo "<td class='text-center'>
                            <a href='?do=delete&userid=" . $user['id'] . " #edit' class='btn btn-danger'><i class='fa fa-trash'></i> Delete </a>
                            </td>";



                            $count++;}
                        echo "</tr>";
                        echo "</tbody>";
                        echo "</table>";

                        ?>
                        <!-- panel content end -->
                        <!-- panel end -->
                </div>
            </div>
            <!-- panel start -->
        </div>

        <!-- /#wrapper -->



        <!-- panel start -->
        <div class="panel panel-primary">

            <!-- panel heading starat -->
            <?php

            if(isset($_GET['do'])) {
                $do = isset($_GET['do']) ? $_GET['do'] : 'manage';
                $id = isset($_GET['userid'])  ? intval($_GET['userid']) : 0;

                
                if ($do == 'delete'){

                        $stmt = "DELETE FROM images WHERE id='$id'";

                        $execute = mysqli_query($con, $stmt);
    
                        if ($execute) {
                        ?>
                            <script type="text/javascript">
                                alert('تم بنجاح');
                            </script>
                        <?php
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=info.php\">";
                        } else {
                        ?>
                            <script type="text/javascript">
                                alert('لم يتم التحديث');
                            </script>
                        <?php
                        }
                }
            }

            ?>


            <!-- panel content end -->
            <!-- panel end -->
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="../assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-clockpicker.js"></script>
<!-- Latest compiled and minified JavaScript -->
<!-- script for jquery datatable start-->
<!-- Include Date Range Picker -->

</body>
</html>