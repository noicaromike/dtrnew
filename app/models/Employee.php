<?php


class Employee
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function checkIfExist($BNo)
    {
        $this->db->query('SELECT * FROM Doctors WHERE BNo = :BNo');
        $this->db->bind(':BNo', $BNo);
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getTotalRecords()
    {
        $this->db->query('SELECT MAX(BNo) AS total FROM Doctors');
        $this->db->execute();
        $row = $this->db->single();
        return $row->total;
    }
    public function InsertData($data)
    {   
        $data['BNo'] = $data['BNo'] + 1;
        
        $this->db->query('INSERT INTO Doctors (BNo,EMPNAME,POSITION) VALUES (:BNo,:EMPNAME,:POSITION)');
        $this->db->bind(':BNo', $data['BNo']);
        $this->db->bind(':EMPNAME', $data['EMPNAME']);
        $this->db->bind(':POSITION', $data['POSITION']);
        if ($this->db->execute()) {
            $this->db->query('INSERT INTO USERINFO (Badgenumber,Name) VALUES (:BNo,:Name)');
            $this->db->bind(':BNo',$data['BNo']);
            $this->db->bind(':Name',$data['BNo']);
            $this->db->execute();
            return true;
        } else {
            return false;
        }
    }
    public function getEmployeeById($id)
    {
        $this->db->query('SELECT * FROM Doctors WHERE BNo = :BNo');
        $this->db->bind(':BNo', $id);
        $row = $this->db->single();
        return $row;
    }
    public function updateDateById($data)
    {
        $this->db->query('UPDATE Doctors SET EMPNAME = :EMPNAME, POSITION = :POSITION WHERE BNo = :BNo');
        $this->db->bind(':BNo', $data['BNo']);
        $this->db->bind(':EMPNAME', $data['EMPNAME']);
        $this->db->bind(':POSITION', $data['POSITION']);
        $this->db->execute();
        return true;
    }
    public function deleteEmpById($data)
    {
        $this->db->query('DELETE FROM Doctors WHERE BNo = :BNo');
        $this->db->bind(':BNo', $data['BNo']);
        
        if ($this->db->execute()) {
            $this->db->query('DELETE FROM USERINFO WHERE Badgenumber = :BNo');
            $this->db->bind(':BNo',$data['BNo']);
            $this->db->execute();
            return true;
        } else {
            return false;
        }
    }
}
