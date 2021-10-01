
        <?php
  
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "padminuser", "phpadminpass", "main-cake",);
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 4 values from the form data(input)
        $Full_Name =  $_REQUEST['full_name'];
        $Email_Address = $_REQUEST['email'];
        $Password =  $_REQUEST['password'];
        $Confirm_Password = $_REQUEST['confirm_password'];
    
          
        // Performing insert query execution
        // here our table name is table_by_clients
        $sql = "INSERT INTO table_by_clients  VALUES ('$Full_Name', 
            '$Email_Address','$Password','$Confirm_Password')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            echo nl2br("\n$First_Name\n $Email_Adress\n "
                . "$Password\n $Confirm_Address\n");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
  