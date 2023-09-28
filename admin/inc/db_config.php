<?php
    $hname = 'localhost';
    $uname = 'root';
    $pass = '';
    $db = 'arahnyam';

    $con = mysqli_connect($hname,$uname,$pass,$db);

    if(!$con){
        die("Cannot Connect to the Database".mysqli_connect_error());
    }
    

    //Function for the prepared statements to bind and execute them(select)
    function select($sql, $values, $datatypes){
        $con = $GLOBALS['con']; //$GLOBALS is a PHP super global variable which is used to access global variables from anywhere in the PHP script (also from within functions or methods)
        if($stm = mysqli_prepare($con,$sql)){
            mysqli_stmt_bind_param($stm,$datatypes,...$values);  //... is splat operator - used to dynamically pass different number of values
            if(mysqli_stmt_execute($stm)){
                $res = mysqli_stmt_get_result($stm);
                mysqli_stmt_close($stm);
                return $res;
            }
            else{
                mysqli_stmt_close($stm); 
                die("Query Cannot be Executed - (select)");
            }
        }
        else{
            die("Query Cannot be Prepared - (select)");
        }
    }
    //Function for the prepared statements to bind and execute them(update)
    function update($sql, $values, $datatypes){
        $con = $GLOBALS['con']; //$GLOBALS is a PHP super global variable which is used to access global variables from anywhere in the PHP script (also from within functions or methods)
        if($stm = mysqli_prepare($con,$sql)){
            mysqli_stmt_bind_param($stm,$datatypes,...$values);  //... is splat operator - used to dynamically pass different number of values
            if(mysqli_stmt_execute($stm)){
                $res = mysqli_stmt_affected_rows($stm);
                mysqli_stmt_close($stm);
                return $res;
            }
            else{
                mysqli_stmt_close($stm); 
                die("Query Cannot be Executed - (update)");
            }
        }
        else{
            die("Query Cannot be Prepared - (update)");
        }
    }
    
    // Filter Data (remove special characters )
    function filter($data){
        foreach($data as $key => $value){
            $data[$key] = trim($value); //The trim() function removes whitespace and other predefined characters from both sides of a string.
            $data[$key] = stripcslashes($value);    //The stripcslashes() function removes backslashes
            $data[$key] = htmlspecialchars($value); //The htmlspecialchars() function converts some predefined characters to HTML entities.
            $data[$key] = strip_tags($value);   //The strip_tags() function strips(removes) a string from HTML, XML, and PHP tags.
        }
        return $data;
    }
?>