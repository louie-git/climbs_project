@extends('layout.app')

@section('content')

<div class="container">
    <div class="row">
        <h1>Results</h1>
        <div class="col-lg-12">
            <table class="table table-sm">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Document Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Department</th>
                    <th scope="col">File Name</th>
                    <th scope="col">View</th>
                    <th scope="col">Download</th>
                    {{-- <th scope="col">Isle</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($documents as $document)
                    <tr>
                      <td>{{$document->title}}</td>
                      <td>{{$document->description}}</td>
                      <td>{{$document->branch}}</td>
                      <td>{{$document->department}}</td>
                      <td>{{$document->file_name}}</td>
                      <td><a href="/folder2/{{$document->title}}" class="btn btn-success btn-sm"><i class="far fa-eye"></i>&nbsp;View</a></td>
                      <td>
                        <a href="{{url('storage/'.$document->file)}}">
                            <button class="btn btn-primary btn-sm"><i class="fas fa-file-download"></i>&nbsp;Download</button>
                        </a>
                      </td>
                      
                      
                    </tr>
                      
                  @endforeach
                </tbody>
              </table>
        </div>
        <button onclick="history.back()" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i>&nbsp;Return</button>
    </div>
</div>
    
@endsection