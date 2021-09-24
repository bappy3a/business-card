<?php

namespace App\Http\Controllers;
use QrCode;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['store','username']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Card::latest()->get();
        return view('admin.card.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.card.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'photo' => 'nullable|mimes:jpeg,jpg,png|max:1000',
        ]);
        $data = New Card;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->designation = $request->designation;
        $data->phone = $request->phone;
        $data->address = $request->address;
        if($request->hasFile('photo')){
            $data->photo = $request->photo->store('uploads/card');
        }
        if($request->hasFile('cover_photo')){
            $data->cover_photo = $request->cover_photo->store('uploads/card');
        }
        $data->save();
        return redirect()->route('card.username',$data->user_name)->with('message', 'Form successfully submitted!');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = Card::where('user_id',$id)->first();
        return view('admin.card.show',compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'photo' => 'nullable|mimes:jpeg,jpg,png|max:1000',
            'cover_photo' => 'nullable|mimes:jpeg,jpg,png|max:1000',
        ]);
        $data = Card::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->designation = $request->designation;
        $data->phone = $request->phone;
        if($request->hasFile('photo')){
            $data->photo = $request->photo->store('uploads/card');
        }
        if($request->hasFile('cover_photo')){
            $data->cover_photo = $request->cover_photo->store('uploads/card');
        }
        foreach ($request->type as $key => $type) {
            $item[$type] = $request->link[$key];
        }
        $data->link_1 = json_encode($item);
        $data->link_2 = $request->link_2;
        $data->link_3 = $request->country_code;
        $data->save();
        return redirect()->back()->with('message', 'Form successfully submitted!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return back();
    }

    public function username($username)
    {
        $card = Card::where('user_name',$username)->first();
        return view('cardView',compact('card'));
    }

}
