<h3><strong>Laporan Shift</strong></h3>
<?php
echo anchor('laporanshift/post', 'Tambah Data', array('class'=>'btn btn-primary btn-sm'));
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
                    <td>" . anchor('laporanshift/edit' . $r->idlaporanshift, 'Edit') . "</td>
                    <td>" . anchor('laporanshift/delete' . $r->idlaporanshift, 'Delete') . "</td>
            </tr>";
        $no++;
    }
    ?>

</table>
