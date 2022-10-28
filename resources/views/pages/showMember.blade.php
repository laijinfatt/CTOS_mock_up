@extends('layout')
@include('sidenav')
@section('content')
<!-- Compatibillity issues
<script type="text/javascript">
jQuery.fn.extend({
    live: function (event, callback) {
       if (this.selector) {
            jQuery(document).on(event, this.selector, callback);
        }
    }
});
</script> -->

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
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>    
<script type="text/javascript" src="/js/sortTable.js"></script>
<script type="text/javascript" src="/js/liveSearch.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('css/search.css') }}">
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-6">
        <br>
    <div class="card">
    <h3>Members Information</h3><br>
    <button style="width:70px;" class="btn btn-primary" onclick= "window.location.href = '/user-registration';">Create</button>

    <div class="col-md-10">
        <input type="text" id="search" onkeyup="liveSearch()" placeholder="Search for names..">
    </div>

   <table id="mylists"class="table table-bordered">
            <thread>
                <tr class="trhead">
                <th onclick="sortTable(0)">Name</th>
                <th onclick="sortTable(1)">Email</th>
                <th onclick="sortTable(2)">IC</th>
                <th onclick="sortTable(3)">Bank Account Number</th>
                <th onclick="sortTable(4)">Handphone Number</th>
                <th onclick="sortTable(5)">Gender</th>
                <th>Action</th>
                    
                </tr>
            </thread>
            <tbody>
                @foreach($users as $viewMember)
                <tr>
                    <td>{{ $viewMember->name }}</td>
                    <td>{{ $viewMember->email }}</td>
                    <td>{{ $viewMember->ic }}</td>
                    <td>{{ $viewMember->bank_account_number1 }}
                        {{ $viewMember->bank_account_number2 }}
                        {{ $viewMember->bank_account_number3 }}
                    </td>
                    <td>{{ $viewMember->handphone_number }}</td>
                    <td>{{ $viewMember->gender }}</td>
                    <td  style='white-space: nowrap'><a href="{{ route('member.edit',['id'=>$viewMember->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                   <a href="{{ route('member.delete',['id'=>$viewMember->id]) }}" class="btn btn-danger btn-xs"  onClick="return confirm('Are you sure to delete?')">Delete</a></td> 
                </tr>
                @endforeach
            </tbody> 
        </table>
        <div>
        {{ $users -> links("pagination::bootstrap-4")}}</div>
        <br>
        </div>
    </div>
</div>
<!-- 
<script type="text/javascript">
             
// Search  
$(document).ready(function() {  
	// Icon Click Focus
	$('div.icon').click(function(){
		$('input#search').focus();
	});
	// Live Search
	// On Search Submit and Get Results
	function search() {
		var query_value = $('input#search').val();
 		$('b#search-string').text(query_value);
		if(query_value !== ''){
			$.ajax({
				type: "POST",
				url: "/search-member/",
				data: { query: query_value}, //this can be more complex if needed
				cache: false,
				success: function(data){
					//at each request - every written letter is request, firstly we delete old results, and fetch new ones.
                    $('#mylists').empty();
                    $.each(data.result, function(index, item) {
                        //now you can access properties using dot notation
                        //  console.log(data.result[index].first_name);
                        // Here I am fetching users names from users table, and echoing ther profile url
                          $('#mylists').append("<li><a href='" + data.result[index].permalink + "'>" + data.result[index].name + "</a></li>");
                    });
				}
			});
		}return false;    
	}
	$("input#search").live("keyup", function(e) {
		// Set Timeout
		clearTimeout($.data(this, 'timer'));
		// Set Search String
		var search_string = $(this).val();
		// Do Search
		if (search_string == '') {
			$("td#mylists").fadeOut();
			//$('h4#results-text').fadeOut();
		}else{
			$("td#mylists").fadeIn();
			//$('h4#results-text').fadeIn();
			$(this).data('timer', setTimeout(search, 100));
		};
	});
});
</script> -->
@endsection