<?php
echo exec('echo "standby 0" | cec-client -s -d 1');
header('Location: /index.php?success=true');  
?>