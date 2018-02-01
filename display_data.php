<?php
 include "connection.php";
 
 $sql="SELECT* FROM data ";
 
 if(isset($_POST['search'])){
     $search_term = mysql_real_escape_string($_POST['search_box']);
	 $sql .="WHERE name='{$search_term}'";
	 $sql .="or role='{$search_term}'";
	 $sql .="or phone='{$search_term}'";
 }

 
 $query= mysql_query($sql)or die(mysql_error());
 


?>
<div class="topnav">
      <a class="z" href="#home">HOME</a>
      <a class="y" href="#about">EXPLORE</a>
      <a class="x"href="#contact">SCHOOL</a>
      <a class="x"href="#contact">ABOUT US</a>
    </div><br><br><br><br>


<form name="search_form" method="POST" action="display_data.php">
 Name:<input type="text" name="search_box" value=""/>
 Role:<input type="text" name="search_box" value=""/>
 Phone:<input type="text" name="search_box" value=""/>
<input type="submit" name="search" value="Search">
</form>
<table width="70%" cellpadding="5" cellspace="5" > 

 <tr>
      <td><b>ID</b></td>
	  <td><b>NAME</b></td>
	  <td><b>ROLE</b></td>
	  <td><b>PHONE</b></td>
 </tr>
 <?php while($row=mysql_fetch_array($query)){?>
  <tr>
      <td><?php echo $row['id'];?></td>
	  <td><?php echo $row['name'];?></td>
	  <td><?php echo $row['role'];?></td>
	  <td><?php echo $row['phone'];?></td>
 </tr>
 <?php } ?>
</table>