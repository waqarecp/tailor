<?php  
session_start();
include'config/actions.php';


if (isset($_POST['btn_submit']) ){
 $name = $_POST['name'];
 $email =   $_POST['email'];
 $contact =   $_POST['contact'];
 $address =   $_POST['address'];
 $lenght =   $_POST['lenght'];    
 $chest =   $_POST['chest']; 
 $shoulder =   $_POST['shoulder'];
 $arm =   $_POST['arm'];
 $daman =  $_POST['daman'];
 $half_bean =   $_POST['half_bean']; 
 $half_bean_style =   $_POST['half_bean_style'];
 $back =   $_POST['back']; 
 $pouncha =   $_POST['pouncha'];
 $sorround =   $_POST['sorround'];
 $pants =   $_POST['pants'];
 $strip_lenght =   $_POST['strip_lenght'];
 $strip_width =   $_POST['strip_width'];
 $bent =   $_POST['bent'];
 $side_pocket =   $_POST['side_pocket'];
 $front_pocket =   $_POST['front_pocket'];
 $bent =   $_POST['bent']; 
     
        $array =array(
            'name' =>$_POST['name'],
            'email' =>$_POST['email'],
            'contact' =>$_POST['contact'],
            'address' =>$_POST['address'],
            'created_by' =>$_SESSION['id']
    );    
    $insert=$object->insert('customers',$array);
    
        if ($insert) {
            $array=array(
                'lenght' =>$_POST['lenght'],
                'chest' =>$_POST['chest'],
                'shoulder' =>$_POST['shoulder'],
                'arm' =>$_POST['arm'],
                'half_bean' =>$_POST['half_bean'],
                'half_bean_style' =>$_POST['half_bean_style'],
                'bent' =>$_POST['bent'],
                'back' =>$_POST['back'],
                'pouncha' =>$_POST['pouncha'],
                'sorround' =>$_POST['sorround'],
                'pants' =>$_POST['pants'],
                'strip_lenght' =>$_POST['strip_lenght'],
                'strip_width' =>$_POST['strip_width'],
                'side_pocket' =>$_POST['side_pocket'],
                'front_pocket' =>$_POST['front_pocket'],
                'daman' =>$_POST['daman'],
                'customer_id' =>$insert,
                'created_by' =>$_SESSION['id'],
                
            );
            $insert_measurement=$object->insert("measurements",$array);
            $_SESSION['msg']="<div class='alert alert-success alert-dismissible'><a href='javascript:void(0)' class='close' data-dismiss='alert' aria-label='close'>&times;</a><h4>Customer added successfully.</h4></div>";
            header('Location:customer.php');
        } else {
            $_SESSION['msg']= "<div class='alert alert-danger alert-dismissible'><a href='javascript:void(0)' class='close' data-dismiss='alert' aria-label='close'>&times;</a><h4>Faild to add customer.</h4></div>";
            header('Location:customer.php');  
        }
} 
?>