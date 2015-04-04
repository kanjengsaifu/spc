<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datepicker.js"></script>
<h3><strong>Laporan Shift</strong></h3>
<table class="table table-bordered">
    <tr> <td>
            <div class="col-sm-2">
                <?php
                echo anchor('laporanshift/post', 'Tambah Data', array('class' => 'btn btn-primary btn-sm'));
                ?>
            </div>
        </td>

        <td class="col-sm-1">Cari Data :</td>
        <?php
        echo form_open('laporanshift/search');
        date_default_timezone_set("Asia/Jakarta");
        ?>
        <td class="col-sm-2">
            <div id="searchtgl1" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                <input name="tgl1" class="form-control" type="text" value="<?php echo date("Y-m-d"); ?>" readonly>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </td>
        <td class="col-sm-2">
            <div id="searchtgl2" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                <input name="tgl2" class="form-control" type="text" value="<?php echo date("Y-m-d"); ?>" readonly>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </td>
        <td class="col-sm-1">
            <div>
                <button type="submit" name="submit" class="btn btn-primary">Search</button>

            </div>
        </td>
        </form>

    </tr>
</table>
<hr>
<table class="table table-bordered">
    <tr><th>No</th><th>Tanggal</th><th>Shift</th><th>Line</th><th>Motif</th>
        <th>kw1(s)</th><th>kw1(m)</th><th>kw1(l)</th><th>rend kw1</th>
        <th>kw2(s)</th><th>kw2(m)</th><th>kw2(l)</th><th>rend kw2</th>
        <th>reject</th><th>rend reject</th>
        <th colspan="2">Operasi</th>
    </tr>
    <?php
    $no = 1 + $this->uri->segment(3);
    $totalkw1s = 0;
    $totalkw1m = 0;
    $totalkw1l = 0;
    $totalrendkw1 = 0;
    $totalkw2s = 0;
    $totalkw2m = 0;
    $totalkw2l = 0;
    $totalrendkw2 = 0;
    $totalreject = 0;
    $totalrendreject = 0;
    if (count($record->result()) > 0) {
        foreach ($record->result() as $r) {
            echo "<tr>
                    <td>$no</td>
                    <td>$r->tgllaporanshift</td>
                    <td>$r->shift</td>
                    <td>$r->line</td>
                    <td>$r->motif</td>
                    <td>$r->kw1s</td>            
                    <td>$r->kw1m</td>
                    <td>$r->kw1l</td>
                    <td>$r->rendkw1</td>
                    <td>$r->kw2s</td>            
                    <td>$r->kw2m</td>
                    <td>$r->kw2l</td>
                    <td>$r->rendkw2</td>
                    <td>$r->reject</td>
                    <td>$r->rendreject</td>
                    <td>" . anchor('laporanshift/edit/' . $r->idlaporanshift, 'Edit') . "</td>
                    <td>" . anchor('laporanshift/delete/' . $r->idlaporanshift, 'Delete') . "</td>                  
            </tr>";
            $totalkw1s = $totalkw1s + $r->kw1s;
            $totalkw1m = $totalkw1m + $r->kw1m;
            $totalkw1l = $totalkw1l + $r->kw1l;
            $totalrendkw1 = $totalrendkw1 + $r->rendkw1;
            $totalkw2s = $totalkw2s + $r->kw2s;
            $totalkw2m = $totalkw2m + $r->kw2m;
            $totalkw2l = $totalkw2l + $r->kw2l;
            $totalrendkw2 = $totalrendkw2 + $r->rendkw2;
            $totalreject = $totalreject + $r->reject;
            $totalrendreject = $totalrendreject + $r->rendreject;
            $no++;
        }
    } else {
        echo '<tr class="danger"><td colspan="16"><b>Data yang dicari tidak ditemukan</b></td></tr>';
    }
    ?>
    <tr class="success">
        <td colspan="5">total</td>
        <td><?php echo $totalkw1s; ?></td>
        <td><?php echo $totalkw1m; ?></td>
        <td><?php echo $totalkw1l; ?></td>
        <td><?php echo $totalrendkw1; ?></td>
        <td><?php echo $totalkw2s; ?></td>
        <td><?php echo $totalkw2m; ?></td>
        <td><?php echo $totalkw2l; ?></td>
        <td><?php echo $totalrendkw2; ?></td>
        <td><?php echo $totalreject; ?></td>
        <td><?php echo $totalrendreject; ?></td>
        <td colspan="2"></td>

    </tr>

</table>

<?php
echo $paging;
?>

<script>
//options method for call datepicker
    $("#searchtgl1").datepicker({autoclose: true, todayHighlight: true});
    $("#searchtgl2").datepicker({autoclose: true, todayHighlight: true});
</script>
