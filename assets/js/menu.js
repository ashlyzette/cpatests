let user = document.getElementById('userHeader');
let loginForm = document.getElementById('loginForm');

if (user.innerText) {
	loginForm.classList.add('hideMenu');
	user.classList.remove('showMenu');
} else {
	loginForm.classList.remove('showMenu');
	user.classList.add('hideMenu');
}
