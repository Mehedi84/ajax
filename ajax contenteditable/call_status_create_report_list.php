<?php
include '../libs/database.php';
include '../libs/functions.php';

$sql = "SELECT * FROM divisions WHERE status=1";
$result = mysql_query($sql);
$i = 0;
?>
<?php if (mysql_num_rows($result) > 0) { ?>
    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="fa fa-users"></i><span class="break"></span>All Call Status</h2>

            </div>
            <div class="box-content">
                <!--Report summery--> 
                <!-- <div class="report_summery span12">
                    <div class="span4">
                        <p class="total_reports">Total Records: <span class="badge"><?php echo mysql_num_rows($result) ? mysql_num_rows($result) : 0; ?></span></p> 

                    </div>
                    <div class="span4">
                        <label>Search: <input type="text" ></label> 
                    </div>

                </div> -->
                <table class="table table-striped table-bordered bootstrap-datatable datatable" id="datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Call Status(Editable)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>

                        <?php while ($row = mysql_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                               <td class="center edit_name" data-field="name" data-id="<?php echo $row['id']; ?>" contenteditable="true"><?php echo $row['name']; ?></td>
                                <td class="center">                           
                                    <a title="Delete User" class="btn btn-danger user_delete" href="<?php echo $row['id']; ?>">
                                        <i class="halflings-icon white trash"></i> 
                                    </a>
                                   <!--  <a title="Deactive User" class="btn btn-warning user_deactivate" href="<?php echo $row['disposition_id']; ?>">
                                        <i class="fa fa-minus-circle white"></i> 
                                    </a>
                                    <a title="Active User" class="btn btn-success user_activate" href="<?php echo $row['disposition_id']; ?>">
                                        <i class="fa fa-check"></i> 
                                    </a> -->
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->
<?php } ?>

<script>
    $(document).ready(function () {

        $('#datatable').DataTable();

        /* edit user password  */
        $('.edit_name').blur(update_user_info);
        // update function
        function update_user_info() {
            let userId = $(this).attr('data-id');
            let userData = $(this).text();
            let updateable_filed = $(this).attr('data-field');
            // Ajax request    
            if (userId != '' && userData != '') {
                $.ajax({
                    'url': 'reports/call_status_update.php',
                    'method': 'POST',
                    'data': {'user_id': userId, 'user_data': userData, 'updateable_filed': updateable_filed},
                    'success': function (data) {

                        $('#message').fadeIn('fast').html(data).addClass('message');
                        setTimeout(function () {
                            $('#message').fadeOut(1000);
                        }, 1000);
                    }
                }); // ajax end
            } else {
                $('#message').fadeIn('fast').html("Field can't be empty").addClass('message');
                setTimeout(function () {
                    $('#message').fadeOut(2000);
                }, 1000);
            }

        }



        /* edit user password  end */


        /* Delete user */

        $('.user_delete').click(function (e) {
            e.preventDefault();
            let isConfirm = confirm('Are you sure to DELETE this Call Status?');
            if (isConfirm) {

                let userId = $(this).attr('href');
                $.ajax({
                    'url': 'reports/call_status_delete.php',
                    'method': 'POST',
                    'data': {'user_dlt_id': userId},
                    'success': function (data) {
                        alert(data);

                        $('#message').fadeIn('fast').html(data).addClass('message');
                        setTimeout(function () {
                            $('#message').fadeOut(4000);
                            $('.requestResult').load('reports/call_status_create_report_list.php');

                        }, 1000);
                    }
                }); // ajax end
            }
        });

        /* delete user end */
        
        
        /* Deactive user */

        $('.user_deactivate').click(function (e) {
            e.preventDefault();
            let isConfirm = confirm('Are you sure to DEACTIVE this user?');
            if (isConfirm) {

                let userId = $(this).attr('href');

                // Ajax request    

                $.ajax({
                    'url': 'reports/users-deactive.php',
                    'method': 'POST',
                    'data': {'user_deactivate_id': userId},
                    'success': function (data) {

                        $('#message').fadeIn('fast').html(data).addClass('message');
                        setTimeout(function () {
                            $('#message').fadeOut(4000);
                            $('.requestResult').load('reports/users-create-report-list.php');
                            location.reload();
                        }, 1000);
                    }
                }); // ajax end
            }
        });

        /* Deactive user end */
        
         
        
        /* Active user */

        $('.user_activate').click(function (e) {
            e.preventDefault();
            let isConfirm = confirm('Are you sure to ACTIVE this user?');
            if (isConfirm) {

                let userId = $(this).attr('href');

                // Ajax request    

                $.ajax({
                    'url': 'reports/users-active.php',
                    'method': 'POST',
                    'data': {'user_activate_id': userId},
                    'success': function (data) {

                        $('#message').fadeIn('fast').html(data).addClass('message');
                        setTimeout(function () {
                            $('#message').fadeOut(4000);
                            $('.requestResult').load('reports/users-create-report-list.php');
                            location.reload();

                        }, 1000);
                    }
                }); // ajax end
            }
        });

        /* Active user end */
    });

    $(document).ready( function () {
        $('#datatable').DataTable();
    } );


</script>
