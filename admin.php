<?php

session_start();
if(! (isset($_SESSION['name']))){
header ('location:adminpage.php');
}
?>
<html>
    <head>
        <link href="css/admin.css" rel="stylesheet">
        <script >
            
            
             var state="";
            function show(){
  
         document.getElementById("ScrollCB").style.visibility= 'visible' ;
            }
            function hide(){
  
         document.getElementById("ScrollCB").style.visibility= 'hidden' ;
            }
           
            function clicked(element){
                
                
                if(element.checked){
                    
                    state+=element.value+" ";
                    
                    
                    document.getElementById("statename").value=state;
                }
                else{
                    
                    state=state.replace(element.value+" ","");
                   
                document.getElementById("statename").value=state;
                }
            }
            
        </script>
    </head>
    
    <body>

     
<h1>Welcome <?php  echo $_SESSION['name'];?></h1>
<form action="adminpage.php" method="POST">
    
    <input type="submit" name="submit" Value="Log out">
</form>
<h3>Type one or more filters !</h3>

<br> <br>

<form method ="post" action = "admin.php">
    City <input type="text" name="city" value="<?php echo $_POST["city"];?>"/>
   <div id="state" onmouseover="show()" onmouseout="hide()">
   State <input id="statename" type="text" name="state" readonly value="<?php echo $_POST["state"];?>"/>
    <div id="ScrollCB"> 
         <input type="checkbox" name="b1" value="AL" onclick="clicked(this)">Alabama<br>
         <input type="checkbox" name="b2" value="AK" onclick="clicked(this)">Alaska<br>
         <input type="checkbox" name="b3" value="AZ"onclick="clicked(this)">Arizona<br>
         <input type="checkbox" name="b4" value="AR"onclick="clicked(this)">Arkansas<br>
         <input type="checkbox" name="b5" value="CA"onclick="clicked(this)">California<br>
         <input type="checkbox" name="b6" value="CO"onclick="clicked(this)">Colorado<br>
         <input type="checkbox" name="b7" value="CT"onclick="clicked(this)">Connecticut<br>
         <input type="checkbox" name="b8" value="DE"onclick="clicked(this)">Delaware<br>
         <input type="checkbox" name="b9" value="DC"onclick="clicked(this)">District Of Columbia<br>
         <input type="checkbox" name="b10" value="FL"onclick="clicked(this)">Florida<br>
         <input type="checkbox" name="b11" value="GA"onclick="clicked(this)">Georgia<br>
         <input type="checkbox" name="b12" value="HI"onclick="clicked(this)">Hawaii<br>
         <input type="checkbox" name="b13" value="ID"onclick="clicked(this)">Idaho<br>
         <input type="checkbox" name="b14" value="IL"onclick="clicked(this)">Illinois<br>
         <input type="checkbox" name="b15" value="IN"onclick="clicked(this)">Indiana<br>
         <input type="checkbox" name="b16" value="IA"onclick="clicked(this)">Iowa<br>
         <input type="checkbox" name="b17" value="KS"onclick="clicked(this)">Kansas<br>
         <input type="checkbox" name="b18" value="KY"onclick="clicked(this)">Kentucky<br>
         <input type="checkbox" name="b19" value="LA"onclick="clicked(this)">Louisiana<br>
         <input type="checkbox" name="b20" value="ME"onclick="clicked(this)">Maine<br>
         <input type="checkbox" name="b21" value="MD"onclick="clicked(this)">Maryland<br>
         <input type="checkbox" name="b22" value="MA"onclick="clicked(this)">Massachusetts<br>
         <input type="checkbox" name="b23" value="MI"onclick="clicked(this)">Michigan<br>
         <input type="checkbox" name="b24" value="MN"onclick="clicked(this)">Minnesota<br>
         <input type="checkbox" name="b25" value="MS"onclick="clicked(this)">Mississippi<br>
         <input type="checkbox" name="b26" value="MO"onclick="clicked(this)">Missouri<br>
         <input type="checkbox" name="b27" value="MT"onclick="clicked(this)">Montana<br>
         <input type="checkbox" name="b28" value="NE"onclick="clicked(this)">Nebraska<br>
         <input type="checkbox" name="b29" value="NV"onclick="clicked(this)">Nevada<br>
         <input type="checkbox" name="b30" value="NH"onclick="clicked(this)">New Hampshire<br>
         <input type="checkbox" name="b31" value="NJ"onclick="clicked(this)">New Jersey<br>
         <input type="checkbox" name="b32" value="NM"onclick="clicked(this)">New Mexico<br>
         <input type="checkbox" name="b33" value="NY"onclick="clicked(this)">New York<br>
         <input type="checkbox" name="b34" value="NC"onclick="clicked(this)">North Carolina<br>
         <input type="checkbox" name="b35" value="ND"onclick="clicked(this)">North Dakota<br>
         <input type="checkbox" name="b36" value="OH"onclick="clicked(this)">Ohio<br>
         <input type="checkbox" name="b37" value="OK"onclick="clicked(this)">Oklahoma<br>
         <input type="checkbox" name="b38" value="OR"onclick="clicked(this)">Oregon<br>
         <input type="checkbox" name="b39" value="PA"onclick="clicked(this)">Pennsylvania<br>
         <input type="checkbox" name="b40" value="RI"onclick="clicked(this)">Rhode Island<br>
         <input type="checkbox" name="b41" value="SC"onclick="clicked(this)">South Carolina<br>
         <input type="checkbox" name="b42" value="SD"onclick="clicked(this)">South Dakota<br>
         <input type="checkbox" name="b43" value="TN"onclick="clicked(this)">Tennessee<br>
         <input type="checkbox" name="b44" value="TX"onclick="clicked(this)">Texas<br>
         <input type="checkbox" name="b45" value="UT"onclick="clicked(this)">Utah<br>
         <input type="checkbox" name="b46" value="VT"onclick="clicked(this)">Vermont<br>
         <input type="checkbox" name="b47" value="VA"onclick="clicked(this)">Virginia<br>
         <input type="checkbox" name="b48" value="WA"onclick="clicked(this)">Washington<br>
         <input type="checkbox" name="b49" value="WV"onclick="clicked(this)">West Virginia<br>
         <input type="checkbox" name="b50" value="WI"onclick="clicked(this)">Wisconsin<br>
         <input type="checkbox" name="b51" value="WY"onclick="clicked(this)">Wyoming<br>
         
 </div> 
 </div>
    Zip <input type="text" name="zip" value="<?php echo $_POST["zip"];?>"/>
    Date <input type = "text" name="date" value="<?php echo $_POST["date"];?>"/>
    <input type="submit" value="Submit"/>
    
