<?php
/*
    Core Models

    Semua model DB produk dan transaksi disini
*/

Class ModelCore
{
    public function __construct()
    {
        // constructor
        $this->db               = new ezSQL_mysqli(DBUSER,DBPASSWD,DBNAME,DBHOST);

        // def var
        $this->tb_produk        = 'produk';
        $this->tb_transaksi     = 'transaksi';
    }

    public function get_all_produk()
    {
        $data = $this->db->get_results("SELECT * FROM $this->tb_produk ORDER BY id ASC");
        return $data;
    }

    public function get_a_produk( $id = 0)
    {
        $data = $this->db->get_row("SELECT * FROM $this->tb_produk WHERE id = '$id' LIMIT 1");
        return $data;
    }

    public function get_all_transaksi()
    {
        $data = $this->db->get_results("SELECT * FROM $this->tb_transaksi ORDER BY id ASC");
        return $data;
    }

    public function get_a_transaksi( $id = 0)
    {
        $data = $this->db->get_row("SELECT * FROM $this->tb_transaksi WHERE id = '$id' LIMIT 1");
        return $data;
    }

}