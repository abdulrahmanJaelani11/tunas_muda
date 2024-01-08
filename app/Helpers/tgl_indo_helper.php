<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tahun
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tanggal
    isset($pecahkan[2]) ? $pecah_wkt = explode(' ', $pecahkan[2]) : $pecah_wkt = '';
    if (is_array($pecah_wkt)) {
        if (isset($pecah_wkt[1])) {
            $tanggal = $pecah_wkt[0] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0] . ' ' . $pecah_wkt[1];
        } else {
            $tanggal = $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        }
    }

    return $tanggal;
}
