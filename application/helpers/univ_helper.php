<?php

function kelas()
{
    $data = array(
        'RA', 'RB', 'RC', 'RD', 'RE', 'RF', 'RG', 'RH', 'RI', 'RJ', 'RK', 'RL', 'RM', 'RN',
        'SA', 'SB', 'SC', 'SD', 'SE', 'SF', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN'
    );
    return $data;
}

function hari()
{
    $data = array(
        'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUM\'AT', 'SABTU'
    );
    return $data;
}

function jam()
{
    $data = array(
        '08 : 00 - 10 : 00', '10 : 00 - 12 : 00', '12 : 00 - 14 : 00', '14 : 00 - 16 : 00', '16 : 00 - 18 : 00',
        '18 : 30 - 20 : 00', '20 : 00 - 21 : 30'
    );
    return $data;
}

function semeter_akademik()
{
    $data = array(
        1, 2, 3, 4, 5, 6, 7, 8
    );
    return $data;
}

function perkuliahan()
{
    $data = array(
        'REGULER PAGI', 'REGULER SORE', 'EKSTENSI'
    );
    return $data;
}
