<?php
	session_start();

	error_reporting(0);

	date_default_timezone_set("Asia/Bangkok");
	
	function myUrlEncode($string) {
		$entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
		$replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
		return str_replace($entities, $replacements, urlencode($string));
	}
	
	if(@$_SESSION['HTTP_REFERER'] != "")
	{
		$redirect = $_SESSION['HTTP_REFERER'];
	}
	else
	{
		$redirect = "https://dev.souvii.com";
	}
	
	require_once 'autoload.php';
	
	if (!isset($_SESSION['state']) || ($_SESSION['state'] != $_GET['state'])) {
		$_date = date('YmdHis');
		$_SESSION['state'] = $_date;

		@$_SESSION['HTTP_REFERER'] = $_GET['from'];

		header('Location: https://accounts.google.com/o/oauth2/auth?scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile&state='.$_date.'&redirect_uri=https://dev.souvii.com/connect/google/&response_type=code&client_id=1029324581378-1gcp98l6l583rhf5ia8aamjlolnsi77o.apps.googleusercontent.com&access_type=offline');
	}
	else
	{
		$client = new Google_Client();
		$client->setApplicationName("Job Indy");
		$client->setClientId('1029324581378-1gcp98l6l583rhf5ia8aamjlolnsi77o.apps.googleusercontent.com');
		$client->setClientSecret('ajguLGTJIv6bkorNa1nOEg8G');
		$client->setRedirectUri('https://dev.souvii.com/connect/google/');
		$client->setScopes(array('https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/userinfo.profile'));
		$oauth2 = new Google_Service_Oauth2($client);
		
		if (isset($_GET['code'])) {
			$client->authenticate($_GET['code']);
			if ($client->getAccessToken()) {
				$user = $oauth2->userinfo->get();
				
				define('BASEPATH', str_replace("\\", "/", $system_path));
				include('../../application/config/database.php');

				$conn = mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database']);
				mysqli_query($conn, "SET NAMES 'utf8'");
				
				$type = "G";
				
				$res = mysqli_query($conn, "select * from member where type = '".$type."' and open_id = '".$user->id."'");
				if(mysqli_num_rows($res) > 0)
				{
					$row = mysqli_fetch_array($res);
					mysqli_query($conn, "update member set last_login = NOW() where id = '".$row['id']."'");
					
					$_SESSION['member'] = $row;
					
					mysqli_close($conn);
					header('Location: '.$redirect);
					
				}
				else if($res != false && $user->email != '')
				{
					$sql = @"INSERT INTO `member` (
						`type`, 
						`open_id`, 
						`email`, 
						`password`, 
						`avatar_url`, 
						`name`,
						`birthdate`,
						`contact_email`,
						`mobile`,
						`line`,
						`facebook`,
						`salt`,  
						`hash`,  
						`status`,  
						`created_on`, 
						`updated_on`, 
						`last_login`, 
						`view_cnt`
					) VALUES(
						'".$type."', 
						'".$user->id."', 
						'".$user->email."',
						'', 
						'".((@$user->picture != "") ? $user->picture : '')."', 
						'".$user->givenName." ".$user->familyName."', 
						'0000-00-00',
						'".$user->email."',
						'',
						'',
						'',
						'',
						'',
						'Y', 
						NOW(), 
						'0000-00-00 00:00:00', 
						'0000-00-00 00:00:00',
						'0'
					);";
					
					mysqli_query($conn, $sql);
					$_id = mysqli_insert_id($conn);
					$_SESSION['how_it'] = 1;

					$res = mysqli_query($conn, "select * from member where id = '".$_id."'");
					if(mysqli_num_rows($res) > 0)
					{
						$row = mysqli_fetch_array($res);
						mysqli_query($conn, "update member set last_login = NOW() where id = '".$row['id']."'");
						$_SESSION['member'] = $row;
					}
					
					mysqli_close($conn);
					header('Location: '.$redirect);
					
				}
				else
				{
					mysqli_close($conn);
					header('Location: '.$redirect);
				}
			}
		}
		else
		{
			header('Location: '.$redirect);
		}
	}
?>
