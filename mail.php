<?php
  ini_set('include_path','.:/home/pimp3am/includes');
  require_once('ext.phpmailer.php');

	function mail_sent($p){
    $mail = new my_phpmailer();
  	$mail->to = array(array("OSULatinoStudies@gmail.com","OSULatinoStudies"));
    $mail->IsMail();
  
  	$mail->FromName = $p['name'];
    $mail->From = $p['email'];
    $mail->Subject = 'Message from HBSA Web Site';
    $mail->Body = "\nContact Information:\n\tName:\t\t".addslashes($p['name'])."\n\t";
  	$mail->Body .= "Email:\t".addslashes($p['email'])."\n\n";
		$mail->Body .= "Comments:\n\t".addslashes($p['misc'])."\n\t";
      	
  	return $mail->Send();
	}	
?>
