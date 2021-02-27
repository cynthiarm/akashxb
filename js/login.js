
$(function () {
	"use strict";

	/* ================================================
		Hide Preloader on Click
	   ================================================ */

	$(".preloder").on("click", function () {
		$(this).fadeOut();
	});

	function initFirebase() {
		console.log(firebase);
		var firebaseConfig = {
			apiKey: "AIzaSyD-4pGp36TZmYJj3ffdwAzWSbSWs6BUkLc",
			authDomain: "login-project-5e06a.firebaseapp.com",
			projectId: "login-project-5e06a",
			storageBucket: "login-project-5e06a.appspot.com",
			messagingSenderId: "425167911887",
			appId: "1:425167911887:web:10eb2ac6b46660c4d170ba",
			measurementId: "G-90FB14NPZE",
		};

		firebase.initializeApp(firebaseConfig);

		var loginbtn = document.getElementById("login-btn");
		loginbtn.onclick = login;
	}

	function login() {
		var email = document.getElementById("login-email");
		var pass = document.getElementById("login-password");

		if (email.value && pass.value) {
			console.log("login");
			firebase
				.auth()
				.signInWithEmailAndPassword(email.value, pass.value)
				.then((user) => {
					// Signed in
					console.log(user);
					localStorage.setItem("e", email.value);
					localStorage.setItem("c", pass.value);
					window.location.replace("index.html");
					// ...
				})
				.catch((error) => {
					alert("Wrong Credentials")
					var errorCode = error.code;
					var errorMessage = error.message;
				});
		}
	}

	initFirebase();


	function loginFirebase() {
		// Initialize Firebase
		
		var e = localStorage.getItem('e');
		var c = localStorage.getItem('c');

		console.log(e);

		if (e) {
			
			
		} else {
			window.location.replace('./login.html');
		}


	}
});