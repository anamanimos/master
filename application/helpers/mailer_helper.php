<?php

function mail_send($email, $subject, $body)
{
    $ci = get_instance();
    $ci->load->library('phpmailer');

    // PHP Mailer Object
    $mail = $ci->phpmailer->load();

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host     = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'damaijaya.texprint@gmail.com';
    $mail->Password = 'gwxlfbglxaecagge';
    $mail->SMTPSecure = 'tls';
    $mail->Port     = 587;

    $mail->setFrom('damaijaya.texprint@gmail.com', 'Damai Jaya');
    $mail->addReplyTo('damaijaya.texprint@gmail.com', 'Damai Jaya');

    // Add a recipient
    $mail->addAddress($email);

    // Add cc or bcc 
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Email subject
    $mail->Subject = $subject;

    // Set email format to HTML
    $mail->isHTML(true);

    // Email body content
    $mailContent = $body;
    $mail->Body = $mailContent;

    // Send email
    if (!$mail->send()) {
        $return = [
            'status' => 403,
            'success' => false,
            'detail' => 'Mailer Error: ' . $mail->ErrorInfo,

        ];
        return $return;
    } else {
        $return = [
            'status' => 200,
            'success' => true,
            'detail' => 'Message has been sent.',

        ];
    }
    return $return;
}

function mail_send_register($email, $name)
{




    $template = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    
    <head>
        <!--[if gte mso 9]>
    <xml>
      <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="x-apple-disable-message-reformatting">
        <!--[if !mso]><!-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
        <title></title>
    
        <style type="text/css">
            @media only screen and (min-width: 520px) {
                .u-row {
                    width: 500px !important;
                }
    
                .u-row .u-col {
                    vertical-align: top;
                }
    
                .u-row .u-col-100 {
                    width: 500px !important;
                }
    
            }
    
            @media (max-width: 520px) {
                .u-row-container {
                    max-width: 100% !important;
                    padding-left: 0px !important;
                    padding-right: 0px !important;
                }
    
                .u-row .u-col {
                    min-width: 320px !important;
                    max-width: 100% !important;
                    display: block !important;
                }
    
                .u-row {
                    width: 100% !important;
                }
    
                .u-col {
                    width: 100% !important;
                }
    
                .u-col>div {
                    margin: 0 auto;
                }
            }
    
            body {
                margin: 0;
                padding: 0;
            }
    
            table,
            tr,
            td {
                vertical-align: top;
                border-collapse: collapse;
            }
    
            p {
                margin: 0;
            }
    
            .ie-container table,
            .mso-container table {
                table-layout: fixed;
            }
    
            * {
                line-height: inherit;
            }
    
            a[x-apple-data-detectors="true"] {
                color: inherit !important;
                text-decoration: none !important;
            }
    
            table,
            td {
                color: #000000;
            }
    
            #u_body a {
                color: #0000ee;
                text-decoration: underline;
            }
        </style>
    
    
    
        <!--[if !mso]><!-->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->
    
    </head>
    
    <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #d9deea;color: #000000">
        <!--[if IE]><div class="ie-container"><![endif]-->
        <!--[if mso]><div class="mso-container"><![endif]-->
        <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #d9deea;width:100%" cellpadding="0" cellspacing="0">
            <tbody>
                <tr style="vertical-align: top">
                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #d9deea;"><![endif]-->
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="height: 100%;width: 100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;padding-bottom:30px;" align="center">
                                                                            <a href="http://app.damaijaya.test/" target="_blank">
                                                                                <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/logo-2.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 60%;max-width: 288px;" width="288" />
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="484" style="background-color: #ffffff;width: 484px;padding: 0px;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
    
                                                                            <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/oc-hi-five.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 50%;max-width: 240px;" width="240" />
    
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <h1 style="margin: 0px; line-height: 140%; text-align: center; word-wrap: break-word; font-family: "Lato",sans-serif; font-size: 12px; font-weight: 700;">
                                                                    <h1 style="text-align: center; white-space: normal; background-color: #ffffff; line-height: 1.2; color: #1e2022;"><strong>Registrasi Berhasil!</strong></h1>
                                                                </h1>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <p style="line-height: 140%;"><span style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff; float: none; display: inline; line-height: 19.6px;">Halo ' . $name . ', kamu berhasil membuat akun di </span><strong style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff;">Damai Jaya - Super App</strong></p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 50px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <p style="line-height: 140%;"><span style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff; float: none; display: inline; line-height: 19.6px;">Lakukan aktivasi akun untuk dapat menggunakan fitur aplikasi.</p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;padding-top:20px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <p style="line-height: 140%;"><span style="color: #34495e; line-height: 19.6px;"><strong>CRAFTED WITH ❤️ BY </strong></span></p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 50px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
    
                                                                            <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/artspace-logo.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 165px;" width="165" />
    
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    </td>
                </tr>
            </tbody>
        </table>
        <!--[if mso]></div><![endif]-->
        <!--[if IE]></div><![endif]-->
    </body>
    
    </html>';

    return mail_send($email, 'Registrasi Berhasil - Damai Jaya Super App', $template);
}

