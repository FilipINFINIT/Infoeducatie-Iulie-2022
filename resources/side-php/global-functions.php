<?php
    function redirect($url, $statusCode = 303)
    {
    header('Location: ' . $url, true, $statusCode);
    die();
    }
    function checkLogin($conn){
        if(isset($_SESSION['user_id'])){

            $id=$_SESSION['user_id'];
            $result=mysqli_query($conn,"SELECT * FROM users WHERE id = '$id' LIMIT 1");
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        else{
            $user_data['nume']='Guest';
            return $user_data;
        }
    }
    function setStats($conn,$stats,$value){
        if(isset($_SESSION['user_id'])){
            $id=$_SESSION['user_id'];
            $result=mysqli_query($conn,"UPDATE users SET $stats ='$value' WHERE id = '$id' LIMIT 1");
            echo $result;
        }
    }
?>