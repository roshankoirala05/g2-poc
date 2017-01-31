Giselle Branch
<html>
<body>
<h1 align="center">Welcome to Monroe West-Monroe Visitor Center !!</h1>
        
       <div id="googleMap" style="width:100%;height:700px;"></div>

<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(32.519552,-92.077482),
    zoom:5,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>

       <br><br>
        <form action="form.php" method="post">
        <input type="submit" value="ENTER MY INFO"</input>
        </form>
        
        
        <br><br>
        
        <a href="admin.php">Admin</a>


</body>
</html> 
