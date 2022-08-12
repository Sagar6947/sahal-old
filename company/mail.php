   <?php
   
   
    $mail_body = 'नमस्ते ' . $company_name . '!
  हम आपका हमारी Sahar Directory परिवार में दिल से स्वागत करते है ! Sahar Directory एक free plateform है जो आपको अपनी डिजिटल पहचान बनाने में मदद करता है। और हम जानते हैं कि आज की दुनिया में हमारे लिए डिजिटल रूप से मजबूत होना कितना महत्वपूर्ण है। और हम आपको पूरी तरह से मुफ्त में डिजिटल रूप से मजबूत बनने में मदद करते हैं। यहां आप अपनी वेबसाइट और डिजिटल विजिटिंग कार्ड बिल्कुल मुफ्त प्राप्त कर सकते हैं। तो तैयार हो जाइए खुद को एक डिजिटल पहचान देने और अपने लक्ष्यों तक पहुंचने के लिए। आप अपने बिज़नेस को फ्री में लिस्ट कीजिये हमारे साथ और बनाइये अपनी एक डिजिटल पहचान ताकि जयादा से जयादा लोगो तक आपकी पहुंच हो सके और आपका बिज़नेस तरक्की करे !

  निचे आपके अकाउंट की जानकारी शेयर की जा रही है :

  Login Url : https://sahardirectory.com/company/company-login.पहप
  Contact No. -' . $company_email . ' 
  Password - ' . $company_password . '

  अगर आप डेमो देखना चाहते है की हम आपको क्या दे रहे है तो आप निचे दिए लिंक पर क्लिक कीजिये :
  http://sahardirectory.com/sahar/rewari/information-tech/sahardirectory

  हम आपको निचे दिए गए लिंक में वीडियो के माध्यम से भी बताना चाहेंगे की आप कैसे अपने अकाउंट को setup कर सकते है !
  ........(ये लिंक म आपको बाद में दे दूंगा mam )..........

  अगर आप को अभी भी कोई भी समस्या आ रही है अपने अकाउंट से सम्बंधित तो आप हमें हमारे निचे दिए गए Social Media के links के माध्यम से सम्पर्क कर सकते है
  Facebook : https://www.facebook.com/sahardirectory
  Instagram : https://www.instagram.com/sahardirectory
  Linkedin : https://www.linkedin.com/SaharDirectory
  Email : hello sahardirectorycom
  Support No.: +91 7419272427

  Thanks
  Team Sahar Directory ';

    $to = "muskaanrashujain@gmail.com";
    $subject = 'form' . " - sahardirectory";
    $headers  = 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
    $headers .= 'From: sahardirectory<hr@sahardirectory.com>' . "\n";
    $mail_result = mail($to, $subject, $mail_body, $headers);
   
  

if($mail_result)
{
 echo'ok';   
}
            
            
            