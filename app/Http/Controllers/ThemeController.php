<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;


class ThemeController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::with('category')
            ->where('featured', true)
            ->take(6)
            ->get();
        
        return view('theme.home', compact('featuredProducts'));
    }

    public function shop(Request $request)
    {
        $query = Product::with('category')->latest();
        
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }
        
        $products = $query->paginate(12);
        $categories = Category::all();
        
        return view('theme.shop', compact('products', 'categories'));
    }


    public function about()
    {
        return view('theme.about');
    }

    public function services()
    {
        return view('theme.services');
    }

    public function cart()
    {
        return view('theme.cart');
    }

    public function contact()
    {
        

        $categories = Category::all();
        return view('theme.contact', compact('categories'));

        // GET RELATIONSHIP
        // $contact = Contact::find(13);
        // dd($contact->category->name);
    }

    public function store(StoreContactRequest $request)
    {
        $validatedData = $request->validated();

        // $validatedData = $request->validate([
        //     'first_name' => 'required|string|min:5',
        //     'last_name' => 'required|string',
        //     'email' => 'required|email',
        //     'message' => 'nullable',
        // ], [
        //     'first_name.required' => 'My customized version of required message for first name field',
        //     'first_name.min' => 'My customized version of MINIMUM message for first name field',
        // ]);

        Contact::create($validatedData);

        return back()->with('status', 'Your message has been sent successfully!');
    }

    public function display()
    {
        $data = Contact::paginate(5);
        return view('theme.display-contacts', compact('data'));
    }
  

}
