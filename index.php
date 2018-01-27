<html>
<head>
   <title>Wecker Main Page</title>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   <div class="header">
      <div class="clockbox">
         <form action="index.php" method="post">
             
            <p>TV Control:</p>
            <div class="status">
            
            <?php
                $status = exec('echo pow 0 | cec-client -d 1 -s');
                if($status == "power status: standby"){
                    echo '<div class="offline"></div>'.'Status: <span class="offtext">Offline</span>';
                }else{
                   echo '<div class="online"></div>'.'Status: <span class="ontext">Online</span>';
                }    
               
                
            ?>
            </div>
            <input formaction="action.php?action=1" type="submit" value="TV an">
            <input formaction="action.php?action=2" type="submit" value="TV aus">
            <p>Musik Control:</p>
            <input formaction="action.php?action=3" type="submit" value="Musik an">
            <input formaction="action.php?action=4" type="submit" value="Musik aus">
            <p>Weckzeit:</p>
            <input type="text" name="ts" placeholder="DD-MM-YYYY HH:MM:SS">
            <input type="submit" name="save" value="Speichern">
            <input type="submit" name="delete" value="Löschen">
            <input class="deleteall" type="submit" name="deleteall" value="Alle löschen">
         </form>
      </div>
      <div class="timetable">
         <p>Weckzeiten:</p>
         <?php
            $con = new mysqli("localhost", "++", "++++", "alarm");
            if (isset($_POST['save'])) {
                $ts = $_POST['ts'];
                
                if (!$con) {
                    die("Database Connect failed");
                }
                
                $date1 = strtotime(str_replace(".", "-", $ts));
                
                $date2 = date("Y-m-d H:i:s", $date1);
                $now   = time();
                
                if ($date1 > $now) {
                    $sql = "insert into alarm (ts) values('" . $date2 . "')";
                    
                    if ($con->query($sql) === false) {
                        echo $con->error;
                    }
                } else {
                    echo "<p>Zeit ist in der Vergangenheit</p>";
                }
            }

            if (isset($_POST['delete'])) {
                $ts   = $_POST['ts'];
                $date = strtotime(str_replace(".", "-", $ts));
                $date = date("Y.m.d H:i:s", $date);
                
                if (!$con) {
                    die("Database Connect failed");
                }
                
                $sql = "DELETE FROM alarm WHERE ts = '$date'";
                
                if ($con->query($sql) === false) {
                    echo $con->error;
                }
            }
            if (isset($_POST['deleteall'])) {
                if (!$con) {
                    die("Database Connect failed");
                }
                
                $sql = "DELETE FROM alarm";
                
                if ($con->query($sql) === false) {
                    echo $con->error;
                }
            }


            $sql    = "select * from alarm order by ts asc";
            $result = $con->query($sql);
            echo "<table border=1>";
            $i = 0;
            while ($row = $result->fetch_assoc() AND $i < 10) {
                $i     = $i + 1;
                $date  = new DateTime($row["ts"]);
                $datum = $date->format('d.m.Y H:i:s');
                echo "<tr><td>". $datum ."</td></tr>";
            }
            if ($i == 0) {
                echo "<tr><td>empty</td></tr>";
            }
            echo "</table>";
            $con->close();
            ?>
      </div>
   </div>
</body>
</html>

