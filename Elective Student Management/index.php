<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Elective management</title>
    </head>
    <body>
        <style>
            .MakeLeft{
                float: left;
            }
            .MakeRight{
                float: right;
            }
            .btn-group .button {
  background-color: #4CAF50; /* Green */
  border: 1px solid green;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  float: left;
}

.btn-group .button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

.btn-group .button:hover {
  background-color: #3e8e41;
}
            </style>
         <center><h1>ELECTIVE MANAGEMENT INTERFACE</h1></center> 
         <hr></hr>
         <form method="POST">
         <h3> Select elective table</h3>
         <select name="Elective_name"> 
        <option value="EL1">Elective 1 </option>
       <option value="EL2">Elective 2</option>
       <option value="EL3">Elective 3</option>
      </select>
         <input type="submit" name="submit" value="Get Selected Values" />
         
         

         
         
         <div class="btn-group">
  <A href=http://localhost:17331/sales.php><input type="button" class="button" value="Sales" /></A>
  <A href=http://localhost:17331/stock.php><input type="button" class="button" value="Stock" /></A>
         </div><br><br><br><br><br><br>
         
        <?php
        //initail connection
        $servername = "<var>";
        $username = "<var>";
        $password = "<var>";
        $database = "<var>";
    $conn=new mysqli($servername,$username,$password,$database);
    
    if(isset($_POST['submit'])){
        $selected_val = $_POST['Elective_name'];  // Storing Selected Value In Variable
        echo "<h2><center>You have selected   " .$selected_val;  // Displaying Selected Value
        echo "</center></h2>";
        }
    echo "<div class='MakeLeft'>";
     $sql1="Select * from Main_Student_List";
     $sql="SELECT * FROM `Main_Student_List` WHERE `Subject_code`LIKE 'unassigned' ";
         $result=$conn->query($sql);
        
         echo "<table border='1'  >
             <br>
             
             <tr>
             <th>ID</th><th>Name</td><th>Department</td><th>Semester</td><th>Student Code</td>
             </tr>";
         while($row=mysqli_fetch_array($result)){
             echo "<tr>";
                 echo"<td>";echo $row["id"];echo "</td>";
                
                 echo "<td>"; echo $row["Name"];echo "</td>";
                 
                 echo "<td>";echo $row["Department"];echo "</td>";
                 
                 echo "<td>";echo $row["Semester"];echo "</td>";
                 
                 echo "<td>";echo $row["Subject_code"];echo "</td>";
                 
                 echo "<td>"; echo '<button type="submit" name="add_to" value="'.$row["id"].'" />Add to-></button>';"</td>";
             echo "</tr>";
            
         }
            echo "</table>"; 
            
            if(isset($_POST["add_to"]))
         {
             $id=$_POST["add_to"];
             $selected_val = $_POST['Elective_name'];
             echo $sql31= "UPDATE Main_Student_List SET Subject_code = '$selected_val' WHERE id = '$id' ";
             $conn->query($sql31);
           
         }
            
            echo "</div>";
           
             echo "<div class='MakeRight'>";
            
            $sql1="SELECT * FROM `Main_Student_List` WHERE `Subject_code` LIKE '$selected_val' ";
            
         $result=$conn->query($sql1);
         
         echo "<table border='1'>
             <br>
              
             <tr>
             <th>ID</th><th>Name</td><th>Department</td><th>Semester</td><th>Student Code</td>
             </tr>";
         while($row=mysqli_fetch_array($result)){
             echo "<tr>";
                 echo"<td>";echo $row["id"];echo "</td>";
                
                 echo "<td>"; echo $row["Name"];echo "</td>";
                 
                 echo "<td>";echo $row["Department"];echo "</td>";
                 
                 echo "<td>";echo $row["Semester"];echo "</td>";
                 
                 echo "<td>";echo $row["Subject_code"];echo "</td>";
                 
                 echo "<td>"; echo '<button type="submit" name="Remove" value="'.$row["id"].'" />Remove</button>';"</td>";
             echo"</tr>";
         
        
                 
         }
            echo"</table>"; 
            if(isset($_POST["Remove"]))
         {
             $id=$_POST["Remove"];
             $selected_val = $_POST['Elective_name'];
             echo $sql31= "UPDATE Main_Student_List SET Subject_code = 'unassigned' WHERE id = '$id' ";
             $conn->query($sql31);
           
         }
            
            echo "</div>";
     
        
        ?>
         </form>
    </body>
</html>
