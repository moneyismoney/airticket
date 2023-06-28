<?php

namespace Model;

require_once  "Database.php";
class FlightModel extends Database
{
    public function getFlightsByDate($date, $origin, $destination) {
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
                    WHERE 
                        departure_date  = ? AND 
                        origin = ? AND
                        destination = ? 
                    ORDER BY id DESC " , ['sss', $date, $origin, $destination]);
    }
}