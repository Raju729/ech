<?php
$session = $this->request->session();
$info = $session->read('Auth.Info');
$user = $session->read('Auth.User');

echo '<pre>';
print_r($info->uid);
echo '</pre>';
