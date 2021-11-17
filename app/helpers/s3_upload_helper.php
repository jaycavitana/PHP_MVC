<?php
require 'aws/aws-autoloader.php';

$s3 = new Aws\S3\S3Client([
    'region'  => S3_REGION,
    'version' => 'latest',
    'credentials' => [
        'key'    => S3_KEY,
        'secret' => S3_SECRET,
    ]
]);

function s3_upload($key, $temp_file_location){
    global $s3;
    $result = $s3->putObject([
        'Bucket' => S3_BUCKETNAME,
        'Key'    => $key,
        'Body'   => 'Sample body',
        'SourceFile' => $temp_file_location,
        'ContentType' =>mime_content_type($temp_file_location), 
        'ContentDisposition' => "inline", //<-- and this !
        'ACL' => 'public-read'//<-- this makes it public so people can see it
    ]);

    return $result;
}

?>