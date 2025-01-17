<div class="container-fluid">
    <h4>Detail Pesanan 
        <div class="btn btn-sm btn-success">
            Nomor Invoice: 
            <?php echo isset($invoice->id) ? $invoice->id : 'Data Tidak Ada'; ?>
        </div>
    </h4>

    <table class="table table-bordered tabel-hover table-striped">
        <tr>
            <th>ID BARANG</th>
            <th>NAMA PRODUK</th>
            <th>JUMLAH PESANAN</th>
            <th>HARGA SATUAN</th>
            <th>SUB-TOTAL</th>
        </tr>

        <?php 
        $total = 0;
        if (!empty($pesanan)) :
            foreach ($pesanan as $psn) :
                $subtotal = $psn->jumlah * $psn->harga;
                $total += $subtotal;
        ?>
            <tr>
                <td><?php echo $psn->id_brg; ?></td>
                <td><?php echo $psn->nama_brg; ?></td>
                <td align="center"><?php echo $psn->jumlah; ?></td>
                <td>Rp. <?php echo number_format($psn->harga, 0, ',', '.'); ?></td>
                <td>Rp. <?php echo number_format($subtotal, 0, ',', '.'); ?></td>
            </tr>
        <?php 
            endforeach;
        else: ?>
            <tr>
                <td colspan="5" align="center">Data pesanan tidak tersedia</td>
            </tr>
        <?php endif; ?>
        
        <tr>
            <td colspan="4" align="center">Total</td>
            <td>Rp. <?php echo number_format($total, 0, ',', '.'); ?></td>
        </tr>
    </table>
    <a href="<?php echo base_url('admin/invoice/index'); ?>">
        <div class="btn btn-sm btn-primary">Kembali</div>
    </a>
</div>
