<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function store(Request $request)
    {
        Experience::create([
            'position'    => $request->position,
            'company'     => $request->company,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.experiences.index')->with('success', '¡Experiencia creada correctamente!');
    }

    public function update(Request $request, Experience $experience)
    {
        $experience->update([
            'position'    => $request->position,
            'company'     => $request->company,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.experiences.index')->with('success', '¡Experiencia actualizada!');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experiences.index')->with('success', '¡Experiencia eliminada!');
    }
}