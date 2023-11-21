<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
  
<?php 
    session_start();
    
    function Mod($a, $b)
{
	return ($a % $b + $b) % $b;
}

function Cipher($input, $key, $encipher)
{
	$keyLen = strlen($key);

	for ($i = 0; $i < $keyLen; ++$i)
		if (!ctype_alpha($key[$i]))
			return ""; 

	$output = "";
	$nonAlphaCharCount = 0;
	$inputLen = strlen($input);

	for ($i = 0; $i < $inputLen; ++$i)
	{
		if (ctype_alpha($input[$i]))
		{
			$cIsUpper = ctype_upper($input[$i]);
			$offset = ord($cIsUpper ? 'A' : 'a');
			$keyIndex = ($i - $nonAlphaCharCount) % $keyLen;
			$k = ord($cIsUpper ? strtoupper($key[$keyIndex]) : strtolower($key[$keyIndex])) - $offset;
			$k = $encipher ? $k : -$k;
			$ch = chr((Mod(((ord($input[$i]) + $k) - $offset), 26)) + $offset);
			$output .= $ch;
		}
		else
		{
			$output .= $input[$i];
			++$nonAlphaCharCount;
		}
	}

	return $output;
}

function Encipher($input, $key)
{
	return Cipher($input, $key, true);
}

function Decipher($input, $key)
{
	return Cipher($input, $key, false);
}


//Encrption-2


function KeyGeneration($str)
{
   
$sum = 0;
$arr1 = str_split($str);
foreach($arr1 as $item){
   $sum += ord($item);
}


return $sum%26;


}



function Cipher1($ch, $key)
{
	if (!ctype_alpha($ch))
		return $ch;

	$offset = ord(ctype_upper($ch) ? 'A' : 'a');
	return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
}

function Encipher1($input, $key)
{
	$output = "";

	$inputArr = str_split($input);
	foreach ($inputArr as $ch)
		$output .= Cipher1($ch, $key);

	return $output;
}

function Decipher1($input, $key)
{
	return Encipher1($input, 26 - $key);
}





























    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
		$k = $_SESSION['user_key'];
		//echo $key;
        //$key="cipher";
        //$data = json_decode(file_get_contents("php://input"), true);
       


        $c1=Encipher($message,$k);

		$shift=KeyGeneration($c1);

		$data = Encipher1($c1, $shift);
       
        //echo "'$m'=<script>output;</script>";
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg,inter)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$data}','{$shift}')") or die();
        }



    }else{
        header("location: ../login.php");
    }


    
?>






</body>
</html>


