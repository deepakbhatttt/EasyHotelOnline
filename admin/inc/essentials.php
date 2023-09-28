<?php

    function adminLoggedIn(){
        session_start();
        if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
            redirect('index.php');
            // echo "<script> window.location.href = 'index.php'; </script>";
            exit;
        }
        // session_regenerate_id(true);
    }

    function redirect($url){
        echo "<script> window.location.href = '$url'; </script>";
        exit;
    }

    function alert($type,$msg){
        $alertClass = ($type == "success")? "alert-success" : "alert-danger";
        echo <<<xyz
            <div class="alert alert-warning alert-dismissible fade show custom-alert $alertClass" role="alert">
                <strong class = "me-3"> $msg </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        xyz;
    }
?>