function mail_send_activate($email, $name, $code)
{




    $template = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    
    <head>
        <!--[if gte mso 9]>
    <xml>
      <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="x-apple-disable-message-reformatting">
        <!--[if !mso]><!-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
        <title></title>
    
        <style type="text/css">
            @media only screen and (min-width: 520px) {
                .u-row {
                    width: 500px !important;
                }
    
                .u-row .u-col {
                    vertical-align: top;
                }
    
                .u-row .u-col-100 {
                    width: 500px !important;
                }
    
            }
    
            @media (max-width: 520px) {
                .u-row-container {
                    max-width: 100% !important;
                    padding-left: 0px !important;
                    padding-right: 0px !important;
                }
    
                .u-row .u-col {
                    min-width: 320px !important;
                    max-width: 100% !important;
                    display: block !important;
                }
    
                .u-row {
                    width: 100% !important;
                }
    
                .u-col {
                    width: 100% !important;
                }
    
                .u-col>div {
                    margin: 0 auto;
                }
            }
    
            body {
                margin: 0;
                padding: 0;
            }
    
            table,
            tr,
            td {
                vertical-align: top;
                border-collapse: collapse;
            }
    
            p {
                margin: 0;
            }
    
            .ie-container table,
            .mso-container table {
                table-layout: fixed;
            }
    
            * {
                line-height: inherit;
            }
    
            a[x-apple-data-detectors="true"] {
                color: inherit !important;
                text-decoration: none !important;
            }
    
            table,
            td {
                color: #000000;
            }
    
            #u_body a {
                color: #0000ee;
                text-decoration: underline;
            }
        </style>
    
    
    
        <!--[if !mso]><!-->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->
    
    </head>
    
    <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #d9deea;color: #000000">
        <!--[if IE]><div class="ie-container"><![endif]-->
        <!--[if mso]><div class="mso-container"><![endif]-->
        <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #d9deea;width:100%" cellpadding="0" cellspacing="0">
            <tbody>
                <tr style="vertical-align: top">
                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #d9deea;"><![endif]-->
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="height: 100%;width: 100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;padding-bottom:30px;" align="center">
                                                                            <a href="http://app.damaijaya.test/" target="_blank">
                                                                                <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/logo-2.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 60%;max-width: 288px;" width="288" />
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="484" style="background-color: #ffffff;width: 484px;padding: 0px;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
    
                                                                            <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/oc-email-verification.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 50%;max-width: 240px;" width="240" />
    
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <h1 style="margin: 0px; line-height: 140%; text-align: center; word-wrap: break-word; font-family: "Lato",sans-serif; font-size: 12px; font-weight: 700;">
                                                                    <h1 style="text-align: center; white-space: normal; background-color: #ffffff; line-height: 1.2; color: #1e2022;"><strong>Kode Aktivasi</strong></h1>
                                                                </h1>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <p style="line-height: 140%;"><span style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff; float: none; display: inline; line-height: 19.6px;">Halo ' . $name . ', berikut ini adalah kode Aktivasi </span><strong style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff;">Damai Jaya - Super App</strong><span style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff; float: none; display: inline; line-height: 19.6px;"> Anda:</span></p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 42px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <p style="line-height: 140%;"><strong><span style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff; float: none; display: inline; line-height: 58.8px;">' . $code . '</span></strong></p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 50px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <p style="line-height: 140%;"><span style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff; float: none; display: inline; line-height: 19.6px;">Jangan tunjukkan kode ini kepada siapapun termasuk admin dari </span><strong style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff;">Damai Jaya - Super App</strong></p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;padding-top:20px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <p style="line-height: 140%;"><span style="color: #34495e; line-height: 19.6px;"><strong>CRAFTED WITH ❤️ BY </strong></span></p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 50px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
    
                                                                            <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/artspace-logo.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 165px;" width="165" />
    
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    </td>
                </tr>
            </tbody>
        </table>
        <!--[if mso]></div><![endif]-->
        <!--[if IE]></div><![endif]-->
    </body>
    
    </html>';

    return mail_send($email, 'Kode Aktivasi - Damai Jaya Super App', $template);
}

