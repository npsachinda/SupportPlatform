<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Suppor Ticket Information</title>
</head>
<body>
	<p>
		Thank you {{ ucfirst($ticket->customer_name) }} for contacting our support team. A support ticket has been opened for you. You will be notified when a response is made by email. The details of your ticket are shown below:
	</p>

	<p>Category: {{ $ticket->category }}</p>
	<p>Status: {{ $ticket->status }}</p>

	<p>
		You can view the ticket at any time at {{ url('tickets/'. $ticket->ticket_id) }}
	</p>

</body>
</html>