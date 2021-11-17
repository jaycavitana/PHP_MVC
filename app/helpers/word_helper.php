<?php
function board_reso(){
    $filename = 'board_resolution.doc';
    header("Content-Type: application/force-download");
    header( "Content-Disposition: attachment; filename=".basename($filename));
    header( "Content-Description: File Transfer");
    @readfile($filename);
    
    //13.5px is 10.5px

    $content = '<html xmlns:v="urn:schemas-microsoft-com:vml" '
        .'xmlns:o="urn:schemas-microsoft-com:office:office" '
        .'xmlns:w="urn:schemas-microsoft-com:office:word" '
        .'xmlns:m="http://schemas.microsoft.com/office/2004/13.5/omml"= '
        .'xmlns="http://www.w3.org/TR/REC-html40">'
        .'<head><meta http-equiv="Content-Type" content="text/html; charset=Windows-13.552">'
        .'<title></title>'
        .'<!--[if gte mso 9]>'
        .'<xml>'
        .'<w:WordDocument>'
        .'<w:View>Print'
        .'<w:Zoom>100'
        .'<w:DoNotOptimizeForBrowser/>'
        .'</w:WordDocument>'
        .'</xml>'
        .'<![endif]-->'
        .'<style>
        @page
        {
            font-family: Arial;
            text-align: justify;
            size:215.9mm 340.4mm;  /* A4 */
            margin:13.5.2mm 17.5mm 13.5.2mm 16mm; /* Margins: 2.5 cm on each side */
        }
        table{
            border-collapse:collapse;
            border:1px solid black;
            width:100%;
            font-family: Arial;
            font-size: 13.5px;
        }
        table.directors{
            border-collapse:collapse;
            border:1px solid white;
            width:100%;
            font-family: Arial;
            font-size: 13.5px;
        }
        table.directors td{
            border:1px solid white;
            font-family: Arial;
            font-size: 13.5px;
        }
        table.ids{
            border-collapse:collapse;
            border:1px solid white;
            width:100%;
            font-family: Arial;
            font-size: 13.5px;
        }
        table.ids td{
            border:1px solid white;
            font-family: Arial;
            font-size: 13.5px;
        }
        table tr{
            font-family: Arial;
            font-size: 13.5px;
        }
        table td{
            border:1px solid black;
            font-family: Arial;
            font-size: 13.5px;
        }
        table tr{
            font-family: Arial;
            font-size: 13.5px;
        }
        p.para {font-family: Arial; font-size: 13.5px;}
        p.content {font-family: Arial; font-size: 13.5px;}
        center {font-family: Arial; font-size: 13.5px;}
        b {font-family: Arial; font-size: 13.5px;}
        </style>'
        .'</head>'
        .'<body>'
        .'<p class="para">'
        .'REPUBLIC OF THE PHILIPPINES)<br>'
        .'CITY OF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)S.S.<br>'
        .'<br><br>'
        .'<center><b>BOARD RESOLUTION OF</b></center>'
        .'<center><b>INSERT CORPORATE NAME</b></center>'
        .'<center><b>Insert Board Meeting Date</b></center>'
        .'<br>'
        .'<center>Resolution No. 202X-01</center><br>'
        .'<br>'
        .'<p class="content">'
        .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>WHEREAS</b>, a special meeting of the Board of Directors of <b>(INSERT CORPORATE NAME)</b>, a corporation duly organized and existing in accordance with Philippine laws (the "Corporation"), with principal address at (Insert Corporation Address);<br>'
        .'<br>'
        .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>WHEREAS</b>, the directors present, in person or by proxy, constituted a quorum;<br>'
        .'<br>'
        .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>WHEREAS</b>, it is required that application documents pertaining to business registration of the Corporation in (Insert what city you want to register) be transacted, executed, and signed by officers or their alternates;<br>'
        .'<br>'
        .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>WHEREAS</b>, we, the members of the Board of Directors of the Corporation, are conscious that, in designating the persons who would transact, execute, and sign said application documents for business registration in (Insert what city you want to register) Hall and Bureau of Internal Revenue, we are actually empowering and authorizing said persons to represent and act for or in behalf of the Board of Directors and the Corporation in general;<br>'
        .'<br>'
        .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOW THEREFORE, WE, THE MEMBERS OF THE BOARD OF DIRECTORS, RESOLVE, AS IT IS HEREBY RESOLVED THAT:'
        .'<table>
        <tr>
        <td colspan="2" style="border: 1px solid white"></td>
        </tr>
        <tr>
        <td>Name</td>
        <td>Specimen Signature</td>
        </tr>
        <tr>
        <td style="height: 50px"><b>1. MICHAEL C. MULI</b></td>
        <td></td>
        </tr>
        </table>
        <br>
        are hereby authorized to transact, execute and sign any and all documents in behalf of the Corporation pertaining to its application for business registration in (Insert what city you want to register).<br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Done in the ____________________________ this ____________________.
        <br>
        <br><br>
        <table class="directors">
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td style="height: 50px;" colspan="2">
            <center>
            <b>NAME OF DIRECTOR 1</b><br>
            Director
            </center>
            </td>
        </tr>
        <tr>
            <td style="height: 50px">
            <center>
            <b>NAME OF DIRECTOR 2</b><br>
            Director
            </center>
            </td>
            <td style="height: 50px">
            <center>
            <b>NAME OF DIRECTOR 3</b><br>
            Director
            </center>
            </td>
        </tr>
        <tr>
            <td style="height: 50px">
            <center>
            <b>NAME OF DIRECTOR 4</b><br>
            Director
            </center>
            </td>
            <td style="height: 50px">
            <center>
            <b>NAME OF DIRECTOR 5</b><br>
            Director
            </center>
            </td>
        </tr>
        </table><br>
        <br>
        <center><b>ACKNOWLEDGEMENT</b></center>
        <br>
        <br><b>'
        .'REPUBLIC OF THE PHILIPPINES)<br>'
        .'CITY OF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)S.S.
        </b><br>
        <br>
        <p class="content">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BEFORE ME, A Notary Public for and in ____________________________________ this __________________ day of _____________________ 2020 personally appeared:</p><br>
        <br>
        <table class="ids">
        <tr>
            <td style="border-bottom: 3px solid black"></td>
            <td style="border-bottom: 3px solid black">Government Issued Identification</td>
            <td style="border-bottom: 3px solid black">Date/Place Issued</td>
        </tr>
        <tr>
            <td style="height: 30px"><b>NAME OF DIRECTOR 1</b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="height: 30px"><b>NAME OF DIRECTOR 2</b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="height: 30px"><b>NAME OF DIRECTOR 3</b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="height: 30px"><b>NAME OF DIRECTOR 4</b></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <td style="height: 30px; border-bottom: 3px solid black"><b>NAME OF DIRECTOR 5</b></td>
            <td style="border-bottom: 3px solid black"></td>
            <td style="border-bottom: 3px solid black"></td>
        </tr>
        </table><br>
        <p class="content">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All known to me as the same persons who executed the foregoing instrument and they acknowledged to me that the same is their free and voluntary act and deed and that of the entities they respectively represent.<br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This instrument refers to the Board Resolution consisting of ______ pages including this page signed by the parties on each and every page hereof and sealed with my notarial seal.<br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WITNESS MY HAND AND SEAL on the date and place above written.<br>
        <br>
        Doc. No.	_________<br>
        Page No.	_________<br>
        Book No.	_________<br>
        Series of 	_________<br>
        </p>'
        .'</p>'
        .'</p>' 
        .'</body>' 
        .'</html>'; 
    
    echo $content; 
}

