<?php

function format_rupiah( $angka = 0)
{
    return 'Rp. ' . number_format( $angka, 0 , '' , '.' ) . ',-';
}