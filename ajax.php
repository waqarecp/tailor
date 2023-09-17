<?php
session_start();
include 'config/actions.php';


if (isset($_POST['btn_submit'])) {
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

    $array = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'contact' => $_POST['contact'],
        'address' => $_POST['address'],
        'created_by' => $_SESSION['id']
    );
    $inserted_id = $object->insert('customers', $array);
    if ($inserted_id) {
        $array = array(
            'lenght' => $_POST['lenght'],
            'chest' => $_POST['chest'],
            'shoulder' => $_POST['shoulder'],
            'arm' => $_POST['arm'],
            'half_bean' => $_POST['half_bean'],
            'half_bean_style' => $_POST['half_bean_style'],
            'bent' => $_POST['bent'],
            'back' => $_POST['back'],
            'pouncha' => $_POST['pouncha'],
            'surround' => $_POST['sorround'],
            'pants' => $_POST['pants'],
            'strip_lenght' => $_POST['strip_lenght'],
            'strip_width' => $_POST['strip_width'],
            'side_pocket' => $_POST['side_pocket'],
            'front_pocket' => $_POST['front_pocket'],
            'daman' => $_POST['daman'],
            'customer_id' => $inserted_id,
            'created_by' => $_SESSION['id'],

        );
        $object->insert("measurements", $array);
        $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible'></a><h4>Customer added successfully.</h4></div>";
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible'></a><h4>Faild to add customer.</h4></div>";
    }
    header('Location:customers.php');
}

if (isset($_POST['btn_edit_customer'])) {
    $id =$_POST['edit_customer_id'];
    $name = $_POST['edit_customer_name'];
    $email =   $_POST['edit_customer_email'];
    $contact =   $_POST['edit_customer_contact'];
    $address =   $_POST['edit_customer_address'];
    $status =   $_POST['edit_customer_status'];
    $lenght =   $_POST['edit_lenght'];
    $chest =   $_POST['edit_chest'];
    $shoulder =   $_POST['edit_shoulder'];
    $arm =   $_POST['edit_arm'];
    $daman =  $_POST['edit_daman'];
    $half_bean =   $_POST['edit_half_bean'];
    $half_bean_style =   $_POST['edit_half_style'];
    $back =   $_POST['edit_back'];
    $pouncha =   $_POST['edit_pouncha'];
    $sorround =   $_POST['edit_sorround'];
    $pants =   $_POST['edit_pants'];
    $strip_lenght =   $_POST['edit_strip_lenght'];
    $strip_width =   $_POST['edit_strip_width'];
    $bent =   $_POST['edit_bent'];
    $side_pocket =   $_POST['edit_side_pocket'];
    $front_pocket =   $_POST['edit_front_pocket'];
    $bent =   $_POST['edit_bent'];
    $detail =   $_POST['detail'];

    $array = array(
        'name' => $_POST['edit_customer_name'],
        'email' => $_POST['edit_customer_email'],
        'contact' => $_POST['edit_customer_contact'],
        'address' => $_POST['edit_customer_address'],
        'status' => $_POST['edit_customer_status'],
        'created_by' => $_SESSION['id']
    );
    $update = $object->update('customers', $array,"customers.id=$id");
    if ($update) {
        $array = array(
            'lenght' => $_POST['edit_lenght'],
            'chest' => $_POST['edit_chest'],
            'shoulder' => $_POST['edit_shoulder'],
            'arm' => $_POST['edit_arm'],
            'half_bean' => $_POST['edit_half_bean'],
            'half_bean_style' => $_POST['edit_half_style'],
            'bent' => $_POST['edit_bent'],
            'back' => $_POST['edit_back'],
            'pouncha' => $_POST['edit_pouncha'],
            'surround' => $_POST['edit_sorround'],
            'pants' => $_POST['edit_pants'],
            'strip_lenght' => $_POST['edit_strip_lenght'],
            'strip_width' => $_POST['edit_strip_width'],
            'side_pocket' => $_POST['edit_side_pocket'],
            'front_pocket' => $_POST['edit_front_pocket'],
            'daman' => $_POST['edit_daman'],
            'detail' => $_POST['edit_detail'],
            'customer_id' =>$_POST['edit_customer_id'],
            'created_by' => $_SESSION['id'],

        ); 
        $object->update('measurements', $array,"measurements.customer_id=$id");
        $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible'></a><h4>Record updated successfully.</h4></div>";
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible'></a><h4>Faild to update record.</h4></div>";
    }
    header('Location:customers.php');
}
if (isset($_POST['btn_new_order'])) {

    $array = array(
        'customer_id' => $_POST['order_customer_id'],
        'measurement_id' => $_POST['order_measurement_id'],
        'delivery_date' => $_POST['order_delivery_date'],
        'quantity' => $_POST['order_quantity'],
        'created_by' => $_SESSION['id'],
        'total_amount' => $_POST['order_total_amount']
    );
    $insert = $object->insert('orders', $array);
    if ($insert) {
        $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible'></a><h4>Order added successfully.</h4></div>";
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible'></a><h4>Faild to add order.</h4></div>";
    }
    header('Location:orders.php');
}

if (isset($_POST['btn_update_order'])) {
       $id=$_POST['o_id'];
       $amount_status=$_POST['amount_status'];
    $array = array(
        'status' => $_POST['o_status'],
        'total_amount' => $_POST['total_amount'],
        'amount_status' => $_POST['amount_status'],
        'updated_by' => $_SESSION['id'],
        'updated_date' => date("Y-m-d H:i:s")
    );
    $update= $object->update('orders', $array,"orders.id=$id");
 
    if ($update) {
        $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible'></a><h4>Order updated successfully.</h4></div>";
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible'></a><h4>Faild to update order.</h4></div>";
    }

    header('Location:orders.php');
}