function mail_send_activate_success($email, $name)
{




    $template = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    
    <head>
        <!--[if gte mso 9]>
    <xml>
      <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="x-apple-disable-message-reformatting">
        <!--[if !mso]><!-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
        <title></title>
    
        <style type="text/css">
            @media only screen and (min-width: 520px) {
                .u-row {
                    width: 500px !important;
                }
    
                .u-row .u-col {
                    vertical-align: top;
                }
    
                .u-row .u-col-100 {
                    width: 500px !important;
                }
    
            }
    
            @media (max-width: 520px) {
                .u-row-container {
                    max-width: 100% !important;
                    padding-left: 0px !important;
                    padding-right: 0px !important;
                }
    
                .u-row .u-col {
                    min-width: 320px !important;
                    max-width: 100% !important;
                    display: block !important;
                }
    
                .u-row {
                    width: 100% !important;
                }
    
                .u-col {
                    width: 100% !important;
                }
    
                .u-col>div {
                    margin: 0 auto;
                }
            }
    
            body {
                margin: 0;
                padding: 0;
            }
    
            table,
            tr,
            td {
                vertical-align: top;
                border-collapse: collapse;
            }
    
            p {
                margin: 0;
            }
    
            .ie-container table,
            .mso-container table {
                table-layout: fixed;
            }
    
            * {
                line-height: inherit;
            }
    
            a[x-apple-data-detectors="true"] {
                color: inherit !important;
                text-decoration: none !important;
            }
    
            table,
            td {
                color: #000000;
            }
    
            #u_body a {
                color: #0000ee;
                text-decoration: underline;
            }
        </style>
    
    
    
        <!--[if !mso]><!-->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->
    
    </head>
    
    <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #d9deea;color: #000000">
        <!--[if IE]><div class="ie-container"><![endif]-->
        <!--[if mso]><div class="mso-container"><![endif]-->
        <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #d9deea;width:100%" cellpadding="0" cellspacing="0">
            <tbody>
                <tr style="vertical-align: top">
                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #d9deea;"><![endif]-->
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="height: 100%;width: 100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;padding-bottom:30px;" align="center">
                                                                            <a href="http://app.damaijaya.test/" target="_blank">
                                                                                <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/logo-2.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 60%;max-width: 288px;" width="288" />
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="484" style="background-color: #ffffff;width: 484px;padding: 0px;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
    
                                                                            <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/oc-hi-five.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 50%;max-width: 240px;" width="240" />
    
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <h1 style="margin: 0px; line-height: 140%; text-align: center; word-wrap: break-word; font-family: "Lato",sans-serif; font-size: 12px; font-weight: 700;">
                                                                    <h1 style="text-align: center; white-space: normal; background-color: #ffffff; line-height: 1.2; color: #1e2022;"><strong>Selamat! Akunmu sudah aktif.</strong></h1>
                                                                </h1>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <p style="line-height: 140%;"><span style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff; float: none; display: inline; line-height: 19.6px;">Halo ' . $name . ', akunmu sudah sepenuhnya aktif. Sekarang Kamu bisa sepenuhnya menggunakan </span><strong style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff;">Damai Jaya - Super App</strong></p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;padding-top:20px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <p style="line-height: 140%;"><span style="color: #34495e; line-height: 19.6px;"><strong>CRAFTED WITH ❤️ BY </strong></span></p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 50px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
    
                                                                            <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/artspace-logo.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 165px;" width="165" />
    
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    </td>
                </tr>
            </tbody>
        </table>
        <!--[if mso]></div><![endif]-->
        <!--[if IE]></div><![endif]-->
    </body>
    
    </html>';

    return mail_send($email, 'Aktivasi Sukses - Damai Jaya Super App', $template);
}

