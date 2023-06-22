<?php

namespace Model;

require_once  "./Model/Database.php";
class AirportModel extends Database
{
    public function getAirports() {
        return $this->select("SELECT name,code FROM airticket.airports ORDER BY id DESC ");
    }
}