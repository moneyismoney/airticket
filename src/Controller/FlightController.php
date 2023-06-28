<?php

namespace Controller;

include_once  "BaseController.php";
include_once  "../Model/FlightModel.php";
include_once  "../Model/Airport.php";

use Error;
use InvalidArgumentException;
use Model\FlightModel;
use Model\AirportModel;
use DateTime;

/**
 * Controller for flight actions
 *
 */
class FlightController extends BaseController
{
    public function searchAction(): void
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $date = filter_var($_POST['date'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $dateValid = DateTime::createFromFormat("Y-m-d", $date);
                if (empty($dateValid)) {
                    throw new InvalidArgumentException('Date format error, should be YYYY-MM-DD');
                }

                $origin = filter_var($_POST['origin'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $destination = filter_var($_POST['destination'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $airports = new AirportModel();

                if (null === $airports->getAirportIdtByCode($origin)) {
                    throw new InvalidArgumentException('Wrong origin airport:' . $origin);
                }

                if (null === $airports->getAirportIdtByCode($destination)) {
                    throw new InvalidArgumentException('Wrong destination airport: '. $destination);
                }

                $flightModel = new FlightModel();
                $allFlights = $flightModel->getFlightsByDate($date, $origin, $destination);
                $responseData = json_encode($allFlights);
            } catch (InvalidArgumentException $e) {
                $strErrorDesc = $e->getMessage().' Please contact support.';
                $strErrorHeader = 'HTTP/1.1 400 Bad Request';
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support. '.$e->getTraceAsString();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(['error' => $strErrorDesc]),
                ['Content-Type: application/json', $strErrorHeader]
            );
        }
    }
}