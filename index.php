<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';

// Load Composer's autoloader


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'rahulrkumar7@gmail.com';                     // SMTP username
    $mail->Password   = 'Rahul@9930727313';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;
    $mail->tls          =true    ;                      // TCP port to connect to

    //Recipients
    $mail->setFrom('rahulrkumar7@gmail.com', 'Mailer');
    $mail->addAddress('rahulrkumar7@gmail.com', 'Joe User');     // Add a recipient
    $mail->addAddress('rahulrkumar7@gmail.com');               // Name is optional
    $mail->addReplyTo('rahulrkumar7@gmail.com', 'Information');
    $mail->addCC('rahulc@escanav.com');
    $mail->addBCC('android@escanav.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'BKB foundation ';
    $mail->Body      = "
    <html>
    <head>
    <title></title>
    </head>
    <body>                
    <div style='width:800px;background:#fff;border-style:groove;'>
    <div style='width:50%;text-align:left;'><a href='your website url'> <img 
    src=\"cid:logo_p2t\" height=60 width=200;'></a></div>
    <hr width='100%' size='2' color='#A4168E'>
    <div style='width:50%;height:20px; text-align:right;margin-
    top:-32px;padding-left:390px;'><a href='your url' style='color:#00BDD3;text-
    decoration:none;'> 
    My Bookings</a> | <a href='your url' style='color:#00BDD3;text-
    decoration:none;'>Dashboard </a> </div>
    <h2 style='width:50%;height:40px; text-align:right;margin:0px;padding-
    left:390px;color:#B24909;'>Booking Confirmation</h2>
    <div style='width:50%;text-align:right;margin:0px;padding-
    left:390px;color:#0A903B'> Booking ID:1150 </div>
    <h4 style='color:#ea6512;margin-top:-20px;'> Hello, " .$row1['fullname']."
    </h4>
    <p>Thank You for booking with us.Your Booking Order is Confirmed Now. Please 
    find the trip details along with the invoice. </p>
    <hr/>
    <div style='height:210px;'>
    <table cellspacing='0' width='100%' >
    <thead>
    <col width='80px' />
    <col width='40px' />
    <col width='40px' />
    <tr>          
    <th style='color:#0A903B;text-align:center;'>" .$row1['car_title']."</th>                           
    <th style='color:#0A903B;text-align:left;'>Traveller Info</th>
    <th style='color:#0A903B;text-align:left;'>Your Pickup Details: </th>                                                                            
    </tr>
    </thead>
    <tbody>   
    <tr>
    <td style='color:#0A903B;text-align:left;padding-bottom:5px;text-
    align:center;'><img src=\"cid:logo_p2t1\" height='90' width='120'></td>
    <td style='text-align:left;'>" .$row1['fullname']." <br> " .$row1['email']." 
    <br> " .$row1['phone']." <br>" .$row1['nearestcity']." </td>
    <td style='text-align:left;'>" .$row1['pickupaddress']." <br> Pickuptime:" 
    .$row1['pickuptime']." <br> Pickup Date:" .$row1['pickupdate']." 
    <br> Dropoff: " .$row1['dropoffaddress']."</td>
    </tr>   
    <tr>
    </tbody> 
    </table>                        
    <hr width='100%' size='1' color='black' style='margin-top:10px;'>                          
    <table cellspacing='0' width='100%' style='padding-left:300px;'>
    <thead>                                                                       
    <tr>                                        
    <th style='color:#0A903B;text-align:right;padding-bottom:5px;width:70%'>Base 
    Price:</th>
    <th style='color:black;text-align:left;padding-bottom:5px;padding-
    left:10px;width:30%'>" .$row1['base_price']."</th>
    </tr>
    <tr>                                        
    <th style='color:#0A903B;text-align:right;padding-bottom:5px;'>GST(5%):</th>
    <th style='color:black;text-align:left;padding-bottom:5px;padding-
    left:10px;'>" .$row1['gst']."</th>                                        
    </tr>
    <tr>                                        
    <th style='color:#0A903B;text-align:right;'>Total Price:</th>
    <th style='color:black;text-align:left;padding-bottom:5px;padding-
    left:10px;'>" .$row1['total_price']."</th>                                        
    </tr>
    </thead>   
    </table>             
    </div> 
    </div>              
    </body>
    </html>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}