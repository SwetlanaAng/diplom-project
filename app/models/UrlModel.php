<?php
require 'DB.php';

class UrlModel {
    private $long;
    private $short;



    private $_db = null;

    public function __construct() {
        $this->_db = DB::getInstence();
    }

    public function setData($long, $short) {
        $this->long = $long;
        $this->short = $short;
    }

    public function validShort() {

        $re = $this->_db->query("SELECT * FROM `reduction` WHERE `short` = '$this->short'");
        $url = $re->fetch(PDO::FETCH_ASSOC);


        if($url['short'] != '')
            return "Такое сокращение уже используется в базе";
        else
            return "Верно";
    }

    public function addShort() {
        $sql = 'INSERT INTO reduction(long_url, short) VALUES(:long, :short)';
        $query = $this->_db->prepare($sql);
        $query->execute(['long' => $this->long, 'short' => $this->short]);

        //$this->setURL($this->short);
    }

    public function list() { //
        $query = $this->_db->query("SELECT * FROM `reduction`");
        $lists = $query->fetchAll(PDO::FETCH_OBJ);
        $li = '<h1>Сокращенные ссылки</h1><br>';
        foreach ($lists as $list) {
            $li =$li.'<div class="list"><p>Длинная:' . $list->long_url . '</p><br> <p>Короткая:<a href="https://localhost/s/process">localhost/s/' . $list->short . '</a></p><br><form action="home/index" method="post">
            <input type="hidden" name="delete_url" value="'.$list->id.'">
            <button type="submit" class="btn">Удалить</button>
        </form></div><br><br>';
        }
        return $li;

    }

    public function deleteUrl($id){
        echo $id;
        $sql = "DELETE FROM reduction WHERE id = ?";
        $query = $this->_db->prepare($sql);
        $query->execute([$id]);
    }
}