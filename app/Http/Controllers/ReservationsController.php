<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reservation;

use Illuminate\Support\Str;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();

        $columns = [
            'id' => '#',
            'guest_full_name' => 'Nome e cognome ospite',
            'guest_credit_card' => 'N. carta di credito',
            'room' => 'N. stanza',
            'from_date' => 'Data inizio',
            'to_date' => 'Data fine',
            'more_details' => 'Dettagli',
        ];

        return view('reservations.index', compact('reservations', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newReservation = new Reservation();

        $newReservation->guest_full_name = $request->input('guest_full_name');
        $newReservation->guest_credit_card = $request->input('guest_credit_card');
        $newReservation->room = $request->input('room');
        $newReservation->from_date = $request->input('from_date');
        $newReservation->to_date = $request->input('to_date');
        $newReservation->more_details = $request->input('more_details');

        $newReservation->save();

        return view('reservations.success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $columns = [
            'id' => '#',
            'guest_full_name' => 'Nome e cognome ospite',
            'guest_credit_card' => 'N. carta di credito',
            'room' => 'N. stanza',
            'from_date' => 'Data inizio',
            'to_date' => 'Data fine',
            'more_details' => 'Dettagli',
        ];

        $reservation = Reservation::find($id);

        return view('reservations.show', compact('columns', 'reservation'));


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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
