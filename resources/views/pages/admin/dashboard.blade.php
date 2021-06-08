
@extends('layout.admin')
@section('content')


<div class="container-fluid">

  <div class="row">
    <div class="col-lg-12">
      <div id="non-live" style="display: block">
        <table class="table table-sm table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Document Title</th>
              <th scope="col">Description</th>
              <th scope="col">Branch</th>
              <th scope="col">Department</th>
              <th scope="col">File Name</th>
              <th scope="col">View</th>
              <th scope="col">Download</th>
              <th scope="col">Date Uploaded</th>
              <th scope="col">Isle</th>
              <th scope="col">Manage Isle</th>
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
                <td>{{$document->created_at}}</td>
                <td>Sample</td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#isleModal">
                    Manage Isle
                  </button>
                </td>
              </tr>
                
            @endforeach
          </tbody>
        </table>
      </div>

      

<div class="modal fade" id="isleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Document Isle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('/isle_update')}}" method="POST">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Isle Location</label>
            <textarea name="isle" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
      </form>
    </div>
  </div>
</div>

    
@endsection


<script>
    function nonLife(){
        document.getElementById("non-live").style.display = "block";
        document.getElementById("live").style.display = "none";
    }
    function life(){
        document.getElementById("non-live").style.display = "none";
        document.getElementById("live").style.display = "block";
    }
</script> 