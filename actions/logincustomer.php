<?php
include("../controllers/customer_controller.php");

// Collecting form data
// GET is used by default so define the type of method
// POST is used for secure information transmission.
if(isset($_POST["login"])){


    // Variable to capture the name value for each user input.
    $customer_email = $_POST["cemail"];
    $customer_pass = $_POST["cpass"];
    $login =loginCustomer_ctr($customer_email);
    $verify = selectOne_Email_ctr($customer_email);

        if($login != false){
            if (password_verify($customer_pass,$login['customer_pass']) and $login['user_role']==1 ){

                      session_start();
                       $_SESSION['customer_pass']= $login['customer_pass'];
                       $_SESSION['customer_name'] = $result['cname'];
                       $_SESSION['customer_email'] = $result['cemail'];
                       $_SESSION['user_role'] = 1;
                       $_SESSION['customer_id'] = $login['customer_id'] ;
                         // redirect to login
                            header('Location:../Admin/admin.php');
            }

            else if (password_verify($customer_pass,$login['customer_pass']) and $login['user_role']!=1){
                session_start();

                $_SESSION['customer_pass']= $login['customer_pass'];
                $_SESSION['custmer_name'] = $login['cname'];
                $_SESSION['customer_email'] = $login['cemail'];
                $_SESSION['user_role'] = $login['user_role'];
                $_SESSION['customer_id'] = $login['customer_id'];
                // redirect to login
                   header('Location:../view/allwedding.php');
            }
            


            else{
                session_start();
$_SESSION['error']='Invalid credentials';
                header('Location:../Login/login.php');
            }
                    }
                    else{
                        session_start();
$_SESSION['error']='Invalid credentials';
                        header('Location:../Login/login.php');
                    }
        


    }


?>