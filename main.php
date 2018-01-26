<HTML>
   <?php
      $con=new mysqli("localhost","+++","+++","alarm");
      if(!$con){ die ("Database Connect failed"); }
      $sql="select * from alarm where ts < now() order by ts asc";
      $result = $con -> query($sql);
      $row = $result->fetch_assoc();
      if ($row["id"]) {
      include 'TV_on.php';
      include 'Musik_on.php';
      
        $sql="delete from alarm where id=".$row["id"];
        $con -> query($sql);
        $sts=time();
      }
      
      $con->close();
      ?>
</HTML>

