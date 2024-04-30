<?php


class Prints extends Controller
{
    private $printModel;

    public function __construct()
    {
        $this->printModel = $this->model('Printss');
    }

    public function print()
    {

        if (isset($_GET['id'])) {
            $encodedIds = $_GET['id'];
            $serializedIds = urldecode($encodedIds);
            $doctorIds = unserialize($serializedIds);
            
            if (!is_array($doctorIds) || empty($doctorIds)) {
                // Handle the case where $doctorIds is not an array
                // For example, if it's a single ID instead of an array
                $doctorIds = array($doctorIds);
            }
            
            // Convert each ID to integer
            $doctorIds = array_map('intval', $doctorIds);
            $id = serialize($doctorIds);
            
            
            
            // var_dump($id);die();


            
            
        }
        if (isset($_SESSION['startDate']) && isset($_SESSION['endDate'])) {
            $startDate = $_SESSION['startDate'];
            $endDate = $_SESSION['endDate'];
            unset($_SESSION['startDate']);
            unset($_SESSION['endDate']);
        }

        $doctors = $this->printModel->getDoctorsById($id,$startDate,$endDate);
        

        
        // Initialize an associative array to store check-in and check-out times for each day for each USERID
            $checkInOutTimes = [];
            $doctorName = [];
            $dtr = [];
            // Iterate over each record
            foreach ($doctors as $days) {
                $userID = $days->USERID;
                $day = $days->CHECKTIME;
                $name = $days->Name;
                
                // var_dump($name);die();
                $formatedDay = formatDateToDay($day);
                $time = formatToTime($day);
                
                if (!isset($dtr[$userID])) {
                    // If not, initialize an array to store check-in and check-out times for each day
                    $dtr[$userID] = [
                        'checkInOutTimes' => [],
                        'doctorName' => null,
                    ];
                }
                

                if (!isset($dtr[$userID]['doctorName'])) {
                    // If not, add the doctor details to the $doctorName array
                    $dtr[$userID]['doctorName'] = $this->printModel->getUserByName([$name]);
                }
            
                // Store the check-in and check-out times for each day
                if ($days->CHECKTYPE == 'I') {
                    $dtr[$userID]['checkInOutTimes'][$formatedDay]['in'] = $time;
            
                } elseif ($days->CHECKTYPE == 'O') {
                    $dtr[$userID]['checkInOutTimes'][$formatedDay]['out'] = $time;
                }
                
            }

       

        $data = [
            
            'doctors' => $doctors,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'dtr' => $dtr,
           
        ];
        $this->view('prints/print', $data);
    }
}
