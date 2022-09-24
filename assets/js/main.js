const addUserForm = document.getElementById('add-user-form');
const addUserModal = new bootstrap.Modal(document.getElementById('addUserModal'));

// New user ajax request
addUserForm.addEventListener("submit" , async (e)=>{
	e.preventDefault();
	const formData = new FormData(addUserForm);
	formData.append('add' , 1);
	
	if(addUserForm.checkValidity()===false){
		e.preventDefault();
		e.stopPropagation();
		addUserForm.classList.add("was-validated");
		return false;
	}else{
		document.getElementById('add-user-btn').value="Please wait...";
		const data = await fetch('action.php' , {
			method : "POST" ,
			body: formData
		});
		const response = await data.text();
		document.getElementById('show-alert').innerHTML = response;
		document.getElementById('add-user-btn').value="Add user";
		addUserForm.reset();
		addUserForm.classList.remove("was-validated");
		addUserModal.hide();
	}
});
