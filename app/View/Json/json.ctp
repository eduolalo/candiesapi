<?php 
  $this->response->header( array(
    'Access-Control-Allow-Origin' => '*'
  ));
  $this->response->type('json');
  echo json_encode($response); 
?>