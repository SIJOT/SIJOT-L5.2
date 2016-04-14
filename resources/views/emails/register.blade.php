<!DOCTYPE html>
<html>
	<head>
		<title>Notificatie: registratie</title>
	</head>
	<body>
		<p>Notificatie: registratie</p>

		<p>U kunt inloggen op de <a href="https://www.st-joris-turnhout.be">login</a> pagina.</p>

		<p><strong>Uw volgende gegevens zijn:<strong>

		<table>
			<tbody>
				<tr>
					<td> <strong>Naam:</strong> </td>
					<td> {{$input['name']}} </td>
				</tr>
				<tr>
					<td><strong>Tel nummer:</strong></td>
					<td> {{ $input['gsm']}} </td>
				</tr>
				<tr>
					<td><strong>Email:</strong></td>
					<td>{{ $input['email'] }} </td>>
				</tr>>
				<tr>
					<td><strong>Wachtwoord</strong></td>
					<td> {{ $input['password']}} </td>
				</tr>
			</tbody>
		</table>
	</body>
</html>