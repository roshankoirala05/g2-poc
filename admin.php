
<!DOCTYPE html>
<html>
    <body>
<h1>Type one or more filters !</h1>

<br> <br>

<form method ="post" action = "admin.php">
    City <input type="text" name="city"/>
    State <input type="text" name="state"/>
    Zip <input type="text" name="zip"/>
    Date <input type = "text" name="date"/>
    <input type="submit" value="Submit"/>
</form>
 <br>

 <?php
include 'DatabaseConnection.php';
 $raj= new DatabaseConnection();
$query = "SELECT * FROM VISITOR";



/**************************************************************
          Retriving query
 **************************************************************/

if(! empty($_POST['city'])){

    $city=$_POST['city'];

$cityQuery = "City ='".$city."'";
 $query.=" WHERE ".$cityQuery;

    if(! empty($_POST['state'])){

    $state=$_POST['state'];
    $stateQuery = "State ='".$state."'";
    $query.=" AND ".$stateQuery;

        if(! empty($_POST['zip'])){

            $zip=$_POST['zip'];
             $zipQuery = "Zipcode ='".$zip."'";
             $query.=" AND ".$zipQuery;

             if(! empty($_POST['date'])){

                $date=$_POST['date'];
                 $dateQuery = "Time ='".$date."'";
                 $query.=" AND ".$dateQuery;
                }
        }
          if ( !(empty($_POST['date'])) && empty($_POST['zip'])){

          $date=$_POST['date'];
          $dateQuery = "Time ='".$date."'";
          $query.=" AND ".$dateQuery;
          }

    }

    if( empty($_POST['state']) && !(empty($_POST['zip']))){

        $zip=$_POST['zip'];
             $zipQuery = "Zipcode ='".$zip."'";
             $query.=" AND ".$zipQuery;
             if(! empty($_POST['date'])){

                $date=$_POST['date'];
                 $dateQuery = "Time ='".$date."'";
                 $query.=" AND ".$dateQuery;
                }
    }

    if( empty($_POST['state']) && empty($_POST['zip']) && ! (empty($_POST['date']))){
        $date=$_POST['date'];
         $dateQuery = "Time ='".$date."'";
          $query.=" AND ".$dateQuery;

        }
}

if(empty($_POST['city']) && !(empty($_POST['state']))){
    $state=$_POST['state'];
    $stateQuery = "State ='".$state."'";
 $query.=" WHERE ".$stateQuery;

     if(! empty($_POST['zip'])){

            $zip=$_POST['zip'];
             $zipQuery = "Zipcode ='".$zip."'";
             $query.=" AND ".$zipQuery;

             if(! empty($_POST['date'])){

                $date=$_POST['date'];
                 $dateQuery = "Time ='".$date."'";
                 $query.=" AND ".$dateQuery;
                }
     }

          if( empty($_POST['zip']) && !(empty($_POST['date']))){

              $date=$_POST['date'];
                 $dateQuery = "Time ='".$date."'";
                 $query.=" AND ".$dateQuery;
          }


}

if(empty($_POST['city']) && empty($_POST['state']) && !( empty($_POST['zip']))){
            $zip=$_POST['zip'];
             $zipQuery = "Zipcode ='".$zip."'";
             $query.=" WHERE ".$zipQuery;

             if(! empty($_POST['date'])){

                $date=$_POST['date'];
                 $dateQuery = "Time ='".$date."'";
                 $query.=" AND ".$dateQuery;
                }


}

if(empty($_POST['city']) && empty($_POST['state']) &&  empty($_POST['zip']) && !(empty($_POST['date']))){
                $date=$_POST['date'];
                 $dateQuery = "Time ='".$date."'";
                 $query.=" WHERE ".$dateQuery;
}



 //$query = "SELECT COUNT(*) FROM VISITOR";
   $result= $raj->returnQuery($query);
   echo "<br>";
   if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc())
    {
       // echo "" . $row["COUNT(*)"].  "<br>";
       echo "" . $row["Fname"]. " ".$row["Lname"]." ".$row["City"]." ".$row["State"]." ".$row["Zipcode"]." ".$row["No. in Party"]."<br>";
      //foreach($row as $cname => $cvalue){
        //print "$cname: $cvalue\t";
      //  echo"<br>";
    //}
    //echo"<br>";
    }
 }
 /**********************************************************************/
 ?>


<form method="post" action="index.php">

            <input type="submit" value="Exit"/>
        </form>
        </body>
</html>
