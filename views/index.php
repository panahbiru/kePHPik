<p class="text-right text-small"><a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a></p>
<div class="row">
    <div class="col-md-12">
        <h1>Daftar Produk</h1>
        <p>Selamat datang gan.</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive" style="font-size: 0.8em;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(empty($list_produk))
            {
                echo '<tr><td colspan="3">Tidak ada data produk yang dapat ditampilkan. Cek database!</td></tr>';
            }else{
                $no = 1;
                foreach($list_produk as $produk)
                {
                    echo '<tr>';
                    echo '<td>'.$no.'.</td>';
                    echo '<td>'.$produk->nama_barang.'</td>';
                    echo '<td>'.format_rupiah($produk->rp_harga).'</td>';
                    echo '</tr>';
                    $no++;
                }
            }
            ?>
        </tbody>
        </table>
    </div>
</div>
