<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Customer;
use Illuminate\Http\Request;

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


        Alert::success('Sukses!', 'Data Berhasil Disimpan');
        return redirect('/customers');
    }

    public function edit($id){

        $customer = Customer::find($id);
        return view('customers.edit', compact(['customer']));
    }

    public function update(Request $request, $id)
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
        $customer = Customer::find($id);
        $customer->update($requestData);
        Alert::success('Sukses!', 'Data Berhasil Diupdate');
        return redirect('/customers');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        Alert::success('Sukses!', 'Data Berhasil Dihapus');
        return redirect('/customers');
    }
}
