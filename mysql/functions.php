<?php  include "db.php"; ?>
<?php

function createRow()
{
    global $connection;
    
if(isset($_POST['submit']))
{
 $Houseno =  $_POST['House_no'];
 $Street =  $_POST['Street'];          
 $Locality =  $_POST['Locality']; 
 $City =  $_POST['City'];
 $District =  $_POST['District'];
 $State =  $_POST['State'];
 $Pin_code =  $_POST['Pin_code'];
 $connection = mysqli_connect('localhost','root','','address update');
if($District != $City and $City != $Locality and $District != $Locality )
 {
    header('Location: login_read.php');
    echo"Address added Sucessfully";
 }
else if($Locality == $City and $Locality == $District and $District == $City)
{
   header('Location: modified_address.php');
}

$query = "INSERT INTO address(House_no,Street,Locality,City,District,State,Pin_code)";
$query .= "VALUES('$Houseno','$Street','$Locality','$City','$District','$State','$Pin_code')";

$result = mysqli_query($connection,$query);

if(!$result)
{
    die('Query failed');
}else {
    echo "Record Created";
}
}
}

function showAllData()
{
    global $connection;
$query = "SELECT * FROM address";
$result = mysqli_query($connection,$query);
if(!$result)
{
    die('Query failed' . mysqli_error());
}
while($row = mysqli_fetch_assoc($result))
 {
    $Houseno = $row['House_no'];
 echo "<option value='$Houseno'>$Houseno</option>";
 }
}

?>

<?php

 function updateTable()
{
   global $connection; 
 $Houseno =  $_POST['House_no'];
 $Street =  $_POST['Street'];          
 $Locality =  $_POST['Locality'];     
 $District =  $_POST['District'];
 $City =  $_POST['City'];
 $State =  $_POST['State'];
 $Pin_code =  $_POST['Pin_code'];
    
    $query = "UPDATE address SET ";
    $query .= "House_no = '$House_no' ";
    $query .= "Street  = '$Street',  ";
    $query .= "Locality = '$Locality'  ";
     $query .= "District = '$District'  ";
     $query .= "City = '$City'  ";
     $query .= "State = '$State'  ";
     $query .= "Pin_code = '$Pin_code'  ";
     $query .= "WHERE House_no = '$House_no' ";
    
    
    $result = mysqli_query($connection,$query);
    
    if(!$result)
    {
        die("Updation failed" . mysqli_error($connection));
    }else
    {
        echo "Your detailes are Updated";
    }
}




function deleteRows()
{
   global $connection; 
 $House_no =  $_POST['House_no'];
 /*$Street =  $_POST['Street'];          
 $Locality =  $_POST['Locality'];     
 $District =  $_POST['District'];
 $City =  $_POST['City'];
 $State =  $_POST['State'];
 $Pin_code =  $_POST['Pin_code'];*/
    
    $query = "DELETE FROM address ";
    /*$query .= "Username  = '$username', ";
    $query .= "Password = '$password' ";*/
    $query .= "WHERE House_no = '$House_no' ";
    
    $result = mysqli_query($connection,$query);
    
    if(!$result)
    {
        die("Updation failed" . mysqli_error($connection));
    }else
    {
        echo "Your Data has been Deleted";
    }
}
?>