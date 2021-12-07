<?php

namespace App\Http\Traits;
use App\Models\Client;
use Illuminate\Http\Request;


trait ClientTrait {

  public function index()
    {
        //
         $clients = Client::withTrashed()->latest()->paginate(5);
         return view('clients.index',compact('clients'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        //
         return view('clients.create');
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $file = $request->file('file');
        $image=$file->getClientOriginalName();   
        $request->file->move(public_path('uploads'), $image);
        $clients = new Client([
                "name" => $request->get('name'),
                "details" => $request->get('details'),
                "email" => $request->get('email'),
                "file" => $image,
            ]);
        $clients->save(); // Finally, save the record.
     
        return redirect()->route('clients.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return $key;
        //
         $clients = Client::findOrFail($id);
         return view('clients.edit',compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {

    
        $client->update($request->all());
    
        return redirect()->route('clients.index')
                        ->with('success','Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //-----Soft Deletes-----

       // Client::find($id)->delete();
        Client::find($id)->forcedelete();
        return redirect()->route('clients.index')
                        ->with('success','Client deleted successfully');
    }
}