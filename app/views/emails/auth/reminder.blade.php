<!DOCTYPE html>
<html lang="ro">
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>Resetare parolă</h2>

	<div>
		Apasă pe linkul urmator pentru a reseta parola:<br />
		{{ URL::to('password/reset', array($token)) }}.<br /><br />
		
		Dacă nu ai făcut tu cererea de resetare a parolei, poți ignora acest email - linkul expiră în {{ Config::get('auth.reminder.expire', 60) }} minute.
	</div>

	<p>
		--<br>
		O zi bună,<br>
		Echipa <a href="http://opensms.ro" target="_blank" title="SMS Gratis online">OpenSMS</a>
	</p>
</body>
</html>
