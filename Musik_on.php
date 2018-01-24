<?php
echo exec('echo u > /var/run/omxctl');
echo exec('echo p > /var/run/omxctl');
echo exec('echo h > /var/run/omxctl');

header('Location: /index.php?success=true');
?>