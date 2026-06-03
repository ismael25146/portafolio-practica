<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function store(Request $request)
    {
        Skill::create([
            'name' => $request->name,
            'percentage' => $request->percentage,
        ]);

        return redirect()->route('admin.skills.index')->with('success', '¡Habilidad creada correctamente!');
    }

    public function update(Request $request, Skill $skill)
    {
        $skill->update([
            'name' => $request->name,
            'percentage' => $request->percentage,
        ]);

        return redirect()->route('admin.skills.index')->with('success', '¡Habilidad actualizada!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', '¡Habilidad eliminada!');
    }
}