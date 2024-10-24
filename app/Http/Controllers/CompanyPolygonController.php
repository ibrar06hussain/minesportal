<?php

namespace App\Http\Controllers;

use App\Models\CompanyPolygon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CompanyPolygonExport;

class CompanyPolygonController extends Controller
{
    // Display list of company polygons
    public function index(Request $request)
    {
        // Filter and sort data
        $query = CompanyPolygon::query();

        if ($request->filled('company_name')) {
            $query->where('company_name', 'like', '%' . $request->company_name . '%');
        }
        if ($request->filled('mineral_name')) {
            $query->where('mineral_name', 'like', '%' . $request->mineral_name . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', '=', $request->status);
        }

        // Sorting
        $sort_by = $request->get('sort_by', 'polygon_id');
        $sort_order = $request->get('sort_order', 'desc');
        $polygons = $query->orderBy($sort_by, $sort_order)->paginate(50);

        return view('companypolygons.index', compact('polygons'));
    }

    // Show details of a single company polygon
    public function show($id)
    {
        $polygon = CompanyPolygon::findOrFail($id);
        return view('companypolygons.show', compact('polygon'));
    }

    // Create a new polygon
    public function create()
    {
        return view('companypolygons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'mineral_name' => 'required|string|max:255',
            'granted_date' => 'required|date',
            'coordinates' => 'required',
        ]);

        CompanyPolygon::create($request->all());

        return redirect()->route('allcompaniesdata.index')->with('success', 'Polygon created successfully.');
    }

    // Edit a polygon
    public function edit($id)
    {
        $polygon = CompanyPolygon::findOrFail($id);
        return view('companypolygons.edit', compact('polygon'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'mineral_name' => 'required|string|max:255',
            'granted_date' => 'required|date',
            'coordinates' => 'required',
        ]);

        $polygon = CompanyPolygon::findOrFail($id);
        $polygon->update($request->all());

        return redirect()->route('allcompaniesdata.index')->with('success', 'Polygon updated successfully.');
    }

    // Delete a polygon
    public function destroy($id)
    {
        $polygon = CompanyPolygon::findOrFail($id);
        $polygon->delete();

        return redirect()->route('allcompaniesdata.index')->with('success', 'Polygon deleted successfully.');
    }

    // Export to PDF
    public function exportPDF()
    {
        $polygons = CompanyPolygon::all();
        $pdf = Pdf::loadView('companypolygons.pdf', compact('polygons'));
        return $pdf->download('companypolygons.pdf');
    }

    // Export to Excel
    public function exportExcel()
    {
        return Excel::download(new CompanyPolygonExport, 'companypolygons.xlsx');
    }
}