function spa_lgu(){
    $filename = 'spa_lgu.doc';
    header("Content-Type: application/force-download");
    header( "Content-Disposition: attachment; filename=".basename($filename));
    header( "Content-Description: File Transfer");
    @readfile($filename);
    
    //15px is 12px

    $content = '<html xmlns:v="urn:schemas-microsoft-com:vml" '
        .'xmlns:o="urn:schemas-microsoft-com:office:office" '
        .'xmlns:w="urn:schemas-microsoft-com:office:word" '
        .'xmlns:m="http://schemas.microsoft.com/office/2004/13.5/omml"= '
        .'xmlns="http://www.w3.org/TR/REC-html40">'
        .'<head><meta http-equiv="Content-Type" content="text/html; charset=Windows-13.552">'
        .'<title></title>'
        .'<!--[if gte mso 9]>'
        .'<xml>'
        .'<w:WordDocument>'
        .'<w:View>Print'
        .'<w:Zoom>100'
        .'<w:DoNotOptimizeForBrowser/>'
        .'</w:WordDocument>'
        .'</xml>'
        .'<![endif]-->'
        .'<style>
        @page
        {
            font-family: Arial;
            text-align: justify;
            size:215.9mm 355.6mm;  /* Legal */
            margin:13.5.2mm 17.5mm 13.5.2mm 16mm; /* Margins: 2.5 cm on each side */
        }
        table.directors{
            border-collapse:collapse;
            border:1px solid white;
            width:100%;
            font-family: Arial;
            font-size: 15px;
        }
        table.directors td{
            border:1px solid white;
            font-family: Arial;
            font-size: 15px;
        }
        p.para {font-family: Arial; font-size: 15px;}
        center {font-family: Arial; font-size: 15px;}
        b {font-family: Arial; font-size: 15px;}
        </style>'
        .'</head>'
        .'<body>'
        .'<p class="para">'
        .'REPUBLIC OF THE PHILIPPINES)<br>'
        .'CITY OF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)S.S.<br>'
        .'<br><br>
        <center><b>SPECIAL POWER OF ATTORNEY</b></center>
        <br><br>
        KNOW ALL MEN BY THESE PRESENTS:<br>
        <br>
        I, <b>[INSERT FULL NAME]</b>, of legal age, with residence and postal address at <b>[INSERT FULL ADDRESS]</b>.<br>
        <br>
        I do hereby appoint <b>MICHAEL C. MULI</b>, likewise of legal age, with postal address at <b>153 RAMON JABSON ST., BAMBANG, PASIG CITY 1600</b>, as my true and legal representative to act for in my behalf and stead and to perform the following acts:<br>
        <br>
        To apply, submit, sign, process and receive Applications, Documents, LGU forms pertaining to and any transactions with the <b>[INSERT CITY NAME]</b> Local Government Unit such as but not limited to request new Barangay Certificate, Mayor’s Permit and other various clearances as specified and other related matters.<br>
        <br>
        HEREBY APPROVING ALL that he may do by virtue hereof with full right of substitution of his person and revocation of this instrument.<br>
        <br>
        IN WITNESS WHEREOF, WE HAVE HEREUNTO SET OUR HANDS THIS ____ DAY OF _______________ 20__, AT___________________________.<br>
        <br><br><br>
        <table class="directors">
        <tr>
            <td colspan="2" style="border: 1px solid white"></td>
        </tr>
        <tr>
            <td>
            <center>
            <b>[INSERT FULL NAME]</b><br>
            (Name of Principal) 
            </center>
            </td>
            <td>
            <center>
            <b>MICHAEL C. MULI</b><br>
            (Name of Representative) 
            </center>
            </td>
        </tr>
        </table>
        <br><br>
        <center>Signed in the presence of:</center><br>
        <br>
        <center>______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________________</center>
        <br>
        <br><br>
        BEFORE ME, personally appeared<br>
        <br>
        <table class="directors">
        <tr>
            <td colspan="3" style="border: 1px solid white"></td>
        </tr>
        <tr>
            <td style="height: 30px;"><center>Name</center></td>
            <td style="height: 30px;"><center>TIN/ID No.</center></td>
            <td style="height: 30px;"><center>Date/Place Issued</center></td>
        </tr>
        <tr>
            <td>[INSERT FULL NAME]</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>MICHAEL C. MULI</td>
            <td></td>
            <td></td>
        </tr>
        </table>
        <br><br>
        Known to me and to me known to be the same persons who executed the foregoing instrument and acknowledged to me that the same is their free and voluntary act and deed.<br>
        <br>
        WITNESS MY HAND AND SEAL, on the date and place first above written.<br>
        <br><br>
        <b>Notary Public</b><br>
        <br>
        Doc. No.______;<br>
        Page No. ______;<br>
        Book No.______;<br>
        Series of 20___.'
        .'</p>'
        .'</body>' 
        .'</html>'; 
    
    echo $content; 
}

