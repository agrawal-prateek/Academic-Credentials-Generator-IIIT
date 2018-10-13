<?php
$jsonString = file_get_contents('totaldegrees.json');
$data = json_decode($jsonString);
for ($i=0;$i<sizeof($data);$i++){
    $data[$i]->degrees = 0;
}
file_put_contents('totaldegrees.json', json_encode($data));
?>
<script type="text/javascript">
    window.location.href = '/';
</script>

