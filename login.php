<?php
    session_start();
    
    $errors=[];
    function which($data){
        switch ($data) {
            case 'fname':
                return 'First Name is required';
            break;
            case 'lname':
                return 'Last Name is required';
            break;
            case 'adress':
                return 'Adress is required';
            break;
            case 'passwd':
                return 'Password is required';
            break;
            case 'country':
                return 'Select a country';
            break;
            case 'usrname':
                return 'UserName is required';
            break;
            case 'skill':
                return 'Select one skill at least';
            break;
            case 'gender':
                return 'Select gender';
            break;
            case 'email':
                return 'Email is required';
            break;
            case 'login':
                return 'Invalid userName or password... ';
            break;
            
        }
    }
    if(isset($_SESSION['fname'])){
         if ($_SERVER['REQUEST_METHOD'] === 'POST'){
//            if(!isset($_POST['skill'])){
//                array_push($errors, which('skill'));
//            }
//            if(!isset($_POST['gender'])){
//                array_push($errors, which('gender'));
//            }
            foreach ($_POST as $key => $value) {
                 
                if(empty($_POST[$key])){
                   echo'--error--';
                   echo $key;
                   echo'-->';
                   echo $_POST[$key];
                   array_push($errors, which($key));
                   
                }
            }
            
            if(count($errors)>0){
                echo 'error';
                //print_r($errors);
            }
            else{
                echo'sucess';
            }
        }
        else {
            echo'editing';
       }

    }
    else {
         
         
         //print_r($_POST);
         //print_r($_POST['skill']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['keep'])){
                echo "he want to keep";
            }
//            if(!isset($_POST['gender'])){
//                array_push($errors, which('gender'));
//            }
            foreach ($_POST as $key => $value) {
                 
                if(empty($_POST[$key])){
                   echo'--error--';
                   echo $key;
                   echo'-->';
                   echo $_POST[$key];
                   array_push($errors, which($key));
                   
                }
            }
            
            if(count($errors)>0){
                echo 'error';
                //print_r($errors);
            }
            else{
                
//                $lang= implode(',', $_POST['skill']);
                echo'sucess';
                $dsn = "mysql:host=localhost;dbname=blog";
                $db = new PDO($dsn, 'root', 'root');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = 'SELECT * FROM user WHERE usrname=:usrname and passwd=:passwd';
                $prep = $db->prepare($query);
                $prep->execute([':usrname' => $_POST['usrname'],':passwd'=>$_POST['passwd']]);
                $result = $prep->fetchAll();
                
                print_r($result);
                if(count($result)>0){
                echo 'usr found';
                //print_r($errors);
                }
                else{ echo 'usr not found';};
                array_push($errors, which('login'));
            }
        }
        else {
            echo'new';
       }
   }
    
?>

<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/view.css">
        <style>
            a.link{
                text-decoration: none; font-size: medium;font-weight: bold;color: grey;padding: 10px;
                
            }
            div.link_countainer{
                padding: 0; height: 50px;background-color: lightgray;margin-top: -8px;
            }
            .appnitro li{
                width: 70%;
            }
        </style>

</head>
<body id="main_body" >
    <div class="link_countainer" style="">
        <a class="link" href="url" style="float: left;">Home</a>
        <a class="link" href="url" style="float: left;">Profile</a>
        <a class="link" href="url" style="float: right;">Admin</a>
        <a class="link" href="url" style="float: right;">Login</a>
        <a class="link" href="url" style="float: right;">Sign up</a>
        </div>
	<img id="top" src="img/top.png" alt="">
	<div id="form_container">

		<h1>Registration Form</h1>
                <form id="form_1085147" style="padding-left: 20%;" class="appnitro"  method="post" action="login.php" onsubmit="">
			<ul >
                                <li id="e" class="errors" >
                                    <ul id='error-messages' >
                                        <?php foreach ($errors as $value) {?>
                                            <li><?php echo $value; ?> </li>
                                       <?php }?>
                                    </ul>
				</li>
				<li id="li_1" >
					<label class="description" for="element_1">User Name </label>
					<div>
                                            <input id="element_1" name="usrname" class="element text large" type="text" maxlength="255" value="<?php if(isset($_POST['usrname'])){echo $_POST['usrname'] ;}else{echo '';} ;?>"/>
					</div>
				</li>
                                <li id="li_3" >
					<label class="description" for="element_3">Password </label>
					<div>
                                            <input id="element_3" name="passwd" class="element text large" type="password" maxlength="255" value=""/>
					</div>
				</li>
                               
				
				<li class="buttons">
			    	<input id="saveForm" class="button_text" type="submit" name="submit" value="Login" />
			    	
                                <a href="registration.php"><button type="button" style="font-size: 14px;" class="button_text">Sign up</button></a>
                                <label> Keep me <input type="checkbox" name="keep" value="1" /></label>
				</li>
			</ul>
		</form>
		<div id="footer">
		</div>
	</div>
	<img id="bottom" src="img/bottom.png" alt="">
	<script src="js/form.js"></script>
	</body>
</html>
