@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center justify-center-center">
                        <h6 class="col-6">Customers</h6>
                        <div class="col-6 text-end">
                            <a href="/customers/create" class="btn bg-gradient-primary">Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0" id="tabel-customer" style="max-height: 400px; overflow-y: auto;">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Phone</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Address</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td class="text-wrap">
                                            {{ $customer->address }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-1">
                                                <a href="/customers/{{ $customer->id }}/edit">
                                                    <span class="btn btn-sm bg-gradient-success">Edit</span>
                                                </a>
                                                <form class="m-0" action="/customers/{{ $customer->id }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input class="btn btn-sm bg-gradient-danger" type="submit" value="Delete">
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
