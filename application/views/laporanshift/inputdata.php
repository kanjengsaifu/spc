<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
<script type="text/javascript">
    $(document).ready(function() {
        function hitung() {
            var kw1s = $("#kw1s").val();
            var kw1m = $("#kw1m").val();
            var kw1l = $("#kw1l").val();
            var kw2s = $("#kw2s").val();
            var kw2m = $("#kw2m").val();
            var kw2l = $("#kw2l").val();
            var reject = $("#reject").val();
            if (kw1s >= 0 && kw1m >= 0 && kw1l >= 0) {
                var rendkw1 = ((parseFloat(kw1s) + parseFloat(kw1m) + parseFloat(kw1l)) /
                        (parseFloat(kw1s) + parseFloat(kw1m) + parseFloat(kw1l) + parseFloat(kw2s) + parseFloat(kw2m) + parseFloat(kw2l) + parseFloat(reject))
                        * (100)).toFixed(2);
                $("#rendkw1").val(rendkw1);
            } else {
                $("#rendkw1").val('');
            }
        }

        function hitung2() {
            var kw1s = $("#kw1s").val();
            var kw1m = $("#kw1m").val();
            var kw1l = $("#kw1l").val();
            var kw2s = $("#kw2s").val();
            var kw2m = $("#kw2m").val();
            var kw2l = $("#kw2l").val();
            var reject = $("#reject").val();
            if (kw2s >= 0 && kw2m >= 0 && kw2l >= 0) {
                var rendkw2 = ((parseFloat(kw2s) + parseFloat(kw2m) + parseFloat(kw2l)) /
                        (parseFloat(kw1s) + parseFloat(kw1m) + parseFloat(kw1l) + parseFloat(kw2s) + parseFloat(kw2m) + parseFloat(kw2l) + parseFloat(reject))
                        * (100)).toFixed(2);
                $("#rendkw2").val(rendkw2);
            } else {
                $("#rendkw2").val('');
            }
        }

        function hitung3() {
            var kw1s = $("#kw1s").val();
            var kw1m = $("#kw1m").val();
            var kw1l = $("#kw1l").val();
            var kw2s = $("#kw2s").val();
            var kw2m = $("#kw2m").val();
            var kw2l = $("#kw2l").val();
            var reject = $("#reject").val();
            if (reject >= 0) {
                var rendreject = ((parseFloat(reject)) /
                        (parseFloat(kw1s) + parseFloat(kw1m) + parseFloat(kw1l) + parseFloat(kw2s) + parseFloat(kw2m) + parseFloat(kw2l) + parseFloat(reject))
                        * (100)).toFixed(2);
                $("#rendreject").val(rendreject);
            } else {
                $("#rendreject").val('');
            }
        }

        /////////////////   
        $("#kw1s").keyup(function() {
            hitung();
            hitung2();
            hitung3();
        });
        $("#kw1m").keyup(function() {
            hitung();
            hitung2();
            hitung3();
        });
        $("#kw1l").keyup(function() {
            hitung();
            hitung2();
            hitung3();
        });

        $("#kw2s").keyup(function() {
            hitung();
            hitung2();
            hitung3();
        });
        $("#kw2m").keyup(function() {
            hitung();
            hitung2();
            hitung3();
        });
        $("#kw2l").keyup(function() {
            hitung();
            hitung2();
            hitung3();
        });
        $("#reject").keyup(function() {
            hitung();
            hitung2();
            hitung3();
        });
        /////////////////
    });

</script>

<h3>Tambah Data Laporan Produksi</h3>
<?php
echo form_open('laporanshift/post');
date_default_timezone_set("Asia/Jakarta");
?>

<table class="table table-bordered">
    <tr><td>Tanggal :</td>
        <td id="datepickers"  data-date="" data-date-format="dd-mm-yyyy"> 
            <input type="text" name="tanggal" placeholder="<?php echo date("dd-mm-yyyy"); ?>" 
                    class="form-control" disabled>
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </td>
        <td>Shift :</td>
        <td> <input type="text" name="shift" placeholder="shift" class="form-control"></td>
        <td>line :</td>
        <td> <input type="text" name="line" placeholder="line" class="form-control"></td>
        <td>motif</td>
        <td colspan="2"> <input type="text" name="motif" placeholder="motif" class="form-control"></td>

    </tr>
    <tr class="success">
        <td>kw1s</td>            
        <td>kw1m</td>
        <td>kw1l</td>
        <td>rendkw1(%)</td>
        <td>kw2s</td>            
        <td>kw2m</td>
        <td>kw2l</td>
        <td>rendkw2(%)</td>
        <td>reject</td>
        <td>rendreject(%)</td>
    </tr>
    <tr>
        <td> <input type="text" name="kw1s" placeholder="kw1s" class="form-control" id="kw1s"></td>
        <td> <input type="text" name="kw1m" placeholder="kw1m" class="form-control" id="kw1m"></td>
        <td> <input type="text" name="kw1l" placeholder="kw1l" class="form-control" id="kw1l"></td>
        <td> <input type="text" name="rendkw1" placeholder="rdkw1" class="form-control" readonly="readonly" id="rendkw1"></td>
        <td> <input type="text" name="kw2s" placeholder="kw2s" class="form-control" id="kw2s"></td>
        <td> <input type="text" name="kw2m" placeholder="kw2m" class="form-control" id="kw2m"></td>
        <td> <input type="text" name="kw2l" placeholder="kw2l" class="form-control" id="kw2l"></td>
        <td> <input type="text" name="rendkw2" placeholder="rdkw2" class="form-control" readonly="readonly" id="rendkw2"></td>
        <td> <input type="text" name="reject" placeholder="reject" class="form-control" id="reject"></td>
        <td> <input type="text" name="rendreject" placeholder="rdrjct" class="form-control" readonly="readonly" id="rendreject"></td>
    </tr>
</table>
</form>


<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/datepicker.js"></script>
<script>
//options method for call datepicker
    $("#datepickers").datepicker({autoclose: true, todayHighlight: true});

</script>