function mail_send_forgot_password($email, $name, $link)
{




    $template = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    
    <head>
        <!--[if gte mso 9]>
        <xml>
          <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="x-apple-disable-message-reformatting">
        <!--[if !mso]><!-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
        <title></title>
    
        <style type="text/css">
            @media only screen and (min-width: 520px) {
                .u-row {
                    width: 500px !important;
                }
    
                .u-row .u-col {
                    vertical-align: top;
                }
    
                .u-row .u-col-100 {
                    width: 500px !important;
                }
    
            }
    
            @media (max-width: 520px) {
                .u-row-container {
                    max-width: 100% !important;
                    padding-left: 0px !important;
                    padding-right: 0px !important;
                }
    
                .u-row .u-col {
                    min-width: 320px !important;
                    max-width: 100% !important;
                    display: block !important;
                }
    
                .u-row {
                    width: 100% !important;
                }
    
                .u-col {
                    width: 100% !important;
                }
    
                .u-col>div {
                    margin: 0 auto;
                }
            }
    
            body {
                margin: 0;
                padding: 0;
            }
    
            table,
            tr,
            td {
                vertical-align: top;
                border-collapse: collapse;
            }
    
            p {
                margin: 0;
            }
    
            .ie-container table,
            .mso-container table {
                table-layout: fixed;
            }
    
            * {
                line-height: inherit;
            }
    
            a[x-apple-data-detectors="true"] {
                color: inherit !important;
                text-decoration: none !important;
            }
    
            table,
            td {
                color: #000000;
            }
    
            #u_body a {
                color: #0000ee;
                text-decoration: underline;
            }
        </style>
    
    
    
        <!--[if !mso]><!-->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->
    
    </head>
    
    <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #d9deea;color: #000000">
        <!--[if IE]><div class="ie-container"><![endif]-->
        <!--[if mso]><div class="mso-container"><![endif]-->
        <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #d9deea;width:100%" cellpadding="0" cellspacing="0">
            <tbody>
                <tr style="vertical-align: top">
                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #d9deea;"><![endif]-->
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="height: 100%;width: 100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;padding-bottom:30px;" align="center">
                                                                            <a href="http://app.damaijaya.test/" target="_blank">
                                                                                <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/logo-2.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 60%;max-width: 288px;" width="288" />
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="484" style="background-color: #ffffff;width: 484px;padding: 0px;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
    
                                                                            <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/oc-unlock.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 50%;max-width: 240px;" width="240" />
    
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <h1 style="margin: 0px; line-height: 140%; text-align: center; word-wrap: break-word; font-family: " Lato",sans-serif; font-size: 12px; font-weight: 700;">
                                                                    <h1 style="text-align: center; white-space: normal; background-color: #ffffff; line-height: 1.2; color: #1e2022;"><strong>Ganti Kata sandi</strong></h1>
                                                                </h1>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <p style="line-height: 140%;"><span style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff; float: none; display: inline; line-height: 19.6px;">Halo ' . $name . ', Kami menerima permintaan atur ulang kata sandi untuk akun Anda. Silahkan klik tombol dibawah ini untuk mengatur kata sandi.</span></p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div align="center">
                                                                    <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:37px; v-text-anchor:middle; width:154px;" arcsize="11%"  stroke="f" fillcolor="#377dff"><w:anchorlock/><center style="color:#FFFFFF;"><![endif]-->
                                                                    <a href="' . $link . '" target="_blank" class="v-button" style="box-sizing: border-box;display: inline-block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #377dff; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;font-size: 14px;">
                                                                        <span style="display:block;padding:10px 20px;line-height:120%;"><strong><span style="line-height: 16.8px;">Reset Kata Sandi</span></strong></span>
                                                                    </a>
                                                                    <!--[if mso]></center></v:roundrect><![endif]-->
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 50px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <p style="line-height: 140%;"><span style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff; float: none; display: inline; line-height: 19.6px;">Laporkan kepada kami melalui email <strong>cranam21@gmail.com</strong> bila Anda tidak merasa melakukan tindakan ini.</p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;padding-top:20px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <p style="line-height: 140%;"><span style="color: #34495e; line-height: 19.6px;"><strong>CRAFTED WITH ❤️ BY </strong></span></p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 50px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
    
                                                                            <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/artspace-logo.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 165px;" width="165" />
    
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    </td>
                </tr>
            </tbody>
        </table>
        <!--[if mso]></div><![endif]-->
        <!--[if IE]></div><![endif]-->
    </body>
    
    </html>';

    return mail_send($email, 'Reset Kata Sandi - Damai Jaya Super App', $template);
}

