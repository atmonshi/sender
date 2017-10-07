<?php
//دالة فحص  حالة الإرسال بإستخدام بوابة fsockopen
function sendStatus($viewResult=1)
{
	global $arraySendStatus;
	$fsockParameter = "POST /api/sendStatus.php HTTP/1.0\r\n";
	$fsockParameter.= "Host: www.mobily.ws \r\n";
	$fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
	$fsockParameter.= "Content-length: 0 \r\n\r\n";

	$fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 5);
	fputs($fsockConn,$fsockParameter);

	$result = "";
	$clearResult = false;

	while(!feof($fsockConn))
	{
		$line = fgets($fsockConn, 10240);
		if($line == "\r\n" && !$clearResult)
		$clearResult = true;

		if($clearResult)
			$result .= trim($line);
	}

	if($viewResult)
		$result = printStringResult(trim($result) , $arraySendStatus);
	return $result;
}

//دالة تغيير كلمة المرور لحساب الإرسال في موقع موبايلي بإستخدام بوابة  fsockopen
function changePassword($userAccount, $passAccount, $newPassAccount, $viewResult=1)
{
	global $arrayChangePassword;
	$stringToPost = "mobile=".$userAccount."&password=".$passAccount."&newPassword=".$newPassAccount;
	$stringToPostLength = strlen($stringToPost);
	$fsockParameter = "POST /api/changePassword.php HTTP/1.0\r\n";
	$fsockParameter.= "Host: www.mobily.ws \r\n";
	$fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
	$fsockParameter.= "Content-length: $stringToPostLength \r\n\r\n";
	$fsockParameter.= "$stringToPost";

	$fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 5);
	fputs($fsockConn,$fsockParameter);

	$result = "";
	$clearResult = false;
	while(!feof($fsockConn))
	{
		$line = fgets($fsockConn, 10240);
		if($line == "\r\n" && !$clearResult)
		$clearResult = true;

		if($clearResult)
			$result .= trim($line);
	}

	if($viewResult)
		$result = printStringResult(trim($result) , $arrayChangePassword);
	return $result;
}

//دالة إسترجاع كلمة المرور لحساب الإرسال في موقع موبايلي بإستخدام بوابة  fsockopen
function forgetPassword($userAccount, $sendType, $viewResult=1)
{
	global $arrayForgetPassword;
	$stringToPost = "mobile=".$userAccount."&type=".$sendType;
	$stringToPostLength = strlen($stringToPost);
	$fsockParameter = "POST /api/forgetPassword.php HTTP/1.0\r\n";
	$fsockParameter.= "Host: www.mobily.ws \r\n";
	$fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
	$fsockParameter.= "Content-length: $stringToPostLength \r\n\r\n";
	$fsockParameter.= "$stringToPost";

	$fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 5);
	fputs($fsockConn,$fsockParameter);

	$result = "";
	$clearResult = false;
	while(!feof($fsockConn))
	{
		$line = fgets($fsockConn, 10240);
		if($line == "\r\n" && !$clearResult)
		$clearResult = true;

		if($clearResult)
			$result .= trim($line);
	}

	if($viewResult)
		$result = printStringResult(trim($result) , $arrayForgetPassword);
	return $result;
}

//دالة عرض الرصيد بإستخدام بوابة fsockopen
function balanceSMS($userAccount, $passAccount, $viewResult=1)
{
	global $arrayBalance;
	$stringToPost = "mobile=".$userAccount."&password=".$passAccount;
	$stringToPostLength = strlen($stringToPost);
	$fsockParameter = "POST /api/balance.php HTTP/1.0\r\n";
	$fsockParameter.= "Host: www.mobily.ws \r\n";
	$fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
	$fsockParameter.= "Content-length: $stringToPostLength \r\n\r\n";
	$fsockParameter.= "$stringToPost";

	$fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 5);
	fputs($fsockConn,$fsockParameter);

	$result = "";
	$clearResult = false;
	while(!feof($fsockConn))
	{
		$line = fgets($fsockConn, 10240);
		if($line == "\r\n" && !$clearResult)
		$clearResult = true;

		if($clearResult)
			$result .= trim($line);
	}

	if($viewResult)
		$result = printStringResult(trim($result), $arrayBalance, 'Balance');
	return $result;
}

