<?php

/**
 *  Summary
 * 
 *  file ini sebagai file configurasi
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource config.php
 */

// mengaktifkan session
session_start();

/**
 * function untuk membuat base url
 * 
 * @var $url diset null
 * @return
 */
function base_url($url = null)
{
    // @var $base_url diset dengan alamat url
    $base_url = "http://localhost/paylistrik";
    // cek kondisi jika tidak null
    if ($url != null) {
        // @var kembalikan return yang diisi dengan $base_url dan $url
        return $base_url . "/" . $url;
    } else {
        // @var kembalikan $base_url
        return $base_url;
    }
}
