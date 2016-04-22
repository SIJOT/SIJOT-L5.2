<!DOCTYPE html>
<html>
<head>
	<title>Reset wachtwoord.</title>
</head>
<body>
	<p>
		Helaas pindakaas ben u uw wachtwoord kwijt geraakt. Maar geen nood. 
		U kunt <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">klikken</a>
		voor een nieuw wachtwoord.
	</p>

	<hr>
		<p class="small text-muted">
			Deze mail is afkomstig van <a href="http://www.st-joris-turnhout.be">www.st-joristurnhout.be</a> <br>
		</p>
</body>
</html>
