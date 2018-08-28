<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use Image;
use App\User;
use App\Post;
use App\Mailist;
use App\Order;
use Stripe\Charge;
use Stripe\Stripe;
use App\Cart;
use App\About;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(3);
        $users = User::all();
        return view('admin.index')
        ->with('products', $products)
        ->with('users', $users);

       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }
    public function newadmin()
    {
        return view('admin.addadmin');
    }
    public function addadmin(Request $request)
    {
        $this -> validate($request,[
            'admin_mail' => 'required',
            'admin_pass' => 'required',
        ]);
        $isadmin = 1;
        $adminuser = new User;
        $adminuser->name = $request->input('admin_name');
        $adminuser->email = $request->input('admin_mail');
        $adminuser->password = bcrypt($request->input('admin_pass'));
        $adminuser->status = $isadmin;
        $adminuser->save();
        return redirect('/admin')->with('success', 'New admin user is successfully created.');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'title' => 'required',
            'description' => 'required',
        ]);
        // NOVI PROIZVOD 
        $product = new Product;
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        // $product->imagePath = $request->input('imgpath');
        $product->price = $request->input('price');

        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time() . '.' . $image->GetClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize('500', '500')->save($location);

            $product->imagePath = $filename;
        }
        
        $product->save();
        return redirect('/admin')->with('success', 'Product is successfully created.');
        
    }
    public function store_mail(Request $request)
    {
        $this -> validate($request,[
            'email' => 'required',
            
        ]);
        $mail = new Mailist;
        $mail->email = $request->input('email');
        $mail->save();
        return redirect('/')->with('success', 'You succesfully subscribed to our mail list. Talk to you soon :)');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Product::find($id);
      return view('admin.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request,[
            'title' => 'required',
            'description' => 'required',
        ]);
        // Update 
        $product = Product::find($id);
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        // $product->imagePath = $request->input('imgpath');
        $product->price = $request->input('price');

        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time() . '.' . $image->GetClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize('500', '500')->save($location);

            $product->imagePath = $filename;
        }
        
        $product->save();

        return redirect('/admin')->with('success', 'Product is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin')->with('success', 'Product successfully removed.');
    }

    public function news()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.news')->with('posts', $posts);
    }
    
    public function mailist()
    {
        $mails = Mailist::All();
        return view('admin.mails')->with('mails', $mails);
    }

    public function orders()
    {
        $orders = Order::orderBy('created_at','desc')->paginate(5);   
        return view('admin.orders')
        ->with('orders', $orders);
    }
    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect('/admin/orders')->with('success', 'Order successfully removed.');
    }
    public function editaboutpage($id)
    {
        $about = About::find($id);
        return view('admin.editabout')->with('about', $about);
    }

    public function updateaboutpage(Request $request, $id)
    {
        $this -> validate($request,[
            'body' => 'required',
        ]);
        // Update 
        $about = About::find($id);
        $about->body = $request->input('body');

        $about->save();
        return redirect('/admin/edit-about-page/1/')->with('success', 'About page is successfully updated.');
    }
}
