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
    if (isset($_GET['username']))
    {
        $username = $_GET['username'];
        // var_dump($_GET);

        // echo $username;

    // ------------------------------------------------------------------------------------------
    
    // Authentication ---------------------------------------------------------------------------
    
        $tableName = 'user_management';
        $client->deleteItem(array(
            'TableName' => $tableName,
            'Key' => array(
                'username2'   => array('S' => $username)
            )
        ));
        
        $msg = "User successfully deleted";
    }
    else
    {
        $msg = "Issue with deleting user. Please try again";
    }
    
    header("Location: delete_user.php");

?>