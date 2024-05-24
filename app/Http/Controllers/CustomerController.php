<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Alert;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact(['customers']));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ], [
            'name.required' => 'Nama Wajib Diisi',
            'name.min' => 'Nama Kurang Dari Tiga',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Format Email Tidak Valid',
            'phone.required' => 'Nomor Handhpone Wajib Diisi',
            'address.required' => 'Alamat Wajib Diisi'
        ]);
        Customer::create($requestData);
        // Customer::create([
        //     'name'=> $request->name,
        //     'email'=> $request->email,
        //     'phone'=> $request->phone,
        //     'address'=> $request->address
        // ]);

        Alert::success('Sukses!', 'Data Berhasil Disimpan');
        return redirect('/customers');
    }
}