<?php

class pre
{
    private static $conn=null;
    public static function connect()
    {
        //self::$conn=mysqli_connect("sql12.freemysqlhosting.net","sql12228778","dSUWZ6DakP","sql12228778");
        //self::$conn=mysqli_connect("localhost","root","","medsky");
        self::$conn=mysqli_connect('sql12.freemysqlhosting.net','sql12235011','CWflEeDvDX','sql12235011');
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
    public function insertmd($did,$uid,$medid,$tim,$note)
    {
        //$medids=implode(",",$medid);
        $conn=pre::connect();
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = time();
        $date_time = date("d-m-Y (D) H:i:s", $timestamp);
        //echo "Current date and local time on this server is $date_time";
        
        
/*        $medids=$medid;
        echo $medids;
        for($i=0;$i<4;$i++)
        {
            echo "<br>$tim[$i]</br>";
        }
        $timing=implode(",",$tim);
*/
        $q='insert into prescription_mst values("'.null.'","'.$uid.'","'.$did.'","'.$medid.'","'.$tim.'","'.$date_time.'","'.$note.'")';
//        echo $q;
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
    public function display($uid,$did)
    {
        $conn=pre::connect();
        $q='select p.*,m.* from prescription_tbl p,med_time m where p.fk_user_email_id="'. $uid .'" and p.fk_doc_email_id="'. $did .'" and p.pk_prescrip_id=m.fk_prescrip_id';
        $result=$conn->query($q);
        return $result;
        pre::disconnect();  
    }
}