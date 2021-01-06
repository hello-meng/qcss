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
    
    require_once 'vendor/autoload.php';
    use Hybridauth\Hybridauth;
    use Hybridauth\HttpClient;
    $config = [
        'callback' => HttpClient\Util::getCurrentUrl(),
        'providers' => [
            'Line' => [ 
                'enabled' => true,
                'keys'    => [ 'id' => '1654302534', 'secret' => '03f41aba419becca3b2883fee943cce5' ], 
            ],
        ],
    ];
    
    try {    
        $hybridauth = new Hybridauth( $config );
        $adapter = $hybridauth->authenticate( 'Line' );
        $tokens = $adapter->getAccessToken();
        $user = $adapter->getUserProfile();
        // print_r( $tokens );
        // var_dump( $user );
        $adapter->disconnect();
    }
    catch (\Exception $e) {
        echo $e->getMessage();
    }

    // exit;
    if (isset($tokens)) {
        define('BASEPATH', str_replace("\\", "/", $system_path));
        include('../../application/config/database.php');

        $conn = mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database']);
        mysqli_query($conn, "SET NAMES 'utf8'");
        
        $type = "L";
        
        $res = mysqli_query($conn, "select * from member where type = '".$type."' and open_id = '".$user->identifier."'");

        if(mysqli_num_rows($res) > 0)
        {
            $row = mysqli_fetch_array($res);
            // echo "update member set last_login = NOW() where id = '".$row['id']."'";
            // exit;
            mysqli_query($conn, "update member set last_login = NOW() where id = '".$row['id']."'");
            mysqli_close($conn);
            $_SESSION['member'] = $row;
            // var_dump($_SESSION['member']);
            header('Location: '.$redirect);
            // header('Location: '.$redirect.'/connect/line/index.php');
        }
        else if(@$res != false && $user->email != '')
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
                '".$user->identifier."', 
                '".$user->email."',
                '', 
                '".$user->photoURL."', 
                '".$user->displayName."',
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
            header('Location: '.$redirect.'/connect/line/index.php');
        }
       
    }