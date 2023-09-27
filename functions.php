
<?php
function validateFormData($formData)
{
    $formData= trim(stripslashes(htmlspecialchars($formData)));
    $error="";
    return $formData;
}

function clearForm($variable)
{
    global $clear;
    if($clear==true)
    {
        echo "";
    }
    else
    {
        echo $variable;
    }
}

function FetchItems($conn)
{
    $query = "select * from menu;";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0)
    {
       while($row = mysqli_fetch_assoc($result))
       {    
        $itemName = $row['ItemName'];
        echo "<option>".$itemName."</option>"; 
       }
    }
    else
    {
        echo "<option>No items found</option>";

    }

}

?>