<?php

namespace App\Http\Resources;

use App\Http\Services\EventService;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @OA\Schema(
     *     schema="event",
     *     type="array",
     *     @OA\Items(
     *      @OA\Property(property="name",type="string",format="string",example="Workout Days"),
     *      @OA\Property(property="started_at",type="string",format="string",example="11/01/2020"),
     *      @OA\Property(property="ended_at",type="string",format="string",example="11/21/2020"),
     *      @OA\Property(property="days",ref="#/components/schemas/eventDays"),
     *      @OA\Property(property="dates",ref="#/components/schemas/eventDates"),
     *     )
     * )
     *
     * @OA\Schema(
     *     schema="eventDays",
     *     type="array",
     *     @OA\Items(
     *      @OA\Property(property="wednesday"),
     *     )
     * )
     *
     * @OA\Schema(
     *     schema="eventDates",
     *     type="array",
     *     @OA\Items(
     *      @OA\Property(property="title",type="string",format="string",example="Workout Days"),
     *      @OA\Property(property="date",type="string",format="string",example="11/01/2020"),
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'started_at' => $this->started_at->format('m/d/Y'),
            'ended_at' => $this->ended_at->format('m/d/Y'),
            'days' => json_decode($this->days),
            'dates' => $this->getDaysOfEvent()
        ];
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function getDaysOfEvent()
    {
        $dates = (new EventService)->getEvents($this);

        return $dates->map(function($date){
            return [
                'title' => $this->name,
                'date' => $date,
            ];
        });
    }


}
