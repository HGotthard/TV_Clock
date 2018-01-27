<HTML>
   <?php
      $con=new mysqli("localhost","+++","+++","alarm");
      if(!$con){ die ("Database Connect failed"); }
      $sql="select * from alarm where ts < now() order by ts asc";
      $result = $con -> query($sql);
      $row = $result->fetch_assoc();
      if ($row["id"]) {
      echo exec('echo "on 0" | cec-client -s -d 1');
      echo exec('echo u > /var/run/omxctl');
      echo exec('echo p > /var/run/omxctl');
      echo exec('echo h > /var/run/omxctl');
      
        $sql="delete from alarm where id=".$row["id"];
        $con -> query($sql);
        $sts=time();
      }
      
      $con->close();
      ?>
</HTML>

