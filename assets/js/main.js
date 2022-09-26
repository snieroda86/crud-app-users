const addUserForm = document.getElementById('add-user-form'); 
const updateUserForm = document.getElementById('update-user-form'); 
const addUserModal = new bootstrap.Modal(document.getElementById('addUserModal'));
const updateUserModal = new bootstrap.Modal(document.getElementById('updateUserModal'));
const usersTable = document.querySelector('#users-list-tbl tbody');

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
		fetchAllUsers();
	}
});

// Fetch all users via AJAX
const fetchAllUsers = async function(){
	const data = await fetch("action.php?read=1" , {
		method: "get"
	});

	const response = await data.text();
	usersTable.innerHTML=response;

}

fetchAllUsers();

// Edit user AJAX request
const usersTableBody = document.querySelector('#users-list-tbl tbody');
usersTableBody.addEventListener('click' , (e)=> {
	if(e.target && e.target.matches('a.user-edit-link')){
		e.preventDefault();
		let id = e.target.getAttribute('id');
		editUser(id);
	}
});

const editUser = async (id)=> {
	const data = await fetch(`action.php?edit=1&id=${id}` , {
		method : "GET" ,
	});
	const response = await data.json();
	document.getElementById('user_id').value = response.id;
	document.getElementById('fname').value = response.first_name;
	document.getElementById('lname').value = response.last_name;
	document.getElementById('email').value = response.email;
	document.getElementById('phone').value = response.phone;
}

// Update user AJAX request
updateUserForm.addEventListener("submit" , async (e)=>{
	e.preventDefault();
	const formData = new FormData(updateUserForm);
	formData.append('update' , 1);
	
	if(updateUserForm.checkValidity()===false){
		e.preventDefault();
		e.stopPropagation();
		updateUserForm.classList.add("was-validated");
		return false;
	}else{
		document.getElementById('update-user-btn').value="Please wait...";
		const data = await fetch('action.php' , {
			method : "POST" ,
			body: formData
		});
		const response = await data.text();
		
		document.getElementById('show-alert').innerHTML = response;
		document.getElementById('update-user-btn').value="Update user";
		updateUserForm.reset();
		updateUserForm.classList.remove("was-validated");
		updateUserModal.hide();
		fetchAllUsers();
	}
});