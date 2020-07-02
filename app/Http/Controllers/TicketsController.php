<?php

namespace App\Http\Controllers;

use App\Tickets;
use App\Http\Requests;
use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TicketsController extends Controller
{

    /**
     * Display all tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Tickets::orderBy('created_at', 'desc')->paginate(5);
                
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
          return view('tickets.create');
    }

    public function store(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'customer_name'     => 'required|max:150',
            'category'          => 'required',
            'description'       => 'required',
            'email'             => 'required|email|max:50',
            'contact_number'    => 'required|max:10|min:10'
        ]);

        $ticket=new Tickets;
        $ticket->customer_name = $request->customer_name;
        $ticket->category = $request->category;
        $ticket->ticket_id = strtoupper(Str::random(10));
        $ticket->description = $request->description;
        $ticket->email = $request->email;
        $ticket->contact_number = $request->contact_number;
        $ticket->status = "Create";
        
    
        $ticket->save();

        try {

            $mailer->sendTicketInformation($ticket,$request->email);

        } catch (Throwable $e) {
            report($e);
    
            return false;
        }

        return redirect()->back()->with("status", "A ticket with Reference No: #$ticket->ticket_id has been opened.");
    }

    public function search(Request $request)
    {
        if($request){
            $this->validate($request, [
                'ref_no'     => 'required|min:10|max:10',
            ]);

        }
        return redirect('/tickets/'.$request->ref_no);
    }

    public function show($ticket_id=null)
    {
        if($ticket_id){
        $ticket = Tickets::where('ticket_id', $ticket_id)->firstOrFail();

        $comments = $ticket->agent_comment;

        $category = $ticket->category;

        return view('tickets.show', compact('ticket', 'category', 'comments'));
        }else{
            return view('tickets.search');
        }
    }

    public function UpdateComment(Request $request, AppMailer $mailer){

        $this->validate($request,[
           "comment"=>"required",
       ]);

       $id = $request->ticket_id;
       $comment = $request->comment;
       $ticket_data = Tickets::find($id);
       $ticket_data -> agent_comment=$comment;
       $ticket_data -> save();

       $email = $ticket_data->email;

       try {

        $mailer->sendTicketComments($ticket_data,$comment,$email);

        } catch (Throwable $e) {
        report($e);

        return false;
        }

    return redirect()->back()->with("status", "A ticket with Reference No: #$ticket_data->ticket_id has been updated.");
   
    }

    public function open($ticket_id)
    {
        $ticket = Tickets::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Open';

        $ticket->save();

        return redirect()->back()->with("status", "The ticket has been opened.");
    }

    public function close($ticket_id)
    {
        $ticket = Tickets::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Closed';

        $ticket->save();

        return redirect()->back()->with("status", "The ticket has been closed.");
    }

}
