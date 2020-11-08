<?php

namespace App\Http\Services;

use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;

class EventService
{
    /**
     * Display the event in calendar
     *
     * @return \Illuminate\Http\Response
     */
    public function getEvents($event)
    {
        $days = json_decode($event->days);
        $dates = new Collection;

        $rangeDates = CarbonPeriod::create($event->started_at, $event->ended_at);

        foreach ($rangeDates as $baseDate) {
            foreach ($days as $day) {
              if($baseDate->is($day)){
                $dates->push($baseDate->format('m/d/Y'));
              }
            }
        }

        return $dates;
    }
}
