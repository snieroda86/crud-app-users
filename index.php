
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD App Users</title>
  </head>
  <body>
  	<!-- Add nrew user modal start -->
  	<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add new user</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	       <form id="add-user-form" class="p-2" novalidate>
	       	 <div class="mb-3">
	       	 	<div class="row mb-3 gx-2">
	       	 		<!-- First name -->
	       	 		<div class="col-6">
	       	 			<input type="text" name="fname" class="form-control form-control-lg" placeholder="First name" required>
	       	 			<div class="invalid-feedback">
	       	 				First name is required
	       	 			</div>
	       	 		</div>
	       	 		<!-- Last name -->
	       	 		<div class="col-6">
	       	 			<input type="text"  name="lname" class="form-control form-control-lg" placeholder="Last name" required>
	       	 			<div class="invalid-feedback">
	       	 			 Last name is required
	       	 			</div>
	       	 		</div>
	       	 	</div>
	       	 	<!-- Email -->
	       	 	<div class="mb-3">
	       	 		<input type="email"  name="email" class="form-control form-control-lg" placeholder="Enter email" required>
       	 			<div class="invalid-feedback">
       	 			 Email is required
       	 			</div>
	       	 	</div>
	       	 	<!-- Phone -->
	       	 	<div class="mb-3">
	       	 		<input type="tel" name="phone" class="form-control form-control-lg" placeholder="Phone number" required>
       	 			<div class="invalid-feedback">
       	 			 Phone is required
       	 			</div>
	       	 	</div>
	       	 	<!-- Submit button -->
	       	 	<div class="mb-3">
	       	 		<input type="submit" id="add-user-btn" value="Add user" class="btn btn-primary btn-lg">
	       	 	</div>
	       	 </div>
	       </form>
	      </div>
	    </div>
	  </div>
	</div>
  	<!-- Add new user modal end -->

  	<!-- Update user modal start -->
  	<div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="updateModalLabel">Update user</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	       <form id="update-user-form" class="p-2" novalidate>
	       	<input type="hidden" name="user_id" id="user_id" value="">
	       	 <div class="mb-3">
	       	 	<div class="row mb-3 gx-2">
	       	 		<!-- First name -->
	       	 		<div class="col-6">
	       	 			<input type="text" id="fname" name="fname" class="form-control form-control-lg" placeholder="First name" required>
	       	 			<div class="invalid-feedback">
	       	 				First name is required
	       	 			</div>
	       	 		</div>
	       	 		<!-- Last name -->
	       	 		<div class="col-6">
	       	 			<input type="text" id="lname" name="lname" class="form-control form-control-lg" placeholder="Last name" required>
	       	 			<div class="invalid-feedback">
	       	 			 Last name is required
	       	 			</div>
	       	 		</div>
	       	 	</div>
	       	 	<!-- Email -->
	       	 	<div class="mb-3">
	       	 		<input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter email" required>
       	 			<div class="invalid-feedback">
       	 			 Email is required
       	 			</div>
	       	 	</div>
	       	 	<!-- Phone -->
	       	 	<div class="mb-3">
	       	 		<input type="tel" id="phone" name="phone" class="form-control form-control-lg" placeholder="Phone number" required>
       	 			<div class="invalid-feedback">
       	 			 Phone is required
       	 			</div>
	       	 	</div>
	       	 	<!-- Submit button -->
	       	 	<div class="mb-3">
	       	 		<input type="submit" id="update-user-btn" value="Update user" class="btn btn-success btn-lg">
	       	 	</div>
	       	 </div>
	       </form>
	      </div>
	    </div>
	  </div>
	</div>
  	<!-- Update user modal end -->

    
    <div class="container">
    	<div class="row">
    		<div class=" pt-3 col-12 d-flex align-items-center justify-content-between">
    			<div>
    				<h4>
    					All users
    				</h4>
    			</div>
    			<div>
    				<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Add user</button>
    			</div>
    		</div>
    	</div>
    	<hr>
    	<!-- Add user message -->
    	<div class="row">
    		<div class="col-12">
    			<div id="show-alert">
    				
    			</div>
    		</div>
    	</div>
    	<!-- Users from database -->
    	<div class="row">
    		<div class="col-12">
    			<table class="table table-dark" id="users-list-tbl">
					  <thead>
					    <tr>
					    	<th>ID</th>
					    	<th>First Name</th>
					    	<th>Last Name</th>
					    	<th>Email</th>
					    	<th>Phone</th>
					    	<th>Action</th>

					    </tr>
					  </thead>
					  <tbody>
					   
					  </tbody>
				</table>
    		</div>
    	</div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="assets/js/main.js"></script>

    
  </body>
</html>