function spa_bir(){
    $filename = 'spa_bir.doc';
    header("Content-Type: application/force-download");
    header( "Content-Disposition: attachment; filename=".basename($filename));
    header( "Content-Description: File Transfer");
    @readfile($filename);
    
    //15px is 12px

    $content = '<html xmlns:v="urn:schemas-microsoft-com:vml" '
        .'xmlns:o="urn:schemas-microsoft-com:office:office" '
        .'xmlns:w="urn:schemas-microsoft-com:office:word" '
        .'xmlns:m="http://schemas.microsoft.com/office/2004/13.5/omml"= '
        .'xmlns="http://www.w3.org/TR/REC-html40">'
        .'<head><meta http-equiv="Content-Type" content="text/html; charset=Windows-13.552">'
        .'<title></title>'
        .'<!--[if gte mso 9]>'
        .'<xml>'
        .'<w:WordDocument>'
        .'<w:View>Print'
        .'<w:Zoom>100'
        .'<w:DoNotOptimizeForBrowser/>'
        .'</w:WordDocument>'
        .'</xml>'
        .'<![endif]-->'
        .'<style>
        @page
        {
            font-family: Arial;
            text-align: justify;
            size:215.9mm 355.6mm;  /* Legal */
            margin:13.5.2mm 17.5mm 13.5.2mm 16mm; /* Margins: 2.5 cm on each side */
        }
        table.directors{
            border-collapse:collapse;
            border:1px solid white;
            width:100%;
            font-family: Arial;
            font-size: 15px;
        }
        table.directors td{
            border:1px solid white;
            font-family: Arial;
            font-size: 15px;
        }
        p.para {font-family: Arial; font-size: 15px;}
        center {font-family: Arial; font-size: 15px;}
        b {font-family: Arial; font-size: 15px;}
        </style>'
        .'</head>'
        .'<body>'
        .'<p class="para">'
        .'REPUBLIC OF THE PHILIPPINES)<br>'
        .'CITY OF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)S.S.<br>'
        .'<br><br>
        <center><b>SPECIAL POWER OF ATTORNEY</b></center>
        <br><br>
        KNOW ALL MEN BY THESE PRESENTS:<br>
        <br>
        I, <b>[INSERT FULL NAME]</b>, of legal age, with residence and postal address at <b>[INSERT FULL ADDRESS]</b>.<br>
        <br>
        I do hereby appoint <b>MICHAEL C. MULI</b>, likewise of legal age, with postal address at <b>153 RAMON JABSON ST., BAMBANG, PASIG CITY 1600</b>, as my true and legal representative to act for in my behalf and stead and to perform the following acts:<br>
        <br>
        To apply, submit, sign and receive Applications, Documents, BIR forms pertaining to and any transactions with the Bureau of Internal Revenue such as but not limited to request new or transfer of TIN, register as specified and other related matters.<br>
        <br>
        HEREBY APPROVING ALL that he may do by virtue hereof with full right of substitution of his person and revocation of this instrument.<br>
        <br>
        IN WITNESS WHEREOF, WE HAVE HEREUNTO SET OUR HANDS THIS ____ DAY OF _______________ 20__, AT___________________________.<br>
        <br><br><br>
        <table class="directors">
        <tr>
            <td colspan="2" style="border: 1px solid white"></td>
        </tr>
        <tr>
            <td>
            <center>
            <b>[INSERT FULL NAME]</b><br>
            (Name of Principal) 
            </center>
            </td>
            <td>
            <center>
            <b>MICHAEL C. MULI</b><br>
            (Name of Representative) 
            </center>
            </td>
        </tr>
        </table>
        <br><br>
        <center>Signed in the presence of:</center><br>
        <br>
        <center>______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________________</center>
        <br>
        <br><br>
        BEFORE ME, personally appeared<br>
        <br>
        <table class="directors">
        <tr>
            <td colspan="3" style="border: 1px solid white"></td>
        </tr>
        <tr>
            <td style="height: 30px;"><center>Name</center></td>
            <td style="height: 30px;"><center>TIN/ID No.</center></td>
            <td style="height: 30px;"><center>Date/Place Issued</center></td>
        </tr>
        <tr>
            <td>[INSERT FULL NAME]</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>MICHAEL C. MULI</td>
            <td></td>
            <td></td>
        </tr>
        </table>
        <br><br>
        Known to me and to me known to be the same persons who executed the foregoing instrument and acknowledged to me that the same is their free and voluntary act and deed.<br>
        <br>
        WITNESS MY HAND AND SEAL, on the date and place first above written.<br>
        <br><br>
        <b>Notary Public</b><br>
        <br>
        Doc. No.______;<br>
        Page No. ______;<br>
        Book No.______;<br>
        Series of 20___.'
        .'</p>'
        .'</body>' 
        .'</html>'; 
    
    echo $content; 
}

