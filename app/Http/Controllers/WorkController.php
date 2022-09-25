<?php

namespace App\Http\Controllers;

use App\Enum\PaymentEnum;
use App\Http\Requests\WorkStore;
use App\Http\Requests\WorkUpdate;
use App\Http\Resources\WorkResource;
use App\Models\Work;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): AnonymousResourceCollection
    {
        $works = Work::paginate(24);
        return WorkResource::collection($works);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WorkStore $request
     * @return WorkResource
     */
    public function store(WorkStore $request)
    {

        $work = Work::create($request->validated());
        return new WorkResource($work);
    }

    /**
     * Display the specified resource.
     *
     * @param Work $work
     * @return WorkResource
     */
    public function show(Work $work): WorkResource
    {
        return new WorkResource($work);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WorkUpdate $request
     * @param Work $work
     * @return WorkResource
     */
    public function update(Work $work,WorkUpdate $request)
    {
        $work->update($request->validated());
        return new WorkResource($work);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Work $work
     * @return Response
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return response(null, 204);
    }
}
