<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;


class ThemeController extends Controller
{
    public function home()
   {
    return view('theme.home');
   }
   public function shop()
{
    return view('theme.shop'); // أنشئ هذا الملف لاحقًا
}


    public function about()
    {
        return view('theme.about');
    }

    public function services()
    {
        return view('theme.services');
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
