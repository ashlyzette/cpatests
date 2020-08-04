let password = document.querySelector('#passsword');
let progress = document.querySelector('#pass_strength');
password.addEventListener('keyup', checkPass);

function checkPass() {
	let pass = password.value;
	let strength = 0;
	if (pass.length >= 8 && pass.length <= 12) strength += 10;
	if (pass.length >= 13) strength += 10;
	if (pass.match(/[a-z]+/)) strength += 10;
	if (pass.match(/[A-Z]+/)) strength += 20;
	if (pass.match(/[0-9]+/)) strength += 25;
	if (pass.match(/[$@%#^(-+)&!*]+/)) strength += 25;
	if (pass.length < 8) strength = 10;
	if (strength > 0 && strength <= 25) {
		progress.style.width = `${strength}%`;
		progress.innerText = 'Weak!';
	}
	if (strength >= 26 && strength <= 50) {
		progress.style.width = `${strength}%`;
		progress.innerText = 'Fair!';
	}
	if (strength >= 51 && strength <= 75) {
		progress.style.width = `${strength}%`;
		progress.innerText = 'Strong!';
	}
	if (strength >= 76 && strength <= 100) {
		progress.style.width = `${strength}%`;
		progress.innerText = 'Very Strong!';
	}
}
