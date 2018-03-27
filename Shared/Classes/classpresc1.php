<?php

class pre
{
    private static $conn=null;
    public static function connect()
    {
        self::$conn=mysqli_connect("sql12.freemysqlhosting.net","sql12228778","dSUWZ6DakP","sql12228778");
        return self::$conn;
    }
    public static function disconnect()
    {
        mysqli_close($conn);
        self::$conn=null;
    }
    public function displaymd($did,$uid)
    {
        $conn=pre::connect();
        $q='select * from prescription_tbl where fk_user_email_id="'.$uid.'" and fk_doc_email_id="'.$did.'"';
        echo $q;
        $result=$conn->query($q);
        return $result;
        pre::disconnect();        
   
    }
    public function selectallmedicine()
    {
        $conn=pre::connect();
        $q="select * from medicine_mst";
        $result=$conn->query($q);
        return $result;
        pre::disconnect();        
   
    }
    
    public function getprescriptionbyid($pid)
    {
        $conn=pre::connect();
        $q='select p.*,d.doc_name,u.usr_name from prescription_mst p,doctor_mst d,user_mst u where pk_pres_id='.$pid.' and p.fk_doc_email_id=d.pk_doc_email_id and p.fk_usr_email_id=u.pk_usr_email_id';
        $result=$conn->query($q);
        return $result;
        pre::disconnect();        
   
    }
    public function medicinenamebyid($mid)
    {
        $conn=pre::connect();
        $q='select * from medicine_mst where pk_med_id='.$mid;
        $result=$conn->query($q);
        return $result;
        pre::disconnect();        
   
    }
    
    public function displayallprescbyid($uid,$did)
    {
        $conn=pre::connect();
        $q='select pres_date,pk_pres_id from prescription_mst where fk_usr_email_id="'.$uid.'" and fk_doc_email_id="'.$did.'" ORDER BY pres_date DESC';
     
        $result=$conn->query($q);
        return $result;
        pre::disconnect();        
   
   
    }
    public function insertmd($did,$uid,$medids,$mor,$non,$nig,$inst,$day)
    {
        $conn=pre::connect();
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = time();
        $date_time = date("d-m-Y (D) H:i:s", $timestamp);
        $q='insert into prescription_mst values("'.null.'","'. $uid .'","'. $did .'","'.$medids.'","'.$mor.'","'.$non.'","'.$nig.'","'.$inst.'","'.$day.'","'. $date_time .'")';
        $result=$conn->query($q);
        return $result;
        pre::disconnect();        
    }
    public function insert1($uid,$did)
    {
        $conn=pre::connect();
        $q="insert into prescription_tbl values('".null."','" .$uid. "','". $did ."')";
        $result=$conn->query($q);
        return $result;
        pre::disconnect();

    }
    public function insert2($pid,$mid,$mor,$noon,$nig)
    {
        $conn=pre::connect();
        $q="insert into med_time values('". $pid ."','" .$mid. "','". $mor ."','". $noon ."','". $nig ."')";
        $result=$conn->query($q);
        return $result;
        pre::disconnect();
    }
    public function getpatientname($pid)
    {
        $conn=pre::connect();
        $q="select usr_name from user_mst where pk_usr_email_id='".$pid."'";
        $result=$conn->query($q);
        return $result;
        pre::disconnect();
        
    }
    public function getallmedicinetype()
    {
        $conn=pre::connect();
        $q="select * from medicine_type";
        $result=$conn->query($q);
        return $result;
        pre::disconnect();
        
    }
    public function insertmedicine($mname,$cname,$muse,$mtype)
    {
        $conn=pre::connect();
        $q='insert into medicine_mst values("'.null.'","'.$mname.'","'.$cname.'","'.$muse.'","'.$mtype.'")';
        $result=$conn->query($q);
        return $result;
        pre::disconnect();
        
    }
    
    public function viewmypatient($uid)
    {
        $conn=pre::connect();
        $q="select MAX(p.pres_date),u.usr_name,u.usr_mno,u.usr_gen from user_mst u,prescription_mst p where p.fk_doc_email_id='".$uid."' GROUP BY p.fk_usr_email_id";
        $result=$conn->query($q);
        return $result;
        pre::disconnect();
        
    }
    public function getdoctorname($pid)
    {
        $conn=pre::connect();
        $q="select doc_name from doctor_mst where pk_doc_email_id='".$pid."'";
        $result=$conn->query($q);
        return $result;
        pre::disconnect();
  }
    public function display($uid,$did)
    {
        $conn=pre::connect();
        $q='select p.*,m.* from prescription_tbl p,med_time m where p.fk_user_email_id="'. $uid .'" and p.fk_doc_email_id="'. $did .'" and p.pk_prescrip_id=m.fk_prescrip_id';
        $result=$conn->query($q);
        return $result;
        pre::disconnect();  
    }
}