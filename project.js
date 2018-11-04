$(document).ready(function(){
	var apath="http://localhost/rahula/ci_project/index.php/admin/admin/";

	$(".btn-register").click(function(){
		alert(11);
		var form_obj = document.getElementById("register-form");
		alert(form_obj);
		var form_data_obj = new FormData(form_obj);

		alert(form_data_obj);

		$.ajax({

			type: "post",
			data: form_data_obj,
			contentType: false,
			processData: false,
			url : apath + "register_action",
			success: function(res){
				$(".err").html(res)
			}
		})
	}) //.btn-register

	$(".btn-login").click(function(){

		$.ajax({

			type:"post",
			data: $("#login_form").serialize(),
			url : apath + "login_action",
			success: function(res){
				$(".err").html(res)
			}
		})
	}) //.btn-login
})