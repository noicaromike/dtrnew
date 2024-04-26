<?php


class Employees extends Controller
{
    private $empModel;
    public function __construct()
    {
        $this->empModel = $this->model('Employee');
    }
    public function create()
    {
        $id = $this->empModel->getTotalRecords();
        
        $data = [
            'BNo' => $id,
            'EMPNAME' => '',
            'POSITION' => '',
            'BNoError' => '',
            'EMPNAMEError' => '',
            'POSITIONError' => '',
            'message' => '',
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'BNo' => $id,
                'EMPNAME' => $_POST['EMPNAME'],
                'POSITION' => $_POST['POSITION'],

                
                'EMPNAMEError' => '',
                'POSITIONError' => '',
                'message' => '',

            ];
            

            if (empty($data['EMPNAME'])) {
                $data['EMPNAMEError'] = 'Please enter a full name';
            }
            if (empty($data['POSITION'])) {
                $data['POSITIONError'] = 'Please enter a position';
            }
            if (
                empty($data['EMPNAMEError']) &&
                empty($data['POSITIONError'])
            ) {
                if ($this->empModel->InsertData($data)) {
                    $data['message'] = 'Successfully Added!';
                    $data['EMPNAME'] = '';
                    $data['POSITION'] = '';
                } else {
                    die('something went wrong in your code.');
                }
            }
        }

        $this->view('employees/create', $data);
    }

    public function edit($id)
    {
        // var_dump($id);die();
        $employee = $this->empModel->getEmployeeById($id);
        $data = [
            'id' => $employee->BNo,
            'BNo' => $employee->BNo,
            'EMPNAME' => $employee->EMPNAME,
            'POSITION' => $employee->POSITION,
            'BNoError' => '',
            'EMPNAMEError' => '',
            'POSITIONError' => '',
            'message' =>  '',
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $employee->id,
                'BNo' => $employee->BNo,
                'EMPNAME' => $_POST['EMPNAME'],
                'POSITION' => $_POST['POSITION'],

                'BNoError' => '',
                'EMPNAMEError' => '',
                'POSITIONError' => '',
                'message' => '',

            ];
            $numberRegex = '/^[0-9]+$/';

            // if (empty($data['BNo'])) {
            //     $data['BNoError'] = 'Enter a new biometrics';
            // } elseif (!preg_match($numberRegex, $data['BNo'])) {
            //     $data['BNoError'] = 'Biometrics must contain only numbers.';
            // }

            if (empty($data['EMPNAME'])) {
                $data['EMPNAMEError'] = 'Please enter a full name';
            }
            if (empty($data['POSITION'])) {
                $data['POSITIONError'] = 'Please enter a position';
            }
            if (
                // empty($data['BNoError']) &&
                empty($data['EMPNAMEError']) &&
                empty($data['POSITIONError'])
            ) {
                if ($this->empModel->updateDateById($data)) {
                    $data['message'] = 'Updated Successfully!';

                    // header('location:' . URLROOT . '/employees/edit/' . $employee->BNo);
                } else {
                    die('something went wrong in your code.');
                }
            }
        }

        $this->view('employees/edit', $data);
    }

    public function delete($id)
    {
        $employee = $this->empModel->getEmployeeById($id);
        $data = [
            'id' => $employee->BNo,
            'BNo' => $employee->BNo,
            'EMPNAME' => $employee->EMPNAME,
            'POSITION' => $employee->POSITION,
            'BNoError' => '',
            'EMPNAMEError' => '',
            'POSITIONError' => '',
            'message' =>  '',
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $employee->id,
                'BNo' => $employee->BNo,
                'EMPNAME' => $employee->EMPNAME,
                'POSITION' => $employee->POSITION,
                'BNoError' => '',
                'EMPNAMEError' => '',
                'POSITIONError' => '',
                'message' =>  '',
            ];
            if ($this->empModel->deleteEmpById($data)) {
                header('location:' . URLROOT . '/home');
            }
        }
        $this->view('employees/delete', $data);
    }
}
