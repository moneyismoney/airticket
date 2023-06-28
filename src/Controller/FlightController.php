<?php

namespace Controller;

include_once  "BaseController.php";
include_once  "../Model/FlightModel.php";

use Error;
use InvalidArgumentException;
use Model\FlightModel;
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

                $flightModel = new FlightModel();
                $allFlights = $flightModel->getFlightsByDate($date);
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