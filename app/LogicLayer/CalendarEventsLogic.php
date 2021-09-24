<?php

namespace App\LogicLayer;

use App\Models\CalendarEventsModel;
use Carbon\CarbonPeriod;

class CalendarEventsLogic
{
    /**
     * Save valid events to the database
     */
    public function saveEvents(array $requestParams)
    {
        $eventDescription = $requestParams['eventDescription'];
        $dayOfWeeks = $requestParams['dayOfWeeks'];

        //create a list of dates between the range
        $period = CarbonPeriod::create($requestParams['startDate'], $requestParams['endDate'])
        ->filter(function ($date) use ($dayOfWeeks) {
            return in_array($date->dayOfWeek, $dayOfWeeks);
        });

        //map valid dates that will have the events
        $eventList = collect($period)->map(function($date) use($eventDescription) {
            return ['event_description' => $eventDescription, 'event_date' => $date->format('Y-m-d')];
        })->toArray();

        $upsert = true;

        try {
            //upsert, replace existing records and create new if already existing
            CalendarEventsModel::upsert($eventList, ['event_date'], ['event_description']);
        } catch (Exception $error) {
            //logs any SQL error
            Log::error('Failed to upsert.' , ['Message' => $error->getMessage(), 'eventList' => $eventList]);
            $upsert = false;
        }

        return ['result' => $upsert, 'eventList' => $this->getEvents()];
    }

    /**
     * Get all events
     */
    public function getEvents()
    {
        return CalendarEventsModel::all('event_description AS title', 'event_date AS date');
    }
}