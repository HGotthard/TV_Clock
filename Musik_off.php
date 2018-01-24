<?php
echo exec('echo p > /var/run/omxctl');
header('Location: /index.php?success=true');  
?>