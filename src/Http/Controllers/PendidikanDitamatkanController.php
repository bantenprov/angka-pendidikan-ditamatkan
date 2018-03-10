<?php

namespace Bantenprov\PendidikanDitamatkan\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\PendidikanDitamatkan\Facades\PendidikanDitamatkanFacade;

/* Models */
use Bantenprov\PendidikanDitamatkan\Models\Bantenprov\PendidikanDitamatkan\PendidikanDitamatkan;

/* Etc */
use Validator;

/**
 * The PendidikanDitamatkanController class.
 *
 * @package Bantenprov\PendidikanDitamatkan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PendidikanDitamatkanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PendidikanDitamatkan $pendidikan_ditamatkan)
    {
        $this->pendidikan_ditamatkan = $pendidikan_ditamatkan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);

            $query = $this->pendidikan_ditamatkan->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->pendidikan_ditamatkan->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $response = $query->paginate($perPage);

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pendidikan_ditamatkan = $this->pendidikan_ditamatkan;

        $response['pendidikan_ditamatkan'] = $pendidikan_ditamatkan;
        $response['status'] = true;

        return response()->json($pendidikan_ditamatkan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PendidikanDitamatkan  $pendidikan_ditamatkan
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pendidikan_ditamatkan = $this->pendidikan_ditamatkan;

        $validator = Validator::make($request->all(), [
            'label' => 'required|max:16|unique:pendidikan_ditamatkans,label',
            'description' => 'max:255',
        ]);

        if($validator->fails()){
            $check = $pendidikan_ditamatkan->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $pendidikan_ditamatkan->label = $request->input('label');
                $pendidikan_ditamatkan->description = $request->input('description');
                $pendidikan_ditamatkan->save();

                $response['message'] = 'success';
            }
        } else {
            $pendidikan_ditamatkan->label = $request->input('label');
            $pendidikan_ditamatkan->description = $request->input('description');
            $pendidikan_ditamatkan->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendidikan_ditamatkan = $this->pendidikan_ditamatkan->findOrFail($id);

        $response['pendidikan_ditamatkan'] = $pendidikan_ditamatkan;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PendidikanDitamatkan  $pendidikan_ditamatkan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendidikan_ditamatkan = $this->pendidikan_ditamatkan->findOrFail($id);

        $response['pendidikan_ditamatkan'] = $pendidikan_ditamatkan;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PendidikanDitamatkan  $pendidikan_ditamatkan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pendidikan_ditamatkan = $this->pendidikan_ditamatkan->findOrFail($id);

        if ($request->input('old_label') == $request->input('label'))
        {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16',
                'description' => 'max:255',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16|unique:pendidikan_ditamatkans,label',
                'description' => 'max:255',
            ]);
        }

        if ($validator->fails()) {
            $check = $pendidikan_ditamatkan->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $pendidikan_ditamatkan->label = $request->input('label');
                $pendidikan_ditamatkan->description = $request->input('description');
                $pendidikan_ditamatkan->save();

                $response['message'] = 'success';
            }
        } else {
            $pendidikan_ditamatkan->label = $request->input('label');
            $pendidikan_ditamatkan->description = $request->input('description');
            $pendidikan_ditamatkan->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PendidikanDitamatkan  $pendidikan_ditamatkan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendidikan_ditamatkan = $this->pendidikan_ditamatkan->findOrFail($id);

        if ($pendidikan_ditamatkan->delete()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}
