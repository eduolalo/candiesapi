<?php 
  $this->response->type('json');
    $this->response->header( array(
    'Access-Control-Allow-Origin: *',
    'Access-Control-Allow-Headers: Content-Type',
    'Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE',
    'Access-Control-Allow-Credentials: true'
  ));
  echo json_encode($response); 
?>