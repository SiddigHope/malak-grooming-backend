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
                        <h2 class="page-header">
                            <b style="display:block; text-align:right"> Agents - العملاء </b>
                        </h2>
                    </div>
                </div>
            </div>
            <!-- Page Heading end-->


            <!-- panel start -->

            <!-- panel start -->
            <div class="panel panel-primary filterable">

                <!-- panel heading starat -->
                <div class="panel-heading">
                    <h3 class="panel-title">  Agents - العملاء </h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                    </div>
                </div>
                <!-- panel heading end -->

                <div class="panel-body">
                    <!-- panel content start -->
                    <!-- Table -->
                    <table class="table table-hover table-bordered text-center">
                        <thead>
                        <tr class="filters">
                            <th width="5%"><input type="text" class="form-control" placeholder="#id" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Full Name" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Phone Number" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Joined On" disabled></th>
                            <th><input type="text" class="form-control" placeholder="ادارة" disabled></th>
                        </tr>
                        </thead>

                        <?php
                        $result=mysqli_query($con,"SELECT * FROM users ORDER BY joined DESC");


                        $count = 1;
                        while ($user=mysqli_fetch_array($result)) {

                            echo "<tbody>";
                            echo "<tr>";
                            echo "<td>" . $count . "</td>";
                            echo "<td>" . $user['fullname'] . "</td>";
                            echo "<td>" . $user['phone'] . "</td>";
                            echo "<td>" . $user['joined'] . "</td>";
                            echo "<form method='POST'>";

                            echo "<td class='text-center'>
                            <a href='?do=edit&userid=" . $user['id'] . " #edit' class='btn btn-primary'><i class='fa fa-edit'></i>تعديل</a>
                            <a href='?do=delete&userid=" . $user['id'] . "' class=\"btn btn-danger confirm\"><i class='fa fa-close'></i>حذف</a>
                            </td>    ";



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

                $stmt = "SELECT * FROM users WHERE id= '$id'";

                $result = mysqli_query($con,$stmt)or die(mysqli_error($con));
                $row = mysqli_fetch_array($result);

                if($do == 'edit') {

                    ?>
                    <div class="panel-heading" target="edit">
                        <h3 class="panel-title"><b> تعديل بيانات العميل :</b><?php echo "  ".$row['fullname']; ?>  </h3>
                    </div>
                    <!-- panel heading end -->


                    <div class="content" data-toggle="class">
                        <table class="table table-hover table-bordered text-center" style="width: 760px">
                            <form class="form-horizontal" role="form" method="post">
                                <!-- starting of username input -->
                                <tr>
                                        <input type="text" name="fullname" class="form-con" placeholder=" اسم العميل "
                                               value="<?php echo $row['fullname']; ?>" required="required"/>
                                </tr>
                                <tr>
                                        <input type="text" name="phone" class="form-con" placeholder=" رقم هاتف العميل "
                                               value="<?php echo $row['phone']; ?>" required="required"/>
                                </tr>
                                <tr>
                                        <input type="text" name="password" class="form-con" placeholder="كلمة مرور العميل دعه خالي اذا لم ترد تغيره "
                                            />
                                </tr>


                                <tr>

                                    <!-- starting of submit input -->
                                    <td style="width: 370px">
                                        <input type="submit" name="edit" value="تعديل"
                                               class="btn btn-primary btn-lg "/>
                                    </td>
                                </tr>
                                <!-- ending of submit input -->
                            </form>
                        </table>
                    </div>
                    <?php


                    if (isset($_POST['edit'])) {
                        $fullname = mysqli_real_escape_string($con,$_POST['fullname']);
                        $phone = mysqli_real_escape_string($con,$_POST['phone']);
                        $password = mysqli_real_escape_string($con,$_POST['password']);

                        $passVal = !empty($password) ? $password : $row['password'];

                            $stmt = "UPDATE users SET fullname = '$fullname', phone = '$phone', password = '$passVal' WHERE id = '$id'";

                            $execute = mysqli_query($con, $stmt);

                            if ($execute) {
                            ?>
                                <script type="text/javascript">
                                    alert('تم تحديث العميل بنجاح');
                                </script>
                            <?php
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=users.php\">";
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


<script type="text/javascript">
    /*
    Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
    */
    $(document).ready(function(){
        $('.filterable .btn-filter').click(function(){
            var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function(e){
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function(){
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
            }
        });
    });
</script>

</body>
</html>