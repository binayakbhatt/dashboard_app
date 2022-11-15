<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use App\Models\MailService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mailServices = \App\Models\MailService::with('ranking')->get();
        return view('rankings.index', compact('mailServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mailServices = \App\Models\MailService::with('ranking')->get();
        return view('rankings.create', compact('mailServices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function show(Ranking $ranking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function edit(Ranking $ranking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MailService $service)
    {
        // dd the first_place_image mime type
        // dd($request->file('first_place_image')->getMimeType());

        $validated = $request->validate([
            'first_place' => 'required|max:255',
            'first_place_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'second_place' => 'required|max:255',
            'second_place_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'third_place' => 'required|max:255',
            'third_place_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $ranking = Ranking::where('mail_service_id', $service->id)->firstOrCreate(
            ['mail_service_id' => $service->id],
            [
                'first_place' => $validated['first_place'],
                'second_place' => $validated['second_place'],
                'third_place' => $validated['third_place'],
            ]
        );

        if ($request->hasFile('first_place_image')) {
            $image = $request->file('first_place_image');
            $uuid = (string) Str::uuid();
            $name = $uuid . '.' . $image->getClientOriginalExtension();
            // Save in storage/app/public/uploads
            $destinationPath = storage_path('app/public/uploads');
            $image->move($destinationPath, $name);
            $ranking->image_path_first = $name;
        }

        if ($request->hasFile('second_place_image')) {
            $image = $request->file('second_place_image');
            $uuid = (string) Str::uuid();
            $name = $uuid . '.' . $image->getClientOriginalExtension();
            // Save in storage/app/public/uploads
            $destinationPath = storage_path('app/public/uploads');
            $image->move($destinationPath, $name);
            $ranking->image_path_second = $name;
        }

        if ($request->hasFile('third_place_image')) {
            $image = $request->file('third_place_image');
            $uuid = (string) Str::uuid();
            $name = $uuid . '.' . $image->getClientOriginalExtension();
            // Save in storage/app/public/uploads
            $destinationPath = storage_path('app/public/uploads');
            $image->move($destinationPath, $name);
            $ranking->image_path_third = $name;
        }

        // $ranking->first_place = $validated->first_place;
        // $ranking->second_place = $validated->second_place;
        // $ranking->third_place = $validated->third_place;

        $ranking->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ranking $ranking)
    {
        //
    }
}
