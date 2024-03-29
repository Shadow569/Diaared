<?php
session_start();
if(!isset($_SESSION['session_id'])){
	header("location: login.php");
	exit();
}
else{
	echo "<div style='display:none' id='session_id'>".$_SESSION['session_id']."</div>";
	echo "<div style='display:none' id='uid'>".$_SESSION['uid']."</div>";
	echo "<div style='display:none' id='did'>".$_SESSION['diary_id']."</div>";
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>My diarrhea</title>
		<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/main.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				// $(".action_completed").hide();
				// $("#retrieve_entry").hide();
				// $(".new_entry_back").hide();
				// $(".delete_post_back").hide();
				$.ajax({
					method:"POST",
					url:"retrieve.php",
					data:{user_id:$("#uid").text()},
					success:function(data){
						$(".entry").remove();
						var parsed = $.parseJSON(data);
						if(parsed.length > 0){
							$("#no_entry").hide();
							parsed.forEach(function(entry){
								$(".entries").append("<div class='entry'><div class='id'>"+entry['id']+"</div><div class='entry_title'>"+entry['entry_title']+"</div><div class='creation_date'>"+entry['creation_date']+"</div></div>");
							});
						}
						else{
							$("#no_entry").show();
						}
					}
				});
				$.ajax({
					method:"POST",
					url:"title.php",
					data:{diary_id:$("#did").text()},
					success:function(data){
						$parsed = $.parseJSON(data);
						$title = $parsed['title'];
						$color = $parsed['color'];
						$(".title").css('background',$color);
						$(".new").css('background',$color);
						$("title").text($title);
						$(".title").text($title);
					}
				});
				$("#new").on("click",function(){
					$(".new_entry_back").show();
					$(".new_entry_modal").hide();
					$(".new_entry_modal").slideDown(500);
				});
				$("#cancel").on("click",function(){
					$(".new_entry_modal").slideUp(500,function(){
						$(".new_entry_back").hide();
						$(".input").val("");
					});
				});
				$("#ent").on("click",".entry",function(){
					var id = $(this).find(".id").text();
					$.ajax({
						method:"POST",
						url:"get_full_post.php",
						data:{identifier:id},
						success:function(data){
							try{
								var decoded = $.parseJSON(data);
							}
							catch(exception){
								alert(data);
							}
							$(".read_title").text(decoded["entry_title"]);
							if($(".date-contain")[0]){
								$(".date-contain").html("<div class='date-contain'><div class='split-line-left'></div><div class='date_entry'>"+decoded['creation_date']+" at "+decoded['creation_time']+"</div><div class='split-line-right'></div></div>");
							}
							else{
								$(".body_outer").prepend("<div class='date-contain'><div class='split-line-left'></div><div class='date_entry'>"+decoded['creation_date']+" at "+decoded['creation_time']+"</div><div class='split-line-right'></div></div>");
							}
							$(".body").html(decoded["entry_body"]);
							$("#viewing").text(id);
							$("#retrieve_entry").show();
							$(".read_entry_modal").hide();
							$(".read_entry_modal").slideDown(500);
						}
					});
				});
				$("#del").on("click",function(){
					var id = $("#viewing").text();
					$(".delete_post_back").show();
					$(".delete_post_modal").hide();
					$(".delete_post_modal").slideDown(500);
					$("#sure").text(id);
				});
				$("#no").on("click",function(){
					$(".delete_post_modal").slideUp(500,function(){
						$(".delete_post_back").hide();
					});
				});
				$("#yes").on("click",function(){
					var id = $("#sure").text();
					$.ajax({
						method:'POST',
						url:'delete.php',
						data:{identifier:id},
						success:function(data){
							var decode = $.parseJSON(data);
							if(decode == 'success'){
								$(".action_completed").show();
								$(".statement").hide();
								$(".statement").text("✔Post deleted successfully");
								$(".statement").fadeIn(2000,function(){
									$(".statement").fadeOut(2000,function(){
										$(".action_completed").hide();
										$(".delete_post_modal").slideUp(500,function(){
											$(".delete_post_back").hide();
											$(".read_entry_modal").slideUp(500,function(){
												$("#retrieve_entry").hide();
											});
										});
									});
								});
								$.ajax({
									method:"POST",
									url:"retrieve.php",
									data:{user_id:$("#uid").text()},
									success:function(data){
										$(".entry").remove();
										var parsed = $.parseJSON(data);
										if(parsed.length > 0){
											$("#no_entry").hide();
											parsed.forEach(function(entry){
												$(".entries").append("<div class='entry'><div class='id'>"+entry['id']+"</div><div class='entry_title'>"+entry['entry_title']+"</div><div class='creation_date'>"+entry['creation_date']+"</div></div>");
											});
										}
										else{
											$("#no_entry").show();
										}
									}
								});
							}
						}
					});
				});
				$("#close").on("click",function(){
					$(".read_entry_modal").slideUp(500,function(){
						$("#retrieve_entry").hide();
					});
				});
				$("#logout").on("click",function(){
					window.location.href="logout.php";
					return false;
				});
				$("#save").on("click",function(){
					var title = $("#title").val();
					var body = $("#body").val();
					$.ajax({
						method:"POST",
						url:"save.php",
						data:{diary_id:$("#did").text(), name:title, content:body},
						success:function(data){
							var decoded = $.parseJSON(data);	
							if(decoded["status"] == "success"){
								$(".action_completed").show();
								$(".statement").hide();
								$(".statement").text("✔Post saved successfully");
								$(".statement").fadeIn(2000,function(){
									$(".statement").fadeOut(2000,function(){
										$(".action_completed").hide();
										$(".delete_post_modal").slideUp(500,function(){
											$(".delete_post_back").hide();
											$(".new_entry_modal").slideUp(500,function(){
												$(".new_entry_back").hide();
												$(".input").val("");
											});
										});
									});
								});
								$("#title").text("");
								$("#body").text("");
								$.ajax({
									method:"POST",
									url:"retrieve.php",
									data:{user_id:$("#uid").text()},
									success:function(data){
										$(".entry").remove();
										var parsed = $.parseJSON(data);
										if(parsed.length > 0){
											$("#no_entry").hide();
											parsed.forEach(function(entry){
												$(".entries").append("<div class='entry'><div class='id'>"+entry['id']+"</div><div class='entry_title'>"+entry['entry_title']+"</div><div class='creation_date'>"+entry['creation_date']+"</div></div>");
											});
										}
										else{
											$("#no_entry").show();
										}
									}
								});
							}
							else if(decoded["status"] == "fail"){
								$(".action_completed").show();
								$(".statement").hide();
								$(".statement").text("❌some error occured and the post was not saved");
								var prevColor = $(".statement").css("color");
								$(".statement").css("color","red");
								$(".statement").fadeIn(2000,function(){
									$(".statement").fadeOut(2000,function(){
										$(".action_completed").hide();
										$(".statement").css("color",prevColor);
									});
								});
							}
						}
					});
				});
			});
		</script>
	</head>
	<body>
		<div class='action_completed'>
			<div class='statement'>Operation Completed Successfully</div>
		</div>
		<div class='delete_post_back'>
			<div class='delete_post_modal'>
				<div class='delete_title'>Delete this Post?</div>
				<div class='body'>
					If you click Yes you are going to delete this post. Are you sure?
				</div>
				<div class='id' id='sure'></div>
				<div class='modal_footer'>
					<button class ='delete' id='yes'>Confirm</button>
					<button class='close' id='no'>Cancel</button>
				</div>
			</div>
		</div>
		<div class='new_entry_back'>
			<div class='new_entry_modal'>
				<div class='modal_title'>Create New</div>
				<div class='input_contain'>
					<div class='input_row'>
						<div class='input_cont'>
							<input class='input' type='text' id='title' name='title' size='55' maxlength='100' autocomplete='off' placeholder='enter a title for your diary entry' />
						</div>
					</div>
					<div class='input_row'>
						<div class='input_cont'><pre><textarea class='input' id='body' cols='60' rows='10' placeholder='type your post here...'></textarea></pre></div>
					</div>
				</div>
				<div class='modal_footer'>
					<button id='cancel'>Cancel</button>
					<button id='save'>Save</button>
				</div>
			</div>
		</div>
		<div id='retrieve_entry'>
			<div class='read_entry_modal'>
				<div class='read_title'></div>
				<div class='body_outer'>
					<div class='body'>	
					</div>
				</div>
				<div class='id' id='viewing'></div>
				<div class='modal_footer'>
					<button class='close' id='close'>Close</button>
					<button class='delete' id='del'>Delete</button>
				</div>
			</div>
		</div>
		<div class='dry_contain'>
			<div class='title'>My Dirty Diary!</div>
			<div class='entries' id='ent'>
				<div id="no_entry">No Poop for the moment</div>
			</div>
			<div class='dry_footer'>
				<button class='new' id='new'>+</button>
				<button class='logout' id='logout'>🚪➡</button>
			</div>
		</div>
	</body>
</html>