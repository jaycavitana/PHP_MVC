<?php
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

function contract_pdf($client_name, $email_address, $trans_date, $street, $barangay, $city, $province, $inclusions, $prof_fee, $additional, $govt_exp_breakdown, $govt_expenses, $service_name, $estimated_turnaround_time, $cart_id){
    global $dompdf;

    $client_name_all_caps=strtoupper($client_name);
    $first_name=strtok($client_name, " ");
    $quotation_date = date_format(date_create($trans_date), "F j, Y");
    $address=$street; 
    $address_2=$barangay.', '.$city.', '.$province;
    $services=$inclusions; 
    $professional_fee=number_format($prof_fee, 2);
    $additional=number_format($additional, 2);
    $payment_schedule_table=""; //should be formatted to table -> separate tbl_payment_schedule (ScheduleID, AcceptanceFeeRate (70%), CompletionFeeRate(30%))
    $estimated_turnaround_time = $estimated_turnaround_time." business days"; //shoud be save in services table
    
    $acceptance_fee = number_format($prof_fee * 0.70,2);
    $completion_fee = number_format($prof_fee * 0.30,2);

    $govt_expenses = number_format($govt_expenses, 2);

    $inclusions = nl2br($inclusions);

    $breakdown = "
    <table class='no_border'>
    ";
    if(count($govt_exp_breakdown) > 0){
        foreach($govt_exp_breakdown as $govt_fee){
            $amount = number_format($govt_fee->Amount, 2);
            $description = $govt_fee->Description;
            $breakdown .= "
            <tr>
                <td style='width: 30%'><b>PHP $amount</b></td>
                <td style='width: 70%'>$description</td>
            </tr>
            ";
        }   
    }
    $breakdown .="
    <tr>
        <td style='border-top: 2px solid black'><b>PHP $govt_expenses</b></td>
        <td style='border-top: 2px solid black'>Overall Government Fees</td>
    </tr>
    </table>
    ";

    $html = "<html>
    <head>
    <title>Growapp PH E-Contract</title>
    <style>
        @page { margin: 100px 10px; }
        
        header { position: fixed; top: -100px; left: -10px; right: 0px; height: 150px;}
        footer { position: fixed; bottom: -100px; left: -10px; right: -10px; background-color: #3c4066; height: 30px; }
        p { margin-top: 100px; margin-left: 25px; margin-right: 25px; font-family: 'Arial'; text-align: justify; font-size: 15px; }
        table { border: 1px solid black; width: 100%; margin-left: 25px; margin-right: 25px; font-family: 'Arial'; font-size: 15px; }
        table.no_border { border: 1px solid white; width: 100%; margin-left: 25px; margin-right: 25px; font-family: 'Arial'; font-size: 15px; }
        
        p.second_part { margin-top: 0px; margin-left: 25px; margin-right: 25px; font-family: 'Arial'; text-align: justify; font-size: 15px;}
        span.break {page-break-after: always}
    </style>
    </head>
    <body>
    <header>
    <img src='https://bucketeer-7953b4f6-162f-4505-850d-7618c5aba2be.s3.amazonaws.com/PDF_header.jpg' style='height: 150px; object-fit: cover'/>
    </header>
    <footer></footer>
    <main>
        <p>
        <b>$client_name_all_caps</b><br>
        <b>$address</b><br>
        <b>$address_2</b><br>   
        <br>
        <b>$quotation_date</b><br>
        <br>
        <br>
        Dear $first_name,<br>
        <br>
        <br>
        This letter confirms that <b>$client_name_all_caps</b> ('you' or 'Client') has engaged <b>MDGN Ventures Inc.</b> ('us' or 'we' or 'Growapp.ph') to perform the services described below. Client may procure services under this engagement letter for itself and for those of its consolidated subsidiaries or affiliates that Client binds to this engagement letter by its signature or which separately agree to the provisions of this engagement letter (collectively, the 'Subsidiaries'). 
        <br>
        <br>
        <b>Scope of Our Services</b><br>
        <br>
        You are engaging us to provide the following services and deliverables (the 'Services'):<br>
        </p>
        <table>
        <tr>
            <td style='width:50%'>$service_name</td>
            <td style='width:50%'></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>$inclusions</td>
            <td>
            </td>
        </tr>
        </table>
        <br>
        <span class='break'></span>
        <p>
        <b>Fees and Expenses</b><br>
        <br>
        Our professional fee for this engagement will be <b>PHP $professional_fee</b> inclusive of all applicable taxes, representation/out-of-pocket allowances, transportation fees, and other coherent expenses.<br>
        <br>
        In addition, we also will bill you for Government-related expenses. Here’s the Government-related expenses breakdown:<br>
        <br>
        $breakdown
        <br>
        <br>
        <p class='second_part'>
        <span style='font-size: 12px'>*All government fees are estimate only. We will return all excess (if any); rest assured that we will be transparent and give you all the corresponding receipts upon receipt of all deliverables.</span>
        <br>
        <br>
        The amount of our fee is based on the assumption that we will receive the information and assistance as detailed throughout this engagement letter.  In the event we believe an additional fee is required as the result of your failure to meet any of these requests or for any other reason, we will inform you promptly.<br>
        </p>
        <p class='second_part'>
        <b>Payment Schedule</b><br>
        <br>
        We will issue our billing statements in accordance with the following schedule:<br>
        </p>
        <table class='no_border'>
        <tr>
            <td style='width:30%'><b>PHP $acceptance_fee</b></td>
            <td style='width:70%'>(70% Downpayment) <b>Payment Reference #$cart_id</b>
            </td>
        </tr>
        <tr>
            <td><b>PHP $govt_expenses</b></td>
            <td>(Government Fees) <b>Payment Reference #$cart_id</b></td>
        </tr>
        <tr>
            <td><b>PHP $completion_fee</b></td>
            <td>(30% Balance) Upon receipt of Client of all deliverables.</td>
        </tr>
        </table>
        <br>
        <p class='second_part'>
        All billing statements shall be sent to the following e-mail address:<br>
        <br><br>
        $email_address
        </p>
        </p>

        <span class='break'></span>
        
        <p>
        <b>Timeline</b><br>
        <br>
        Our estimates and deliverables are based on the assumption of starting date of the project. Average processing time of <b>$service_name</b> is around <b>$estimated_turnaround_time</b> upon signing this engagement letter. We will immediately start processing once down payment and government fees were secured. These dates are subject to change based on various factors, including the turnaround time of Government offices and the timely receipt of information from you. We will keep you informed of the developments in a timely manner.<br>
        <br>
        <b>Confidentiality</b><br>
        <br>
        Neither party shall use the other party's name or refer to the other party directly or indirectly in any media release, public announcement, or public disclosure relating to this engagement letter or its subject matter, including any promotional or marketing materials, lists, referral lists, or business presentations, without written consent from the other party for each such use or release.  Notwithstanding the foregoing, we may use your name in experience citations and marketing materials.<br>
        <br>
        <b>Our Responsibilities</b><br>
        <br>
        We shall perform the Services in a prompt, efficient and professional manner, in accordance with the highest applicable standard of skill, care, diligence and ethics recognized in the profession.<br>
        <br>
        <b>Your Responsibilities</b><br>
        <br>
        You are responsible for all management functions and decisions relating to this engagement, including evaluating and accepting the adequacy of the scope of the Services in addressing your needs.  You are also responsible for the results achieved from using any Services or deliverables, and it is your responsibility to establish and maintain your internal controls. You will designate a competent member of your management to oversee the Services.<br>
        <br>
        We expect that you will provide timely, accurate and complete information and reasonable assistance, and we will perform the engagement on that basis.<br>
        <br>
        <b>Termination and Dispute Resolution</b><br>
        <br>
        Either party may terminate the Services by giving one (1) month notice to that effect. Upon termination, the client is no longer liable for the succeeding payments and will only sign on the termination contract we will provide to formalize the termination.<br>
        <br>
        This engagement letter and any dispute between the parties whether in contract, tort or otherwise will be governed by and construed, interpreted and enforced in accordance with the laws of the Republic of the Philippines. Any unresolved dispute relating in any way to the Services or this engagement letter shall be submitted exclusively to the competent courts of Taguig City, Philippines.<br>
        <br>
        <b>Limitations on Liability</b><br>
        <br>
        Except to the extent finally determined to have resulted from our gross negligence or intentional misconduct, our aggregate liability to pay damages for all claims, losses, liabilities or damages in connection with this engagement letter or the Services, whether as a result of breach of contract, tort (including negligence) or otherwise, regardless of the theory of liability asserted, is limited to no more than the total amount of fees paid to us for the particular Service giving rise to the liability under this engagement letter. 
        </p>
        <span class='break'></span>        
        <p>
        <b>Other Matters</b><br>
        <br>
        Neither party to this engagement letter may assign or transfer this engagement letter or any rights, obligations, claims or proceeds from claims arising out of or in any way relating to this engagement letter, any services provided hereunder, or any fees for this engagement or such services, to anyone without the prior written consent of the other party, and any assignment without such consent shall be void and invalid. 
        <br>
        <br>
        If any provision of this engagement letter is found to be unenforceable, the remainder of this engagement letter shall be enforced to the extent permitted by law. 
        <br>
        <br>
        If we perform the Services prior to both parties executing this engagement letter, this engagement letter shall be effective as of the date we began the Services. 
        <br>
        <br>
        Neither party shall be liable to the other for any delay or failure to perform any of the Services or obligations in this engagement letter due to causes beyond its reasonable control. 
        <br>
        <br>
        <br>
        <br>
        <br>
        Very truly yours,<br>
        <br>
        <br>
        <img src='https://bucketeer-7953b4f6-162f-4505-850d-7618c5aba2be.s3.amazonaws.com/esign.png'/>
        <br>
        <b>MDGN Ventures Inc.</b><br>
        <br><br><br>
        ACKNOWLEDGED AND AGREED:<br>
        <br>
        <b>$client_name_all_caps</b><br>
        </p>
    </main>
    </body>
    </html>";

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('Legal', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream("GrowApp - Quotation.pdf", array("Attachment" => false));
    
}