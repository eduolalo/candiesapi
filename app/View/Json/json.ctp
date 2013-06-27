<?php 
  $this->response->header( array(
    'Access-Control-Allow-Origin' => 'http://localhost:9300'
  ));
  $this->response->type('json');
  echo json_encode($response); 
?>