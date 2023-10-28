<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investments;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the investments.
     */
    public function index()
    {
        $investments = Investments::all();
        return view('investments.index', compact('investments'));
    }

    /**
     * Show the form for creating a new investment.
     */
    public function create()
    {
        return view('investments.create');
    }

    /**
     * Store a newly created investment in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'InvestmentName' => 'required|string|max:255',
            'InvestmentType' => 'required|string|max:255',
            'InvestmentDescription' => 'nullable|string',
            'Available' => 'required|boolean',
            'InvestmentPrice' => 'required|numeric',
            'MinimumOrder' => 'required|integer',
            'MaximumOrder' => 'required|integer'
        ]);

        Investments::create($request->all());
        return redirect()->route('investments.index')
                         ->with('success', 'Investment created successfully.');
    }

    /**
     * Display the specified investment.
     */
    public function show(Investments $investment)
    {
        return view('investments.show', compact('investment'));
    }

    /**
     * Show the form for editing the specified investment.
     */
    public function edit(Investments $investment)
    {
        return view('investments.edit', compact('investment'));
    }

    /**
     * Update the specified investment in storage.
     */
    public function update(Request $request, Investments $investment)
    {
        $request->validate([
            'InvestmentName' => 'required|string|max:255',
            'InvestmentType' => 'required|string|max:255',
            'InvestmentDescription' => 'nullable|string',
            'Available' => 'required|boolean',
            'InvestmentPrice' => 'required|numeric',
            'MinimumOrder' => 'required|integer',
            'MaximumOrder' => 'required|integer'
        ]);

        $investment->update($request->all());
        return redirect()->route('investments.index')
                         ->with('success', 'Investment updated successfully.');
    }

    /**
     * Remove the specified investment from storage.
     */
    public function destroy(Investments $investment)
    {
        $investment->delete();
        return redirect()->route('investments.index')
                         ->with('success', 'Investment deleted successfully.');
    }
}
