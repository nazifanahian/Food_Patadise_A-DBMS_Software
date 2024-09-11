<?php
require('top.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from users where ID='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from users order by ID desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Users </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Name</th>
							   <th>Email</th>
                               <th>Gender</th>
							   <th>Phone Number</th>
							   <th>Join Date</th>
                               <th>Date of Birth</th>
                               <th>Address</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['ID']?></td>
							   <td><?php echo $row['Name']?></td>
							   <td><?php echo $row['Email']?></td>
							   <td><?php echo $row['Phone_Number']?></td>
                               <td><?php echo $row['Gender']?></td>
                               <td><?php echo $row['Join_Date']?></td>
                               <td><?php echo $row['Date_of_Birth']?></td>
							   <td><?php echo $row['Address']?></td>
							   <td>
								<?php
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['ID']."'>Delete</a></span>";
								?>
							   </td>
							</tr>
							<?php
                            $i++; 
                        } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
