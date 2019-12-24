<html>
<head>
<title>
shows
</title>
</head>

<body>
    <div>
    <?php
    
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="s188s193";

    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
    {
        die("failed to connec:" . mysqli_connect_error());
    }

    $sh="select * from mydb";
   $result= mysqli_query($conn,$sh);
    if(mysqli_num_rows($result)>0)
    {
        $content="<table border=1><tr><th>Name</th><th>EmailId</th><th>ADDRESS</th></tr>";
       while($row=mysqli_fetch_assoc($result))
       {
            $content .="<tr>"."<td>".$row["name"]."</td>" . "<td>".$row["email"]."</td>" . "<td>".$row["address"]."</td>" . "</tr>";

       }
       $content .="</table>";
       echo "$content";
    }
    else{
            echo"blank database";
    }


    ?>
    </div>
</body>

</html>