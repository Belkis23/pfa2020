<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\clubs;
use Illuminate\Http\Request;
use Exception;

class ClubsController extends Controller
{

    /**
     * Display a listing of the clubs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $clubsObjects = clubs::paginate(25);

        return view('clubs.index', compact('clubsObjects'));
    }

    /**
     * Show the form for creating a new clubs.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('clubs.create');
    }

    /**
     * Store a new clubs in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            clubs::create($data);

            return redirect()->route('clubs.clubs.index')
                ->with('success_message', 'Clubs was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified clubs.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $clubs = clubs::findOrFail($id);

        return view('clubs.show', compact('clubs'));
    }

    /**
     * Show the form for editing the specified clubs.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $clubs = clubs::findOrFail($id);
        

        return view('clubs.edit', compact('clubs'));
    }

    /**
     * Update the specified clubs in the storage.
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
            
            $clubs = clubs::findOrFail($id);
            $clubs->update($data);

            return redirect()->route('clubs.clubs.index')
                ->with('success_message', 'Clubs was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified clubs from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $clubs = clubs::findOrFail($id);
            $clubs->delete();

            return redirect()->route('clubs.clubs.index')
                ->with('success_message', 'Clubs was successfully deleted.');
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
            'email' => 'nullable',
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
