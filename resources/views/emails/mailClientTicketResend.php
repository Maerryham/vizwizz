<!DOCTYPE html>
<html>
<head>
    <title></title>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/v4-shims.css">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel="stylesheet">


    <style type="text/css">
        /* CLIENT-SPECIFIC STYLES */
        body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
        table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
        img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

        /* RESET STYLES */
        img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
        table{border-collapse: collapse !important;}
        body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width: 525px) {

            /* ALLOWS FOR FLUID TABLES */
            .wrapper {
                width: 100% !important;
                max-width: 100% !important;
            }

            /* ADJUSTS LAYOUT OF LOGO IMAGE */
            .logo img {
                margin: 0 auto !important;
            }

            /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
            .mobile-hide {
                display: none !important;
            }

            .img-max {
                max-width: 100% !important;
                width: 100% !important;
                height: auto !important;
            }

            /* FULL-WIDTH TABLES */
            .responsive-table {
                width: 100% !important;
            }

            /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
            .padding {
                padding: 10px 5% 15px 5% !important;
            }

            .padding-meta {
                padding: 30px 5% 0px 5% !important;
                text-align: center;
            }

            .padding-copy {
                padding: 10px 5% 10px 5% !important;
                text-align: center;
            }

            .no-padding {
                padding: 0 !important;
            }

            .section-padding {
                padding: 50px 15px 50px 15px !important;
            }

            /* ADJUST BUTTONS ON MOBILE */
            .mobile-button-container {
                margin: 0 auto;
                width: 100% !important;
            }

            .mobile-button {
                padding: 15px !important;
                border: 0 !important;
                font-size: 16px !important;
                display: block !important;
            }

        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] { margin: 0 !important; }
    </style>
</head>
<body style="margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->
<!--<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">-->
<!--    Entice the open with some amazing preheader text. Use a little mystery and get those subscribers to read through...-->
<!--</div>-->

<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#ffffff" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                <tr>
                    <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                <tr>
                    <td align="center" valign="top" style="padding: 15px 0;" class="logo">
                        <a href="http://enjoylagos.com.ng" target="_blank">
                            <img alt="EnjoyLagos Logo" src="https://uploads-ssl.webflow.com/56901e9c60473ef56671cb1a/590f22a9b4700605d36bd5f1_ENJLAGLOG-p-500.png" width="100" height="auto" style="display: inline; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                        </a>
                        <a href="http://aquapoolclub.com" target="_blank">
                            <img alt="Aquapoolclub Logo" src="http://aquapoolclub.com/img/logo_black2.png" width="100" height="auto" style="display: inline; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>

    <tr>
        <td bgcolor="#D8F1FF" align="center" style="padding: 70px 15px 70px 15px;" class="section-padding">

            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td>
                        <!-- HERO IMAGE -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td  align="center" style="font-size: 16px; padding: 10px; font-weight: 500; line-height: 18px; font-family: Calibri, sans-serif; color:#666666; text-transform: capitalize" >
                                    For: <?= $request['name'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="padding" align="center">
                                    <a href="http://enjoylagosmarket.aquapoolclub.com" target="_blank"><img src="http://enjoylagosmarket.aquapoolclub.com/img/enjoylagosmarketlogo.jpg" width="500" height="400" border="0" alt="Enjoy Lagos Flier" style="display: block; padding: 0; color: #666666; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px;" class="img-max"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- COPY -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="font-size: 25px; font-family: Quicksand, Calibri, sans-serif; color: #333333; padding-top: 30px; text-transform: uppercase; text-align: center;" class="padding">RE: INVITATION TO <span style="color: #5caad2; text-transform: uppercase">ENJOYLAGOS MARKET</span></td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Calibri, sans-serif; color: #666666;" class="padding">We realized some invitees does not get their invite mails and we are sorry about this.</td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Calibri, sans-serif; color: #666666;" class="padding">Kindly take this as your invitation to ENJOYLAGOS MARKET which will take place at</td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Calibri, sans-serif; color: #666666;" class="padding">Venue: Aqua Event Hall, 5b Water Corporation Drive, Oniru Estate, VI Extension, Lagos </td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Calibri, sans-serif; color: #666666;" class="padding">On 27th, April at 7:00pm till midnight</td>
                                        </tr>
                                        <!--                                        <tr>-->
                                        <!--                                            <td align="center" style="padding: 20px 0 0 0; font-size: 20px; line-height: 25px; font-family: Calibri, sans-serif; color: #666666;" class="padding">YOUR TICKET ID: <span style="font-weight:600;">--><?//= $ref ?><!--</span>.</td>-->
                                        <!--                                        </tr>-->


                                        <tr>
                                            <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Calibri, sans-serif; color: #666666;" class="padding"><i>Please show this invite mail to the security at the venue.</i></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <!-- BULLETPROOF BUTTON -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="padding-top: 35px;" class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                    <tr>
                                                        <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Calibri, sans-serif; line-height: 24px; color: #666666;" class="padding">Hope to see you there!</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding"><b>EnjoyLagos with Aquapoolclub Team</b></td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 20px 0px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                <tr>
                    <td align="center" valign="top" width="500">
            <![endif]-->
            <!-- UNSUBSCRIBE COPY -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                        5b Water Corporation Drive,
                        Oniru Estate, VI Extension, Lagos
                        <br>


                        <a href="https://www.instagram.com/aquapoolclublagos" style="display: block; padding: 5px; padding-top: 20px; border-style: none !important; border: 0 !important;" target="_blank">
                            <!--<i class="fa fa-2x fa-instagram img-circle" style="padding: 5px; color: #cfcfcf"></i> -->
                            <img alt="instagram" src="http://aquapoolclub.com/img/instagram.png" width="20" height="20" border="0">
                        </a>


                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#000000;">


                        If you are viewing this mail in your spam mail, kindly remove the spam label on this email in other to get further messages right in your inbox.
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>

</body>
</html>
