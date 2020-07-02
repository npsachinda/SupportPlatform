<?php
namespace App\Mailers;

use App\Tickets;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer {
	protected $mailer;           

	/**
	 * from email address
	 
	 */
	protected $fromAddress = 'laravelticketmgt2020@gmail.com';

	/**
	 * from name
	 * @var string
	 */
	protected $fromName = 'Support Ticket';

	/**
	 * email to send to
	 * @var [type]
	 */
	protected $to;

	/**
	 * Subject of the email
	 * @var [type]
	 */
	protected $subject;

	/**
	 * view template for email
	 * @var [type]
	 */
	protected $view;

	/**
	 * data to be sent alone email
	 * @var array
	 */
	protected $data = [];


	public function __construct(Mailer $mailer)
	{
		$this->mailer = $mailer;
	}
	
	/**
	 * Send Ticket information to user
	 * 
	 * @param  Ticket  $ticket
	 * @return method deliver()
	 */
	public function sendTicketInformation(Tickets $ticket,$email)
	{
		$this->to = $email;
		$this->subject = "[Ticket ID: $ticket->ticket_id]";
		$this->view = 'emails.ticket_info';
		$this->data = compact('ticket');
		return $this->deliver();
	}

	/**
	 * Send Ticket Comments/Replies to Ticket Owner
	 *
	 * @param  Ticket  $ticket
	 * @param  Comment  $comment
	 * @return method deliver()
	 */
	public function sendTicketComments(Tickets $ticket, $comment,$email)
	{
		$this->to = $email;
		$this->subject = "RE: (Ticket ID: $ticket->ticket_id)";
		$this->view = 'emails.ticket_comments';
		$this->data = compact('ticket', 'comment');

		return $this->deliver();
	}

	/**
	 * Do the actual sending of the mail
	 */
	public function deliver()
	{
		$this->mailer->send($this->view, $this->data, function($message) {
			   $message->from($this->fromAddress,$this->fromName);
		       $message->to($this->to, $this->subject)->subject($this->subject);
		});
	}
}
