@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Generent Short URL
                <a href="{{ route('urls.index') }}" class="btn btn-success float-end">All URL</a>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
               @endif
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(session('created_url'))
                <div class="justify-content-bettween">
                    <strong> Shortend URL:</strong> <a id="short_url" target="_balnk"
                        href="{{ url('/') }}/{{ session('created_url') }}">{{ url('/') }}/{{ session('created_url')
                        }}</a>
                    @php
                    $id = session('id','');
                    @endphp
                    <a href="{{ route('urls.show',$id)}}" class="btn btn-info btn-sm float-end">View Stat</a>
                    <button id="copyBtn" onclick="copyUrl()" class="btn btn-primary btn-sm float-end">Copy Link</button>
                </div>
                <br>
                <strong> Original URL:</strong> {{
                session('long_url')
                }}
                @endif
                <br> <br>
                <form action="{{ route('urls.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="original_url" class="form-label">Long URL</label>
                        <input type="text" class="form-control" id="original_url" name="original_url"
                            aria-describedby="emailHelp" value="{{ old('original_url') }}"
                            placeholder="Enter your Long URL">
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        --}}
                    </div>
                    <button type="submit" class="btn btn-primary">Generate</button>
                </form>
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
