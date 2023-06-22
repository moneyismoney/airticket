<?php
require_once  "./Model/Airport.php";
use Model\AirportModel;
echo("<H2> Flight search </H2>");
$airports = new AirportModel();
var_dump($airports->getAirports());
