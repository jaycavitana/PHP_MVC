<?php

    // If necessary, modify the path in the require statement below to refer to the 
    // location of your Composer autoload.php file.
    require 'aws/aws-autoloader.php';

    use Aws\Ses\SesClient;
    use Aws\Exception\AwsException;

    // Create an SesClient. Change the value of the region parameter if you're 
    // using an AWS Region other than US West (Oregon). Change the value of the
    // profile parameter if you want to use a profile in your credentials file
    // other than the default.
    $SesClient = new SesClient([
        'profile' => 'default',
        'version' => '2010-12-01',
        'region'  => 'us-east-2'
    ]);

function send_email_notif($email, $message, $subject){
    
    global $SesClient;

    // Replace sender@example.com with your "From" address.
    // This address must be verified with Amazon SES.
    $sender_email = EMAIL_ADDRESS_SES;

    // Replace these sample addresses with the addresses of your recipients. If
    // your account is still in the sandbox, these addresses must be verified.
    $recipient_emails = [$email];

    // Specify a configuration set. If you do not want to use a configuration
    // set, comment the following variable, and the
    // 'ConfigurationSetName' => $configuration_set argument below.
    $configuration_set = 'ConfigSet';

    $plaintext_body = '' ;
    $message = nl2br($message);
    $html_body = "
    <img src='https://bucketeer-7953b4f6-162f-4505-850d-7618c5aba2be.s3.amazonaws.com/PDF_header.png' alt='growapp_banner' />
    <p style='margin-bottom:-20px; font-size: 15px'>
       $message
    </p>
    ";
    $char_set = 'UTF-8';

    try {
        $result = $SesClient->sendEmail([
            'Destination' => [
                'ToAddresses' => $recipient_emails,
            ],
            'ReplyToAddresses' => [$sender_email],
            'Source' => $sender_email,
            'Message' => [
            'Body' => [
                'Html' => [
                    'Charset' => $char_set,
                    'Data' => $html_body,
                ],
                'Text' => [
                    'Charset' => $char_set,
                    'Data' => $plaintext_body,
                ],
            ],
            'Subject' => [
                'Charset' => $char_set,
                'Data' => $subject,
            ],
            ],
            // If you aren't using a configuration set, comment or delete the
            // following line
            //'ConfigurationSetName' => $configuration_set,
        ]);
        //$messageId = $result['MessageId'];
        //echo("Email sent! Message ID: $messageId"."\n");

        return true;
    } catch (AwsException $e) {
        // output error message if fails
        //echo $e->getMessage();
        //echo("The email was not sent. Error message: ".$e->getAwsErrorMessage()."\n");
        //echo "\n";
        return false;
    }


}

function send_email_attachment($email, $message, $subject, $doc_url){
    
    global $SesClient;

    // Replace sender@example.com with your "From" address.
    // This address must be verified with Amazon SES.
    $sender_email = EMAIL_ADDRESS_SES;

    // Replace these sample addresses with the addresses of your recipients. If
    // your account is still in the sandbox, these addresses must be verified.
    $recipient_emails = [$email];

    // Specify a configuration set. If you do not want to use a configuration
    // set, comment the following variable, and the
    // 'ConfigurationSetName' => $configuration_set argument below.
    $configuration_set = 'ConfigSet';

    $plaintext_body = '' ;
    $message = nl2br($message);
    $html_body = "
    <img src='https://bucketeer-7953b4f6-162f-4505-850d-7618c5aba2be.s3.amazonaws.com/PDF_header.png' alt='growapp_banner' />
    <p style='margin-bottom:-20px; font-size: 15px'>
       $message
       <br><br>
       <a href='$doc_url'><b><u style='color: #105e6e'>View Attached File</u></b></a>       
    </p>
    ";
    $char_set = 'UTF-8';

    try {
        $result = $SesClient->sendEmail([
            'Destination' => [
                'ToAddresses' => $recipient_emails,
            ],
            'ReplyToAddresses' => [$sender_email],
            'Source' => "Growapp PH <".$sender_email.">",
            'Message' => [
            'Body' => [
                'Html' => [
                    'Charset' => $char_set,
                    'Data' => $html_body,
                ],
                'Text' => [
                    'Charset' => $char_set,
                    'Data' => $plaintext_body,
                ],
            ],
            'Subject' => [
                'Charset' => $char_set,
                'Data' => $subject,
            ],
            ],
            // If you aren't using a configuration set, comment or delete the
            // following line
            //'ConfigurationSetName' => $configuration_set,
        ]);
        //$messageId = $result['MessageId'];
        //echo("Email sent! Message ID: $messageId"."\n");

        return true;
    } catch (AwsException $e) {
        // output error message if fails
        //echo $e->getMessage();
        //echo("The email was not sent. Error message: ".$e->getAwsErrorMessage()."\n");
        //echo "\n";
        return false;
    }


}