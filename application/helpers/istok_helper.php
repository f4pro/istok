<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role = $ci->session->userdata('status');
        if ($role != "Admin") {
            redirect('barang');
        }
    }
}
function is_logged_in2()
{

    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role = $ci->session->userdata('status');
        if ($role != "Karyawan") {
            redirect('HomeKar');
        }
    }
}
function is_logged_in3()
{

    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role = $ci->session->userdata('status');
        if ($role != "Proses") {
            redirect('Validation');
        }
    }
}
