<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogicLayer\CalendarEventsLogic;
use App\Http\Requests\SaveEventsRequest;

class CalendarEvents extends Controller
{
    private $calendarEventsLogic;

    public function __construct() 
    {
        $this->calendarEventsLogic = new CalendarEventsLogic();
    }

    public function saveEvents(SaveEventsRequest $request)
    {
        $request->validated();

        return response($this->calendarEventsLogic->saveEvents($request->all()));
    }

    public function getEvents(Request $request)
    {
        return response($this->calendarEventsLogic->getEvents());
    }
}
