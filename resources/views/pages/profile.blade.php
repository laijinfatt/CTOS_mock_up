@extends('layout')
@include('sidenav')
@section('content')
<style>
 @import url('https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap');
*{
   margin:0;
}
h2 {
    font-family: 'Noto Serif', serif; 
}
</style>
<br>
<div class="profile">
    <div class="container">
        <div class="card">
            <div class="card-header bg-transparent text-center">
            <h2>Profile</h2>
            </div>
            <div class="card-body"> 
        <div class="column" style=" float: left;padding-left:90px; margin-top:60px;">
            <div class="col-md-5">
            <div class="d-flex flex-column align-items-center text-center py-5">
            @foreach($users as $user)
            <label class="font-weight-bold" style="width:90px;">{{ $user->name }}</label>
            <label class="text-black-50">{{ $user->email }}</label>
            </div>
        </div>
</div>
        <div class="column" style=" float: left;">
        <div class="col-md-10 border-left">
            <div class="p-3 py-3">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="text-left" style="width:220px;">Profile Settings</h4>
                
                </div>
                <table>
                    <tbody>
                   
                        <tr>
                            <td>Name</td>
                            <td>:&nbsp</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:&nbsp </td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td style="width:200px;">Phone Number</td>
                            <td>:&nbsp </td>
                            <td>{{ $user->handphone_number }}</td>
                        </tr>
                        <tr>
                            <td>IC</td>
                            <td>:&nbsp </td>
                            <td>{{ $user->ic }}</td>
                        </tr>
                        <tr>
                            <td>Bank Account Number</td>
                            <td>:&nbsp </td>
                            <td>{{ $user->bank_account_number }}</td>
                        </tr>
                        <tr>
                            <td>Bank Company</td>
                            <td>:&nbsp </td>
                            <td>{{ $user->bank_company }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:&nbsp </td>
                            <td>{{ $user->gender}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:&nbsp </td>
                            <td>{{ $user->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>

            </div>
</div>
            <div class="text-right" style="position: absolute;right:40;bottom:10;">
                <button class="btn btn-primary profile-button" type="button">Save Profile</button>
            </div>

            
        </div>
</div>
    </div>
</div>


@endsection