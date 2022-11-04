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
    .card{
    width:fit-content;
    padding:20px;  
}
    .row{
        margin-right:0 !important;
    }
    th{
        font-weight:500; 
         cursor: pointer;
    }
    .long{
        min-width:120px
    }
    </style>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>     -->
<script type="text/javascript" src="/js/sortTable.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('css/search.css') }}">
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-6">
    @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>  
                        @endif
        <br>
    <div class="card">
    <h3>Members Information</h3><br>
    @if (auth()->user()->isAgent() && auth()->user()->permission == '2')

    @else
    <button style="width:50px;height:30px; font-size:12px;padding:0;" class="btn btn-primary" onclick= "window.location.href = '/user-registration';">Create</button>
    @endif

    <div class="col-md-10" style="max-width:99% !important;">
        <input type="search" id="search" name="search" placeholder="Search for names..">
    </div>

   <table id="mylists"class="table table-bordered" style="font-size:11px;">
            <thread>
                <tr class="trhead">
                <th onclick="sortTable(0)">Name</th>
                <th onclick="sortTable(1)">Email</th>
                <th onclick="sortTable(2)">IC</th>
                <th onclick="sortTable(3)">Bank Account Number</th>
                <th onclick="sortTable(4)">Handphone Number</th>
                <th onclick="sortTable(5)">Gender</th>
                <th onclick="sortTable(6)">Created By</th>
                <th>Action</th>
                    
                </tr>
            </thread>
            <tbody class="alldata">
                @foreach($users as $viewMember)
                <tr>
                    <td>{{ $viewMember->name }}</td>
                    <td>{{ $viewMember->email }}</td>
                    <td class="long">{{ $viewMember->ic }}</td>
                    <td>{{ $viewMember->bank_account_number1 }}
                        {{ $viewMember->bank_account_number2 }}
                        {{ $viewMember->bank_account_number3 }}
                    </td>
                    <td class="long">{{ $viewMember->handphone_number }}</td>
                    <td>{{ $viewMember->gender }}</td>
                    <td>{{ $viewMember->created_by }}</td>
                    @if(auth()->user()->isAdmin() || auth()->user()->name == $viewMember->created_by)
                    <td  style='white-space: nowrap'><a href="{{ route('member.edit',['id'=>$viewMember->id]) }}" class="btn btn-warning btn-xs" 
                    style="width:35px;height:25px; font-size:11px; padding:3px;">Edit</a>
                   <a href="{{ route('member.delete',['id'=>$viewMember->id]) }}" class="btn btn-danger btn-xs"  
                   onClick="return confirm('Are you sure to delete?')" style="width:35px;height:25px; font-size:11px; padding:3px;">Delete</a></td> 
                    @else
                    <td>N/A</td> 
                    @endif
                </tr>
                @endforeach
            </tbody> 

            <tbody id="Content" class="searchdata">

            </tbody>
        </table>
        <div>
        {{ $users -> links("pagination::bootstrap-4")}}</div>
        <br>
        </div>
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
            url: '{{URL::to('search-member') }}',
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