<?php
/**
 * Copyright 2010-2019 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * This file is licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License. A copy of
 * the License is located at
 *
 * http://aws.amazon.com/apache2.0/
 *
 * This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
 * CONDITIONS OF ANY KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations under the License.
*/

require 'aws/aws-autoloader.php';

date_default_timezone_set('UTC');

use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;

$sdk = new Aws\Sdk([
    'region'   => 'ap-southeast-1',
    'version'  => 'latest'
]);

$dynamodb = $sdk->createDynamoDb();
$marshaler = new Marshaler();

$tableName = 'Table13';

$eav = $marshaler->marshalJson('
    {
        ":time2": "1599624041.297925"
    }
');

#cannot use dynamodb reserved words need to add number behind to change
$params = [
    'TableName' => $tableName,
    'ProjectionExpression' => '#time2, payload.sensorID',
    'KeyConditionExpression' =>
        '#time2 = :time2',
    'ExpressionAttributeNames'=> [ '#time2' => 'time2' ],
    'ExpressionAttributeValues'=> $eav
];

echo "yahoooo---------------------------------------------------------------------------------\n";

try {
    $result = $dynamodb->query($params);

    echo "Query succeeded.\n";

    foreach ($result['Items'] as $i) {
        $result = $marshaler->unmarshalItem($i);
        var_dump($result);
        // print $pirresult["id"];
    }

} catch (DynamoDbException $e) {
    echo "Unable to query:\n";
    echo $e->getMessage() . "\n";
}


?>
