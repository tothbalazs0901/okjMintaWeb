<?php

//Adatbázis kapcsoalt létrehozása és a CRUD műveletek
class MySqlDB {

    private $db_szerver;
    private $db_felhnev;
    private $db_jelszo;
    private $db_nev;
    private $kapcs;

    public function __construct() {
        $this->db_szerver = "localhost";//"tanulo18.szf1b.oktatas.szamalk-szalezi.hu";
        $this->db_felhnev = "root";//"c1_tanulo18szf1b";
        $this->db_jelszo = "";//"_tanulo18szf1b";
        $this->db_nev = "gyakorlo";//"c1ABtanulo18szf1b";
        $this->kapcsolat();
    }

    ////csefalvay remote
////$host = "web1.szamalk-szalezi.hu";
////$fhnev = "c1csefalvay";
////$jelszo = "csefalvay";
////$adatbazis = "c1csefalvay";
    public function kapcsolat() {
        $this->kapcs = new mysqli($this->db_szerver, $this->db_felhnev, $this->db_jelszo, $this->db_nev);
        $this->kapcs->set_charset('utf8');
        if ($this->kapcs->connect_error) {
            die("Kapcsolódás nem sikerült: " . $this->kapcs->connect_error);
        }
    }

    /* CRUD műveletek */

    //function readData($tablaNeve, $where){
    function lekerdez($tablaNeve, $where = 1) {
        $sql = "SELECT * FROM " . $tablaNeve . " WHERE " . $where;
        $sql = $this->kapcs->query($sql);
//        $sql = $sql->fetch_assoc();
        return $sql;
    }

    //function updateData($tablaNeve, $updateErtekek, $where){
    function frissit($tablaNeve, $ujErtekek, $where) {
//        $this->kapcsolat();
        $sql = "UPDATE " . $tablaNeve . " SET " . $ujErtekek . " WHERE " . $where;
        
        echo $sql;
        $sql = $this->kapcs->query($sql);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }

    //function createData($tablaNeve, $oszlopok, $ertekek){
    function ujRekord($tablaNeve, $oszlopok, $ertekek) {
//        $this->kapcsolat();
        $sql = "INSERT INTO " . $tablaNeve . " " . $oszlopok . " VALUES " . $ertekek;

        $sql = $this->kapcs->query($sql);

        if ($sql == true) {
            return $sql;
        } else {
            return false;
        }
    }

    //function deleteData($tablaNeve, $szuro){
    function torol($tablaNeve, $szuro) {
        $this->kapcsolat();
        $sql = "DELETE FROM " . $tablaNeve . " WHERE " . $szuro;
        $sql = $this->kapcs->query($sql);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }

}
