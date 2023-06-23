<?php

namespace Model;

require_once  "./Model/Database.php";
class FlightModel extends Database
{
    public function getFlightsByDate($date) {
        return $this->select(
            "SELECT 
                        transporter_id,
                        origin,
                        destination,
                        departure_date
                        departure_time,
                        arrival_time,
                        flight_number
                    FROM airticket.flight
                    ORDER BY id DESC ");
    }
}