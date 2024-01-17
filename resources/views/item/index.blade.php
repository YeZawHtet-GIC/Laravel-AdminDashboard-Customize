@extends('dashboard.index')
@section('category')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-1">
                <div class="h3 text-center">Item List</div>
                @if (session('update'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('update') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('delete') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <table class="table text-center rounded p-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Expire Date</th>
                            <th scope="col" colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->expire_date }}</td>
                                <td>
                                    <a class="btn btn-outline-primary" href="{{ route('item.show', $item) }}"><i
                                            class="fas fa-info"></i></a>
                                    <a class="btn btn-outline-warning ml-1" href="{{ route('item.edit', $item) }}"><i
                                            class="fas fa-pen"></i></a>
                                    <form class="d-inline-block ml-1" action="{{ route('item.destroy', $item) }}"
                                        method="post"
                                        onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection