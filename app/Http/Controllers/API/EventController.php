<?php

namespace App\Http\Controllers\API;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Events\CreateRequest;
use App\Http\Resources\EventResource;

class EventController extends Controller
{
    /**
     * Display the latest event.
     *
     * @OA\Get(
     *  path="/events/latest",
     *  tags={"Events"},
     *  summary="Get the latest event.",
     *  description="Get the latest event.",
     *  @OA\Response(response=200,description="Successful operation",@OA\JsonContent(ref="#/components/schemas/event")),
     *  @OA\Response(response=400, description="Bad request"),
     *  @OA\Response(response=404, description="Resource Not Found"),
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function latest()
    {
        $event = Event::latest()->first();

        return $event
            ? new EventResource($event)
            : response()->json(null);
    }

    /**
     * Store a newly created Event.
     *
     * @OA\Post(
     *  path="/events",
     *  tags={"Events"},
     *  summary="Create new Event.",
     *  description="Create new Event.",
     *  @OA\Parameter(name="name",in="query",required=true,
     *      @OA\Schema(type="string"),),
     *  @OA\Parameter(name="started_at",in="query",required=true,
     *      @OA\Schema(type="string"),),
     *  @OA\Parameter(name="ended_at",in="query",required=true,
     *      @OA\Schema(type="string"),),
     *  @OA\Parameter(name="days",in="query",required=true,
     *      @OA\Schema(
     *          type="array",
     *          @OA\Items(type="field")
     *      ),
     *  ),
     *  @OA\Response(response=200,description="Successful operation",@OA\JsonContent(ref="#/components/schemas/event")),
     *  @OA\Response(response=400, description="Bad request"),
     *  @OA\Response(response=404, description="Resource Not Found"),
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $event = Event::create($request->data());

        return new EventResource($event);
    }
}
