<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::latest()->get();
        return view('publication.index',compact('publications')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publication.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicationRequest $request)
    {
        $formField = $request->validated() ; 
        if($request->hasFile('image')) {
            $formField['image'] = $request->file('image')->store('publication','public'); 
        }else {
            $formField['image'] ="";
        }
        $formField['profiles_id'] = Auth::user()->id; 
        Publication::create($formField) ;
        return to_route('publications.index')->with('success','Publication est crée') ; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        // autorisation
        // * Gates (routes)
        // * Policies (Countroller )
    //    !if(!Gate::allows("updtae-publication",$publication)){
    //     ! abort(404) ;
    //    !}
    Gate::authorize('updtae-publication',$publication) ;
        return view("publication.edit",compact('publication')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        $formField = $request->validated();
        if($request->hasFile('image')) {
            $formField["image"]  = $request->file('image')->store('publication','public') ;
        }
        $publication->fill($formField)->save() ;
        return to_route('publications.index')->with('success','publication est bien modifié') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $publication->delete() ; 
        return to_route('publications.index')->with('success','publication est suprimer') ;
    }
}
