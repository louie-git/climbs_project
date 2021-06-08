@extends('layout.app')

@section('content')
<div class="container-fluid" style="margin-left:250px">
    <div class="row">
        <div class="col-lg-2">
            @foreach ($document as $item)
                <h2>Folder:&nbsp;{{$item->folder}}</h2><br>
            @endforeach
            <div>
                @foreach ($document as $item)
                    <h4>Title:&nbsp;{{$item->title}}</h4>
                    <h5>Description:&nbsp;{{$item->description}}</h5><br>
                    <p>Uploaded:&nbsp;{{$item->created_at}}</p>
                    <p>Updated: &nbsp;{{$item->updated_at}}</p>
                @endforeach
                <button onclick="history.back()" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i>&nbsp;Return</button>
            </div>
        </div>
        <div class="col-lg-10">
            <div>
                @foreach ($document as $item)
                {{-- {{-- <embed src="{{url('storage/'.$document->file)}}" height="200" width="300" type="application/pdf"> --}}
                <iframe src="{{url('storage/'.$item->file.'#toolbar=0')}}"  style="height: 750px;width: 1050px; border:5px solid" ></iframe>
                @endforeach
            </div>
        </div>
    </div>
    
</div>
    
@endsection