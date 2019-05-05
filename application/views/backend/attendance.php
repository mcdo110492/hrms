<!doctype html>
<?php
//$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
$system_name  = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
?>

<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        <?php echo get_phrase('login'); ?> | <?php echo $system_name; ?>
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo base_url();?>assets/login_page/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login_page/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login_page/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login_page/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login_page/css/style.css">
    <script src="<?php echo base_url();?>assets/login_page/js/vendor/modernizr-2.8.3.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>

<body>
    <div class="main-content-wrapper">
        <div class="login-area">
            <div class="login-header">
                <a href="<?php echo site_url('login'); ?>" class="logo">
                    <img src="<?php echo base_url();?>assets/login_page/img/logo.png" height="60" alt="">
                </a>
                <h2 class="title"><?php echo $system_name; ?> | Employee Attendance</h2>
                <h2 class="title"><?php echo date('M d, Y'); ?></h2>
                <h2 id="time" class="title"></h2>
            </div>
            <div class="login-content">

                <button type="button" onclick="showAjaxModal('<?php echo site_url('modal/attendance/time_in'); ?>');"
                    class="btn btn-primary"><?php echo get_phrase('time_in'); ?><i class="fa fa-clock-o"></i></button>

                <button type="button" onclick="showAjaxModal('<?php echo site_url('modal/attendance/time_out'); ?>');"
                    class="btn btn-primary"><?php echo get_phrase('time_out'); ?><i class="fa fa-clock-o"></i></button>



            </div>
        </div>
        <div class="image-area"></div>
    </div>

    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo $system_name;?></h4>
                </div>

                <div class="modal-body" style="height:500px; overflow:auto;">



                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-notify.js"></script>


    <?php if ($this->session->flashdata('login_error') != '') { ?>
    <script type="text/javascript">
    $.notify({
        // options
        title: '<strong><?php echo get_phrase('error');?>!!</strong>',
        message: '<?php echo $this->session->flashdata('login_error');?>'
    }, {
        // settings
        type: 'danger'
    });
    </script>
    <?php } ?>



    <?php if ($this->session->flashdata('not_timed_in') != '') { ?>
    <script type="text/javascript">
    $.notify({
        // options
        title: '<strong><?php echo get_phrase('error');?>!!</strong>',
        message: '<?php echo $this->session->flashdata('not_timed_in');?>'
    }, {
        // settings
        type: 'danger'
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('alreadty_time_out') != '') { ?>
    <script type="text/javascript">
    $.notify({
        // options
        title: '<strong><?php echo get_phrase('error');?>!!</strong>',
        message: '<?php echo $this->session->flashdata('alreadty_time_out');?>'
    }, {
        // settings
        type: 'danger'
    });
    </script>
    <?php } ?>


    <?php if ($this->session->flashdata('already_time_in') != '') { ?>
    <script type="text/javascript">
    $.notify({
        // options
        title: '<strong><?php echo get_phrase('error');?>!!</strong>',
        message: '<?php echo $this->session->flashdata('already_time_in');?>'
    }, {
        // settings
        type: 'danger'
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('success_time_in') != '') { ?>
    <script type="text/javascript">
    $.notify({
        // options
        title: '<strong><?php echo get_phrase('success');?>!!</strong>',
        message: '<?php echo $this->session->flashdata('success_time_in');?>'
    }, {
        // settings
        type: 'success'
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('success_time_out') != '') { ?>
    <script type="text/javascript">
    $.notify({
        // options
        title: '<strong><?php echo get_phrase('success');?>!!</strong>',
        message: '<?php echo $this->session->flashdata('success_time_out');?>'
    }, {
        // settings
        type: 'success'
    });
    </script>
    <?php } ?>

    <script>
    function showAjaxModal(url) {
        // SHOWING AJAX PRELOADER IMAGE
        //jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" style="height:25px;" /></div>');

        // LOADING THE AJAX MODAL
        $('#modal_ajax').modal('show', {
            backdrop: 'true'
        });

        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response) {
                $('#modal_ajax .modal-body').html(response);
            }
        });
    }

    function getDate() {
        var today = new Date;
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();

        if (s < 10) {
            s = "0" + s;
        }
        if (m < 10) {
            m = "0" + m;
        }

        $('#time').text(h + " : " + m + " : " + s);

    }

    setInterval(function() {
        getDate();
    }, 1000);
    </script>



</body>

</html>