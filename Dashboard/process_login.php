<?php
session_start();
    
    // setting for dynamodb---------------------------------------------------------------
    date_default_timezone_set('UTC');

    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);

    require 'vendor/autoload.php';

    use Aws\DynamoDb\DynamoDbClient;

    // Credential for Dynamodb-------------------------------------------------------------

    $client = DynamoDbClient::factory(array(
        'region' => 'ap-southeast-1',
        'version' => 'latest'
    ));

    // ----------------------------------------------------------------------------------------


    // grab user input from $_POST: 1) username, 2) pass ---------------------------------------
    if (isset($_POST['username']) && isset($_POST['pass']))
    {
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        // var_dump($_POST);

    // ------------------------------------------------------------------------------------------
    
    // Authentication ---------------------------------------------------------------------------
        $tableName = 'user_management';
        $username2 = $username;
        // $pass2 = $pass;
        $pass2 = md5(md5($pass));
        // $pass2 = md5($pass);

        $result = $client->getItem(array(
            'ConsistentRead' => true,
            'TableName' => $tableName,
            'Key'       => array(
                'username2'   => array('S' => $username2)
            )
        ));

        // var_dump(/$result);
        
        // "<br><br>";

        // echo $name;
        // echo $password;
        // echo $role;

        if ($result['Item'])
        {
            $name = $result['Item']['name2']['S'];
            $password = $result['Item']['password2']['S'];
            $role = $result['Item']['role2']['S'];

            if ($password == $pass2)
            {
                $msg = 'Login Success';

                echo $name;
                echo $role;
                echo $msg;
            
            // change this ----------------------------------------------------------------------------------------------
                $_SESSION['USER'] = $name;
                $_SESSION['ROLE'] = $role;
                header("Location: production/homepage.php");
                return;
            }
            
            else
            {
                $msg = 'Password is invalid. Please try again';
                echo $msg;
                $_SESSION['FAIL'] = $msg;
                header("Location: login.php");
                return;
            }
            
        }
        else
        {
            $msg = 'Username is invalid. Please try again';
            echo $msg;
            $_SESSION['FAIL'] = $msg;
            header("Location: login.php");
            retusrn;

        }

    }

?>