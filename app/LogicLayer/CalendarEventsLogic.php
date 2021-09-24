<?php

namespace App\LogicLayer;

use App\Models\CalendarEventsModel;
use Carbon\CarbonPeriod;

class CalendarEventsLogic
{
    public function __construct()
    {

    }

    public function saveEvents(array $requestParams)
    {
        $eventDescription = $requestParams['eventDescription'];
        $dayOfWeeks = $requestParams['dayOfWeeks'];

        $period = CarbonPeriod::create($requestParams['startDate'], $requestParams['endDate'])
        ->filter(function ($date) use ($dayOfWeeks) {
            return in_array($date->dayOfWeek, $dayOfWeeks);
        });

        $eventList = collect($period)->map(function($date) use($eventDescription) {
            return ['event_description' => $eventDescription, 'event_date' => $date->format('Y-m-d')];
        })->toArray();

        $upsert = true;

        try {
            CalendarEventsModel::upsert($eventList, ['event_date'], ['event_description']);
        } catch (Exception $error) {
            Log::error('Failed to upsert.' , ['Message' => $error->getMessage(), 'eventList' => $eventList]);
            $upsert = false;
        }

        return ['result' => $upsert, 'eventList' => $this->getEvents()];
    }

    public function getEvents()
    {
        return CalendarEventsModel::all('event_description AS title', 'event_date AS date');
    }
}