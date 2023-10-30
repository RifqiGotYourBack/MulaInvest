<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investments;

class InvestmentController extends Controller
{
   // Get all investments
    public function index()
    {
        $investments = Investments::all();
        return view('investments.index', compact('investments'));
    }

    // Show add investment form
    public function create()
    {
        return view('investments.create');
    }

    // Store added investment
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

    // Show edit investment form
    public function edit(Investments $investment)
    {
        return view('investments.edit', compact('investment'));
    }

    // Update an investment
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

    // Delete an Investment
    public function destroy(Investments $investment)
    {
        $investment->delete();
        return redirect()->route('investments.index')
                         ->with('success', 'Investment deleted successfully.');
    }
}
