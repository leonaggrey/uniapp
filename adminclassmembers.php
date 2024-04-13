<!DOCTYPE html>
<?php
 session_start(); 
  if (!isset($_SESSION['adminloggedin']))
        {
                 header('Location: index.php');       
          
        } 
   	
?>
	
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="base.css">
	<link rel="stylesheet" href="messagearea.css">
	<link rel="stylesheet" href="department.css">
    <link rel="stylesheet" href="device.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla&family=Lato&display=swap" rel="stylesheet">
    <title>Chat App</title>
	<?php 
	if (isset($_SESSION['dark'])){
	include("theme_settings.php");
} 	
	?>
    <style>
    @media only screen and (min-width: 801px) {
    #popup-link-menu{
    display:none;
    }
    #close-navi{
    display:none;
    }
    }
    </style>
	<SCRIPT>
		function validateForm1(){
		let i=document.concernform.fullname.value;
		if(i==""){
		alert("Full name must be given.");
		return false;
		}
		let j=document.concernform.email.value;
		if(j==""){
		alert("An email is required.");
		return false;
		}
		let a=document.concernform.regno.value;
		if(a==""){
		alert("Provide your registartion number.");
		return false;
		}
		let b=document.concernform.chat_message.value;
		if(b==""){
		alert("Please input your message.");
		return false;
		}
		
		}
		</SCRIPT>
</head>
<body>
    <main>
        <nav id="navi">
		<div id="logo">
				<img src="jkuat.png">
			</div>
            <div id="sidebar">
                <div class="list">
                     <a href="adminhome.php">
                         <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                         </span>Home
                    </a>
                </div>
                <div class="list ">
                    <a href="adminnoticeboard.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>Noticeboard
                   </a>
               </div>
               <div class="list">
                    <a href="admindepartment.php">
                        <span class="icon">
                            <ion-icon name="chatbox-outline"></ion-icon>
                        </span>Chats
                     </a>
               </div>
               
                <div class="list ">
                    <a href="adminsettings.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>        
                        </span>Settings
                    </a>
                </div>
                <div class="list">                
                    <a href="adminsuggestion.php">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>Suggestion Box
                    </a>
                </div>
                <div class="list">       
                    <a href="index.php">
                        <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>Log Out
                    </a>
                </div>
                <button id="close-navi">Close</button>
            </div>
        </nav>
        <section id="chats">
            <div id="respondent">
				<ion-icon name="happy-outline" id="user"></ion-icon>
                <h4 style="color:white"><?php echo $_SESSION['username']?></h4>
				<h1>Class Members</h1>
				
				<button id="popup-link"><a href="adminclassconcern.php" style="text-decoration:none; color:white">Concerns</a></button>
				
            </div>
			
            <div id="noticemessages">
				<div class="chath_link">
					<div class="chat_header">
					<?php
					if(isset($_POST['submit'])) {
						include("class_concern_send.php");
					}?>
						<h1>Class Members</h1>
					</div>
				</div>
				
			<div>	
				<?php
					
						include("classmembers_retrieve.php");
					?>
				
			</div>	
				
				
				
				
				
				
			</div>
        </section>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	
</body>
	
</html>