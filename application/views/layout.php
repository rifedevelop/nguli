<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
    
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url().'asset/css/bootstrap.min.css'; ?>">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url().'asset/css/main.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'asset/css/slick.css'; ?>">
    <link href="<?php echo base_url().'asset/plugins/tagsinput/jquery.tagsinput.css';?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'asset/css/jquery-ui-1.12.1.css'; ?>">
    <!-- <link rel="stylesheet" href="<?php echo base_url().'asset/plugins/datepicker/dist/css/bootstrap-datepicker.css';?>"> -->
    <!-- <script src="<?php echo base_url().'asset/js/jquery-3.5.1.min.js'; ?>"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="<?php echo base_url().'asset/plugins/tinymce/tinymce.min.js'; ?>"></script> -->
</head>
<body>

<noscript>Your browser does not support JavaScript!</noscript>

<!-- Notification -->
<div class="fixed-top">
    <?php if($this->session->flashdata('error')) { ?>
    <div class="row justify-content-center pt-3">
        <div class="col-5 alert alert-danger align-self-center" id="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    </div>
    <?php } else if($this->session->flashdata('success')) { ?>
    <div class="row justify-content-center pt-3">
        <div class="col-5 alert alert-success align-self-center" id="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Success! </strong>  <?php echo $this->session->flashdata('success'); ?>
        </div>
    </div>
    <?php } ?>
</div>
<!-- End Notification -->

<?php $this->load->view($main); ?>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
<script src="<?php echo base_url().'asset/js/popper.min.js'; ?>"></script>
<script src="<?php echo base_url().'asset/js/bootstrap.min.js'; ?>"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->

<script src="<?php echo base_url().'asset/js/slick-plugin.js'; ?>"></script>
<script src="<?php echo base_url().'asset/js/slick.js'; ?>"></script>
<script src="<?php echo base_url().'asset/js/main.js'; ?>"></script>
<script src="<?php echo base_url().'asset/plugins/tagsinput/jquery.tagsinput.min.js';?>"></script>
<!-- <script src="<?php echo base_url().'asset/plugins/datepicker/dist/js/bootstrap-datepicker.js';?>"></script> -->

<script>
$("#alert").fadeTo(5000, 500).slideUp(500, function(){
    $("#alert").slideUp(5000);
});

// Input Tags
if($(".tags").length > 0)
    $(".tags").tagsInput({
    'width':'100%',
    'height':'150px',
    'onAddTag': function(text){
    //action
    },
    'onRemoveTag': function(text){
    //action
}});

$(document).ready(function () {
    var lang = '<?= get_cookie('lang_is'); ?>';
    if(lang === 'english') {
        $("#lang").prop('checked', true);
        $('input[id^="lang"]').click(function () {
            window.location = "<?php echo site_url('language/set/indonesia');?>";
        });
    } else {
        $("#lang").prop('checked', false);
        $('input[id^="lang"]').click(function () {
            window.location = "<?php echo site_url('language/set/english');?>";
        });
    }

    // Carousel Multiple
    $('#myCarousel').carousel({
        interval: 4000
    })

    $('.carousel .carousel-item').each(function() {
        var minPerSlide = 4;
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < minPerSlide; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });
    // Carousel Multiple
    
});
</script>
</body>
</html>