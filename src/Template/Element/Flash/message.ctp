<?php
$e = "";
if (isset($params['errors'])) {
    $errors = $params['errors'];
    for ($i = 0; $i < count($errors); $i++) {
        $e = $e . '<li>' . $errors[$i] . '</li>';
    }
}
$message = h($message).$e;
?>
<script>
    var status = "<?=$params['status']?>";
    var message = "<?=$message?>";
    FlashStatus(status,message);
</script>