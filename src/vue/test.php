<?php

$var=$this->var;

print_r($var);
$pass=$var[0];
$user=$var[1];
?>



<div id="test">



</div>


<script>
    var pass='<?php echo $pass ?>';
    var user='<?php echo $user?>';

</script>