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

        // $userinfo = $this->printModel->getUserInfo($id);
        // $doctor = $this->printModel->getDoctorsName($userinfo->Name);
        // echo '<pre>';
        // print_r($doctors);
        // echo '</pre>';


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
            // // Check if the USERID is already present in the array
            // if (!isset($checkInOutTimes[$userID])) {
            //     // If not, initialize an array to store check-in and check-out times for each day
            //     $checkInOutTimes[$userID] = [];
            // }
            // if (!isset($doctorName[$name])) {
            //     // If not, add the doctor details to the $doctorName array
            //     $doctorName[$name] = $this->printModel->getUserByName([$name]);
            // }
            
            // // Store the check-in and check-out times for each day
            // if ($days->CHECKTYPE == 'I') {
            //     $checkInOutTimes[$userID][$formatedDay]['in'] = $time;
                
            // } elseif ($days->CHECKTYPE == 'O') {
            //     $checkInOutTimes[$userID][$formatedDay]['out'] = $time;
                
            // }


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

        
        

        

        // echo '<pre>';
        // print_r($dtr);
        // echo '</pre>';

        // echo '<pre>';
        // print_r($checkInOutTimes);
        // echo '</pre>';
        

       











        
        // foreach($doctors as $days){
        //     $day = $days->CHECKTIME;
        //     $formatedDay = formatDateToDay($day);
            
        //     if($formatedDay == '01' && $days->CHECKTYPE == 'I'){
        //         $day1In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '01' && $days->CHECKTYPE == 'O'){
        //         $day1out = formatToTime($day);
        //     }

        //     if($formatedDay == '02' && $days->CHECKTYPE == 'I'){
        //         $day2In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '02' && $days->CHECKTYPE == 'O'){
        //         $day2out = formatToTime($day);
        //     }

        //     if($formatedDay == '03' && $days->CHECKTYPE == 'I'){
        //         $day3In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '03' && $days->CHECKTYPE == 'O'){
        //         $day3out = formatToTime($day);
        //     }

        //     if($formatedDay == '04' && $days->CHECKTYPE == 'I'){
        //         $day4In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '04' && $days->CHECKTYPE == 'O'){
        //         $day4out = formatToTime($day);
        //     }

        //     if($formatedDay == '05' && $days->CHECKTYPE == 'I'){
        //         $day5In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '05' && $days->CHECKTYPE == 'O'){
        //         $day5out = formatToTime($day);
        //     }

        //     if($formatedDay == '06' && $days->CHECKTYPE == 'I'){
        //         $day6In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '06' && $days->CHECKTYPE == 'O'){
        //         $day6out = formatToTime($day);
        //     }

        //     if($formatedDay == '07' && $days->CHECKTYPE == 'I'){
        //         $day7In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '07' && $days->CHECKTYPE == 'O'){
        //         $day7out = formatToTime($day);
        //     }

        //     if($formatedDay == '08' && $days->CHECKTYPE == 'I'){
        //         $day8In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '08' && $days->CHECKTYPE == 'O'){
        //         $day8out = formatToTime($day);
        //     }

        //     if($formatedDay == '09' && $days->CHECKTYPE == 'I'){
        //         $day9In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '09' && $days->CHECKTYPE == 'O'){
        //         $day9out = formatToTime($day);
        //     }

        //     if($formatedDay == '10' && $days->CHECKTYPE == 'I'){
        //         $day10In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '10' && $days->CHECKTYPE == 'O'){
        //         $day10out = formatToTime($day);
        //     }

        //     if($formatedDay == '11' && $days->CHECKTYPE == 'I'){
        //         $day11In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '11' && $days->CHECKTYPE == 'O'){
        //         $day11out = formatToTime($day);
        //     }

        //     if($formatedDay == '12' && $days->CHECKTYPE == 'I'){
        //         $day12In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '12' && $days->CHECKTYPE == 'O'){
        //         $day12out = formatToTime($day);
        //     }

        //     if($formatedDay == '13' && $days->CHECKTYPE == 'I'){
        //         $day13In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '13' && $days->CHECKTYPE == 'O'){
        //         $day13out = formatToTime($day);
        //     }

        //     if($formatedDay == '14' && $days->CHECKTYPE == 'I'){
        //         $day14In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '14' && $days->CHECKTYPE == 'O'){
        //         $day14out = formatToTime($day);
        //     }

        //     if($formatedDay == '15' && $days->CHECKTYPE == 'I'){
        //         $day15In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '15' && $days->CHECKTYPE == 'O'){
        //         $day15out = formatToTime($day);
        //     }


        //     if($formatedDay == '16' && $days->CHECKTYPE == 'I'){
        //         $day16In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '16' && $days->CHECKTYPE == 'O'){
        //         $day16out = formatToTime($day);
        //     }
        //     if($formatedDay == '17' && $days->CHECKTYPE == 'I'){
        //         $day17In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '17' && $days->CHECKTYPE == 'O'){
        //         $day17out = formatToTime($day);
        //     }

        //     if($formatedDay == '18' && $days->CHECKTYPE == 'I'){
        //         $day18In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '18' && $days->CHECKTYPE == 'O'){
        //         $day18out = formatToTime($day);
        //     }

        //     if($formatedDay == '19' && $days->CHECKTYPE == 'I'){
        //         $day19In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '19' && $days->CHECKTYPE == 'O'){
        //         $day19out = formatToTime($day);
        //     }

        //     if($formatedDay == '20' && $days->CHECKTYPE == 'I'){
        //         $day20In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '20' && $days->CHECKTYPE == 'O'){
        //         $day20out = formatToTime($day);
        //     }

        //     if($formatedDay == '21' && $days->CHECKTYPE == 'I'){
        //         $day21In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '21' && $days->CHECKTYPE == 'O'){
        //         $day21out = formatToTime($day);
        //     }

        //     if($formatedDay == '22' && $days->CHECKTYPE == 'I'){
        //         $day22In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '22' && $days->CHECKTYPE == 'O'){
        //         $day22out = formatToTime($day);
        //     }

        //     if($formatedDay == '23' && $days->CHECKTYPE == 'I'){
        //         $day23In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '23' && $days->CHECKTYPE == 'O'){
        //         $day23out = formatToTime($day);
        //     }

        //     if($formatedDay == '24' && $days->CHECKTYPE == 'I'){
        //         $day24In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '24' && $days->CHECKTYPE == 'O'){
        //         $day24out = formatToTime($day);
        //     }

        //     if($formatedDay == '25' && $days->CHECKTYPE == 'I'){
        //         $day25In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '25' && $days->CHECKTYPE == 'O'){
        //         $day25out = formatToTime($day);
        //     }

        //     if($formatedDay == '26' && $days->CHECKTYPE == 'I'){
        //         $day26In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '26' && $days->CHECKTYPE == 'O'){
        //         $day26out = formatToTime($day);
        //     }

        //     if($formatedDay == '27' && $days->CHECKTYPE == 'I'){
        //         $day27In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '27' && $days->CHECKTYPE == 'O'){
        //         $day27out = formatToTime($day);
        //     }

        //     if($formatedDay == '28' && $days->CHECKTYPE == 'I'){
        //         $day28In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '28' && $days->CHECKTYPE == 'O'){
        //         $day28out = formatToTime($day);
        //     }

        //     if($formatedDay == '29' && $days->CHECKTYPE == 'I'){
        //         $day29In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '29' && $days->CHECKTYPE == 'O'){
        //         $day29out = formatToTime($day);
        //     }

        //     if($formatedDay == '30' && $days->CHECKTYPE == 'I'){
        //         $day30In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '30' && $days->CHECKTYPE == 'O'){
        //         $day30out = formatToTime($day);
        //     }

        //     if($formatedDay == '31' && $days->CHECKTYPE == 'I'){
        //         $day31In = formatToTime($day);
        //     }
            
        //     if($formatedDay == '31' && $days->CHECKTYPE == 'O'){
        //         $day31out = formatToTime($day);
        //     }

            

        // }

        

        $data = [
            
            'doctors' => $doctors,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'dtr' => $dtr,
            


            // 'day17In' => isset($day17In) ? $day17In:'',
            // 'day17out' => isset($day17out) ? $day17out:'',

            // 'day18In' => isset($day18In) ? $day18In:'',
            // 'day18out' => isset($day18out) ? $day18out:'',

            // 'day19In' => isset($day19In) ? $day19In:'',
            // 'day19out' => isset($day19out) ? $day19out:'',

            // 'day20In' => isset($day20In) ? $day20In:'',
            // 'day20out' => isset($day20out) ? $day20out:'',

            // 'day21In' => isset($day21In) ? $day21In:'',
            // 'day21out' => isset($day21out) ? $day21out:'',

            // 'day22In' => isset($day22In) ? $day22In:'',
            // 'day22out' => isset($day22out) ? $day22out:'',

            // 'day23In' => isset($day23In) ? $day23In:'',
            // 'day23out' => isset($day23out) ? $day23out:'',

            // 'day24In' => isset($day24In) ? $day24In:'',
            // 'day24out' => isset($day24out) ? $day24out:'',

            // 'day25In' => isset($day25In) ? $day25In:'',
            // 'day25out' => isset($day25out) ? $day25out:'',

            // 'day26In' => isset($day26In) ? $day26In:'',
            // 'day26out' => isset($day26out) ? $day26out:'',

            // 'day27In' => isset($day27In) ? $day27In:'',
            // 'day27out' => isset($day27out) ? $day27out:'',

            // 'day28In' => isset($day28In) ? $day28In:'',
            // 'day28out' => isset($day28out) ? $day28out:'',

            // 'day29In' => isset($day29In) ? $day29In:'',
            // 'day29out' => isset($day29out) ? $day29out:'',

            // 'day30In' => isset($day30In) ? $day30In:'',
            // 'day30out' => isset($day30out) ? $day30out:'',

            // 'day31In' => isset($day31In) ? $day31In:'',
            // 'day31out' => isset($day31out) ? $day31out:'',

        ];
        $this->view('prints/print', $data);
    }
}
