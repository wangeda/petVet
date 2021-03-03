<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Gender;
use App\Http\Requests\PetRequest;


use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	

	
	
    public function index()
    {
        $pets = Pet::all();
		return view ('pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$pets = Pet::all();
		$customers = Customer::all();
		$genders = Gender::all();
		
  		return view ('pets.create', compact('pets', 'customers', 'genders'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetRequest $request)
    {
        $data=$request->all();
		
		Pet::create($data);
		
		return redirect("/pets");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$pet = Pet::find($id);
        $appointment = Appointment::find($pet->pet_id);
		
		return view ('pets.show', compact('pet', 'appointment', ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pets = Pet::find($id);
		$customers = Customer::all();
		return view ('pets.edit', compact('pets', 'customers'));
    }
		

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */

	public function update(PetRequest $request, $id)
    {
		$data=$request->all();
     	$pet = Pet::find($id);
		$pet->name = $request->input('name');
		$pet->breed = $request->input('breed');
		$pet->specie = $request->input('specie');
		$pet->date_of_birth = $request->input('date_of_birth');
		$pet->allergies = $request->input('allergies');
		$pet->chronic_condition = $request->input('chronic_condition');
		$pet->vaccination_date = $request->input('vaccination_date');
		$pet->customer_id = $request->input('customer_id');
		$pet->save();
		
		return redirect("/pets");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pet = Pet::find($id);
		$pet->delete();
		return redirect ('/pets');
    }
}
