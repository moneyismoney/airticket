<?php

namespace Model;

require_once  "Database.php";
class AirportModel extends Database
{
    public function getAirports(): array
    {
        return $this->select("SELECT id,name,code FROM airticket.airports ORDER BY id DESC ");
    }

    public function getAirportIdtByCode($code): ?int
    {
        foreach ($this->getAirports() as $airport) {
            if (!empty($airport['code']) && $code === $airport['code']) {
                return (int) $airport['id'];
            }
        }

        return null;
    }

    public function getAirportNametById($id): ?string
    {
        foreach ($this->getAirports() as $airport) {
            if (!empty($airport['id']) && $id === (int) $airport['id']) {
                return $airport['name'];
            }
        }

        return null;
    }
}