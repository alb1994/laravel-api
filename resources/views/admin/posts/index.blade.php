@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <h1 class="mb-4">I nostri post</h1>
            @if(session($message))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="col-12 mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titolo</th>
                        <th>Slug</th>
                        <th>Strumenti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> Visualizza
                            </a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Modifica
                            </a>
                            <form class="d-inline-block delete-post-form" action="{{ route('admin.posts.destroy', $post->id)}}" 
                            method="POST" onsubmit="return confirm('Sei sicuro di voler cancellare questo post?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">
                                    <i class="fa fa-trash"></i> Cancella
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin.partials.modal_delete')
@endsection