//دالة الإرسال بإستخدام بوابة fsockopen
function sendSMS($userAccount, $passAccount, $numbers, $sender, $msg, $MsgID, $timeSend=0, $dateSend=0, $deleteKey=0, $viewResult=1)
{
	global $arraySendMsg;
	$applicationType = "68";
    $msg = $msg;
	$sender = urlencode($sender);
	$domainName = $_SERVER['SERVER_NAME'];
	$stringToPost = "mobile=".$userAccount."&password=".$passAccount."&numbers=".$numbers."&sender=".$sender."&msg=".$msg."&timeSend=".$timeSend."&dateSend=".$dateSend."&applicationType=".$applicationType."&domainName=".$domainName."&msgId=".$MsgID."&deleteKey=".$deleteKey."&lang=3";
	$stringToPostLength = strlen($stringToPost);
	$fsockParameter = "POST /api/msgSend.php HTTP/1.0\r\n";
	$fsockParameter.= "Host: www.mobily.ws \r\n";
	$fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
	$fsockParameter.= "Content-length: $stringToPostLength \r\n\r\n";
	$fsockParameter.= "$stringToPost";

	$fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 30);
	fputs($fsockConn, $fsockParameter);

	$result = "";
	$clearResult = false;

	while(!feof($fsockConn))
	{
		$line = fgets($fsockConn, 10240);
		if($line == "\r\n" && !$clearResult)
		$clearResult = true;

		if($clearResult)
			$result .= trim($line);
	}

	if($viewResult)
		$result = printStringResult(trim($result) , $arraySendMsg);
	return $result;
}

//دالة قالب الإرسال بإستخدام بوابة fsockopen
function sendSMSWK($userAccount, $passAccount, $numbers, $sender, $msg, $msgKey, $MsgID, $timeSend=0, $dateSend=0, $deleteKey=0, $viewResult=1)
{
	global $arraySendMsgWK;
	$applicationType = "68";
    $msg = $msg;
	$msgKey = $msgKey;
	$sender = urlencode($sender);
	$domainName = $_SERVER['SERVER_NAME'];
	$stringToPost = "mobile=".$userAccount."&password=".$passAccount."&numbers=".$numbers."&sender=".$sender."&msg=".$msg."&msgKey=".$msgKey."&timeSend=".$timeSend."&dateSend=".$dateSend."&applicationType=".$applicationType."&domainName=".$domainName."&msgId=".$MsgID."&deleteKey=".$deleteKey."&lang=3";
	$stringToPostLength = strlen($stringToPost);
	$fsockParameter = "POST /api/msgSendWK.php HTTP/1.0\r\n";
	$fsockParameter.= "Host: www.mobily.ws \r\n";
	$fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
	$fsockParameter.= "Content-length: $stringToPostLength \r\n\r\n";
	$fsockParameter.= "$stringToPost";

	$fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 30);
	fputs($fsockConn, $fsockParameter);

	$result = "";
	$clearResult = false;

	while(!feof($fsockConn))
	{
		$line = fgets($fsockConn, 10240);
		if($line == "\r\n" && !$clearResult)
		$clearResult = true;

		if($clearResult)
			$result .= trim($line);
	}

	if($viewResult)
		$result = printStringResult(trim($result) , $arraySendMsgWK);
	return $result;
}

//دالة حذف الرسائل بإستخدام بوابة fsockopen
function deleteSMS($userAccount, $passAccount, $deleteKey=0, $viewResult=1)
{
	global $arrayDeleteSMS;
	$stringToPost = "mobile=".$userAccount."&password=".$passAccount."&deleteKey=".$deleteKey;
	$stringToPostLength = strlen($stringToPost);
	$fsockParameter = "POST /api/deleteMsg.php HTTP/1.0\r\n";
	$fsockParameter.= "Host: www.mobily.ws \r\n";
	$fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
	$fsockParameter.= "Content-length: $stringToPostLength \r\n\r\n";
	$fsockParameter.= "$stringToPost";

	$fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 30);
	fputs($fsockConn,$fsockParameter);

	$result = "";
	$clearResult = false;

	while(!feof($fsockConn))
	{
		$line = fgets($fsockConn, 10240);
		if($line == "\r\n" && !$clearResult)
		$clearResult = true;

		if($clearResult)
			$result .= trim($line);
	}

	if($viewResult)
		$result = printStringResult(trim($result) , $arrayDeleteSMS);
	return $result;
}

//دالة طلب إسم مرسل (جوال) بإستخدام بوابة fsockopen
function addSender($userAccount, $passAccount, $sender, $viewResult=1)
{
	global $arrayAddSender;
	$stringToPost = "mobile=".$userAccount."&password=".$passAccount."&sender=".$sender;
	$stringToPostLength = strlen($stringToPost);
	$fsockParameter = "POST /api/addSender.php HTTP/1.0\r\n";
	$fsockParameter.= "Host: www.mobily.ws \r\n";
	$fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
	$fsockParameter.= "Content-length: $stringToPostLength \r\n\r\n";
	$fsockParameter.= "$stringToPost";

	$fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 30);
	fputs($fsockConn,$fsockParameter);

	$result = "";
	$clearResult = false;

	while(!feof($fsockConn))
	{
		$line = fgets($fsockConn, 10240);
		if($line == "\r\n" && !$clearResult)
		$clearResult = true;

		if($clearResult)
			$result .= trim($line);
	}

	if($viewResult)
		$result = printStringResult(trim($result), $arrayAddSender, 'Normal');
	return $result;
}

