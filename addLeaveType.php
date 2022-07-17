<?php

	if(isset($_POST['submit'])){
		
		$leaveType=$_POST['leavetype'];	
		
		$sel="SELECT * FROM leave_type WHERE leave_type='$leaveType'";
		$qurey=mysqli_query($conn,$sel);
		$num=mysqli_num_rows($qurey);
		
		if($num==1){
			
			echo "Leave Type Already Exits";
			
		}else{
			
			$sql="INSERT INTO leave_type(leave_type) Values('$leaveType')";
			$qureyss=mysqli_query($conn,$sql);
			echo "Leave type Added"; 
			
			header("location:leaveTypeManage.php");
			
		}   
	}
	
?>


<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<form action="" method="post" enctype="multipart/form-data" id="myform">
					   
						<div class="row">
							<div class="col-md-12">
							
								<h3 style="margin:10px;">Add Leave Type</h3>
								
							</div>
						</div>
					   <hr>
					   
					   <div class="row">
						   <div class="col-md-3"></div>
						   <div class="col-md-6">
						   
								<input class="form-control" type="text" name="leavetype" id="leavetype" placeholder="Add Leave Type" onkeyup="change(this.id,'errleavetype')" onblur="change(this.id,'errleavetype')">
								<span id="errleavetype"></span>
								
						   </div>
						   
						   <div class="col-md-3">
						   
								<input class="btn btn-primary" type="submit" name="submit" id="" value="Add">
							   
						   </div>				 
					   </div>
						
					</form>
				</div>
			</div>

			<script type="text/JavaScript">

				$("#myform").submit(function(){
					
					var Leavetype= $("#leavetype").val();
					
					
					if(Leavetype==""){
						
						$("#leavetype").attr("style","border: 3px solid red");
						$("#errleavetype").css("color","red");
						$("#errleavetype").html("Please enter your leave type");
						return false;
						
					}else{
						
						$("#leavetype").attr("style","border:");
						$("#errleavetype").html("");
						
					}
					
				});
				
				function change(id,msg,type=null){
					var get=$("#"+id).val();
					
					if(type==null){
						
						if(get==""){
							
							$("#"+id).attr("style","border: 3px solid red");
							$("#"+msg).css("color","red");
							$("#"+msg).html("This field must not be empty!");
							
						}else{
							
							$("#"+id).attr("style","border:");
							$("#"+msg).html("");
							
						}
					
					}
					
				 
				}
				
			</script>
           
           
<?php include("Footer.php");?>