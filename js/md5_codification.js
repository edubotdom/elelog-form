//var CryptoJS = require("crypto-js");

function calculateMD5() {
	var password_not_codified = {};
	password_not_codified = document.forms["login-form"].elements["password"].value;
	return CryptoJS.MD5(password_not_codified).toString();
}

function sendMD5(md5_hash) {
	document.forms["login-form"].elements["codified_password"].value = md5_hash;
	document.forms["login-form"].submit();
}