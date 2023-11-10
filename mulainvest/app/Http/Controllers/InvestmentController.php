<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investments;

class InvestmentController extends Controller
{
    // Get investments
    public function index()
    {
        $investments = Investments::paginate(20);
        return view('investasi', [
            'investments' => $investments,
            'title' => 'Investasi'
        ]);
    }

    public function indexAdmin()
    {
        $investments = Investments::paginate(20);
        return view('investasiAdmin', [
            'investments' => $investments
        ]);
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
            'Stock' => 'required|integer',
            'InvestmentPrice' => 'required|numeric',
            'MinimumOrder' => 'required|integer',
            'MaximumOrder' => 'required|integer'
        ]);

        $investment = new Investments();

        $investment->InvestmentID = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
        $investment->InvestmentName = $request->input('InvestmentName');
        $investment->InvestmentType = $request->input('InvestmentType');
        $investment->InvestmentDescription = $request->input('InvestmentDescription');
        $investment->Stock = $request->input('Stock');
        $investment->InvestmentPrice = $request->input('InvestmentPrice');
        $investment->MinimumOrder = $request->input('MinimumOrder');
        $investment->MaximumOrder = $request->input('MaximumOrder');

        $investment->save();

        return redirect()->route('investasiAdmin')
            ->with('success', 'Investment created successfully.');
    }

    public function show(Investments $investment)
    {
        return view('investments.show', compact('investment'));
    }

    // edit investment form
    public function edit(Investments $investment)
    {
        return view('investments.edit', compact('investment'));
    }

    // Update an investment
    public function update(Request $request, $id)
    {
        $request->validate([
            'InvestmentName' => 'required|string|max:255',
            'InvestmentType' => 'required|string|max:255',
            'InvestmentDescription' => 'nullable|string',
            'Stock' => 'required|integer',
            'InvestmentPrice' => 'required|numeric',
            'MinimumOrder' => 'required|integer',
            'MaximumOrder' => 'required|integer'
        ]);

        $investment = Investments::find($id);

        $investment->update($request->all());
        return redirect()->route('investasiAdmin')
            ->with('success', 'Investment updated successfully.');
    }

    // Delete an Investment
    public function destroy($id)
    {
        $investment = Investments::find($id);
        $investment->delete();
        return redirect()->route('investasiAdmin')
            ->with('success', 'Investment deleted successfully.');
    }
}
