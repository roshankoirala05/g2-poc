<?php


class DatabaseConnection
{
    public $localhost ;
    public $username ;
    public $password ;
    public $dbname ;
    public $port ;
    public $connection;

    public function __construct ()
    {

      $this->localhost = "127.0.0.1";
      $this ->username = "nawarajsubedi25";
      $this ->password = "";
      $this ->dbname = "REGISTRATION";
      $this->port = 3306;
      $this->connection= mysqli_connect($this->localhost, $this->username, $this->password, $this->dbname, $this->port);
      $error = mysqli_connect_errno();
      if ($error !=null)
      {
        $output="<p>Unable to connect database<p>" . $error;
        exit($output);
      }
    }

public function insertDatabase ($query)
{
  mysqli_query($this->connection, $query);
}

 public function returnQuery($query)
 {

  $result =mysqli_query($this->connection,$query);


   /* echo "Here are the list of visitors from Monroe"."<br>"."<br>";
    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc())
    {
        echo "" . $row["Name"].  "<br>";
    }
 }*/
 return $result;
}
}
?>
