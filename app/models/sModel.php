<?php
require 'DB.php';
class SModel {
    private $_db = null;

    public function __construct() {
        $this->_db = DB::getInstence();
    }

    public function getProcess($short) {
        $data=[];
        $lo = $this->_db->query("SELECT * FROM `reduction` WHERE `short` = '$short'");
        $url_lo = $lo->fetch(PDO::FETCH_ASSOC);
        return $url_lo['long_url'];




    }}