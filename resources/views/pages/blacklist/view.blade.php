@extends('layout')
@include('sidenav')
@section('content')
<style>
    table {
    font-size:14px;
}
    .trhead{
        background-color: #37758f;
        color:white;
    }

    tr:nth-child(even) {
  background-color: #f5f5f5;
}
    .row{
        margin-right:0 !important;
       
    }
    th{
        font-weight:500; 
         cursor: pointer;
    }
        .long{
        min-width:120px;
    }


    </style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>    
<script type="text/javascript" src="/js/sortTable.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="{{ url('/css/search.css') }}">
<div class="row" style=" margin-left:70px !important;">
    <div class="col-sm-6" style="padding:0px!important;">
        <br>
        <div class="card-body" style="padding-top:0 !important;padding-left:10px !important;">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}  
                </div>  
            @endif   
       <a href="{{route('blacklist.view')}}" style="color:black; text-decoration:none;"><h3>Blacklists</h3></a>
       @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
            <br><button style="width:50px;height:30px; font-size:12px;padding:0;" class="btn btn-primary" onclick= "window.location.href = '/add-to-blacklist';">Create</button>                        
            @endif 

    <!-- Search -->
    <div class="col-md-10">
        <input type="search" id="search" name="search" style="float:left; margin-top:10px;margin-left:-15px;" placeholder="Search for names..">
    </div>


      <!-- Table -->
        <table  id="mylists" class="table table-bordered" style="margin-top:10px; font-size:11px;">
            <thread>
                <tr class="trhead"style="font-size:12px; font-weight:bold;">
                    <!-- <th style='white-space: nowrap'>Name
                         <a href="{{route('blacklist.view.name')}}" style="text-decoration:none; color:white;">&#8593</a> 
                         <a href="{{route('blacklist.view.name.desc')}}" style="text-decoration:none; color:white;">&#8595</a> 
                    </th> -->
                    <th onclick="sortTable(0)">Name</th>
                    <th onclick="sortTable(1)" >Email</th>
                    <th onclick="sortTable(2)">Contact Number</th>
                    <th onclick="sortTable(3)">IC Number</th>
                    <th onclick="sortTable(4)">Reason</th>
                    <th onclick="sortTable(5)">Remark</th>
                    <th onclick="sortTable(6)">Bank Account</th>
                    <th onclick="sortTable(7)">Gender</th>    
                    <th onclick="sortTable(8)">Social Media Account</th>
                    @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
                    <th>Action</th>
                    @endif     
                    <th onclick="sortTable(9)">Created by</th>
                    <th onclick="sortTable(10)">Deleted by</th>
                </tr>
            </thread>
            <tbody class="alldata">
                @foreach($blacklists as $viewBlacklist)
                @if($viewBlacklist->deleted_by == $viewBlacklist->uName) 
                <tr style="background-color:#D10000; color:white;">
                    <td>{{ $viewBlacklist->name }}</td>
                    <td>{{ $viewBlacklist->email }}</td>
                    <td class="long">{{ $viewBlacklist->handphone_number }}</td>
                    <td class="long">{{ $viewBlacklist->ic }}</td>
                    <td class="long">{{ $viewBlacklist->reason }}</td>
                    <td class="long">{{ $viewBlacklist->remark }}</td>
                    <td>{{ $viewBlacklist->bank_account_number1 }}
                        {{ $viewBlacklist->bank_account_number2 }}
                        {{ $viewBlacklist->bank_account_number3 }}
                    </td>
                    <td>{{ $viewBlacklist->gender }}</td>
                    <td>{{ $viewBlacklist->social_media_account }}</td>
                    @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
                    <td style='white-space: nowrap'>
                        @if(auth()->user()->isAdmin() || auth()->user()->id == $viewBlacklist->created_by)
                        <a href="{{ route('edit.blacklist',['id'=>$viewBlacklist->id]) }}"  style="width:35px;height:25px; font-size:11px; padding:3px;" class="btn btn-warning btn-xs">Edit</a>
                        <a href="{{ route('blacklist.delete',['id'=>$viewBlacklist->id]) }}" style="width:40px;height:25px; font-size:11px; padding:3px;" id="rowClick "class="btn btn-danger btn-xs"
                        onClick="return confirm('Are you sure to delete?')">Delete</a>
                        @else
                        N/A
                        @endif
                    </td>
                    @endif
                    <td>{{ $viewBlacklist->uName }}</td>
                  
                    <td>{{ $viewBlacklist->deleted_by }}</td> 
                    @else 
                    <tr>
                    <td>{{ $viewBlacklist->name }}</td>
                    <td>{{ $viewBlacklist->email }}</td>
                    <td class="long">{{ $viewBlacklist->handphone_number }}</td>
                    <td class="long">{{ $viewBlacklist->ic }}</td>
                    <td class="long">{{ $viewBlacklist->reason }}</td>
                    <td class="long">{{ $viewBlacklist->remark }}</td>
                    <td>{{ $viewBlacklist->bank_account_number1 }}
                        {{ $viewBlacklist->bank_account_number2 }}
                        {{ $viewBlacklist->bank_account_number3 }}
                    </td>
                    <td>{{ $viewBlacklist->gender }}</td>
                    <td>{{ $viewBlacklist->social_media_account }}</td>
                    @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
                    <td style='white-space: nowrap'>
                        @if(auth()->user()->isAdmin() || auth()->user()->id == $viewBlacklist->created_by)
                        <a href="{{ route('edit.blacklist',['id'=>$viewBlacklist->id]) }}" style="width:35px;height:25px; font-size:11px; padding:3px;" class="btn btn-warning btn-xs">Edit</a>
                        <a href="{{ route('blacklist.delete',['id'=>$viewBlacklist->id]) }}" id="rowClick " style="width:40px;height:25px; font-size:11px; padding:4px;" class="btn btn-danger btn-xs"
                        onClick="return confirm('Are you sure to delete?')">Delete</a>
                        @else
                        N/A
                        @endif
                    </td>
                    @endif
                    <td>{{ $viewBlacklist->uName }}</td> 
                    <td>{{ $viewBlacklist->deleted_by }}</td> 
                    @endif
                </tr>
                @endforeach
            </tbody>

            <tbody id="Content" class="searchdata">

            </tbody>
        </table>
        {{ $blacklists -> links("pagination::bootstrap-4")}}
        <br><br>
    </div>
</div>
<script type="text/javascript">

    $('#search').on('keyup',function()
    {
        $value = $(this).val();

        if($value)
        {
            $('.alldata').hide();
            $('.searchdata').show();
        }
        else
        {
            $('.alldata').show();
            $('.searchdata').hide();
        }

        $.ajax({
            
            type: 'get',
            url: '{{URL::to('search-blacklist') }}',
            data: {'search':$value},

            success:function(data)
            {
                console.log(data);
                $('#Content').html(data);
            }
        });
    });
             
</script>
@endsection