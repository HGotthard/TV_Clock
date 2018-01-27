<?php
if ($_GET["action"] == "1") {
    echo exec('echo "on 0" | cec-client -s -d 1');
	sleep(10);
    header('Location: /index.php');  	
}
if ($_GET["action"] == "2") {
    echo exec('echo "standby 0" | cec-client -s -d 1');
	sleep(1);
    header('Location: /index.php');  
}
if ($_GET["action"] == "3") {
    echo exec('echo u > /var/run/omxctl');
    echo exec('echo p > /var/run/omxctl');
    echo exec('echo h > /var/run/omxctl');
    header('Location: /index.php');  
}
if ($_GET["action"] == "4") {
    echo exec('echo p > /var/run/omxctl');
    header('Location: /index.php');  
}
?> 