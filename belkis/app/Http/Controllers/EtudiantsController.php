<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Exception;

class EtudiantsController extends Controller
{

    /**
     * Display a listing of the etudiants.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $etudiants = Etudiant::paginate(25);

        return view('etudiants.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new etudiant.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('etudiants.create');
    }

    /**
     * Store a new etudiant in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Etudiant::create($data);

            return redirect()->route('etudiants.etudiant.index')
                ->with('success_message', 'Etudiant was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified etudiant.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $etudiant = Etudiant::findOrFail($id);

        return view('etudiants.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified etudiant.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        

        return view('etudiants.edit', compact('etudiant'));
    }

    /**
     * Update the specified etudiant in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $etudiant = Etudiant::findOrFail($id);
            $etudiant->update($data);

            return redirect()->route('etudiants.etudiant.index')
                ->with('success_message', 'Etudiant was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified etudiant from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $etudiant = Etudiant::findOrFail($id);
            $etudiant->delete();

            return redirect()->route('etudiants.etudiant.index')
                ->with('success_message', 'Etudiant was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'nom' => 'string|min:1|nullable',
            'prenom' => 'string|min:1|nullable',
            'tel' => 'string|min:1|nullable',
            'addresse' => 'string|min:1|nullable',
            'photo' => ['file','nullable'], 
        ];

        
        $data = $request->validate($rules);

        if ($request->has('custom_delete_photo')) {
            $data['photo'] = null;
        }
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->moveFile($request->file('photo'));
        }



        return $data;
    }
  
    /**
     * Moves the attached file to the server.
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }
        

        $path = config('laravel-code-generator.files_upload_path', 'uploads');

        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }
}
