<?php
//require '../conf/configFile.php';

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
  <link rel="stylesheet" type="text/css" href="../css/Forms.css">

</head>
<body>
	<form action="<?php  require '../conf/configFile.php'; echo USER_MANAGER; ?>" method="post">
			    <label for="email">Email</label>		
		<input type="text" placeholder="Username" name="email" value="*" required="required">
		
				    <label for="password">Password</label>			
		<input	type="password" placeholder="password" name="password" value="password" >		
				    <label for="password2">Repetir password</label>		
		<input	type="password" placeholder="password2" name="password2">		
		<input	type="submit">		
	</form>

</body>
</html>