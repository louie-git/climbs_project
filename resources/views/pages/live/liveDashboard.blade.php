@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
          @foreach ($errors->all() as $error)
              <div class="alert alert-danger" role="alert">
                  {{$error}}
              </div>
          @endforeach
          @if (session('success'))
              <div class="alert alert-success" role="alert">
                  {{session('success')}}
              </div>   
          @endif
          @if (session('error'))
          <div class="alert alert-danger" role="alert">
              {{session('error')}}
          </div>   
          @endif
            <div>
                <table class="table table-striped ">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Update File</th>
                        <th scope="col">View</th>
                        <th scope="col">Download</th>
                        <th scope="col">Archive</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($documents as $document)
                      <tr>
                          <td style="display: none">{{$document->id}}</td>
                          <td>{{$document->title}}</td>
                          <td>{{$document->description}}</td>
                          <td>{{$document->file_name}}</td>
                          <td>{{$document->branch}}</td>
                          <td style="display: none">{{$document->folder}}</td>
                          <td>
                            <button type="button" class="btn btn-info btn-sm updatebtn" data-toggle="modal"  data-target="#updateModal">
                                <i class="fas fa-sync"></i>&nbsp;
                                Update
                            </button>
                          </td>
                          <td><a href="/folder1/{{$document->title}}" class="btn btn-success btn-sm"><i class="far fa-eye"></i>&nbsp;View</a></td>
                          <td>
                              <a href="{{url('storage/'.$document->file)}}">
                                  <button class="btn btn-primary btn-sm"><i class="fas fa-file-download"></i>&nbsp;Download</button>
                              </a>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>&nbsp;Archive</button>
                            </td>
                      </tr>
                          
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadModal">
      <i class="fas fa-file-upload"></i>&nbsp;
      Upload File
    </button>
   
</div>

<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Folder 2: Upload File </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('/upload_life')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="modal-body">
          <label>Title</label>
          <input type="text" name="title" class="form-control">
          <label>Description</label>
          <input type="text" name="desc" class="form-control">
          <label for="">Branch</label>
          @foreach (Auth::user()->branch as $item)
            <input type="text" name="branch" value="{{$item->branch_name}}" class="form-control" readonly>
          @endforeach
          <label for="">Department</label>
          @foreach (Auth::user()->department as $item)
            <input type="text" name="dept" value="{{$item->department_name}}" class="form-control" readonly>
          @endforeach
          <label>Upload PDF File</label>
          <input type="file" name="file" class="form-control-file">
          <input type="hidden" name="folder" value="Life">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="sumbmit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Folder2 : Update File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('/update_file')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <div class="modal-body">
            <input type="hidden" name="id" id="updid">
            <label>Title</label>
            <input type="text" name="title" class="form-control" id="updtitle">
            <label>Description</label>
            <input type="text" name="desc" class="form-control" id="upddesc">
            <label>Current File Name</label>
            <input type="text" name="old_file" class="form-control" id="updfile" readonly>
            <label>Current Folder</label>
            <input type="text" name="folder" class="form-control" id="updFolderLoc">
            <label>Upload New File</label>
            <input type="file" name="file" class="form-control-file" >
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>


<script>
    $(document).ready(function() {
    $('.updatebtn').on('click',function() {
    $tr = $(this).closest('tr');
    var data = $tr.children('td').map(function (){
        return $(this).text();
  
    }).get();
    console.log(data);
    $('#updid').val(data[0]);
    $('#updtitle').val(data[1]);
    $('#upddesc').val(data[2]);
    $('#updfile').val(data[3]);
    $('#updFolderLoc').val(data[4]);
    });      
  });
</script>
    
@endsection