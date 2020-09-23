<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>


    <?php




    /**
     * Add student form isseting
     */

    if ( isset($_POST['add']) ){
        //Get Value
        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $email = $_POST['email'];
        $cell = $_POST['cell'];
        $username = $_POST['uname'];
        $age = $_POST['age'];

        $cell_len = strlen($cell);


        /**
         * File management
         */
        echo $file_name = $_FILES['photo']['name'];
        echo $file_type = $_FILES['photo']['type'];
        echo $file_tmp = $_FILES['photo']['tmp_name'];
        echo $file_size = $_FILES['photo']['size'];

        $unique_file_name =  md5( time() . rand()) . $file_name;

        move_uploaded_file($file_tmp, 'Photo/' . $unique_file_name );




        /**
         * Form validation
         */

        if ( empty($name) || empty($roll) || empty($email) || empty($cell) || empty($username) || empty($age)  ){
            $msg = '<p class="alert alert-danger"> All fields are required !<button class="close" data-dismiss="alert">&times;</button></p>';
        }elseif ( filter_var($roll, FILTER_VALIDATE_INT ) == false ){
            $msg = '<p class="alert alert-danger"> Invalid roll number !<button class="close" data-dismiss="alert">&times;</button></p>';
        }elseif ( filter_var($email, FILTER_VALIDATE_EMAIL ) == false ){
            $msg = '<p class="alert alert-danger"> Invalid email !<button class="close" data-dismiss="alert">&times;</button></p>';
        }elseif ( $cell_len != 11 ){
            $msg = '<p class="alert alert-danger"> Incorrect cell number !<button class="close" data-dismiss="alert">&times;</button></p>';
        }elseif ( $age < 18 || $age > 30 ){
            $msg = '<p class="alert alert-danger"> You are not allowed !<button class="close" data-dismiss="alert">&times;</button></p>';
        }else {
            $msg = '<p class="alert alert-success"> Data stable !<button class="close" data-dismiss="alert">&times;</button></p>';
        }
    }



    ?>
	
	

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Add student</h2>
                <?php

                if ( isset($msg) ){
                    echo $msg ;
                }

                ?>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
                    <div class="form-group">
                        <label for="">Roll</label>
                        <input name="roll" class="form-control" type="text">
                    </div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text">
					</div>
                    <div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control" type="text">
					</div>
                    <div class="form-group">
						<label for="">Photo</label>
						<input name="photo" class="form-control" type="file">
					</div>
					<div class="form-group">
						<input name="add" class="btn btn-primary" type="submit" value="Add new student">
					</div>
				</form>
			</div>
		</div>
	</div>


    <br>
    <br>
    <br>















	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>