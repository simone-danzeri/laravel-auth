<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione
        $request->validate(
            [
                'name' => 'required|max:249|unique:projects,name',
                'client_name' => 'required',
                'summary' => 'max:500'
            ]
        );

        $formData = $request->all();
        $newProject = new Project();
        $newProject['slug'] = Str::slug($formData['name'], '-');
        $newProject->fill($formData);
        // $newProject->slug = Str::slug($newProject->name, '-');
        $newProject->save();

        return redirect()->route('admin.projects.show', ['project' => $newProject->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Project $project è la dependence injection ed è l'equivalente del findOrFail ma migliorato
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // validazione
        $request->validate(
            [
                'name' => [
                    'required',
                    'max:249',
                    Rule::unique('projects')->ignore($project->id)
                ],
                'client_name' => 'required',
                'summary' => 'max:500'
            ]
        );
        $formData = $request->all();
        $project['slug'] = Str::slug($formData['name'], '-');
        $project->update($formData);
        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // dd('oh mannaggia fai attenzione!');
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
