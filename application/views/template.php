


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>SPC Application</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="navbar-static-top.css" rel="stylesheet">

        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <!-- Static navbar -->
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">SPC APPLICATION</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><?php echo anchor('laporanshift', 'Laporan Shift'); ?></li>
                        <li><?php echo anchor('barang', 'Data Barang'); ?></li>
                        <li><?php echo anchor('operator', 'Operator Sistem'); ?></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaksi <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><?php echo anchor('transaksi', 'Form Transaksi'); ?></li>
                                <li><?php echo anchor('transaksi/laporan', 'Laporan Transaksi'); ?></li>
                                <li><?php echo anchor('transaksi/excel', 'Laporan Excel'); ?></li>
                                <li><?php echo anchor('transaksi/pdf', 'Laporan PDF'); ?></li>

                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><?php echo anchor('auth/logout', 'Logout'); ?></li></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>


        <div class="container">

            <?php echo $contents; ?>

        </div> <!-- /container -->

        <div class="navbar navbar-default navbar-fixed-bottom navbar-min"> 
            <div class="navbar-inner"> 
                <div class="container">
                    <footer class="well-sm">
                        <strong>@copyright by Majid Abdullah</strong>
                    </footer>
                </div>
            </div>                        
        </div>
    </body>
</html>
