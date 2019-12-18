<?php
if(isset( $_POST["localStorage"]) )
{

	/* Code to insert a new data in MYSQL */
	$data= json_decode( $_POST["localStorage"] , true);
	$conn=new mysqli("localhost" , "root" , "" , "project");
    if($conn->connect_error)
	{
 	  die($conn->connect_error);
    }
	foreach($data as $key => $value){
        //insert
        $query = "Insert Into _event VALUES('$key' , '$value')";

        $conn->query($query);
        if($conn->affected_rows > 0)
        {
          echo "Inserted Successfully";
        }
        else
        {
          echo "Sorry: Problem With Insertion";	
        }
        
        }
    }
		
		////////////////////////// show ////////////////////





/*$query='select * from _event';
    if($conn->query($query))
    {
        echo "yes";
    }
    else
    {
        echo 'no';
    }
$result = $conn->query($query);
echo count($result);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo "id:". $row["id"].",  EventType:". $row["eventType"]. ",  eventtarget:" . $row["eventTarget"].",eventDate: ". $row["eventDate"].'<br>';
    }
} 
else {
    echo "0 results";
}
echo "<table border='1' >
<tr>
<td align=center> <b>EventType</b></td>
<td align=center><b>EventTarget</b></td>
<td align=center><b>EventTime</b></td>
</tr>";

while($data = mysqli_fetch_row($query))
{   
    echo "<tr>";
    echo "<td align=center>$data[0]</td>";
    echo "<td align=center>$data[1]</td>";
    echo "<td align=center>$data[2]</td>";
    echo "</tr>";
}
echo "</table>";
/////////////////////////
}*/

	
  if(isset($_GET["localStorage"])){
   /* Code to retrieve and render a stored data */
   $query = "SELECT * FROM _event";
	$conn=new mysqli("localhost" , "root" , "" , "project");
    if($conn->connect_error)
 	{
 	  die($conn->connect_error);
    }

    if ($result = $conn->query($query))
     {
		$rows=array();
        if($result->num_rows>0 ) {
            while ($row = $result->fetch_assoc())
             {
                 array_push($rows , $row);
            }
			echo json_encode($rows);
        }
	}
	else{
            echo "Not find data to retrieve";
        }
    }




 ?>