//دالة تفعيل إسم مرسل (جوال) بإستخدام بوابة fsockopen
function activeSender($userAccount, $passAccount, $senderId, $activeKey, $viewResult=1)
{
	global $arrayActiveSender;
	$stringToPost = "mobile=".$userAccount."&password=".$passAccount."&senderId=".$senderId."&activeKey=".$activeKey;
	$stringToPostLength = strlen($stringToPost);
	$fsockParameter = "POST /api/activeSender.php HTTP/1.0\r\n";
	$fsockParameter.= "Host: www.mobily.ws \r\n";
	$fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
	$fsockParameter.= "Content-length: $stringToPostLength \r\n";
	$fsockParameter.= "$stringToPost \r\n";

	$fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 30);
	fputs($fsockConn,$fsockParameter);

	$result = "";
	$clearResult = false;

	while(!feof($fsockConn))
	{
		$line = fgets($fsockConn, 10240);
		if($line == "\r\n" && !$clearResult)
		$clearResult = true;

		if($clearResult)
			$result .= trim($line);
	}

	if($viewResult)
		$result = printStringResult(trim($result) , $arrayActiveSender);
	return $result;
}

//دالة التحقق من حالة طلب إسم مرسل (جوال) بإستخدام بوابة fsockopen
function checkSender($userAccount, $passAccount, $senderId, $viewResult=1)
{
	global $arrayCheckSender;
	$stringToPost = "mobile=".$userAccount."&password=".$passAccount."&senderId=".$senderId;
	$stringToPostLength = strlen($stringToPost);
	$fsockParameter = "POST /api/checkSender.php HTTP/1.0\r\n";
	$fsockParameter.= "Host: www.mobily.ws \r\n";
	$fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
	$fsockParameter.= "Content-length: $stringToPostLength \r\n\r\n";
	$fsockParameter.= "$stringToPost";

	$fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 30);
	fputs($fsockConn,$fsockParameter);

	$result = "";
	$clearResult = false;

	while(!feof($fsockConn))
	{
		$line = fgets($fsockConn, 10240);
		if($line == "\r\n" && !$clearResult)
		$clearResult = true;

		if($clearResult)
			$result .= trim($line);
	}

	if($viewResult)
		$result = printStringResult(trim($result) , $arrayCheckSender);
	return $result;
}

//دالة طلب إسم مرسل (أحرف) بإستخدام بوابة fsockopen
function addAlphaSender($userAccount, $passAccount, $sender, $viewResult=1)
{
	global $arrayAddAlphaSender;
	$stringToPost = "mobile=".$userAccount."&password=".$passAccount."&sender=".$sender;
	$stringToPostLength = strlen($stringToPost);
	$fsockParameter = "POST /api/addAlphaSender.php HTTP/1.0\r\n";
	$fsockParameter.= "Host: www.mobily.ws \r\n";
	$fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
	$fsockParameter.= "Content-length: $stringToPostLength \r\n";
	$fsockParameter.= "$stringToPost \r\n";

	$fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 30);
	fputs($fsockConn,$fsockParameter);

	$result = "";
	$clearResult = false;

	while(!feof($fsockConn))
	{
		$line = fgets($fsockConn, 10240);
		if($line == "\r\n" && !$clearResult)
		$clearResult = true;

		if($clearResult)
			$result .= trim($line);
	}

	if($viewResult)
		$result = printStringResult(trim($result) , $arrayAddAlphaSender);
	return $result;
}

//دالة التحقق من حالة طلب إسم مرسل (أحرف) بإستخدام بوابة fsockopen
function checkAlphasSender($userAccount, $passAccount, $viewResult=1)
{
	global $arrayCheckAlphasSender;
	$stringToPost = "mobile=".$userAccount."&password=".$passAccount;
	$stringToPostLength = strlen($stringToPost);
	$fsockParameter = "POST /api/checkAlphasSender.php HTTP/1.0\r\n";
	$fsockParameter.= "Host: www.mobily.ws \r\n";
	$fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
	$fsockParameter.= "Content-length: $stringToPostLength \r\n";
	$fsockParameter.= "$stringToPost \r\n";

	$fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 30);
	fputs($fsockConn,$fsockParameter);

	$result = "";
	$clearResult = false;

	while(!feof($fsockConn))
	{
		$line = fgets($fsockConn, 10240);
		if($line == "\r\n" && !$clearResult)
		$clearResult = true;

		if($clearResult)
			$result .= trim($line);
	}

	if($viewResult)
		$result = printStringResult(trim($result) , $arrayCheckAlphasSender, 'Senders');
	return $result;
}
?>