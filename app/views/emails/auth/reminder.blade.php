<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Resetare parola</h2>

		<div>
			Apasa pe linkul urmator pentru a reseta parola:<br />
			{{ URL::to('password/reset', array($token)) }}.<br /><br />
			
			Daca nu ai facut tu cererea de resetare parola, poti ignora acest email - linkul expira in {{ Config::get('auth.reminder.expire', 60) }} minute.
		</div>
	</body>
</html>
