<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\musers;
class Usercontroller extends Controller
{
    // 

    public function mindex() {
        $muser = musers::orderBy('id','desc')->paginate(10);
        return View('manage.index', ['manage' => $muser]);
    }

    public function index() {
        $data['product'] = Products::orderBy('id','desc')->paginate(5);
        return view('product.index', $data);
    }
    
    public function mcreate()
    {
        return view('manage.create');
    }

    public function create() {
        return view('product.create');
    }

    public function adduser(Request $request) {
        return view('managecreate');
    }

    public function mstore(Request $request) {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required',
            'Tel' => 'required',
            'Address' => 'required'
        ]);
        $muser = new musers;
        $muser->Name = $request->Name;
        $muser->Email = $request->Email;
        $muser->Tel = $request->Tel;
        $muser->Address = $request->Address;
        $muser->save();
        return redirect('/manage')->with('success', 'Users has been create successfully !!');
    }

    public function store(Request $request) {
        $request->validate([
            'Pname' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'Uid' => 'required'
        ]);

        $s_image = $request->file('image');
        $image_gen=hexdec(uniqid());
        $image_ext = strtolower($s_image->getClientOriginalExtension());
        $image_name = $image_gen.'.'.$image_ext;

        $upload_imagelocation = 'image/services/';
        $full_path = $upload_imagelocation.$image_name;

        $s_image->move($upload_imagelocation,$image_name);
        $product = new Products;
        $product->Pname = $request->Pname;
        $product->image = $full_path;
        $product->Uid = $request->Uid;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product has been create successfully !!');
    }

    public function medit($id) {
        $manage = musers::findOrFail($id);
        return view('manage.edit',compact('manage'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required',
            'Tel' => 'required',
            'Address' => 'required'
        ]);
        $manage = musers::findOrFail($id);
        $manage->Name = $request->Name;
        $manage->Email = $request->Email;
        $manage->Tel = $request->Tel;
        $manage->Address = $request->Address;
        $manage->save();
        return redirect('/manage')->with('success', 'User has been updated successfully.');

    }



    public function edit($id) {

        return view('product.edit');
    }

    // delete row product
    public function destroy($id) {
        product::destroy($id);
        return redirect()->route('product.index')->with('success', 'Company has been deleted successfully.');
    }

    public function mdestroy($id)
    {
        musers::destroy($id);
        return redirect('/manage')->with('success', 'User has been deleted successfully.');
    }
}

