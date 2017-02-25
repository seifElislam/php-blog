<?php
    session_start();
    $errors=array();
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
            
        }
    }
    if(isset($_SESSION['fname'])){
         if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!isset($_POST['skill'])){
                array_push($errors, which('skill'));
            }
            if(!isset($_POST['gender'])){
                array_push($errors, which('gender'));
            }
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
                print_r($errors);
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
            if(!isset($_POST['skill'])){
                array_push($errors, which('skill'));
            }
            if(!isset($_POST['gender'])){
                array_push($errors, which('gender'));
            }
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
                $lang= implode(',', $_POST['skill']);
                echo'sucess';
                $dsn = "mysql:host=localhost;dbname=blog";
                $db = new PDO($dsn, 'root', 'root');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = 'INSERT INTO user (id, fname, lname, adress, country, gender, skill, usrname, passwd, email, type) VALUES (:id, :fname, :lname, :adress, :country, :gender, :skill, :usrname, :passwd, :email, :type)';
                $prep = $db->prepare($query);
                $prep->execute([':usrname' => $_POST['usrname'],'id'=>1,':fname'=>$_POST['fname'],':lname'=>$_POST['lname'],':adress'=>$_POST['adress'],':country'=>$_POST['country'],':gender'=>$_POST['gender'],':passwd'=>$_POST['passwd'],':email'=>$_POST['email'],':type'=>0,':skill'=>$lang]);
            }
        }
        else {
            echo'new';
       }
   }
    
?>

<head>
	<meta charset="UTF-8">
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="css/view.css">
        <style>
            a.link{
                text-decoration: none; font-size: medium;font-weight: bold;color: grey;padding: 10px;
                
            }
            div.link_countainer{
                padding: 0; height: 50px;background-color: lightgray;margin-top: -8px;
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
                <form id="form_1085147" class="appnitro"  method="post" action="registration.php" onsubmit="">
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
                                <li id="li_1" >
					<label class="description" for="element_1">First Name</label>
					<div>
						<input id="element_1" name="fname" class="element text large" type="text" maxlength="255" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'] ;}else{echo '';} ;?>"/>
					</div>
				</li>
                               
				<li id="li_2" >
					<label class="description" for="element_2">Last Name</label>
					<div>
						<input id="element_2" name="lname" class="element text large" type="text" maxlength="255" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'] ;}else{echo '';} ;?>"/>
					</div>
				</li>
				<li id="li_3" >
					<label class="description" for="element_3">Email</label>
					<div>
						<input id="element_3" name="email" class="element text large" type="text" maxlength="255" value="<?php if(isset($_POST['email'])){echo $_POST['email'] ;}else{echo '';} ;?>"/>
					</div>
				</li>
				<li id="li_4" >
					<label class="description" for="element_4">Gender </label>
					<span>
                                                <input id="element_4_1" name="gender" class="element radio" type="radio" value="Male" <?php if(isset($_POST['gender'])){if(($_POST['gender']=="Male")){echo "checked";}} ;?>/>
						<label class="choice" for="element_4_1">Male</label>
                                                <input id="element_4_2" name="gender" class="element radio" type="radio" value="Female" <?php if(isset($_POST['gender'])){if(($_POST['gender']=="Female")){echo "checked";}} ;?>/>
						<label class="choice" for="element_4_2">Female</label>
					</span>
				</li>
                                <li id="li_6" >
					<label class="description" for="element_6">Country </label>
					<div>
						<select class="element select medium" id="element_6" name="country">
                                                        <option value="">Select one</option>
                                                        <option value="Egypt" <?php if($_SERVER['REQUEST_METHOD'] === 'POST'){if( $_POST['country']=="Egypt"){echo "selected";}} ;?> >Egypt</option>
							<option value="USA" <?php if($_SERVER['REQUEST_METHOD'] === 'POST'){if( $_POST['country']=="USA"){echo "selected";}};?>  >USA</option>
							<option value="England" <?php if($_SERVER['REQUEST_METHOD'] === 'POST'){if( $_POST['country']=="England"){echo "selected";}} ;?>  >England</option>
                                                        <option value="Spain" <?php if($_SERVER['REQUEST_METHOD'] === 'POST'){if( $_POST['country']=="Spain"){echo "selected";}} ;?>  >Spain</option>
						</select>
					</div>
				</li>
                                <li id="li_6" >
					<label class="description" for="element_6">Adress</label>
					<div>
                                            <textarea style="width:100%"  name="adress" ><?php if(isset($_POST['adress'])){echo $_POST['adress'] ;}else{echo '';} ;?></textarea>
					</div>
				</li>
				<li id="li_5" >
					<label class="description" for="element_5">Skills</label>
					<span>
                                            <input id="element_5_1" name="skill[]" class="element checkbox" type="checkbox" value="PHP" <?php if(isset($_POST['skill'])){    foreach ($_POST['skill'] as $value) { if($value=="PHP"){echo "checked";} } ;} ;?>/>
						<label class="choice" for="element_5_1">PHP</label>
						<input id="element_5_2" name="skill[]" class="element checkbox" type="checkbox" value="Java" <?php if(isset($_POST['skill'])){    foreach ($_POST['skill'] as $value) { if($value=="Java"){echo "checked";} } ;} ;?>/>
						<label class="choice" for="element_5_2">Java</label>
						<input id="element_5_3" name="skill[]" class="element checkbox" type="checkbox" value="Python" <?php if(isset($_POST['skill'])){    foreach ($_POST['skill'] as $value) { if($value=="Python"){echo "checked";} } ;} ;?>/>
						<label class="choice" for="element_5_3">Python</label>
						<input id="element_5_4" name="skill[]" class="element checkbox" type="checkbox" value="Ruby" <?php if(isset($_POST['skill'])){    foreach ($_POST['skill'] as $value) { if($value=="Ruby"){echo "checked";} } ;} ;?>/>
						<label class="choice" for="element_5_4">Ruby</label>
						<input id="element_5_5" name="skill[]" class="element checkbox" type="checkbox" value="MySql" <?php if(isset($_POST['skill'])){    foreach ($_POST['skill'] as $value) { if($value=="MySql"){echo "checked";} } ;} ;?>/>
						<label class="choice" for="element_5_5">MySql</label>
					</span>
				</li>
				
				
				<li class="buttons">
			    	<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
			    	<input id="resetForm" class="button_text" type="reset" name="reset" value="Reset" />
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