function sec_certificate(){
    $filename = 'sec_certificate.doc';
    header("Content-Type: application/force-download");
    header( "Content-Disposition: attachment; filename=".basename($filename));
    header( "Content-Description: File Transfer");
    @readfile($filename);
    
    //15px is 12px

    $content = '<html xmlns:v="urn:schemas-microsoft-com:vml" '
        .'xmlns:o="urn:schemas-microsoft-com:office:office" '
        .'xmlns:w="urn:schemas-microsoft-com:office:word" '
        .'xmlns:m="http://schemas.microsoft.com/office/2004/13.5/omml"= '
        .'xmlns="http://www.w3.org/TR/REC-html40">'
        .'<head><meta http-equiv="Content-Type" content="text/html; charset=Windows-13.552">'
        .'<title></title>'
        .'<!--[if gte mso 9]>'
        .'<xml>'
        .'<w:WordDocument>'
        .'<w:View>Print'
        .'<w:Zoom>100'
        .'<w:DoNotOptimizeForBrowser/>'
        .'</w:WordDocument>'
        .'</xml>'
        .'<![endif]-->'
        .'<style>
        @page
        {
            font-family: Arial;
            text-align: justify;
            size:215.9mm 355.6mm;  /* Legal */
            margin:13.5.2mm 17.5mm 13.5.2mm 16mm; /* Margins: 2.5 cm on each side */
        }
        table.directors{
            border-collapse:collapse;
            border:1px solid white;
            width:100%;
            font-family: Arial;
            font-size: 15px;
        }
        table.directors td{
            border:1px solid white;
            font-family: Arial;
            font-size: 15px;
        }
        p.para {font-family: Arial; font-size: 15px;}
        p.sec_cert {font-family: Arial; font-size: 15px; text-align: right}
        center {font-family: Arial; font-size: 15px;}
        b {font-family: Arial; font-size: 15px;}
        </style>'
        .'</head>'
        .'<body>'
        .'<p class="para">'
        .'REPUBLIC OF THE PHILIPPINES)<br>'
        .'CITY OF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)S.S.<br>'
        .'<br><br>
        <center><b>SECRETARY\'S CERTIFICATE</b></center>
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I, <b>(INSERT CORPORATE SECRETARY NAME)</b>, of legal age, Filipino citizen, (insert civil status), and with address at (insert home address), after being duly sworn in accordance with law, depose and state that:<br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.&nbsp;&nbsp;I am the duly elected and qualified Corporate Secretary of (INSERT CORPORATE NAME), a corporation duly organized and existing under the laws of the Philippines (the "Corporation"), with principal office at (Insert Business Principal Address).<br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp;&nbsp;At the regular meeting of the Board of Directors of the Corporation held on (Insert Board Meeting Date), the following resolutions were unanimously approved, a legal quorum being present and voting:<br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Resolution, Series of 202X</u><br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"RESOLVED, as it is hereby resolved, that MICHAEL CABANSAG MULI, employee of MDGN Ventures Inc, is duly authorized to transact, execute and sign any and all documents in behalf of the Corporation pertaining to its application for business registration in Securities and Exchange Commission, (City Name) City Hall and Bureau of Internal Revenue."<br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"RESOLVED FINALLY, that this designation shall remain valid until revoked."<br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IN WITNESS WHEREOF, I have hereunto set my hand at _________________, Philippines.<br>
        <br><br><br><br>
        <p class="sec_cert">
        <b>INSERT CORPORATE SECRETARY NAME</b><br>
        Corporate Secretary
        </p>
        <br><br><br>
        &nbsp;&nbsp;&nbsp;BEFORE ME, a Notary Public, for and in _________________, personally appeared (insert corporate secretary name), with (insert TIN number), known to me and to me known to be the same person who executed the foregoing instrument and acknowledged to me that the same is her free act and voluntary deed.<br>
        <br>
        &nbsp;&nbsp;&nbsp;WITNESS MY HAND AND SEAL, this ______________________.<br>
        <br>
        Doc. No. ________;<br>
        Page No. _______;<br>
        Book No. _______;<br>
        Series of 2021.'
        .'</p>'
        .'</body>' 
        .'</html>'; 
    
    echo $content; 
}

