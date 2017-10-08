<p class="text-right text-small"><a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a></p>
<div class="row">
    <div class="col-md-12">
        <h1>Daftar Transaksi</h1>
        <p>
            Berikut adalah daftar transaksi yang tercatat dalam database.
            <span class="text-right"><a class=" btn btn-success btn-sm" href="<?php echo $conf->site_url;?>home/add_transaksi">Tambah Transaksi</a></span>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Total Belanja</th>
                <th>Ongkir</th>
                <th>Vendor Ekspedisi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(empty($list_transaksi))
            {
                echo '<tr><td colspan="3">Tidak ada data produk yang dapat ditampilkan. Cek database!</td></tr>';
            }else{
                $no = 1;
                foreach($list_transaksi as $trans)
                {
                    echo '<tr>';
                    echo '<td>'.$no.'.</td>';
                    echo '<td>'.$trans->nama_pembeli.'</td>';
                    echo '<td>'.format_rupiah($trans->rp_total).'</td>';
                    echo '<td>'.format_rupiah($trans->rp_ongkir).'</td>';
                    echo '<td>'.$trans->vendor_ongkir.'</td>';
                    echo '</tr>';

                    $omset += $trans->rp_total;
                    $besar_ongkir += $trans->rp_ongkir;
                    $no++;
                }
            }
            ?>
            <tr>
                <td colspan="2" class="text-right text-bold">
                    Total
                </td>
                <td><?php echo format_rupiah($omset);?></td>
                <td><?php echo format_rupiah($besar_ongkir);?></td>
                <td>-</td>
            </tr>
        </tbody>
        </table>
    </div>
</div>
