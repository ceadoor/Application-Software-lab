<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>SALE</title>
        <title></title>
    </head>
    <body>
        <form method="post">
        
        
        
        <?php
         $servername = "<ADD YOUT IP ADDRESS>";
        $username = "<ADD YOUR USERNAME>";
        $password = "<ADD YOUR PASSWORD>";
        $dbname ="<ADD YOUR DATABASE NAME>";
        $conn =new mysqli($servername,$username,$password,$dbname)or die("Connect failed: %s\n". $conn -> error);
                $sql= "SELECT * FROM stock";
                $result=$conn->query($sql);
                echo '<select Name="itemname">';
                while($row=mysqli_fetch_array($result))
                {
                    echo '<option value='.$row['id'].'>';
                    echo $row['itemname'];
                    echo '</option>';
                }  
                echo '</select>';
        ?>
        
        <input type="text" name="quantity" placeholder="No. of item"/>
        
        <input type="date" name="date" placeholder="yyyy-mm-dd"/>
        
        <input type="submit" name="bt_sale" />
        <br>
        <?php
        $servername = "<ADD YOUT IP ADDRESS>";
        $username = "<ADD YOUR USERNAME>";
        $password = "<ADD YOUR PASSWORD>";
        $dbname ="<ADD YOUR DATABASE NAME>";
        $conn =new mysqli($servername,$username,$password,$dbname)or die("Connect failed: %s\n". $conn -> error);
    
        if(isset($_POST["bt_sale"])) 
        {
         
        $qty=$_POST["quantity"];
        $item=$_POST["itemname"];
        $sql = "SELECT  * FROM stock WHERE id='$item'";
        $result=$conn->query($sql);
        while($row=mysqli_fetch_array($result)){
        if($row['quantity']>=$qty){
        $sql = "UPDATE stock SET quantity=quantity-$qty WHERE id='$item'";
        $conn->query($sql);
        $itemname=$_POST["itemname"];
         $date=$_POST["date"];
         $quantity=$_POST["quantity"];
         $sql = "INSERT INTO sales(`itemname`, `quantity`, `date`) VALUES ('$itemname','$quantity','$date')";
              
         $conn->query($sql);
        break;
        }
        else {echo "Out of stock";}
        }
        }
        echo '<br>';
        echo '<br>';echo '<br>';echo '<br>';
        
        
        if(isset($_POST['but-sale-del']))
        {$id=$_POST['but-sale-del'];
        $sql="DELETE FROM sales WHERE id=$id";
        $conn->query($sql);
        }
        
        
        echo 'SALE';
        $sql= "SELECT * FROM sales";
        $result=$conn->query($sql);
        echo "<Table>";
        echo "<table border='1'>
        <tr>
        
        <th>itemid</th>
        <th>quantity</th>
        <th>date</th>
</tr>";
        while($row=mysqli_fetch_array($result))
        {echo "<tr>";
        
        
         echo "<td>" . $row['itemname'];
         echo "<td>" . $row['quantity'] . "</td>";
         echo "<td>" . $row['date'] . "</td>";
         echo '<td>
         <button type="submit" NAME="but-sale-del" value="'. $row['id'] .'">Delete</button>
         </td>';
         
         echo "</tr>";
        }
         echo '</table>';
       
               
         echo 'STOCK';
        
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
        
         echo "</tr>";
        }
         echo '</table>';
       
         
        $conn -> close();
        ?>
    </body>
</html>
