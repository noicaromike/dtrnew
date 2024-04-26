<?php

class Printss
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDoctorsById($id, $startDate, $endDate)
    {
        
        $id = unserialize($id);
        $id = implode(',', $id);

        // Your SQL query
        $query = "SELECT CHECKINOUT.*, USERINFO.* 
        FROM CHECKINOUT 
        INNER JOIN USERINFO ON CHECKINOUT.USERID = USERINFO.USERID 
        WHERE CHECKINOUT.USERID IN ($id) AND CHECKINOUT.CHECKTIME BETWEEN :startDate AND :endDate
        ";
        // Bind the doctor IDs as parameters
        $this->db->query($query);
        $this->db->bind(':startDate',$startDate);
        $this->db->bind(':endDate',$endDate);
        // Execute the query
        $result = $this->db->resultSet();
        return $result;
    }

    // public function getUserInfo($id){
    //    $this->db->query('SELECT * FROM USERINFO WHERE USERID = :id');
    //    $this->db->bind(':id', $id);
    //    $row = $this->db->single();
    //    return $row;

    // }

    // public function getDoctorsName($id){
    //     $this->db->query('SELECT * FROM Doctors WHERE BNo = :id');
    //     $this->db->bind(':id', $id);
    //     $row = $this->db->single();
    //     return $row;
    // }


    public function getUserByName($name){
        $name = implode(',', $name);
        $query = "SELECT Doctors.*, USERINFO.USERID
         FROM Doctors
         INNER JOIN USERINFO ON Doctors.BNo = CInt(USERINFO.Badgenumber)
        WHERE BNo IN ($name)";
        $this->db->query($query);
        $row = $this->db->resultSet();
        return $row;
    }
}
