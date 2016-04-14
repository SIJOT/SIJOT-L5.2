<!DOCTYPE html>
<html>
<head>
	<title> Verhuur notificatie</title>
</head>
<body>
	<h4>Notificate: nieuwe verhuring.</h4>

	<p> Er is een nieuwe verhuring aangevraagd: </p>

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
</body>
</html>