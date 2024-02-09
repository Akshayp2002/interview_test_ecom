<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;

class StocksController extends Controller
{
    public function index()
    {
        try {
            $stocks = Stock::all();
            return view('admin.stocks.index', compact('stocks'));
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Failed to fetch stocks.']);
        }
    }

    public function create()
    {
        try {
            $products = Product::all();
            return view('admin.stocks.form', compact('products'));
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Failed to fetch products for stock creation.']);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity'   => 'required|integer|min:0',
            ]);

            Stock::create($request->all());

            return redirect()->route('admin.stocks.index')->with('success', 'Stock created successfully');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Failed to create stock.']);
        }
    }

    public function edit($id)
    {
        try {
            $stock = Stock::findOrFail($id);
            $products = Product::all();
            return view('admin.stocks.form', compact('stock', 'products'));
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Failed to fetch stock for editing.']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity'   => 'required|integer|min:0',
            ]);

            $stock = Stock::findOrFail($id);
            $stock->update($request->all());

            return redirect()->route('admin.stocks.index')->with('success', 'Stock updated successfully');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Failed to update stock.']);
        }
    }

    public function destroy($id)
    {
        try {
            $stock = Stock::findOrFail($id);
            $stock->delete();

            return redirect()->route('admin.stocks.index')->with('success', 'Stock deleted successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete stock.']);
        }
    }
}
