<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reservation;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;

use App\Http\Requests\ReservationFormRequest;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
    public function store(ReservationFormRequest $request)
    {
        $validated = $request->validated();

        $newReservation = new Reservation();

        $newReservation->guest_full_name = $validated['guest_full_name'];
        $newReservation->guest_credit_card = $validated['guest_credit_card'];
        $newReservation->room = $validated['room'];
        $newReservation->from_date = $validated['from_date'];
        $newReservation->to_date = $validated['to_date'];
        $newReservation->more_details = $validated['more_details'];

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
        $reservation = Reservation::find($id);

        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationFormRequest $request, $id)
    {
        $validated = $request->validated();

        $oldReservation = Reservation::find($id);

        $oldReservation->guest_full_name = $validated['guest_full_name'];
        $oldReservation->guest_credit_card = $validated['guest_credit_card'];
        $oldReservation->room = $validated['room'];
        $oldReservation->from_date = $validated['from_date'];
        $oldReservation->to_date = $validated['to_date'];
        $oldReservation->more_details = $validated['more_details'];

        $oldReservation->save();

        return redirect()->route('reservations.index');
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
