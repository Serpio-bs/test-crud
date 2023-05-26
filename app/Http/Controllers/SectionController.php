<?php

namespace App\Http\Controllers;

use App\Http\DTO\SectionsDTO;
use App\Http\Requests\SectionPostRequest;
use App\Http\Services\SectionService;
use App\Models\Section;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SectionController extends Controller
{
    private SectionService $service;

    public function __construct(SectionService $service)
    {
        $this->service = $service;
        $this->middleware('auth');
    }


    public function index(): View
    {
        $data = $this->service->getAllData();

        return view('sections.index', compact('data'));
    }

    public function create(): View
    {
        return view('sections.create');
    }

    public function store(SectionPostRequest $request): RedirectResponse
    {
        $dataDTO = new SectionsDTO($request->validated());

        $this->service->create($dataDTO);

        return redirect()->route('sections.index')->with('success', 'Section added successfully.');
    }

    public function show(Section $section): View
    {
        return view('sections.show', compact('section'));
    }

    public function edit(Section $section): View
    {
        return view('sections.edit', compact('section'));
    }

    public function update(SectionPostRequest $request, string $id): RedirectResponse
    {
        $dataDTO = new SectionsDTO($request->validated());

        $this->service->update($dataDTO, $id);

        return redirect()->route('sections.index')->with('success', 'Section data has been updated successfully');
    }

    public function destroy(Section $section): RedirectResponse
    {
        $section->delete();

        return redirect()->route('sections.index')->with('success', 'Data deleted successfully');
    }
}
