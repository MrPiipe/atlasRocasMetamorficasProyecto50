function getCredential(user, pass) {
	$.ajax({
		type: 'post',
		url: 'scripts/credentials_getter_controller.php',
		data: { user: user, pass: pass },
		success: function(data) {
			localStorage.username = user;
			localStorage.cookie = data;
			localStorage.lastname = '';
			localStorage.typeuser = 'USER';
			location.reload();
		},
		error: function() {
			alert('Usuario y/o Contraseña erronea');
		}
	});
}

function openPage() {
	user = document.getElementById('user').value;
	pass = document.getElementById('pass').value;
	getCredential(user, pass);
}
