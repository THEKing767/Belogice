<?php
    include 'header.php'
?>
        <style>
            .com {
                text-decoration: underline;
            }
        </style>
        <main>
            <div class="wrapper">
                <form name="acompform" class="formcomp" netlify>
                    <p class="NOP">
                    <label>Name of Participant<br><input type="text" name="name"/></label>
                    </p>
                    <p class="EOP">
                    <label>Email of Participant<br><input type="email" name="email"/></label>
                    </p>
                    <p class="EOPG">
                    <label>Email of Participant's Guardian<br><input type="email" name="email2"/></label>
                    </p>
                    <p class="signb">
                    <button type="submit" class="signb1">Send</button>
                    </p>
                </form>
                <?php 
                    if (isset('sub')) {

                        $name = $_POST['name']
                        $email1 = $_POST['email']
                        $email2 = $_POST['email2']

                        use PHPMailer\PHPMailer\PHPMailer;
                        use PHPMailer\PHPMailer\SMTP;
                        use PHPMailer\PHPMailer\Exception;

                        // Load Composer's autoloader
                        require 'vendor/autoload.php';

                        // Instantiation and passing `true` enables exceptions
                        $mail = new PHPMailer(true);

                        try {
                            $mail->SMTPOptions = array(
                            'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                            )
                            );
                            //Server settings
                            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                            $mail->isSMTP();                                            // Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                            $mail->Username   = 'testtest122344566@gmail.com';                     // SMTP username
                            $mail->Password   = 'end11223344556';                               // SMTP password
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                            //Recipients
                            $mail->setFrom('noreply@belogicus.com', 'BeLogicus');
                            $mail->addAddress($email, $name);     // Add a recipient
                            $mail->addAddress($email2);               // Name is optional
                            //$mail->addReplyTo('info@example.com', 'Information');
                            //$mail->addCC('cc@example.com');
                            //$mail->addBCC('bcc@example.com');

                            // Attachments
                            ////$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                            // Content
                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = '[BeLogicus] Art Competition Registration';
                            $mail->Body    = $name.'have registered for the <b>BeLogice</b> Art Compitetion.<br>';
                            $mail->AltBody = $name.'have registered for the BeLogice Art Compitetion.';

                            $mail->send();
                            echo 'Message has been sent';
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                    }
                ?>
            </div>
        </main>
<?php
    include 'footer.php'
?>
