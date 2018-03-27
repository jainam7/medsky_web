<?php
class deg_all
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
    public function select_all()
    {
        $cnn=deg_all::connect();
        $q="select * from doc_degree";
        $result=$cnn->query($q);
        return $result;
        deg_all::disconnect();
    }
    public function insert($name)
    {
        $cnn=deg_all::connect();
        $q="insert into doc_degree values('". $name ."')";
        $result=$cnn->query($q);
        return $result;
        deg_all::disconnect();
    }

}
?>