function mail_send_changepassword_success($email, $name)
{




    $template = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    
    <head>
        <!--[if gte mso 9]>
        <xml>
          <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="x-apple-disable-message-reformatting">
        <!--[if !mso]><!-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
        <title></title>
    
        <style type="text/css">
            @media only screen and (min-width: 520px) {
                .u-row {
                    width: 500px !important;
                }
    
                .u-row .u-col {
                    vertical-align: top;
                }
    
                .u-row .u-col-100 {
                    width: 500px !important;
                }
    
            }
    
            @media (max-width: 520px) {
                .u-row-container {
                    max-width: 100% !important;
                    padding-left: 0px !important;
                    padding-right: 0px !important;
                }
    
                .u-row .u-col {
                    min-width: 320px !important;
                    max-width: 100% !important;
                    display: block !important;
                }
    
                .u-row {
                    width: 100% !important;
                }
    
                .u-col {
                    width: 100% !important;
                }
    
                .u-col>div {
                    margin: 0 auto;
                }
            }
    
            body {
                margin: 0;
                padding: 0;
            }
    
            table,
            tr,
            td {
                vertical-align: top;
                border-collapse: collapse;
            }
    
            p {
                margin: 0;
            }
    
            .ie-container table,
            .mso-container table {
                table-layout: fixed;
            }
    
            * {
                line-height: inherit;
            }
    
            a[x-apple-data-detectors="true"] {
                color: inherit !important;
                text-decoration: none !important;
            }
    
            table,
            td {
                color: #000000;
            }
    
            #u_body a {
                color: #0000ee;
                text-decoration: underline;
            }
        </style>
    
    
    
        <!--[if !mso]><!-->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->
    
    </head>
    
    <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #d9deea;color: #000000">
        <!--[if IE]><div class="ie-container"><![endif]-->
        <!--[if mso]><div class="mso-container"><![endif]-->
        <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #d9deea;width:100%" cellpadding="0" cellspacing="0">
            <tbody>
                <tr style="vertical-align: top">
                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #d9deea;"><![endif]-->
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="height: 100%;width: 100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;padding-bottom:30px;" align="center">
                                                                            <a href="http://app.damaijaya.test/" target="_blank">
                                                                                <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/logo-2.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 60%;max-width: 288px;" width="288" />
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="484" style="background-color: #ffffff;width: 484px;padding: 0px;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
    
                                                                            <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/oc-unlock.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 50%;max-width: 240px;" width="240" />
    
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <h1 style="margin: 0px; line-height: 140%; text-align: center; word-wrap: break-word; font-family: " Lato",sans-serif; font-size: 12px; font-weight: 700;">
                                                                    <h1 style="text-align: center; white-space: normal; background-color: #ffffff; line-height: 1.2; color: #1e2022;"><strong>Kata sandi diubah</strong></h1>
                                                                </h1>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;margin-bottom:30px">
                                                                    <p style="line-height: 140%;"><span style="color: #677788; text-align: center; white-space: normal; background-color: #ffffff; float: none; display: inline; line-height: 19.6px;">Halo ' . $name . ', Kata sandi akunmu berhasil diubah. Bila kamu tidak mengenali aktivitas ini laporkan pada <strong>cranam21@gmail.com</strong> untuk penanganan lebih lanjut.</p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
    
    
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
    
                                    <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                        <div style="height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style="box-sizing: border-box; height: 100%; padding: 0px;padding-top:20px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <p style="line-height: 140%;"><span style="color: #34495e; line-height: 19.6px;"><strong>CRAFTED WITH ❤️ BY </strong></span></p>
                                                                </div>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 50px;font-family:arial,helvetica,sans-serif;" align="left">
    
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
    
                                                                            <img align="center" border="0" src="https://damaijaya.my.id/wp-content/uploads/2023/08/artspace-logo.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 165px;" width="165" />
    
                                                                        </td>
                                                                    </tr>
                                                                </table>
    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
    
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td><![endif]-->
                                    <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
    
    
    
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    </td>
                </tr>
            </tbody>
        </table>
        <!--[if mso]></div><![endif]-->
        <!--[if IE]></div><![endif]-->
    </body>
    
    </html>';

    return mail_send($email, 'Kata Sandi diubah - Damai Jaya Super App', $template);
}
