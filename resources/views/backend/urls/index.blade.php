@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Short URL
                <a href="{{ route('urls.create') }}" class="btn btn-success float-end">Generate Short URL</a>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @elseif($message = Session::get('error'))
                <div class="alert alert-danger">
                </div>
                @endif
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Original URL</th>
                            <th>Short URL</th>
                            <th>Cliked</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($urls as $url )
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $url->original_url }}</td>
                            <td><a href="{{ url('/') }}/{{ $url->short_url }}" target="_blank">{{ url('/') }}/{{
                                    $url->short_url }}</a></td>
                            <td>{{ $url->clicks }}</td>
                            <td class=""><a class="btn btn-info btn-sm" href="{{ route('urls.show',$url->id) }}">View
                                    Stat</a> <a class="btn btn-warning btn-sm"
                                    href="{{ route('urls.edit',$url->id) }}">Edit</a>
                                <form method="post" action="{{ route('urls.destroy', $url->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No Data Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
