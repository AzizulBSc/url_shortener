@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <a id="short_url" target="_blank" style="text-decoration: none;"
                    href="{{ url('/') }}/{{ $url->short_url }}">{{ url('/') }}/{{ $url->short_url }}</a>
                <button class="btn btn-info btn-sm float-end" id="copyBtn" onclick="copyUrl()">Copy</button>
            </div>
            <div class="card-body">
                <div class="alert alert-primary" role="alert">
                    Orignal URL : <a target="_blank" href="{{ $url->original_url }}">{{ $url->original_url }}</a>
                </div>
                <div class="alert alert-warning" role="alert">
                    Total Click : {{ $url->clicks }}
                </div>
                <div class="alert alert-info" role="alert">
                    Created At : {{ $url->created_at->diffForHumans() }}
                </div>
                <a class="btn btn-primary" href="{{ route('urls.index') }}">URLs</a>
                <a class="btn btn-danger" href="{{ route('urls.edit',$url->id) }}">Edit</a>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    function copyUrl() {
       var urlElement = document.getElementById('short_url');
       var range = document.createRange();
       range.selectNode(urlElement);
       window.getSelection().removeAllRanges();
       window.getSelection().addRange(range);
       document.execCommand('copy');
       window.getSelection().removeAllRanges();
       alert('URL copied!');
      }
</script>
@endsection
@endsection
