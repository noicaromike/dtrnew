<?php

class Home
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTotalRecords()
    {
        $this->db->query('SELECT count(*) AS total FROM Doctors');
        $this->db->execute();
        $row = $this->db->single();
        return $row->total;
    }


    public function getAllDoctors()
    {
         $this->db->query('SELECT Doctors.*,USERINFO.USERID as USERID,
                                    CInt(USERINFO.Badgenumber) as BNo,
                                    USERINFO.Name as Name
                        FROM 
                            Doctors
                        INNER JOIN
                            USERINFO
                        ON
                            Doctors.BNo = CInt(USERINFO.Badgenumber)
        
        ');
        
        $this->db->execute();
        return $this->db->resultSet();
    }
}
