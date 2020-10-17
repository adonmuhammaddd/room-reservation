<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookingRoomModel;

class BookingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Gakkum - Booking Data";

        return view('admin/bookingroom/booking-data', compact('title'));
    }

    public function bookingData()
    {
        $bookingData = BookingRoomModel::query()
            ->where('isDeleted', 0)
            ->get();

        return response()->json([
            'message' => 'success',
            'result' => $bookingData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'roomName' => 'required|unique|max:255',
            'capacity' => 'required|numeric',
            'description' => 'required',
            'color' => 'required'
        ]);

        $data = [
            'roomName' => $request->roomName,
            'capacity' => $request->capacity,
            'description' => $request->description,
            'color' => $request->color
        ];

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {
            return response()->json([
                'message' => 'success',
                'result' => $data
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'roomName' => 'required|unique|max:255',
            'capacity' => 'required|numeric',
            'description' => 'required',
            'color' => 'required'
        ]);

        $data = [
            'roomName' => $request->roomName,
            'capacity' => $request->capacity,
            'description' => $request->description,
            'color' => $request->color
        ];

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {
            return response()->json([
                'message' => 'success',
                'result' => $data
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RoomModel::find($id);
        $data->isDeleted = 0;
        $data->save();

        return response()->json($data);
    }
}
