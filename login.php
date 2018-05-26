<?php




function provjera($username, $password) {
	

	$xml=simplexml_load_file("users.xml");
	
	
	foreach ($xml->user as $usr) {
  	 	$usrname = $usr->username;
		$usrpw = $usr->password;
		if($usrname==$username){
			if($usrpw == $password){
				echo "Trenutno prijavljeni korisnik je: $usrname";
				return;
				}
			else{
				echo "Neispravna lozinka";
				return;
				}
			}
		}
		
	echo "Korisnik ne postoji u bazi.";
	return;
}
?>

<html>
<head>
	<title>XML Prijava</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	

</head>
<body>
<div class="text-center">
	<header>
		<img src="tvzlogo.svg" alt=""/>
	</header>
	<form action="" method="post">
		<label>&nbsp&nbspKorisničko ime: </label>
		
		<input id="name" name="username" type="text">  <br/>
		
		<label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLozinka: </label>
		
		<input id="password" name="password" placeholder="**********" type="password"><br/>
		&nbsp&nbsp&nbsp<input name="submit" type="submit" value="Prijavi se"><br/>
		<?php		$username="";
					$password="";
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				

				if (empty($_POST["username"]))  {
						echo "Korisničko ime nije uneseno.";
					
						}
				else if (empty($_POST["password"]))  {
						echo "Lozinka nije unesena.";
					
						}
				else {
					$username= $_POST["username"];
					$password= $_POST["password"];
				
					provjera($username,$password);
				}
			}
			?>
	</form>
</div>
</body>
</html>
