<html>

<head>

    <title>
        reflab
    </title>

</head>

<body>
    <?php
    $firstname;$email;$firstname_error;$email_error;$address;
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // $sql="create database s188s193";
    // if(!mysqli_query($conn,$sql))
    // {
    //     echo"failed to create database";
    // }

    // else
    // {
    //     echo" database created";
    // }

    $udb="use s188s193";
    if(!mysqli_query($conn,$udb))
    {
        echo"failed to switch database";
    }
    else
    {
        echo"database switched";
    }

    // $ct="create table mydb(name varchar(50) not null, email varchar(30) not null, address varchar(100))";
    // if(!mysqli_query($conn,$ct))
    // {
    //     echo"failed to create table";
    // }
    // else
    // {
    //     echo"table created";
    // }


    if(empty($_GET["firstname"]))
    {
        $firstname_error="name must not be empty";
    }
    else
    {
        $firstname=input($_GET["firstname"]);
    }
    if(empty($_GET["email"]))
    {
        $email_error="email must not be empty";
    }
    else
    {
        $email=input($_GET["email"]);
    }

    $address=input($_GET["address"]);

   $pst="insert into mydb value(?,?,?)";
     $stat=mysqli_prepare($conn,$pst);
   mysqli_stmt_bind_param($stat,"sss",$firstname,$email,$address);
  mysqli_execute($stat);
    
    //made individual
    // if($_SERVER["REQUEST_METHOD"]=="POST")
    // {
    //     $firstname=$_POST["firstname"];
    //     $email=$_POST["email"];
    //     $address=$_POST["address"];
    // }
function input($value)
{
    
$value=trim($value);
$value=stripcslashes($value);
$value=htmlspecialchars($value);
return $value;
}
    ?>
    <div>
        <form method="get" action="<?php $_SERVER["PHP_SELF"];?>">
            <table>
                <tr>
                    <td>
                        Name:
                    </td>
                    <td>
                        <input type="text" name="firstname" require />
                    </td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type="text" name="email" require />
                    </td>
                </tr>
                <tr>
                    <td>
                        Address
                    </td>
                    <td>
                        <input type="text" name="address" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="save">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div>
    
    <?php
    echo "You have entered";
    echo"<br>";
    echo "$firstname";
    echo"<br>";
    echo "$email";
    echo"<br>";
    echo "$address";
    ?>
<a href="show.php">details</a>
    </div>
</body>

</html>