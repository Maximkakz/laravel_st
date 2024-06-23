<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
     {
         $heading = 'Все объекты недвижимости';
         $apartments = DB::table('apartments')->get();
         $apartments = $apartments->map(function ($apartment) {
         $apartment->actionDelete = route('apartments.destroy', $apartment->id);
         $apartment->actionEdit = route('apartments.edit', $apartment->id);
         $apartment->actionShow = route('apartments.show', $apartment->id);
         //dd($apartment);
         return $apartment;
         });
         //так можно создать подколлекции по три элемента в каждой
         //$apartments = $apartments->chunk(3);
         return view('apartments.index', [
             'heading' => $heading,
             'apartments' => $apartments,
         ]);
     }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $heading2 = 'Добавление недвижимости';
        $action = '/apartments';
        return view('apartments.create-apartments', [
            'heading' => $heading2,
            'action' => $action,
        ]);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $address = $request->address;
        $type = $request->type;
        $rooms = (int) $request->rooms;
        $price = (double) $request->price;
        // dd($address, $type, $rooms, $price);
        $isOk = DB::table('apartments')->insert([
            'address' => $address,
            'type' => $type,
            'rooms' => $rooms,
            'price' => $price,
        ]);
        if($isOk){
            session()->flash('success', 'Объект добавлен!');
            return redirect('/apartments/create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $apartment = DB::table('apartments')->find($id);
        $action = route('apartments.update', $id);
        $heading = 'Редактирование объекта недвижимости';
        $types = [
            [1, 'Студия', 'studio apartment'],
            [2, 'Квартира', 'apartment'],
            [3, 'Дом', 'house'],
            [4, 'Коттедж', 'cottage'],
        ];
        $rooms = [
            [0, 'Студия'],
            [1, 'Одна'],
            [2, 'Две'],
            [3, 'Три'],
            [4, 'Четыре'],
        ];
        return view('apartments.edit', [
            'apartment' => $apartment,
            'action' => $action,
            'heading' => $heading,
            'types' => $types,
            'rooms' => $rooms,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, string $id)
     {
         $address = $request->address;
         $type = $request->type;
         $rooms = (int) $request->rooms;
         $price = (double) $request->price;
         // dd($address, $type, $rooms, $price);
         $isOk = DB::table('apartments')
         ->where('id', $id)
         ->update([
             'address' => $address,
             'type' => $type,
             'rooms' => $rooms,
             'price' => $price,
         ]);
         if($isOk){
         return redirect()->back()->with('success', 'Объект обновлён!');
         }
     }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = DB::table('apartments')->find($id)->address;
        $address = htmlspecialchars($address);
        $isOK = (DB::table('notes')->where('apartment_id', $id)->delete() >= 0 && DB::table('apartments')->delete($id));
        if($isOK){
            return redirect()->back()->with('success', 'Удалён объект по адресу: ' . $address);
        }
        else{
            dd($isOK);
            return redirect()->back()->with('fail', 'Не удалось удалить объект по адресу: ' . $address);
        }
    }
}
