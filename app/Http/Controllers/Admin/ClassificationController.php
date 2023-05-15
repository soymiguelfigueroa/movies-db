<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ClassificationController as MainClassificationController;
use App\Http\Requests\StoreClassificationRequest;
use App\Http\Requests\UpdateClassificationRequest;
use App\Models\Classification;

class ClassificationController extends MainClassificationController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classifications = Classification::paginate();

        return view('admin.classification.index', compact('classifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.classification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassificationRequest $request)
    {
        $validated = $request->validated();

        $classification = new Classification;
        $classification->name = $validated['name'];
        if ($classification->save()) {
            return redirect(route('admin.classification.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Classification $classification)
    {
        return view('admin.classification.show', compact('classification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classification $classification)
    {
        return view('admin.classification.edit', compact('classification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassificationRequest $request, Classification $classification)
    {
        $validated = $request->validated();

        $classification->name = $validated['name'];
        if ($classification->save()) {
            return redirect(route('admin.classification.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classification $classification)
    {
        if ($classification->delete()) {
            return redirect(route('admin.classification.index'));
        }
    }
}
