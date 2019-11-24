<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
         <meta charset="UTF-8">
        <title>STOCK</title>
        <title></title>
    </head>
    <body>
        <form method="post">
        
        <input type="text" name="itemname" placeholder="Input Item Name"/>
        
        <input type="text" name="price" placeholder="MRP"/>
        
        <input type="text" name="quantity" placeholder="No. of item"/>
        <br>
        <input type="submit" name="bt_stk" />
        <?php
        $servername = "192.168.10.2";
        $username = "17335nirmal";
        $password = "17335nirmal";
        $dbname ="17335nirmal";
        $conn =new mysqli($servername,$username,$password,$dbname)or die("Connect failed: %s\n". $conn -> error);
    
        if(isset($_POST["bt_stk"])) 
        {
         
         $itemname=$_POST["itemname"];
         $price=$_POST["price"];
         $quantity=$_POST["quantity"];
         $sql = "INSERT INTO stock(`itemname`, `price`, `quantity`) VALUES ('$itemname','$price','$quantity')";
         $conn->query($sql);
        }
        if(isset($_POST["but-stk-del"]))
        {
        $id=$_POST['but-stk-del'];
        $sql="DELETE FROM stock WHERE id=$id";
        $conn->query($sql);
        }
        $sql= "SELECT * FROM stock";
        $result=$conn->query($sql); 
        echo "<Table>";
        echo "<table border='1'>
        <tr>
        <th>id</th>
        <th>itemname</th>
        <th>price</th>
        <th>quantity</th>
</tr>";
        while($row=mysqli_fetch_array($result))
        {echo "<tr>";
         echo "<td>" . $row['id'] . "</td>";
         echo "<td>" . $row['itemname'] . "</td>";
         echo "<td>" . $row['price'] . "</td>";
         echo "<td>" . $row['quantity'] . "</td>";
        echo '<td>
         <button type="submit" NAME="but-stk-del" value="'. $row['id'] .'">Delete</button>
         </td>';
         echo "</tr>";
        }
         echo '</table>';
       
         
        $conn -> close();
        ?>
    </body>
</html>
