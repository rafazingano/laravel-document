<?php

namespace ConfrariaWeb\Document\Controllers\Api;

use App\Http\Controllers\Controller;
use ConfrariaWeb\Document\Resources\DocumentCollection;
use ConfrariaWeb\Document\Resources\DocumentResource;
use ConfrariaWeb\Document\Services\DocumentService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public $document;

    public function __construct(DocumentService $document)
    {
        $this->document = $document;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = $this->document->paginate();
        return new DocumentCollection($documents);
        //return response()->json($documents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document = $this->document->create($request->all());
        return new DocumentResource($document);
        //return response()->json($document);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = $this->document->find($id);
        return new DocumentResource($document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $document = $this->document->update($id, $request->all());
        return new DocumentResource($document);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
