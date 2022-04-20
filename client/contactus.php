<?php

include 'header.php';

$mail_sent = 0;

if ("POST" == $_SERVER["REQUEST_METHOD"]) {

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $message = $_POST['message'];
    $msg     = "Name : $name <br>Email : $email<br>Phone : $phone<br><br>$message";

    $insertcontact = $mysqli->prepare("INSERT INTO contact (name,email, phone, message) VALUES (?,?,?,?)");
    $insertcontact->bind_param('ssis', $name, $email, $phone, $message);
    
    $result = $insertcontact->execute();

    $subject = 'Customer Submission';
    $content = 'Hello AutoTrack got a new Form Submission<br>' . $msg;

    if (is_null(sendMail($subject, $content))) {
        $mail_sent = 1;
    } else {
        $mail_sent = 2;
    }
}

?>

<!--=================================
        inner-intro -->

<section class="inner-intro bg-1 bg-overlay-black-70">
    <div class="container">
        <div class="row text-center intro-title">
            <div class="col-md-6 text-md-start d-inline-block">
                <h1 class="text-white">Contact us </h1>
            </div>
            <div class="col-md-6 text-md-end float-end">
                <ul class="page-breadcrumb">

                </ul>
            </div>
        </div>
    </div>
</section>

<!--=================================
        inner-intro -->

<!--=================================
        contact-us form start  -->

<section class="contact-2 page-section-ptb ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-center">
                <div class="section-title">
                    <span>We’d Love to Hear From You</span>
                    <h2>LET'S GET IN TOUCH!</h2>
                    <div class="separator"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-sm-12 mb-lg-0 mb-1">
                <div class="gray-form row">
                    <div class="col-md-12">
                        <form class="form-horizontal" id="contactform" role="form" method="post" action="">
                            <?php if (1 == $mail_sent): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Yay!</strong> We have forwarded your message to our staff!<br />
                                We will try to send your a reply within 1 working day.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php elseif (2 == $mail_sent): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>OOPS!</strong> Seems like there was some issue in sending your message!<br />
                                Please try again after some time. If the problem still persists, you can call us on the
                                given contact number with your concerns/feedback.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php endif;?>
                            <p>
                                It would be great to hear from you! If you got any questions, please do not hesitate to
                                send us a message. We are looking forward to hearing from you! We reply within 24 hours!
                            </p>
                            <div class="contact-form">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name* </label>
                                    <input id="contactform_name" type="text" placeholder="Name*" class="form-control"
                                        name="name" minlength="2" maxlength="30" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email* </label>
                                    <input id="contactform_email" type="email" placeholder="Email*" class="form-control"
                                        name="email" minlength="5" maxlength="50" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="phone">Phone* </label>
                                    <input id="contactform_phone" type="number" placeholder="Phone*" class="form-control"
                                        name="phone" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="message">Comment <small>(optional)</small> </label>
                                    <textarea id="contactform_message" class="form-control input-message"
                                        placeholder="Comment" rows="7" name="message" minlength="5" maxlength="1000">
                                    </textarea>
                                </div>
                                <div class="d-grid">
                                    <input type="hidden" name="action" value="sendEmail" />
                                    <button id="" name="submit" type="submit" value="Send" class="button red btn-block">
                                        Send your message
                                        <i class="fa fa-spinner fa-spin fa-fw btn-loader" style="display: none;"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="feature-box-3 grey-border">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="content">
                        <h5>Address </h5>
                        <p>B/81, Corporate House,<br> Judges Bunglow Rd, Bodakdev,<br> Ahmedabad, Gujarat 380054
                        </p>
                    </div>
                </div>
                <div class="feature-box-3 grey-border">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="content">
                        <h5>Phone </h5>
                        <p>+91 7984856432</p>
                    </div>
                </div>
                <div class="feature-box-3 grey-border mb-0">
                    <div class="icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="content">
                        <h5>Email </h5>
                        <p> info.autotrackindia@gmail.com </p>
                    </div>
                </div>
                <div class="opening-hours " style="background-color: #afafaf">
                    <h6>opening hours</h6>
                    <ul class="list-style-none">
                        <li><strong>Sunday</strong> <span class="text-red"> CLOSED</span></li>
                        <li><strong>Monday</strong> <span style="color:white"> 9:00 AM to 9:00 PM</span></li>
                        <li><strong>Tuesday </strong> <span style="color:white"> 9:00 AM to 9:00 PM</span></li>
                        <li><strong>Wednesday </strong> <span style="color:white"> 9:00 AM to 9:00 PM</span>
                        </li>
                        <li><strong>Thursday </strong> <span style="color:white"> 9:00 AM to 9:00 PM</span></li>
                        <li><strong>Friday </strong> <span style="color:white"> 9:00 AM to 9:00 PM</span></li>
                        <li><strong>Saturday </strong> <span style="color:white"> 9:00 AM to 9:00 PM</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
        contact-us form End -->

<!--=================================
        contact-map-start -->

<section class="contact-map">
    <div class="container-fluid">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14686.390221202824!2d72.5128349!3d23.0385443!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x93964e2d29f45f40!2sGateway%20Group%20of%20Companies!5e0!3m2!1sen!2sin!4v1646982386558!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>

<!--=================================
        contact-map -end -->

<?php include 'footer.php';?>

</body>

</html>