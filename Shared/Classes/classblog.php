<?php

class blogs
{
    private static $conn=null;
    public static function  connect()
    {
        self::$conn=mysqli_connect("sql12.freemysqlhosting.net","sql12228778","dSUWZ6DakP","sql12228778");
        return self::$conn;
    }
    public static function disconnect()
    {
        mysqli_close($conn);
        self::$conn=null;
    }
    public function insert($btitle,$bdesc,$did,$bdate,$specid)
    {
        $cnn=blogs::connect();
        $q="insert into blog_tbl values('". null ."','".$btitle."','".$bdesc."','".$did."','".$bdate."','".$specid."')";
        $result=$cnn->query($q);
        return $result;
        blogs::disconnect();
    }
    public function getspecialist($did)
    {
        $cnn=blogs::connect();
        $q="select fk_spec_id from doctor_mst where pk_doc_email_id='".$did."'";
        $result=$cnn->query($q);
        return $result;
        blogs::disconnect();
    }
    public function getblogsofdoctor($did)
    {
        $cnn=blogs::connect();
        //$q="select b.*,COUNT(l.like_id) from blog_tbl b,likes_tbl l where b.blog_id=l.fk_blog_id and b.fk_doc_email_id='".$did."'";
        $q="select * from blog_tbl where fk_doc_email_id='".$did."'";
        $result=$cnn->query($q);
        return $result;
        blogs::disconnect();
    }
    public function getallblogs()
    {
        $cnn=blogs::connect();
        $q="select * from blog_tbl";
        $result=$cnn->query($q);
        return $result;
        blogs::disconnect();
    }
    
    

}

?>