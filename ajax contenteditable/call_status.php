<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="fa fa-user"></i><span class="break"></span>Add Call Status</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
        </div>

        <div class="box-content">

            <form id="formDataValu" class="form-horizontal" method="post">

                <fieldset> 
                    <div class="control-group">

                        <label class="control-label" for="password"><i class="icon-lock"></i> Status Name: </label>
                        <div class="controls">
                            <input class="input-xlarge" name="call_status" id="call_status" type="text"   style="width: 48.5%;">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button id="submit" type="button"class="btn btn-primary"><i class="fa fa-share"></i>  Save changes</button>
                        <span id="message" style="float: right;font-size: 18px;"></span>
                    </div>

                </fieldset>
            </form>

        </div> <!--/.box-content-->

    </div><!--/span-->

</div><!--/.row-->

<!--Report display-->

<div class="requestResult"> </div>

<script>

    $(document).ready(function () {

        /* Display agents */
        $('.requestResult').load('reports/call_status_create_report_list.php');
//        setInterval(function () {
//            $('.requestResult').load('reports/users-create-report-list.php');
//        }, 5000);
        /* delete agent */


        /* username validation */
        $('#submit').click(function () {
             let call_status = $('#call_status').val();
            // alert(call_status);
                $.ajax({
                    'url': 'reports/call_status_create_ajax.php',
                    'method': 'POST',
                    // 'data': {'username': username, 'sql': 'SELECT status FROM vicidial_campaign_statuses WHERE status = '},
                    'data': {'call_status': call_status},
                    'success': function (data) {
                    	alert(data);
                        $('#message').fadeIn('fast').html(data);
                        $('#message').fadeOut(4000).html(data);
                        $('.requestResult').load('reports/call_status_create_report_list.php');

                    },
                });
        });
        // /* validation rules */

        // $('#submit').click(function (e) {
        //     e.preventDefault();
        //     let isValidate = true;
        //     $('fieldset input').each(function () {
        //         if ($(this).val() === '') {
        //             isValidate = false;
        //             $(this).css({'box-shadow': '0px 0px 5px red'});
        //         } else {
        //             $(this).css({'box-shadow': '0px 0px 0px transparent'});
        //         }
        //     });
        //     $('fieldset input').blur(function () {
        //         if ($(this).val() !== '') {
        //             isValidate = false;
        //             $(this).css({'box-shadow': '0px 0px 0px transparent'});
        //         } else {
        //             $(this).css({'box-shadow': '0px 0px 5px red'});
        //         }

        //     });


        //     if (isValidate) {
        //         let call_status = $('#call_status').val();
        //         alert(call_status);
        //         let data_1 = {'call': call_status};
        //         $.ajax({
        //             'url': 'reports/call_status_create_ajax.php',
        //             'method': 'POST',
        //             'data': data_1,
        //             'success': function (data) {
        //                 alert(data);
        //                 $('#message').fadeIn().html(data).addClass('message');
        //                 setTimeout(function () {
        //                     $('#message').fadeOut(4000).html(data);
        //                     $('.user_msg').fadeOut('fast');
        //                     $('.requestResult').load('reports/call_status_create_report_list.php');
        //                 }, 1000);
        //                 $('form').trigger('reset');
        //             },
        //         });
        //     } else {
        //         $('#message').fadeIn().html('<strong>ALl field required</strong>').addClass('message');
        //         setTimeout(function () {
        //             $('#message').fadeOut();
        //         }, 3000);
        //     }
        // });
    });

</script>
