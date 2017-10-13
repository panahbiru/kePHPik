<?php
foreach($list_produk as $l)
{
    $walker_produk[$l->id]['nama_barang']   = $l->nama_barang;
    $walker_produk[$l->id]['rp_harga']      = $l->rp_harga;
}
?>

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
        <table class="table table-bordered table-responsive" style="font-size: 0.8em;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Ongkir</th>
                <th>Total Belanja</th>
                <th>Vendor Ekspedisi</th>
                <th>Marketplace</th>
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
                    echo '<td>';
                    $produk = explode(',', $trans->list_produk);
                    foreach($produk as $pr)
                    {
                        if(empty($pr))
                            continue;

                        echo '- '.$walker_produk[$pr]['nama_barang'].'<br/>';
                    }
                    echo '</td>';
                    echo '<td>';
                    foreach($produk as $pr)
                    {
                        if(empty($pr))
                            continue;

                        echo format_rupiah($walker_produk[$pr]['rp_harga']).'<br/>';
                        $besar_rpproduk += $walker_produk[$pr]['rp_harga'];
                    }
                    echo '</td>';
                    echo '<td>'.format_rupiah($trans->rp_ongkir).'</td>';
                    echo '<td>'.format_rupiah($trans->rp_total).'</td>';
                    echo '<td>'.$trans->vendor_ongkir.'</td>';
                    echo '<td>'.ucfirst($trans->vendor).'</td>';
                    echo '</tr>';

                    $omset += $trans->rp_total;
                    $besar_ongkir += $trans->rp_ongkir;
                    $besar_bruto += $trans->rp_total;
                    $no++;
                }
            }
            ?>
            <tr>
                <td colspan="3" class="text-right text-bold">
                    Total
                </td>
                <td><?php echo format_rupiah($besar_rpproduk);?></td>
                <td><?php echo format_rupiah($besar_ongkir);?></td>
                <td><?php echo format_rupiah($omset);?></td>
                <td>-</td><td>-</td>
            </tr>
        </tbody>
        </table>
    </div>
</div>
