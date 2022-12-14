@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Blogs</h2>
            </div>
            <div class="pull-right">
                @can('blog-create')
                <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create New Blogs</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            
            <th width="280px">Action</th>
        </tr>
	    @foreach ($blogs as $blog)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $blog->title }}</td>
	       
	        <td>
                <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('blogs.show',$blog->id) }}">Show</a>
                    @can('blog-edit')
                    <a class="btn btn-primary" href="{{ route('blogs.edit',$blog->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('blog-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
    
            <td>
	    </tr>
	    @endforeach
    </table>


    {!! $blogs->links() !!}



@endsection