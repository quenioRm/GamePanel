<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControlPanelTicketController extends Controller
{
    public function TicketList()
    {
        return view('controlpanel.ticket.mytickets');
    }
}
