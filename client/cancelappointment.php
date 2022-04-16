<?php

include_once 'header.php';

if (isset($_GET['id'])) {

    $appointmentid = $_GET['id'];
// echo $appointmentid;
    $userid = $_SESSION['userid'];
    $query  = $mysqli->prepare("update `appointment` set appointment_status='Cancelled' where appointment_id =? AND user_id=?");
    $query->bind_param('ii', $appointmentid, $userid);
    $query->execute();
    $affected_rows = $mysqli->affected_rows;

    $selectuser = $mysqli->prepare("SELECT * FROM user JOIN appointment USING(user_id)");
    $selectuser->execute();
    $userresult = $selectuser->get_result();
    $user       = $userresult->fetch_assoc();
    $username   = $user['username'];
    $schedule   = $user['appointment_schedule'];
    if (0 != $affected_rows) {
        $subject = 'Appointment cancelled';
        $content = "The user $username has cancelled his appointment scheduled on $schedule.<br />Ref. Appointment Id : $appointmentid.";
        sendMail($subject, $content);
    }

    header("Location: myappointment.php");
}