function lease_contract(){
    $filename = 'lease_contract_renting.doc';
    header("Content-Type: application/force-download");
    header( "Content-Disposition: attachment; filename=".basename($filename));
    header( "Content-Description: File Transfer");
    @readfile($filename);
    
    //15px is 12px

    $content = '<html xmlns:v="urn:schemas-microsoft-com:vml" '
        .'xmlns:o="urn:schemas-microsoft-com:office:office" '
        .'xmlns:w="urn:schemas-microsoft-com:office:word" '
        .'xmlns:m="http://schemas.microsoft.com/office/2004/13.5/omml"= '
        .'xmlns="http://www.w3.org/TR/REC-html40">'
        .'<head><meta http-equiv="Content-Type" content="text/html; charset=Windows-13.552">'
        .'<title></title>'
        .'<!--[if gte mso 9]>'
        .'<xml>'
        .'<w:WordDocument>'
        .'<w:View>Print'
        .'<w:Zoom>100'
        .'<w:DoNotOptimizeForBrowser/>'
        .'</w:WordDocument>'
        .'</xml>'
        .'<![endif]-->'
        .'<style>
        @page
        {
            font-family: Arial;
            text-align: justify;
            size:215.9mm 355.6mm;  /* Legal */
            margin:13.5.2mm 17.5mm 13.5.2mm 16mm; /* Margins: 2.5 cm on each side */
        }
        table.directors{
            border-collapse:collapse;
            border:1px solid white;
            width:100%;
            font-family: Arial;
            font-size: 15px;
        }
        table.directors td{
            border:1px solid white;
            font-family: Arial;
            font-size: 15px;
        }
        p.para {font-family: Arial; font-size: 15px;}
        p.sec_cert {font-family: Arial; font-size: 15px; text-align: right}
        center {font-family: Arial; font-size: 15px;}
        b {font-family: Arial; font-size: 15px;}
        </style>'
        .'</head>'
        .'<body>'
        .'<p class="para">'
        .'REPUBLIC OF THE PHILIPPINES)<br>'
        .'CITY OF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)S.S.<br>'
        .'<br><br>
        <center><b>LEASE CONTRACT</b></center>
        <br><br>
        <p class="para">
        <b>KNOW ALL MEN BY THESE PRESENTS:</b><br>
        <br>
        This CONTRACT OF LEASE is made and executed at the City of __________________, this day of ___________________, by and between: <br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>[INSERT LESSOR CORPORATE NAME]</b>, a corporation duly organized and existing under and by virtue of the laws of the Republic of the Philippines, represented herein by its [Insert Representative Position in the Corporation], <b>[INSERT REPRESENTATIVE FULL NAME]</b>, herein after referred to as the <b>"LESSOR"</b>.<br>
        </p>
        <br>
        <center><b>-AND-</b></center><br>
        <br>
        <p class="para">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>[INSERT LESSEE FULL NAME]</b>, of legal, [Insert Civil Status], Filipino, hereinafter referred to as the <b>LESSEE</b>.<br>
        </p>
        <br><br>
        <center><b>WITHNESSETH; That</b></center><br>
        <br><br>
        <p class="para">
        <b>WHEREAS</b>, the <b>LESSOR</b> is the owner of THE LEASED PREMISES, a property situated at [Insert Property Address];<br>
        <br>
        <b>WHEREAS</b>, the <b>LESSOR</b> agrees to lease-out portion of the property to the LESSEE and the LESSEE is willing to lease the same;<br>
        <br>
        <b>NOW THEREFORE</b>, for and in consideration of the foregoing premises, the LESSOR leases unto the LESSEE and the LESSEE hereby accepts from the LESSOR the LEASED premises, subject to the following:<br>
        </p>
        <br><br>
        <center><b>TERMS AND CONDITIONS</b></center><br>
        <br>
        <p class="para">
        1. <b>PURPOSES</b>: That premises hereby leased shall be used exclusively by the LESSEE for online commercial business and residential purposes only. It is hereby expressly agreed that if at any time the premises are used for purposes other than what is stated, the LESSOR shall have the right to rescind this contract without prejudice to its other rights under the law.<br>
        <br>
        2. <b>TERM</b>: This term of lease is for [INSERT NUMBER OF YEARS], from [Insert Start Date]  to [Insert End Date], inclusive. Upon its expiration, this lease may be renewed under such terms and conditions as mutually agreed upon by both parties, written notice of intention to renew the lease shall be served to the LESSOR not later than thirty (30) calendar days prior to the expiry date of the period herein agreed upon.<br>
        <br>
        3. <b>RENTAL RATE</b>: The monthly rental rate for the leased premises shall be in [INSERT AMOUNT IN WORDS], (P XX,XXX), Philippine Currency. All rental payments shall be payable to the LESSOR every 15th of the month.<br>
        <br>
        4. <b>PUBLIC UTILITIES</b>: The LESSEE shall pay all the monthly bills which consist of electricity, water, internet, and other public services and utilities during the duration of the lease.<br>
        <br>
        5. <b>FORCE MAJEURE</b>: If while or any part of the leased premises shall be destroyed or damaged by fire, flood, lightning, typhoon, earthquake, storm, civil disturbances or any other unforeseen disabling cause or acts of God, as to render the leased premises during the term substantially unfit for use and occupation of the LESSEE, then this lease contract may be terminated without compensation by the LESSOR or by the LESEE by notice in writing to the other.<br>
        <br>
        6. This <b>CONTRACT OF LEASE</b> shall be valid and binding between the parties, their successors-in-interest and assigns.<br>
        <br><br>
        <b>IN WITNESS WHEREOF</b>, parties herein affixed their signatures on the date and place above written.<br>
        </p>
        <br><br><br>
        <table class="directors">
        <tr>
            <td colspan="2" style="border: 1px solid white"></td>
        </tr>
        <tr>
            <td>
            <center>
            <b>[INSERT LESSOR FULL NAME]</b><br>
            <b>LESSOR</b>
            </center>
            </td>
            <td>
            <center>
            <b>[INSERT LESSEE FULL NAME]</b><br>
            <b>LESSEE</b> 
            </center>
            </td>
        </tr>
        </table>
        <br><br>
        <center>Signed in the presence of:</center><br>
        <br>
        <center>______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________________</center>
        <br>
        <br><br>
        <p class="para">
        BEFORE ME, personally appeared<br>
        </p>
        <br>
        <table class="directors">
        <tr>
            <td colspan="3" style="border: 1px solid white"></td>
        </tr>
        <tr>
            <td style="height: 30px;"><center>Name</center></td>
            <td style="height: 30px;"><center>TIN/ID No.</center></td>
            <td style="height: 30px;"><center>Date/Place Issued</center></td>
        </tr>
        <tr>
            <td>[INSERT LESSEE FULL NAME]</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>[INSERT LESSOR FULL NAME]</td>
            <td></td>
            <td></td>
        </tr>
        </table>
        <br><br>
        <p class="para">
        Known to me and to me known to be the same persons who executed the foregoing instrument and acknowledged to me that the same is their free and voluntary act and deed.<br>
        <br>
        WITNESS MY HAND AND SEAL, on the date and place first above written.<br>
        <br><br>
        <b>Notary Public</b><br>
        <br>
        Doc. No.______;<br>
        Page No. ______;<br>
        Book No.______;<br>
        Series of 20___.
        </p>'        
        .'</p>'
        .'</body>' 
        .'</html>'; 
    
    echo $content; 
}

