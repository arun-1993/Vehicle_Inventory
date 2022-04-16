<?php

session_start();
ob_start();

include '_dbconnect.php';
include_once 'mail/login_credentials.php';
include_once 'mail/vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Sends an email using the email id info.autotrackindia@gmail.com with the subject and content passed to the function.
 *
 * @param string $subject The subject of the email to be sent.
 * @param string $html_content The content of the email to be sent along with the html tags needed for formatting the email.
 * @return string|null Null indicates the email has been successfully sent. Returns an error message if unsuccessful.
 */
function sendMail(string $subject, string $html_content, string $email = null): ?string
{
    $mail = new PHPMailer(true);

    try
    {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com;';
        $mail->SMTPAuth   = true;
        $mail->Username   = Username;
        $mail->Password   = Password;
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('info.autotrackindia@gmail.com', 'AutoTrack');
        $mail->addAddress('arun0306.r@gmail.com');
        $mail->addAddress('jitendrabhavsar469@gmail.com');
        $mail->addAddress('riyavora16@gmail.com');

        if(!is_null($email))
        {
            $mail->addAddress($email);
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $html_content;

        $mail->AltBody = strip_tags($html_content);
        $mail->send();
        //echo "Mail has been sent successfully!";

    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    return null;
}

/**
 * Generates a cryptographically secure password of given length from an alphanumeric character set.
 *
 * @param integer $password_length Length of the password to be generated. Default length 10.
 * @return string The generated password.
 */
function createPassword(int $password_length = 10): string
{
    $character_set     = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters_length = strlen($character_set);
    $password          = '';

    for ($i = 0; $i < $password_length; $i++) {
        $password .= $character_set[random_int(0, $characters_length - 1)];
    }

    return $password;
}

/**
 * Converts a given number into Indian Currency format.
 *
 * @param string $money The number to be converted.
 * @return string The converted number prepended with INR symbol.
 */
function indMoneyFormat(string $money)
{
    $len   = strlen($money);
    $m     = '';
    $money = strrev($money);

    for ($i = 0; $i < $len; $i++) {
        if ((3 == $i || ($i > 3 && ($i - 1) % 2 == 0)) && $i != $len) {
            $m .= ',';
        }

        $m .= $money[$i];
    }
    return '&#8377; ' . strrev($m);
}

/**
 * Converts a given number into Indian Number System format.
 *
 * @param string $money The number to be converted.
 * @return string The converted number.
 */
function indNumberFormat(string $number)
{
    $len    = strlen($number);
    $m      = '';
    $number = strrev($number);

    for ($i = 0; $i < $len; $i++) {
        if ((3 == $i || ($i > 3 && ($i - 1) % 2 == 0)) && $i != $len) {
            $m .= ',';
        }

        $m .= $number[$i];
    }
    return strrev($m);
}

$root = "http://" . $_SERVER['SERVER_NAME'] . substr(str_replace('\\', '/', realpath(dirname(__FILE__))), strlen(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']))));

$Signedin = false;
if (isset($_SESSION['Username'])) {
    $Signedin = true;
}

$page = basename($_SERVER['PHP_SELF']);
$page = ucwords(explode('.', $page)[0]);

$popular_brands_query  = "SELECT * FROM popular_list WHERE list_id = 1";
$popular_brands_result = mysqli_query($conn, $popular_brands_query);

$popular_brands       = mysqli_fetch_array($popular_brands_result)['list_values'];
$popular_brands_array = explode(',', $popular_brands);

$brand_query  = "SELECT * FROM brand_master WHERE brand_id IN ($popular_brands) ORDER BY brand_name";
$brand_result = mysqli_query($conn, $brand_query);

$popular_cars_query  = "SELECT * FROM popular_list WHERE list_id = 2";
$popular_cars_result = mysqli_query($conn, $popular_cars_query);

$popular_cars       = mysqli_fetch_array($popular_cars_result)['list_values'];
$popular_cars_array = explode(',', $popular_cars);

$car_query  = "SELECT * FROM model_master JOIN brand_master USING(brand_id) WHERE model_id IN ($popular_cars) ORDER BY model_name";
$car_result = mysqli_query($conn, $car_query);

$brands = array();
$cars   = array();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!-- Getting current page title -->
    <title>AutoTrack | <?=$page;?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=$root;?>/images/favicon.ico" />

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/bootstrap.min.css" />

    <!-- flaticon -->
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/flaticon.css" />

    <!-- mega menu -->
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/mega-menu/mega_menu.css" />

    <!-- mega menu -->
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/jquery.datetimepicker.min.css" />

    <!-- owl-carousel -->
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/owl-carousel/owl.carousel.css" />

    <!-- magnific-popup -->
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/magnific-popup/magnific-popup.css" />

    <!-- jquery-ui -->
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/jquery-ui.css" />

    <!-- revolution -->
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/revolution/css/settings.css">

    <!-- main style -->
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/style.css" />

    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/custom.css" />

    <!-- responsive -->
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/bootstrap-datetimepicker.css" />

    <!-- Slick css -->
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/css/slick/slick-theme.css" />

</head>
<!--=================================
            loading -->

<!-- <div id="loading">
            <div id="loading-center">
            <img src="images/loader4.gif" alt="">
            </div>
            </div> -->

<!--=================================
            loading -->


<!-- Starting session -->


<!--=================================
            header -->

<header id="header" class="topbar-dark logo-center" style="background-color:#ebf3fa">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="topbar-left text-md-start text-center">
                        <ul class="list-inline">
                            <li> <i class="fa fa-envelope-o"> </i>info.autotrackindia@gmail.com</li>
                            <li> <i class="fa fa-clock-o"></i> Mon - Sat 9.00 A.M - 9.00 P.M Sunday CLOSED
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="topbar-right text-md-end text-center">
                        <ul class="list-inline">
                            <li> <i class="fa fa-phone"></i> +91 7984856432</li>
                            <li><a href="<?=$root;?>/#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?=$root;?>/#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?=$root;?>/#"><i class="fa fa-instagram"></i></a></li>
                            <li>
                                <?php if (true == $Signedin): ?>
                                <strong>Welcome! </strong><?=$_SESSION['name'];?>
                                <?php endif;?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=================================
            menu -->

    <div class="menu">
        <!-- menu start -->
        <nav id="menu" class="mega-menu">
            <!-- menu list items container -->
            <section class="menu-list-items">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center position-relative">
                            <!-- menu logo -->
                            <ul class="menu-logo" style="padding:0px">
                                <li>
                                    <a href="<?=$root;?>/index.php"><img id="" src="images/logoopt4.png" alt="logo"
                                            style="width:auto; height:auto;padding-top:20px;"> </a>
                                </li>
                            </ul>
                            <!-- menu links -->
                            <ul class="menu-links">
                                <li class="">
                                    <a href="<?=$root;?>/index.php"> Home </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        Vehicles <i class="fa fa-angle-down fa-indicator"></i>
                                    </a>
                                    <ul class="drop-down-multilevel ">
                                        <li>
                                            <a href="<?=$root;?>/listing.php">
                                                Cars <i class="fa fa-angle-right fa-indicator"></i>
                                            </a>
                                            <ul class="drop-down-multilevel">
                                                <li>
                                                    <a href="#">
                                                        Popular Brands <i class="fa fa-angle-right fa-indicator"></i>
                                                    </a>
                                                    <ul class="drop-down-multilevel">
                                                        <?php while ($row = mysqli_fetch_array($brand_result)): ?>
                                                        <?php array_push($brands, [$row['brand_id'], $row['brand_name']]);?>
                                                        <li>
                                                            <a
                                                                href="<?=$root . '/listing.php?brand=' . end($brands)[0];?>"><?=end($brands)[1];?></a>
                                                        </li>
                                                        <?php endwhile;?>
                                                        <li>
                                                            <a href="<?=$root;?>/listing.php">All Brands</a>
                                                        </li>
                                                    </ul>
                                                <li>
                                                    <a href="#">
                                                        Popular Cars<i class="fa fa-angle-right fa-indicator"></i>
                                                    </a>
                                                    <ul class="drop-down-multilevel">
                                                        <?php while ($row = mysqli_fetch_array($car_result)): ?>
                                                        <?php array_push($cars, [$row['model_id'], $row['brand_name'] . ' ' . $row['model_name']]);?>
                                                        <li>
                                                            <a
                                                                href="<?=$root . '/listing.php?model=' . end($cars)[0];?>"><?=end($cars)[1];?></a>
                                                        </li>
                                                        <?php endwhile;?>
                                                        <li>
                                                            <a href="<?=$root;?>/listing.php">All Cars</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=$root;?>/service.php">About Us </a>
                                </li>
                                <li>
                                    <a href="<?=$root;?>/contactus.php"> Contact Us</a>
                                </li>
                                <!-- checking logged in or not -->
                                <?php if (isset($_SESSION['Loggedin']) == true): ?>
                                <li>
                                    <a href="javascript:void(0)">
                                        My Account <i class="fa fa-angle-down fa-indicator"></i>
                                    </a>
                                    <ul class="drop-down-multilevel">
                                        <li>
                                            <a href="<?=$root;?>/myappointment.php">
                                                My Appointment
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=$root;?>/editprofile.php">
                                                Edit Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=$root . '/logout.php?loc=' . $_SERVER['REQUEST_URI'];?>">
                                                Sign Out
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <?php else: ?>
                                <li>
                                    <a href="<?=$root . '/register.php';?>">
                                        Register
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$root . '/login.php?loc=' . $_SERVER['REQUEST_URI'];?>">
                                        Login
                                    </a>
                                </li>
                                <?php if (true == $Signedin): ?>
                                <?='';?>
                                <?php endif;?>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </nav>
        <!-- menu end -->
    </div>
</header>
<div id="scroll_anchor"></div>