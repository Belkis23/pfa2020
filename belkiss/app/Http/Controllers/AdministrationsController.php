<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\administrations;
use Illuminate\Http\Request;
use Exception;

class AdministrationsController extends Controller
{

    /**
     * Display a listing of the administrations.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $administrationsObjects = administrations::paginate(25);

        return view('administrations.index', compact('administrationsObjects'));
    }

    /**
     * Show the form for creating a new administrations.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('administrations.create');
    }

    /**
     * Store a new administrations in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            administrations::create($data);

            return redirect()->route('administrations.administrations.index')
                ->with('success_message', 'Administrations was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified administrations.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $administrations = administrations::findOrFail($id);

        return view('administrations.show', compact('administrations'));
    }

    /**
     * Show the form for editing the specified administrations.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $administrations = administrations::findOrFail($id);
        

        return view('administrations.edit', compact('administrations'));
    }

    /**
     * Update the specified administrations in the storage.
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
            
            $administrations = administrations::findOrFail($id);
            $administrations->update($data);

            return redirect()->route('administrations.administrations.index')
                ->with('success_message', 'Administrations was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified administrations from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $administrations = administrations::findOrFail($id);
            $administrations->delete();

            return redirect()->route('administrations.administrations.index')
                ->with('success_message', 'Administrations was successfully deleted.');
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
