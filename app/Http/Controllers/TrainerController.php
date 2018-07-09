<?php

namespace laradex\Http\Controllers;

use Illuminate\Http\Request;

use laradex\TrainerModel;
use laradex\Http\Requests\StoreTrainerRequest;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = TrainerModel::all();

        return view('trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRequest $request)
    {
        
        $trainer = new TrainerModel();

        if($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
       ///return $request->all();
        
        $trainer->nombre=$request->input('nombre');
        $trainer->desc=$request->input('descripcion');
        $trainer->avatar=$name;
        $trainer->slug = $request->input('slug');
        $trainer->save();
        return redirect()->route('trainers.index', $trainer->slug)->with('info', 'Entrenador agregado con exito');
        //return 'Exito al guardar';
       //return $trainer->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TrainerModel $trainer)
    {
        // return $slug;
        //$trainer = TrainerModel::where('slug','=',$slug)->firstOrFail();
       // return "estoy mostrando";
       /*$trainer=TrainerModel::find($id);*/
        return view('trainers.perfil',compact('trainer'));
       // return view('trainers.perfil', ['user' => TrainerModel::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainerModel $trainer)
    {
        return view('trainers.edit',compact('trainer'));
        //return "estoy Editando ".$trainer ;   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TrainerModel $trainer)
    {

        $trainer->fill($request->except('avatar'));
        if($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $name=time().$file->getClientOriginalName();
            $trainer->avatar=$name;
            $file->move(public_path().'/images/', $name);
        }
        $trainer->save();
        return redirect()->route('trainers.show', $trainer->slug)->with('info', 'Datos Actualizados con exito');
        //return 'Datos Actualizados';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainerModel $trainer)
    {
        $file_path=public_path().'/images/'.$trainer->avatar;
        \File::delete($file_path);
        
        $trainer->delete();
        return redirect()->route('trainers.index', $trainer->slug)->with('info', 'Entrenador eliminado con exito');
        //return "Eliminado con exito";
    }
}