function lease_contract_residential(){
    $filename = 'lease_contract_residential.doc';
    header("Content-Type: application/force-download");
    header( "Content-Disposition: attachment; filename=".basename($filename));
    header( "Content-Description: File Transfer");
    @readfile($filename);
    
    //15px is 12px

    $content = '<html xmlns:v="urn:schemas-microsoft-com:vml" '
        .'xmlns:o="urn:schemas-microsoft-com:office:office" '
        .'xmlns:w="urn:schemas-microsoft-com:office:word" '
        .'xmlns:m="http://schemas.microsoft.com/office/2004/13.5/omml"= '
        .'xmlns="http://www.w3.org/TR/REC-html40">'
        .'<head><meta http-equiv="Content-Type" content="text/html; charset=Windows-13.552">'
        .'<title></title>'
        .'<!--[if gte mso 9]>'
        .'<xml>'
        .'<w:WordDocument>'
        .'<w:View>Print'
        .'<w:Zoom>100'
        .'<w:DoNotOptimizeForBrowser/>'
        .'</w:WordDocument>'
        .'</xml>'
        .'<![endif]-->'
        .'<style>
        @page
        {
            font-family: Arial;
            text-align: justify;
            size:215.9mm 355.6mm;  /* Legal */
            margin:13.5.2mm 17.5mm 13.5.2mm 16mm; /* Margins: 2.5 cm on each side */
        }
        table.directors{
            border-collapse:collapse;
            border:1px solid white;
            width:100%;
            font-family: Arial;
            font-size: 15px;
        }
        table.directors td{
            border:1px solid white;
            font-family: Arial;
            font-size: 15px;
        }
        p.para {font-family: Arial; font-size: 15px;}
        p.sec_cert {font-family: Arial; font-size: 15px; text-align: right}
        center {font-family: Arial; font-size: 15px;}
        b {font-family: Arial; font-size: 15px;}
        </style>'
        .'</head>'
        .'<body>'
        .'<p class="para">'
        .'REPUBLIC OF THE PHILIPPINES)<br>'
        .'CITY OF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)S.S.<br>'
        .'<br><br>
        <center><b>LEASE CONTRACT</b></center>
        <br><br>
        <p class="para">
        <b>KNOW ALL MEN BY THESE PRESENTS:</b><br>
        <br>
        This CONTRACT OF LEASE is made and executed at the City of __________________, this day of ___________________, by and between: <br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>[INSERT LESSOR FULL NAME]</b>, of legal age, [Insert Civil Status],  Filipino, and with residence and postal at [Insert Lessor Full Address], hereinafter referred to as the <b>LESSOR.</b>.<br>
        </p>
        <br>
        <center><b>-AND-</b></center><br>
        <br>
        <p class="para">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>[INSERT LESSEE FULL NAME]</b>, of legal, [Insert Civil Status], Filipino, hereinafter referred to as the <b>LESSEE</b>.<br>
        </p>
        <br><br>
        <center><b>WITHNESSETH; That</b></center><br>
        <br><br>
        <p class="para">
        <b>WHEREAS</b>, the <b>LESSOR</b> is the owner of THE LEASED PREMISES, a property situated at [Insert Property Address];<br>
        <br>
        <b>WHEREAS</b>, the <b>LESSOR</b> agrees to lease-out portion of the property to the LESSEE and the LESSEE is willing to lease the same;<br>
        <br>
        <b>NOW THEREFORE</b>, for and in consideration of the foregoing premises, the LESSOR leases unto the LESSEE and the LESSEE hereby accepts from the LESSOR the LEASED premises, subject to the following:<br>
        </p>
        <br><br>
        <center><b>TERMS AND CONDITIONS</b></center><br>
        <br>
        <p class="para">
        1. <b>PURPOSES</b>: That premises hereby leased shall be used exclusively by the LESSEE for online commercial business and residential purposes only. It is hereby expressly agreed that if at any time the premises are used for purposes other than what is stated, the LESSOR shall have the right to rescind this contract without prejudice to its other rights under the law.<br>
        <br>
        2. <b>TERM</b>: This term of lease is for [INSERT NUMBER OF YEARS], from [Insert Start Date]  to [Insert End Date], inclusive. Upon its expiration, this lease may be renewed under such terms and conditions as mutually agreed upon by both parties, written notice of intention to renew the lease shall be served to the LESSOR not later than thirty (30) calendar days prior to the expiry date of the period herein agreed upon.<br>
        <br>
        3. <b>RENTAL RATE</b>: The monthly rental rate for the leased premises shall be in [INSERT AMOUNT IN WORDS], (P XX,XXX), Philippine Currency. All rental payments shall be payable to the LESSOR every 15th of the month.<br>
        <br>
        4. <b>PUBLIC UTILITIES</b>: The LESSEE shall pay all the monthly bills which consist of electricity, water, internet, and other public services and utilities during the duration of the lease.<br>
        <br>
        5. <b>FORCE MAJEURE</b>: If while or any part of the leased premises shall be destroyed or damaged by fire, flood, lightning, typhoon, earthquake, storm, civil disturbances or any other unforeseen disabling cause or acts of God, as to render the leased premises during the term substantially unfit for use and occupation of the LESSEE, then this lease contract may be terminated without compensation by the LESSOR or by the LESEE by notice in writing to the other.<br>
        <br>
        6. This <b>CONTRACT OF LEASE</b> shall be valid and binding between the parties, their successors-in-interest and assigns.<br>
        <br><br>
        <b>IN WITNESS WHEREOF</b>, parties herein affixed their signatures on the date and place above written.<br>
        </p>
        <br><br><br>
        <table class="directors">
        <tr>
            <td colspan="2" style="border: 1px solid white"></td>
        </tr>
        <tr>
            <td>
            <center>
            <b>[INSERT LESSOR FULL NAME]</b><br>
            <b>LESSOR</b>
            </center>
            </td>
            <td>
            <center>
            <b>[INSERT LESSEE FULL NAME]</b><br>
            <b>LESSEE</b> 
            </center>
            </td>
        </tr>
        </table>
        <br><br>
        <center>Signed in the presence of:</center><br>
        <br>
        <center>______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________________</center>
        <br>
        <br><br>
        <p class="para">
        BEFORE ME, personally appeared<br>
        </p>
        <br>
        <table class="directors">
        <tr>
            <td colspan="3" style="border: 1px solid white"></td>
        </tr>
        <tr>
            <td style="height: 30px;"><center>Name</center></td>
            <td style="height: 30px;"><center>TIN/ID No.</center></td>
            <td style="height: 30px;"><center>Date/Place Issued</center></td>
        </tr>
        <tr>
            <td>[INSERT LESSEE FULL NAME]</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>[INSERT LESSOR FULL NAME]</td>
            <td></td>
            <td></td>
        </tr>
        </table>
        <br><br>
        <p class="para">
        Known to me and to me known to be the same persons who executed the foregoing instrument and acknowledged to me that the same is their free and voluntary act and deed.<br>
        <br>
        WITNESS MY HAND AND SEAL, on the date and place first above written.<br>
        <br><br>
        <b>Notary Public</b><br>
        <br>
        Doc. No.______;<br>
        Page No. ______;<br>
        Book No.______;<br>
        Series of 20___.
        </p>'        
        .'</p>'
        .'</body>' 
        .'</html>'; 
    
    echo $content; 
}
?> 