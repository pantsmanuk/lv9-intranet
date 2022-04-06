<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTelephoneRequest;
use App\Http\Requests\UpdateTelephoneRequest;
use App\Models\Telephone;

class TelephoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telephones = Telephone::latest()->paginate(10);
        return view('telephones.index', compact('telephones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('telephones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTelephoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTelephoneRequest $request)
    {
        Telephone::create($request->validated());
        return redirect()->route('telephones.index')->with('message', 'Telephone Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Telephone  $telephone
     * @return \Illuminate\Http\Response
     */
    public function show(Telephone $telephone)
    {
        return view('telephones.show', compact('telephone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Telephone  $telephone
     * @return \Illuminate\Http\Response
     */
    public function edit(Telephone $telephone)
    {
        return view('telephones.edit', compact('telephone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTelephoneRequest  $request
     * @param  \App\Models\Telephone  $telephone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTelephoneRequest $request, Telephone $telephone)
    {
        $telephone->update([
            'number' => $request->number,
            'type' => $request->type,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('telephones.index')->with('message', 'Telephone Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Telephone  $telephone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Telephone $telephone)
    {
        $telephone->delete();
        return redirect()->route('telephones.index')->with('message', 'Telephone Deleted Successfully');
    }
}
