<h3><strong>Laporan Shift</strong></h3>
<?php
echo anchor('laporanshift/post', 'Tambah Data', array('class' => 'btn btn-primary btn-sm'));
?>
<hr>
<table class="table table-bordered">
    <tr><th>No</th><th>Tanggal</th><th>Shift</th><th>Line</th><th>Motif</th>
        <th>kw1(s)</th><th>kw1(m)</th><th>kw1(l)</th><th>rend kw1</th>
        <th>kw2(s)</th><th>kw2(m)</th><th>kw2(l)</th><th>rend kw2</th>
        <th>reject</th><th>rend reject</th>
        <th colspan="2">Operasi</th>
    </tr>
    <?php
    $no = 1;
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
