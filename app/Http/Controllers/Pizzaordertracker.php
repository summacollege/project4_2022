<?php

namespace App\Http\Controllers;
use App\Models\PizzaOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Pizzaordertracker extends Controller
{
    public function index()
    {
        if (Auth::user()->name == 'admin')
        {
            $orders = PizzaOrder::all();
            return view('pizza.index', compact('orders'));            
        }
        else
        {
        $user_id = auth()->id();
        $orders = PizzaOrder::where('user_id', $user_id)->get();
        return view('pizza.index', compact('orders'));
        }
    }

    public function create()
    {
        return view('pizza.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([   
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'adress' => 'required|string',
            'postal_code' => 'required|string',
            'city' => 'required|string',
            'pizza' => 'required|string',
            'delivery_date' => 'required|date',
        ]);

        $order = new PizzaOrder();
        $order->first_name = $validatedData['first_name'];
        $order->last_name = $validatedData['last_name'];
        $order->adress = $validatedData['adress'];
        $order->postal_code = $validatedData['postal_code'];
        $order->city = $validatedData['city'];
        $order->pizza = $validatedData['pizza'];
        $order->delivery_date = $validatedData['delivery_date'];
        $order->save();

        return redirect()->route('pizza.index')->with('success', 'Uw pizza word gemaakt');
    }

    public function updateStatus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|string',
        ]);

        $order = PizzaOrder::find($id);
        $order->status = $validatedData['status'];
        $order->save();

        return redirect()->route('pizza.index')->with('success', 'Uw pizza is onderweg');
    }

    public function destroy($id)
    {
        $order = PizzaOrder::find($id);
        $order->delete();
        $order->save();
        
        return redirect()->route('pizza.index')->with('success', 'De bestelling is verwijderd.');    
    }
    

}
