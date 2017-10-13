<?php
/*
    Controller Home
*/
Class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model('core');
        $this->helper('umum');
    }

    public function getIndex()
    {
        $data['conf']           = $this->conf();
        $data['list_produk']    = $this->core->get_all_produk();
        $this->output('header', $data);
        $this->output('index', $data);
        $this->output('footer', $data);
    }

    public function getProduk()
    {
        $this->getIndex();
    }

    public function getTransaksi()
    {
        $data['conf']               = $this->conf();
        $data['list_transaksi']     = $this->core->get_all_transaksi();
        $data['list_produk']        = (array) $this->core->get_all_produk();
        $this->output('header', $data);
        $this->output('transaksi', $data);
        $this->output('footer', $data);
    }

    public function getAdd_transaksi()
    {
        $data['conf']           = $this->conf();
        $this->output('header', $data);
        $this->output('transaksi_add', $data);
        $this->output('footer', $data);
    }

    public function postAdd_transaksi()
    {
        $data['conf']           = $this->conf();
        $data['list_transaksi']    = $this->core->get_all_transaksi();
        $this->output('header', $data);
        $this->output('transaksi', $data);
        $this->output('footer', $data);
    }
}