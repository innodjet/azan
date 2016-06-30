<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Recherche d évènement</title>

    <?php include 'include/headerfile.php'?>

    <link href="css/searchEvenement.css" rel="stylesheet">
    <link href="css/daterangepicker.css" rel="stylesheet">

    <style type="text/css">
        .demo { position: relative; }
        .demo i {
            position: absolute; bottom: 10px; right: 24px; top: auto; cursor: pointer;
        }

    </style>

</head>
<body>


<?php include 'include/navbar.php'?>


<!-- Wrap all page content here -->
<div id="wrap">


    <div class="container" >
        <div class="row">
            <h3 class="text-center">Recherche d'évènement</h3>
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
            <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="col-md-4 col-md-offset-4 demo">
                    <input type="text" id="config-demo" class="form-control">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>

                </div>


                <script type="text/javascript">
                    $(function() {

                        function cb(start, end) {
                            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                        }
                        cb(moment().subtract(29, 'days'), moment());

                        $('#reportrange').daterangepicker({
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                'Ce mois ci': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            }
                        }, cb);

                    });
                </script>
            </div>

        </div>
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="loader text-center" style="display:none"><img src="images/res/loading.gif"></div>
            <div class="response"></div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
    </div>
</div>
</div>
</div>



<script type="text/javascript" src="js/moment.min.js"></script>
<script type="text/javascript" src="js/daterangepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.demo i').click(function() {
            $(this).parent().find('input').click();
        });
        updateConfig();

        function updateConfig() {
            var options = {};
            options.opens = "center";
            options.ranges = {
                'Aujourd\' hui': [moment(), moment()],
                'Hier': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Les 7 derniers jours': [moment().subtract(6, 'days'), moment()],
                'Les 30 derniers jours': [moment().subtract(29, 'days'), moment()],
                'Ce mois ci': [moment().startOf('month'), moment().endOf('month')],
                'Le mois dernier': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            };
            $('#config-demo').daterangepicker(options, function(start, end, label) {
                var startDate = start.format('YYYY-MM-DD'); var endDate = end.format('YYYY-MM-DD');
                passDate(startDate,endDate);
            });

        }

    });

    function passDate(startDate,endDate) {
        $('.loader').show();
        $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: 'ajax/date-filteration.php', // the url where we want to POST
                data: 'startDate='+startDate+'&endDate='+endDate, // our data object
            })
            // using the done promise callback
            .done(function(data) {
                $('.loader').hide();
                // log data to the console so we can see
                $('.response').html(data);
                // here we will handle errors and validation messages
            });
    }

</script>


</body>
</html>
