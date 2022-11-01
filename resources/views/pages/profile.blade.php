@extends('layout')
@include('sidenav')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src="jquery.3.4.1.js"></script>
        <script src="all.min.js"></script>
<style>
    table {
        font-size:21px;
        width:500px;
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
    padding:28px;  
}
    .row{
        margin-right:0 !important;
    }
    </style>

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-8">
        <br>
        
        @if(Session::has('success'))
            <center><div class="alert" style="background-color:#46C646; font-size:20px; width:350px;">
                <span class="check"><i class="fa-solid fa-check" style="font-size:20px;color:white;"></i></span>
              <span class="msg"  style="color:white; font-size:20px;">{{Session::get('success')}}</span> 
                <span class="crose" data-dismiss="alert">&times;</span>
            </div></center>
        @endif
    <div class="card" style="padding:20px !important;">
        
    <center><h3 style="color:black;">Profile</h3></center><hr style="margin:0;">
    @foreach($users as $user)



    <div class="column" style=" float: right;">
        <div class="col-md-5">
            <div class="p-3 py-3">
                    <table>
                    <tbody>
                   @csrf
            <tr>
                <td style="color:black;">Name :&nbsp;  {{ $user->name }}</td>
        </tr>

        <tr>
                <td style="color:black;">User Name :&nbsp;  {{ $user->username }}</td>
        </tr>

                    <tr>
                <td style="color:black;">Email : &nbsp; {{ $user->email }}</td>
                </tr>
            

                <tr>
                <td style="width:200px; color:black;">Phone Number : &nbsp; {{ $user->handphone_number }}</td>
                </tr>
            

                <tr>
                <td style="color:black;">IC : &nbsp; {{ $user->ic }}</td>
                </tr>
            

                <tr>
                <td style="color:black;">Bank Account Number 1 : &nbsp; {{ $user->bank_account_number1 }}</td>
                </tr>
                
                <tr>
                <td style="color:black;">Bank Account Number 2 : &nbsp; {{ $user->bank_account_number2 }}</td>
                </tr>

                <tr>
                <td style="color:black;">Bank Account Number 3 : &nbsp; {{ $user->bank_account_number3 }}</td>
                </tr>

                <tr>
                <td style="color:black;">Gender : &nbsp; {{ $user->gender}}</td>
            </tr>
            

            <!-- <tr>
                <td style="color:black;">Password : &nbsp; {{ $user->password}}</td>
            </tr> -->

                    </tbody>
                </table>
                <br><br>
                <div class="column" style="white-space: nowrap;">
 
                <a href="{{ route('profile.edit')}}" class="btn btn-warning btn-xs">Edit</a>
                <a href="{{ route('password.change')}}" class="btn btn-danger btn-xs" style="margin-left:290px;">Change Password</a> 

            </div>    
            </div>

            @endforeach

            </div>
</div>


            
        </div>
</div>
    </div>
</div>


@endsection