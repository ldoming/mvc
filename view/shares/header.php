<?php require_once 'config/ini.php'; ?>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo $_SESSION['base_url'] . 'public/css/global_styles.css'; ?>" type="text/css"/>
        <link rel="stylesheet" href="<?php echo $_SESSION['base_url'] . 'public/css/style.php'; ?>" type="text/css"/>
        <script type="text/javascript" src="<?php echo $_SESSION['base_url'] . 'public/js/jquery.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $_SESSION['base_url'] . 'public/js/textfilter.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $_SESSION['base_url'] . 'public/js/validation.js'; ?>"></script>
    </head>
    <script type='text/javascript'>
        $(document).ready(function() {
            $("#phone_number").keydown(function(event) {
                if ($.inArray(event.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                        (event.keyCode == 65 && event.ctrlKey === true) ||
                        (event.keyCode >= 35 && event.keyCode <= 39)) {
                    return;
                }
                else {
                    if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
                        event.preventDefault();
                    }
                }
            });
            $('#phone_number').filter_input({regex: '[0-9]', events: 'keypress paste'});
        });
    </script>
    <body>
        <?php echo $this->msg->display(); ?>
        <div>
            </br>