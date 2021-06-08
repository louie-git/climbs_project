@extends('layout.superadmin')
@section('content')
    
<div class="container" style="margin-top: 30px">
    <div class="row">
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
        @if (count($accounts)>0)
        <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Branch</th>
                <th scope="col">Department</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{$account->last_name}}, {{$account->first_name}} {{$account->middle_name}}</td>
                        
                        @foreach ($account->branch as $branch)
                            <td>
                                {{$branch->branch_name}}
                            </td>
                        @endforeach
                        
                        @foreach ($account->department as $dept)
                            <td>
                                {{$dept->department_name}}
                            </td>
                            
                        @endforeach
                        
                        <td>
                            @if ($account->acc_status=='Enabled')
                                <div class="dropdown">
                                <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$account->acc_status}}
                                </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class=" d-flex justify-content-around">
                                            <form method="POST">
                                                {{ csrf_field() }}
                                                {{method_field('PUT')}}
                                                <input type="hidden" name="id" value="{{$account->user_id}}">
                                                <button class="btn btn-success btn-sm" name="status" value="Enabled" formaction="{{url('/update_account_status')}}">Enable</button>
                                                <button class="btn btn-danger btn-sm" name="status" value="Disabled" formaction="{{url('/update_account_status')}}">Disable</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="dropdown">
                                <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$account->acc_status}}
                                </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class=" d-flex justify-content-around">
                                            <form method="POST">
                                                {{ csrf_field() }}
                                                {{method_field('PUT')}}
                                                <input type="hidden" name="id" value="{{$account->user_id}}">
                                                <button class="btn btn-success btn-sm" name="status" value="Enabled" formaction="{{url('/update_account_status')}}">Enable</button>
                                                <button class="btn btn-danger btn-sm" name="status" value="Disabled" formaction="{{url('/update_account_status')}}">Disable</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            @endif
                        </td>
                    </tr>
                @endforeach
                
              
            </tbody>
          </table>
          @else
            <div class="text center">
                <h3>No Results found!!</h3>
            </div>
          @endif
    </div>
</div>
@endsection