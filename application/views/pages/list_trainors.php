<main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-4">

<script language='javascript'>

$(document).ready(function() {
    $("#checkedAll").change(function() {
        if (this.checked) {
            $(".checkSingle").each(function() {
                this.checked=true;
            });
        } else {
            $(".checkSingle").each(function() {
                this.checked=false;
            });
        }
    });

    $(".checkSingle").click(function () {
        if ($(this).is(":checked")) {
            var isAllChecked = 0;

            $(".checkSingle").each(function() {
                if (!this.checked)
                    isAllChecked = 1;
            });

            if (isAllChecked == 0) {
                $("#checkedAll").prop("checked", true);
            }     
        }
        else {
            $("#checkedAll").prop("checked", false);
        }
    });
});

</script>
<div class="container-fluid">
		<span class="display-4">List of Trainor's</span>
		<?php echo anchor('dashboard_controller/add_trainor', '<i class="fas fa-user"></i> Add Trainor',array("class"=>"btn btn-success float-right")); 
		
		// <input type="submit" class="btn btn-danger mt-1" style="border-radius:0px;" value="Delete Selected" name="delete_student">
		?>

	</div>
	<hr>
<section>

<form name="form" action="<?php echo base_url().'dashboard_controller/delete_all_ment' ?>" method="POST">
	
<table class="table table-borderless text-center table-striped table-hover table-responsive">
	<thead class="bg-dark text-light">
		<tr>
			<td><input type="checkbox" id="checkedAll" name="selectAll"></td>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Email</td>
			<td>Password</td>
			<!--<td>Designation</td>
			<td>City</td>-->
			<td>Edit</td>
			<td>Delete</td>
			
		</tr>
	</thead>
	<tbody>
				<?php 

				foreach ($details as $row) {
					// echo "<td>".$i."</td>";
					echo "<tr>";
					echo "<td><input type='checkbox' value='".$row['id']."' class='checkSingle' name='select[]'></td>";
					echo "<td>".$row['fname']."</td>";
					echo "<td>".$row['lname']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['password']."</td>";
					echo "<td>" . anchor('dashboard_controller/add_trainor?action=edit&edit_id=' . $row['id'], '<i class="fas fa-edit"></i>', array('onclick' => "return confirm('Do you want edit this record?')")) . "</td>";
					echo "<td>" . anchor('dashboard_controller/delete_trainor?id=' . $row['id'], '<i class="fas fa-trash-alt" style="color:red;"></i>', array('onclick' => "return confirm('Do you want delete this record?')")) . "</td>";
					echo "</tr>";
				}

			?>
		</tbody>
</table>
<div class="d-flex flex-row justify-content-between">
<input type="submit" class="btn btn-danger mt-1" value="Delete Selected" style="border-radius:0px;" name="deleteall">
</div>


</section>