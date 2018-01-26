<HTML>
   <form action="clock.php" method="post">
      <p>Weckzeitpunkt<br>YYYY-MM-DD HH:mm:ss<br>
         <input type="text" name="ts"/>
      </p>
      <p><input type="submit" name="save" value="Speichern" /></p>
   </form>
   <?php
      $con=new mysqli("localhost","pi","4611mysql","alarm");
      if(isset($_POST['save'])) {
        $ts=$_POST['ts'];
      
        if(!$con){ die ("Database Connect failed"); }
        $sql="insert into alarm (ts) values('".$ts."')";
      
        if($con->query($sql)===false){echo $con->error;}
      }
      
      $sql="select * from alarm order by ts asc";
      $result = $con->query($sql);
      echo "<table border=1>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["ts"]."</td></tr>";
      }
      echo "</table>";
      $con->close();
      ?>
</HTML>

