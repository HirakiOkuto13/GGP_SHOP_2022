<?php
$query = "
SELECT * FROM contact
ORDER BY id " or die("Error:" . mysqli_error());
$result = mysqli_query($conn, $query);
?>

<div class="col-sm-5 control-label">
   <?php while($row = mysqli_fetch_array($result)) { ?>
   <?php echo "<tr>";?>
    หมายเลข :
    <?php echo "<td>" .$row["id"] .  "</td> ";?>
    </br>
    ชื่อ :
    <?php echo "<td>" .$row["name_help"] .  "</td> ";?>
    </br>
    อีเมล : <?php echo "<a href=\"send_email.php?email=".$row['email_help']."\"\"><div class=\"buttons\">".$row['email_help']."</div> </a>";?>
    หัวข้อ :
    <?php echo "<td>" .$row["sub_help"] .  "</td> ";?>
    </br>
    วันที่ :
    <?php echo "<td>".date('Y/m/d',strtotime($row["send_date"]))."</td> ";?>
    </br>
    </br>
    เนื้อหา :
   </br>
    <?php echo "<td>" .$row["message_help"] .  "</td> ";?>

    <?php } ?>
</div>
   