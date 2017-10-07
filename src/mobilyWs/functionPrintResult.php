<?php
//لطباعة القيمة الناتجه من بوابة الإرسال على شكل نص
function printStringResult($apiResult, $arrayMsgs, $printType = 'Alpha')
{
	global $undefinedResult;
	switch ($printType)
	{
		case 'Alpha':
		{
			if(array_key_exists($apiResult, $arrayMsgs))
				return $arrayMsgs[$apiResult];
			else
				return $arrayMsgs[0];
		}
		break;

		case 'Balance':
		{
			if(array_key_exists($apiResult, $arrayMsgs))
				return $arrayMsgs[$apiResult];
			else
			{
				list($originalAccount, $currentAccount) = explode("/", $apiResult);
				if(!empty($originalAccount) && !empty($currentAccount))
				{
					return sprintf($arrayMsgs[3], $currentAccount, $originalAccount);
				}
				else
					return $arrayMsgs[0];
			}
		}
		break;
			
		case 'Senders':
		{
			$apiResult = str_replace('[pending]', '[pending]<br>', $apiResult);
			$apiResult = str_replace('[active]', '<br>[active]<br>', $apiResult);
			$apiResult = str_replace('[notActive]', '<br>[notActive]<br>', $apiResult);
			return $apiResult;
		}
		break;
		
		case 'Normal':
			if($apiResult{0} != '#')
				return $arrayMsgs[$apiResult];
			else
				return $apiResult;
		break;
	}		
}
?>