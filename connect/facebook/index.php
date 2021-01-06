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
		$redirect = "https://dev.souvii.com/";
	}

	require 'src/Facebook/autoload.php';
	
	$fb = new Facebook\Facebook([
	  'app_id' => '1026151974468589',
	  'app_secret' => '0bdf176f7bbd1beb77e351dcf9926fe6',
	  'default_graph_version' => 'v5.0',
	]);

	$helper = $fb->getRedirectLoginHelper();
	
	if(@$_REQUEST['code'] == "")
	{
		@$_SESSION['HTTP_REFERER'] = $_GET['from'];

		$permissions = ['email'];
		$loginUrl = $helper->getLoginUrl('https://dev.souvii.com/connect/facebook/', $permissions);
		header('Location: '.$loginUrl);
	}
	else
	{
		try {
			$accessToken = $helper->getAccessToken('https://dev.souvii.com/connect/facebook/');
		} catch (FacebookRequestException $e) {
			header('Location: '.$redirect);
		} catch (\Exception $e) {
			header('Location: '.$redirect);
		}
		
		if (isset($accessToken)) {
			
			$fb->setDefaultAccessToken($accessToken);
			$response = $fb->get('/me?fields=id,name,email');
			// $response = $fb->get('/me?fields=id,name,first_name,last_name,email,link');
			$user = $response->getDecodedBody();
			
			define('BASEPATH', str_replace("\\", "/", $system_path));
			include('../../application/config/database.php');

			$conn = mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database']);
			mysqli_query($conn, "SET NAMES 'utf8'");
			
			$type = "F";
			
			$res = mysqli_query($conn, "select * from member where type = '".$type."' and open_id = '".$user['id']."'");
			if(mysqli_num_rows($res) > 0)
			{
				$row = mysqli_fetch_array($res);
				mysqli_query($conn, "update member set last_login = NOW() where id = '".$row['id']."'");
				mysqli_close($conn);
				$_SESSION['member'] = $row;
				
				header('Location: '.$redirect);
			}
			else if(@$res != false && $user['email'] != '')
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
					'".$user['id']."', 
					'".$user['email']."',
					'', 
					'https://graph.facebook.com/".$user['id']."/picture?width=640&height=672', 
					'".$user['first_name']." ".$user['last_name']."',
					'0000-00-00',
					'".$user['email']."',
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

?>
