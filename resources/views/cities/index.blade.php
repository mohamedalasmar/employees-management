@extends('layouts.parent')


@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-grey-800">cities</h1>
    </div>
    <div class="row ">
        <div class="card mx-auto">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('cities.index') }}" method="get">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" class="form-control  mb-2" id="inlineFormInput" name="search">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('cities.create') }}" class='btn btn-primary mb-2'>Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">State Name</th>
                                <th scope="col">City Name</th>
                                <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $city->state->name }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col col-sm-6">
                                                <a href="{{ route('cities.edit', $city->id) }}"
                                                    class="btn btn-info">Edit</a>
                                            </div>
                                            <div class="col col-sm-6">
                                                <form action="{{ route('cities.destroy', $city->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger ml-1">Delete</button>
                                                </form>
                                            </div>

                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
