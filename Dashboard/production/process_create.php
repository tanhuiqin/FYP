<?php
session_start();

if (isset($_SESSION['USER']))
{
    $name = $_SESSION['USER'];
    $role = $_SESSION['ROLE'];
    // unset($_SESSION['USER']);

}
else
{
  header("Location: ../login.php");
}
    
    // setting for dynamodb---------------------------------------------------------------
    date_default_timezone_set('UTC');

    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);

    require '../vendor/autoload.php';

    use Aws\DynamoDb\DynamoDbClient;

    // Credential for Dynamodb-------------------------------------------------------------

    $client = DynamoDbClient::factory(array(
        'region' => 'ap-southeast-1',
        'version' => 'latest'
    ));

    // ----------------------------------------------------------------------------------------


    // grab user input from $_POST: 1) username, 2) pass ---------------------------------------
    if (isset($_POST['name']) && isset($_POST['role']) && isset($_POST['username']) && isset($_POST['password']))
    {
        $name = $_POST['name'];
        $role = strtoupper($_POST['role']);
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pass = md5(md5($password));
        // var_dump($_POST);

        // echo $name;
        // echo $role;
        // echo $username;
        // echo $pass;

    // ------------------------------------------------------------------------------------------
    
    // Authentication ---------------------------------------------------------------------------
    
        $tableName = 'user_management';
        
        $result = $client->getItem(array(
            'ConsistentRead' => true,
            'TableName' => $tableName,
            'Key'       => array(
                'username2'   => array('S' => $username)
            )
        ));

        if ($result['Item'])
        {
            $msg = "Username existed. Please choose another username";
        }
        else
        {
            $response = $client->batchWriteItem(array(
                'RequestItems' => array(
                    $tableName => array(
                        array(
                            'PutRequest' => array(
                                'Item' => array(
                                    'username2'     => array('S' => $username),
                                    'password2' => array('S' => $pass),
                                    'name2'  => array('S' => $name),
                                    'role2' => array('S' => $role),
                                )
                            )
                        )
                    )
                )
            ));
            $msg = "User successfully added";
        }

    }

    else
    {
        $msg = "Missing information";
    }
    
    $_SESSION['MSG'] = $msg;
    header("Location: create_user.php");

// $error = [];


?>