<?php
/*
 *	File for email form 
 * 
 */
?>
<?php 
add_action( 'wp_ajax_ajax_order', 'ajax_mail_function' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_ajax_order', 'ajax_mail_function' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
function ajax_mail_function(){
    //Variables
        $headers = "Content-type: text/html; charset=utf-8\r\n";
        $sitename = get_bloginfo('name');
        $form = get_field('form','options');
        $admin_email = $form['form_email'] ;
        $subject = "Новое сообщение с сайта ". $sitename;
        $user_name = htmlspecialchars(trim($_POST['name']));
        $user_phone = htmlspecialchars(trim($_POST['phone']));
        $user_email = htmlspecialchars(trim($_POST['email']));
        $user_message = htmlspecialchars(trim($_POST['message']));
        $spam_first = (trim($_POST['spamFirst']));
        $spam_second = (trim($_POST['spamSecond']));
if( (isset( $spam_first ) && !empty( $spam_first )) || (isset( $spam_second ) && !empty( $spam_second) )){
    exit;
}    
    //    $id = trim($_POST['page']);
        $message = '<html>
<head>
     <meta charset="UTF-8">
     <title>Форма обратной связи</title>
</head>
<body>
    <body style="width:94%; height:auto;">
    <table style="width:100%; max-width:600px;height:auto;vertical-align: middle;border-color:#000;border:0px;border-style:solid;border-spacing:unset;padding:0;" summary="форма заявки" rules="none" frame="border" cellpadding="0" cellspacing="0">
        <caption align="justify" style="height: 45px;">
            <h2 style="margin: 5px;font-size: 1.5rem;">Сообщение</h2>
        </caption>
        <thead align="justify" style="background-color:#ddd;border-color:#000;border:1px;border-style:solid;">
            <tr style="height: 30px;">
                <td align="center" style="width:100%;" colspan="4">
                    <h3 style="margin:5px;font-size: 1.1rem;">' . $subject . '</h3>
                </td>
            </tr>
        </thead>
        <tbody style="font-size: 1rem;">';
if(isset($user_name)&&!empty($user_name)) {       
  $message .= '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td style="border-right: 1px solid #ccc;padding-left:25px;">Имя отправителя:</td>
                <td style="border-left: 1px solid #ccc;padding-left:25px;">'. $user_name .'</td>
            </tr>';
}
if(isset($user_phone)&&!empty($user_phone)) {     
   $message .=   '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td style="border-right: 1px solid #ccc;padding-left:25px;">
                    Номер телефона:
                </td>
                <td style="border-left: 1px solid #ccc;padding-left:25px;">
                    '. $user_phone .'
                </td>
            </tr>';
}
if(isset($user_email)&&!empty($user_email)) {
    $message .= '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td style="border-right: 1px solid #ccc;padding-left:25px;">
                    Email:
                </td>
                <td style="border-left: 1px solid #ccc;padding-left:25px;">
                    '. $user_email .'
                </td>
            </tr>';
}
if(isset($user_message)&&!empty($user_message)) {
    $message .= '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td colspan="4" align="center">
                    Сообщение:
                </td>
            </tr>
            <tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td colspan="4" align="center">
                    '. $user_message .'
                </td>
            </tr>';
}
    $message .= '<tr style="height:90px;width:auto;">
               <td colspan="4" align="center">
                        <a href="'. get_bloginfo("url") . '/wp-admin" style="background-color:#1eb4e9;border:none; width: 70%;padding: 16px 15px;-webkit-border-radius: 49px;border-radius: 49px;margin:16px 0;color:#fff;font-size: 1rem;text-decoration:none;font-weight:600;">АДМИНИСТРИРОВАТЬ</a>
               </td>
            </tr>';
    $option = $form['option_ck'];
    if( $option && in_array('true', $option) ){   
        function create_file($user_name, $user_message, $user_phone,$user_email){
            $today = date("F j, Y, g:i a");
            $file = /*ABSPATH*/ WP_CONTENT_DIR . '/themes/ship/mail.csv';
            $bom = "\xEF\xBB\xBF";
                $tofile = $today;
                $tofile .= ';';
                if( !empty($user_name) ){
                    $tofile .= json_encode($user_name);
                    $tofile .= ';';
                }
                if( !empty($user_phone) ){
                    $tofile .= json_encode($user_phone);
                    $tofile .= ';';
                }
                if( !empty($user_email) ){
                    $tofile .= json_encode($user_email);
                    $tofile .= ';';
                }
                if( !empty($user_message) ){
                    $tofile .= json_encode($user_message);
                    $tofile .= ';';
                }
            @file_put_contents($file, $bom . $tofile, LOCK_EX);  
            /*$attachment = array( $file );*/
            return false;
        }    
    create_file($user_name, $user_message, $user_phone,$user_email);
	$attachment[] = WP_CONTENT_DIR . '/themes/ship/mail.csv';
    wp_mail($admin_email,$subject,$message,$headers,$attachment); 
    }
    else{
        mail($admin_email,$subject,$message,$headers);
    }

die();    
}
add_action( 'wp_ajax_ajax_owner', 'ajax_owner_function' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_ajax_owner', 'ajax_owner_function' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
function ajax_owner_function(){
            $headers = "Content-type: text/html; charset=utf-8\r\n";
            $sitename = get_bloginfo('name');
            $form = get_field('form','options');
            $admin_email = $form['form_email'] ;
            $subject = "Новое сообщение с сайта ". $sitename;
            $position = htmlspecialchars(trim($_POST['position']));
            $vessel = htmlspecialchars(trim($_POST['vessel']));
            $dwt = htmlspecialchars(trim($_POST['dwt']));
            $contact = htmlspecialchars(trim($_POST['contact']));
            $salary = htmlspecialchars(trim($_POST['salary']));
            $description = htmlspecialchars(trim($_POST['message']));
            $spam_first = (trim($_POST['spamFirst']));
            $spam_second = (trim($_POST['spamSecond']));
    if( (isset( $spam_first ) && !empty( $spam_first )) || (isset( $spam_second ) && !empty( $spam_second) )){
        exit;
    }
    $message = '<html>
<head>
     <meta charset="UTF-8">
     <title>Форма обратной связи</title>
</head>
<body>
    <body style="width:94%; height:auto;">
    <table style="width:100%; max-width:600px;height:auto;vertical-align: middle;border-color:#000;border:0px;border-style:solid;border-spacing:unset;padding:0;" summary="форма заявки" rules="none" frame="border" cellpadding="0" cellspacing="0">
        <caption align="justify" style="height: 45px;">
            <h2 style="margin: 5px;font-size: 1.5rem;">Сообщение</h2>
        </caption>
        <thead align="justify" style="background-color:#ddd;border-color:#000;border:1px;border-style:solid;">
            <tr style="height: 30px;">
                <td align="center" style="width:100%;" colspan="4">
                    <h3 style="margin:5px;font-size: 1.1rem;">' . $subject . '</h3>
                </td>
            </tr>
        </thead>
        <tbody style="font-size: 1rem;">';
    if(isset($position)&&!empty($position)&&($position !== 'Position')) { 
      $message .= '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td style="border-right: 1px solid #ccc;padding-left:25px;">Позиция:</td>
                <td style="border-left: 1px solid #ccc;padding-left:25px;">'. $position .'</td>
            </tr>';
    }
    if(isset($vessel)&&!empty($vessel)&&($vessel !== 'Vessel type')) {
      $message .= '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td style="border-right: 1px solid #ccc;padding-left:25px;">Тип судна:</td>
                <td style="border-left: 1px solid #ccc;padding-left:25px;">'. $vessel .'</td>
            </tr>';
    }
    if(isset($dwt)&&!empty($dwt)&&($dwt !== 'DWT')) { 
      $message .= '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td style="border-right: 1px solid #ccc;padding-left:25px;">Тоннаж:</td>
                <td style="border-left: 1px solid #ccc;padding-left:25px;">'. $dwt .'</td>
            </tr>';
    }
    if(isset($contact)&&!empty($contact)) { 
      $message .= '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td style="border-right: 1px solid #ccc;padding-left:25px;">Длительность контракта:</td>
                <td style="border-left: 1px solid #ccc;padding-left:25px;">'. $contact .'</td>
            </tr>';
    }
    if(isset($salary)&&!empty($salary)) { 
      $message .= '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td style="border-right: 1px solid #ccc;padding-left:25px;">Зарплата:</td>
                <td style="border-left: 1px solid #ccc;padding-left:25px;">'. $salary .'</td>
            </tr>';
    }
    if(isset($description)&&!empty($description)) { 
     $message .= '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td colspan="4" align="center">
                    Сообщение:
                </td>
            </tr>
            <tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td colspan="4" align="center">
                    '. $description .'
                </td>
            </tr>';
    }
    $message .= '<tr style="height:90px;width:auto;">
               <td colspan="4" align="center">
                        <a href="'. get_bloginfo("url") . '/wp-admin" style="background-color:#1eb4e9;border:none; width: 70%;padding: 16px 15px;-webkit-border-radius: 49px;border-radius: 49px;margin:16px 0;color:#fff;font-size: 1rem;text-decoration:none;font-weight:600;">АДМИНИСТРИРОВАТЬ</a>
               </td>
            </tr>';
    $option = $form['option_ck'];
    if( $option && in_array('true', $option) ){   
        function create_file($position, $vessel, $dwt, $contact, $salary, $description){
            $today = date("F j, Y, g:i a");
            $file = WP_CONTENT_DIR . '/themes/ship/owner.csv';
            $bom = "\xEF\xBB\xBF";
                $tofile = $today;
                $tofile .= ';';
                if( !empty($position) ){
                    $tofile .= json_encode($position);
                    $tofile .= ';';
                }
                if( !empty($vessel) ){
                    $tofile .= json_encode($vessel);
                    $tofile .= ';';
                }
                if( !empty($dwt) ){
                    $tofile .= json_encode($dwt);
                    $tofile .= ';';
                }
                if( !empty($contact) ){
                    $tofile .= json_encode($contact);
                    $tofile .= ';';
                }
                if( !empty($salary) ){
                    $tofile .= json_encode($salary);
                    $tofile .= ';';
                }
                if( !empty($description) ){
                    $tofile .= json_encode($description);
                    $tofile .= ';';
                }
            @file_put_contents($file, $bom . $tofile, LOCK_EX);  
           /* $attachment = $file;*/
            return false;
        }    
    create_file($position, $vessel, $dwt, $contact, $salary, $description);
	$attachment[] = WP_CONTENT_DIR . '/themes/ship/owner.csv';
    wp_mail($admin_email,$subject,$message,$headers,$attachment); 
    }
    else{
        mail($admin_email,$subject,$message,$headers);
    }
}
