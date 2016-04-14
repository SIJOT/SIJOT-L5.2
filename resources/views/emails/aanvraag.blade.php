<!DOCTYPE html>
<html>
<head>
	<title>Verhuur notificate</title>
</head>
<body>
	<h4>Bevestiging aanvraag.</h4>

	<p>
		Bedabnkt voor uw intresse in ons. Met deze mail heeft u een bevestiging dat uw aanvraag goed is doorgekomen. Indien u deze verhuring niet hebt aangevraagd of de gegevens foutief zijn. 
		Kunt u zich wenden tot 
		<a href="mailto:verhuur@st-joris-turnhout.be">Verhuur@st-joris-turnhout.be</a>
	</p>

		<table>
			<thead>
			</thead>
			<tbody>
				<tr>
					<td> <strong>Start datum:</strong> </td>
					<td> {{ $input['Start_date'] }} </td>
				</tr>
				<tr>
					<td> <strong> Eind datum: </strong></td>
					<td> {{ $input['End_date'] }} </td>
				</tr>
				<tr>
					<td> <strong> Groep: </strong> </td>
					<td> {{ $input['Group'] }} </td>
				</tr>
				<tr>
					<td> <strong> Tel. nummer: </strong> </td>
					<td> {{ $input['telephone'] }} </td>
				</tr>
				<tr>
					<td> <strong> Email: </strong> </td>
					<td> {{ $input['Email'] }} </td>
				</tr>
			</tbody>
		</table>
	<hr>
			<p class="small text-muted">
				Deze mail notificatie is afkomstig van <a href="http://www.st-joris-turnhout.be">www.st-joris-turnhout.be</a> <br>
			</p>
</body>
</html>