</form>
 <br>

 <?php
include 'DatabaseConnection.php';
$conn= new DatabaseConnection();
$query = "SELECT * FROM VISITOR";

$city = trim($_POST["city"]);
$state = trim($_POST["state"]);
$zip = trim($_POST["zip"]);
$date = trim($_POST["date"]);

if( $city!="" || $state !="" || $zip !="" || $date!="" ){
    $query.=" WHERE ";
    
    if ( $city!=""){
        $query.="City = '".$city."'";
        
    }
    if($state !=""){
        
        
          $stateString;  
          
          $stateArray = explode(" ", $state);
        
        foreach ($stateArray as $value) {
            $stateString.="'".$value."',";
         } 
        
        $stateString = substr($stateString, 0, -1);     
        
        
        
        
        
        
        if (strpos($query,"=")===false){
            $query.=" State in (".$stateString.")";
        }
        else {
                 
            $query.=" AND State in (".$stateString.")";
        }
        
    }
    
    if($zip !=""){
        if (strpos($query,"=")===false){
            $query.=" Zipcode = '".$zip."'";
        }
        else {
                 
            $query.=" AND Zipcode = '".$zip."'";
        }
        
    }
    if($date!=""){
        if (strpos($query,"=")===false){
            $query.=" Time = '".$date."'";
        }
        else {
                 
            $query.=" AND Time = '".$date."'";
        }
        
    }
    
    
    
}
else{
    $query.=" ORDER BY Time DESC LIMIT 30 ";
}

/**************************************************************
          Retriving query
 **************************************************************/




 
   $result= $conn->returnQuery($query);
   echo "<br>";
   if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc())
    {
       echo "" . $row["Fname"]. " ".$row["Lname"]." ".$row["City"]." ".$row["State"]." ".$row["Country"]." ".$row["Zipcode"]." ".$row["Party"]." ".date('m/d/Y', $row["Time"])."<br>";
      
    }
 }
 ?>


<form method="post" action="index.php">

            <input type="submit" value="Exit"/>
        </form>
        </body>
</html>
