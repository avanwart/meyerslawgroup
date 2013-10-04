<?php #!/usr/bin/env /usr/bin/php
//andy
error_reporting(E_ALL);
ini_set('display_errors', '1');
set_time_limit(0);
 
try {
 
  $payload = json_decode($_REQUEST['payload']);
 
}
catch(Exception $e) {
 
    //log the error
    file_put_contents('/public_html/tempsitebeta/meyerslawgroup/logs/github.txt', $e . ' ' . $payload, FILE_APPEND);
 
      exit(0);
}
 
if ($payload->ref === 'refs/heads/master') {
 
    $project_directory = '/public_html/tempsitebeta/meyerslawgroup/';
 
    $output = shell_exec("/public_html/tempsitebeta/meyerslawgroup/git-puller.sh");
 
    //log the request
    file_put_contents('/public_html/tempsitebeta/meyerslawgroup/logs/github.txt', $output, FILE_APPEND);
 
}
?>