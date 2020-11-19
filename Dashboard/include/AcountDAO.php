<?php

// require_once 'common.php';

date_default_timezone_set('UTC');

    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);

require 'vendor/autoload.php';
use Aws\DynamoDb\DynamoDbClient;

class AccountDAO {

    public function authenticate($username, $pass) {
        
        // // Step 1 - Credential for Dynamodb
        // $client = DynamoDbClient::factory(array(
        //     'region' => 'ap-southeast-1',
        //     'version' => 'latest'
        // ));
        
        // $tableName = 'users';

        // $username2 = $username;
        // $pass2 = $pass;

        
        // // Step 4 - Execute and Retrieve Query Results (if any)
        // /*
        //     1) Retrieve a row from account where username2 = $username and pass2 = $pass
        //     2) If 'YES' (there is a row):
        //         If $result['Item'] == $pass:
        //             msg = 'SUCCESS'
        //         else:
        //             msg = 'Password is incorrect!'

        //     3) If 'NO' (no row is returned):
        //         $msg = 'Email is not registered with us!'
        // */

        // $result = $client->getItem(array(
        //     'ConsistentRead' => true,
        //     'TableName' => $tableName,
        //     'Key'       => array(
        //         'username2'   => array('S' => $username2),
        //         'pass2' => array('S' => $pass2)
        //     )
        // ));
        
        // $msg = '';

        // if ($result['Item'])
        // {
        //     $msg = 'Login Success';
        //     $name = $result['Item']['info']['M']['name2']['S'];
        //     $role = $result['Item']['info']['M']['role2']['S'];
        // }
        // else
        // {
        //     $msg = 'Either Username or Password is invalid. Please try again';
        // }

        // // Step 6 - Return (if any)
        // return $msg; // (String) authentication status msg
        return $username; // (String) authentication status msg
    }


}

?>