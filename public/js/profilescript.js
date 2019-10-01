window.onload = function(){
	var email = document.getElementById("UpdateEmail");
	var name = document.getElementById("UpdateName");
	var password = document.getElementById("UpdatePassword");
	email.addEventListener('keyup', function(e){
		if (e.keyCode == 13){
			e.preventDefault();
			document.getElementById('btnUpdateProfile').click();
		}
	});
	name.addEventListener('keyup', function(e){
		if (e.keyCode == 13){
			e.preventDefault();
			document.getElementById('btnUpdateProfile').click();
		}
	});
	password.addEventListener('keyup', function(e){
		if (e.keyCode == 13){
			e.preventDefault();
			document.getElementById('btnUpdateProfile').click();
		}
	});
};

function uploadProfilePicture() {
	document.getElementById("UploadProfilePicture").click();
};

function postUpdateProfile(){
	var email = document.getElementById("UpdateEmail");
	var name = document.getElementById("UpdateName");
	var password = document.getElementById("UpdatePassword");
	var imgfile = document.getElementById("UploadProfilePicture");

	var formData = new FormData();
	var csrf = document.querySelector('meta[name="csrf-token"]').content;
	formData.append(email.name, email.value);
	formData.append(name.name, name.value);
	formData.append(password.name, password.value);
	formData.append('UploadProfilePicture', imgfile.files[0]);
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4){
			if (xhr.responseText != ''){
				alert(xhr.responseText);
			} else {
				location.reload();
			}
		}
	}
	xhr.open('POST', '/doPostUpdateProfile');
	xhr.setRequestHeader('X-CSRF-TOKEN', csrf);
	xhr.send(formData);
	
}