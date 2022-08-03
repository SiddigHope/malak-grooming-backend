<?php
session_start();
include_once '../assets/conn/dbconnect.php';
require_once '../vendor/autoload.php';

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
                            <b style="display:block; text-align:right"> Appointments - الحجوزات </b>
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
                    <h3 class="panel-title">  Appointments - الحجوزات </h3>
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
                            <th><input type="text" class="form-control" placeholder="Agent" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Pet" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Size" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Service" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Phone" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Day" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Hour" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Aggressive" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Booked on" disabled></th>
                            <th><input type="text" class="form-control" placeholder="ادارة" disabled></th>
                        </tr>
                        </thead>

                        <?php
                        $result=mysqli_query($con,"SELECT * FROM timetable ORDER BY time DESC");


                        $count = 1;
                        echo "<tbody>";
                        while ($user=mysqli_fetch_array($result)) {

                            $aggressive = $user['aggressive'] == 0 ? "No" : "Yes";
                            $color = $user['status'] == 1 ? '#a1f2d7' : ($user['status'] == 2 ? '#f2706a' : '#eee');
                            echo "<tr style='vertical-align: middle ; background-color:".$color."'>";
                            echo "<td style='font-weight: bold; vertical-align: middle '>" . $count . "</td>";
                            echo "<td style='font-weight: bold; vertical-align: middle '>" . $user['user'] . "</td>";
                            echo "<td style='font-weight: bold; vertical-align: middle '>" . $user['pet'] . "</td>";
                            echo "<td style='font-weight: bold; vertical-align: middle '>" . $user['type'] . "</td>";
                            echo "<td style='font-weight: bold; vertical-align: middle '>" . $user['serviceType'] . "</td>";
                            echo "<td style='font-weight: bold; vertical-align: middle '>" . $user['phone'] . "</td>";
                            echo "<td style='font-weight: bold; vertical-align: middle '>" . $user['day'] . "</td>";
                            echo "<td style='font-weight: bold; vertical-align: middle '>" . $user['hour'] . "</td>";
                            echo "<td style='font-weight: bold; vertical-align: middle '>" . $aggressive . "</td>";
                            echo "<td style='font-weight: bold; vertical-align: middle '>" . $user['time'] . "</td>";
                            echo "<form method='POST'>";

                            echo "<td class='text-center'>
                            <a href='?do=accept&token=" . $user['token'] ."&userid=" . $user['id'] . " #edit' class='btn btn-success'><i class='fa fa-check-circle'></i> قبول </a>
                            <a href='?do=reject&token=" . $user['token'] ."&userid=" . $user['id'] . "' class=\"btn btn-warning confirm\"><i class='fa fa-close'></i> رفض </a>
                            <a href='?do=delete&token=" . $user['token'] ."&userid=" . $user['id'] . "' class=\"btn btn-danger confirm\"><i class='fa fa-trash'></i> حذف </a>
                            </td>    ";



                            $count++;
                        echo "</tr>";}

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

                if($do == 'accept') {

                        $channelName = 'default';
                        $recipient= trim($_GET['token']); 
                        
                        // You can quickly bootup an expo instance
                        $expo = \ExponentPhpSDK\Expo::normalSetup();
                        
                        // Subscribe the recipient to the server
                        $expo->subscribe($channelName, $recipient);
                        
                        // Build the notification data
                        $notification = ['body' => 'Your appointment has been approved'];
                        
                        // Notify an interest with a notification
                        $expo->notify([$channelName], $notification);
                        
                        $stmt = "UPDATE timetable SET status = '1' WHERE id = '$id'";

                            $execute = mysqli_query($con, $stmt) or die(mysqli_error($con));

                            if ($execute) {
                            ?>
                                <script type="text/javascript">
                                    alert('تم تحديث العميل بنجاح');
                                </script>
                            <?php
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=appointments.php\">";
                            } else {
                            ?>
                                <script type="text/javascript">
                                    alert('لم تتم التحديث');
                                </script>
                            <?php
                            }



                    }

                if($do == 'reject') {

                    $channelName = 'default';
                        $recipient= trim($_GET['token']); 
                        
                        // You can quickly bootup an expo instance
                        $expo = \ExponentPhpSDK\Expo::normalSetup();
                        
                        // Subscribe the recipient to the server
                        $expo->subscribe($channelName, $recipient);
                        
                        // Build the notification data
                        $notification = ['body' => 'Your appointment has been rejected'];
                        
                        // Notify an interest with a notification
                        $expo->notify([$channelName], $notification);

                    $stmt = "UPDATE timetable SET status = '2' WHERE id = '$id'";

                        $execute = mysqli_query($con, $stmt) or die(mysqli_error($con));

                        if ($execute) {
                        ?>
                            <script type="text/javascript">
                                alert('تم تحديث العميل بنجاح');
                            </script>
                        <?php
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=appointments.php\">";
                        } else {
                        ?>
                            <script type="text/javascript">
                                alert('لم تتم التحديث');
                            </script>
                        <?php
                        }



                }
                    elseif($do == 'delete'){

                    $query = "DELETE FROM timetable WHERE id = '$id'";
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

<script type="text/javascript">
    $('document').ready(function () {
       function someFunc(){
           var audio = new Audio('assets/note.mp3');
          $.ajax({
              url: 'countAppointments.php',
              method:'post',
              success: function(response){
                if (typeof audio.loop == 'boolean')
                    {
                        audio.loop = true;
                    }
                    else
                    {
                        audio.addEventListener('ended', function() {
                            this.currentTime = 0;
                            this.play();
                        }, false);
                    }
                  var data= $.parseJSON(response);
                console.log(data)
                console.log("<?php echo $count-1; ?>")
                  if(data != "<?php echo $count-1; ?>"){
                      audio.play();
                      alert('طلب معلق جديد');
                      location.reload(true);
                  }
              },
              error: function(error) 
                    {
                        alert(error.status);
                    }
          });
       }
        var interval;
        
        $(function randomName() {
            interval = setInterval(someFunc, 100000);    
        });
        
        $("#rangeInput").on("change", function(){
            clearInterval(interval);
            interval = setInterval(someFunc, $(this).val());
        });
       
    });
</script>

</body>
</html>