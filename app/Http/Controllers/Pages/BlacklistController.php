<?php

namespace App\Http\Controllers\Pages;

use DB;
use Session;
use App\Models\User;
use App\Models\Blacklist;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsAgent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlacklistController extends Controller
{
    public function addToBlacklist()
    {
        return view('pages.blacklist.add');
    }
   
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'handphone_number' => 'nullable',
            'gender' => 'nullable',
            'ic' => 'nullable',
            'bank_account_number1' => 'nullable',
            'bank_account_number2' => 'nullable',
            'bank_account_number3' => 'nullable',
            'reason' => 'required',
            'remark' => 'nullable',
            'created_by' => 'required',
            'social_media_account' => 'nullable',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect()->route('blacklist.view')->withSuccess('You have added a person to blacklist.');
    }

    public function create(array $data)
    {
        return Blacklist::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'handphone_number' => $data['handphone_number'],
            'gender' => $data['gender'],
            'ic' => $data['ic'],
            'bank_account_number1' => $data['bank_account_number1'],
            'bank_account_number2' => $data['bank_account_number2'],
            'bank_account_number3' => $data['bank_account_number3'],
            'reason' => $data['reason'],
            'remark' => $data['remark'],
            'created_by' => $data['created_by'],
            'social_media_account' => $data['social_media_account'],
        ]);
    }
    
    //ordered by oldest record first
    public function viewBlacklist()
    {
        $blacklists = DB::table('blacklists')->leftJoin('users','blacklists.created_by','=','users.id')
        ->select('blacklists.*','users.name as uName')->paginate(5);
        return view('pages.blacklist.view')->with('blacklists',$blacklists);
        
    }

    public function edit($id)
    {
        $blacklists = Blacklist::all()->where('id',$id);
        return view('pages.blacklist.edit')->with(["blacklists" => $blacklists]);
    }

    public function searchBlacklist(Request $r)
    {
        $output = "";
        $blacklists=DB::table('blacklists')->leftJoin('users','blacklists.created_by','=','users.id')
        ->select('blacklists.*','users.name as uName')->where('blacklists.name','like','%'.$r->search.'%')->paginate(5);

        foreach($blacklists as $blacklist)
        {

            if(Auth::user()->isAdmin() || Auth::user()->id == $blacklist->created_by)
            {
                if($blacklist->deleted_by == $blacklist->uName)
                {
                    $output.=
                        '<tr style="background-color:#ff0000; color:white;">
                        <td>'.$blacklist->name.'</td>
                        <td>'.$blacklist->email.'</td>
                        <td>'.$blacklist->handphone_number.'</td>
                        <td>'.$blacklist->ic.'</td>
                        <td>'.$blacklist->reason.'</td>
                        <td>'.$blacklist->remark.'</td>
                        <td>'.$blacklist->bank_account_number1.'
                            '.$blacklist->bank_account_number2.'
                            '.$blacklist->bank_account_number3.'</td>
                        <td>'.$blacklist->gender.'</td>
                        <td style="white-space: nowrap">
                            <a href="/edit-blacklisted-person/'.$blacklist->id.'" class="btn btn-warning btn-xs">'.'Edit</a>
                            '.'
                            <a href="/delete-blacklisted-person/'.$blacklist->id.'" class="btn btn-danger btn-xs"  onClick="return confirm("Are you sure to delete?")">'.'Delete</a>
                        </td>
                        <td>'.$blacklist->uName.'</td>
                        <td>'.$blacklist->deleted_by.'</td>
                        </tr>';
                }

                else
                {
                    $output.=
                        '<tr style="background-color:#ff0000; color:white;">
                        <td>'.$blacklist->name.'</td>
                        <td>'.$blacklist->email.'</td>
                        <td>'.$blacklist->handphone_number.'</td>
                        <td>'.$blacklist->ic.'</td>
                        <td>'.$blacklist->reason.'</td>
                        <td>'.$blacklist->remark.'</td>
                        <td>'.$blacklist->bank_account_number1.'
                            '.$blacklist->bank_account_number2.'
                            '.$blacklist->bank_account_number3.'</td>
                        <td>'.$blacklist->gender.'</td>
                        <td style="white-space: nowrap">
                            <a href="/edit-blacklisted-person/'.$blacklist->id.'" class="btn btn-warning btn-xs">'.'Edit</a>
                            '.'
                            <a href="/delete-blacklisted-person/'.$blacklist->id.'" class="btn btn-danger btn-xs"  onClick="return confirm("Are you sure to delete?")">'.'Delete</a>
                        </td>
                        <td>'.$blacklist->uName.'</td>
                        <td>'.$blacklist->deleted_by.'</td>
                        </tr>';
                }
                    
            }
                    
            else if(Auth::user()->isMember())
            {
                if($blacklist->deleted_by == $blacklist->uName)
                {
                    $output.=
                            '<tr style="background-color:#ff0000; color:white;">
                            <td>'.$blacklist->name.'</td>
                            <td>'.$blacklist->email.'</td>
                            <td>'.$blacklist->handphone_number.'</td>
                            <td>'.$blacklist->ic.'</td>
                            <td>'.$blacklist->reason.'</td>
                            <td>'.$blacklist->remark.'</td>
                            <td>'.$blacklist->bank_account_number1.'
                                '.$blacklist->bank_account_number2.'
                                '.$blacklist->bank_account_number3.'</td>
                            <td>'.$blacklist->gender.'</td>
                            <td>'.$blacklist->uName.'</td>
                            <td>'.$blacklist->deleted_by.'</td>
                            </tr>';
                }

                else
                {
                    $output.=
                            '<tr>
                            <td>'.$blacklist->name.'</td>
                            <td>'.$blacklist->email.'</td>
                            <td>'.$blacklist->handphone_number.'</td>
                            <td>'.$blacklist->ic.'</td>
                            <td>'.$blacklist->reason.'</td>
                            <td>'.$blacklist->remark.'</td>
                            <td>'.$blacklist->bank_account_number1.'
                                '.$blacklist->bank_account_number2.'
                                '.$blacklist->bank_account_number3.'</td>
                            <td>'.$blacklist->gender.'</td>
                            <td>'.$blacklist->uName.'</td>
                            <td>'.$blacklist->deleted_by.'</td>
                            </tr>';
                }
                        
            }

            else
            {
                if($blacklist->deleted_by == $blacklist->uName)
                {
                    $output.=
                        '<tr style="background-color:#ff0000; color:white;">
                            <td>'.$blacklist->name.'</td>
                            <td>'.$blacklist->email.'</td>
                            <td>'.$blacklist->handphone_number.'</td>
                            <td>'.$blacklist->ic.'</td>
                            <td>'.$blacklist->reason.'</td>
                            <td>'.$blacklist->remark.'</td>
                            <td>'.$blacklist->bank_account_number1.'
                                '.$blacklist->bank_account_number2.'
                                '.$blacklist->bank_account_number3.'</td>
                            <td>'.$blacklist->gender.'</td>
                            <td style="white-space: nowrap">
                                N/A
                            </td>
                            <td>'.$blacklist->uName.'</td>
                            <td>'.$blacklist->deleted_by.'</td>
                            </tr>';
                }

                else
                {
                    $output.=
                        '<tr style="background-color:#ff0000; color:white;">
                            <td>'.$blacklist->name.'</td>
                            <td>'.$blacklist->email.'</td>
                            <td>'.$blacklist->handphone_number.'</td>
                            <td>'.$blacklist->ic.'</td>
                            <td>'.$blacklist->reason.'</td>
                            <td>'.$blacklist->remark.'</td>
                            <td>'.$blacklist->bank_account_number1.'
                                '.$blacklist->bank_account_number2.'
                                '.$blacklist->bank_account_number3.'</td>
                            <td>'.$blacklist->gender.'</td>
                            <td style="white-space: nowrap">
                                N/A
                            </td>
                            <td>'.$blacklist->uName.'</td>
                            <td>'.$blacklist->deleted_by.'</td>
                            </tr>';
                }
                        
            }

        }
        
        return response($output);
    }

    public function update(Request $r)
    {
        $blacklists = Blacklist::find($r->id);

        $r->validate([
            'name' => 'required',
            'email' => 'required',
            'handphone_number' => 'nullable',
            'gender' => 'nullable',
            'ic' => 'nullable',
            'bank_account_number1' => 'nullable',
            'bank_account_number2' => 'nullable',
            'bank_account_number3' => 'nullable',
            'reason' => 'required',
            'remark' => 'nullable',
            'social_media_account' => 'nullable',
        ]);

        $blacklists->name = $r->name;
        $blacklists->email = $r->email;
        $blacklists->handphone_number = $r->handphone_number;
        $blacklists->gender = $r->gender;
        $blacklists->ic = $r->ic;
        $blacklists->bank_account_number1 = $r->bank_account_number1;
        $blacklists->bank_account_number2 = $r->bank_account_number2;
        $blacklists->bank_account_number3 = $r->bank_account_number3;
        $blacklists->reason = $r->reason;
        $blacklists->remark = $r->remark;
        $blacklists->save();

        Session::flash('success',"Blacklisted person was updated successfully!");
        return redirect()->route('blacklist.view');
    }

    public function delete($id)
    {
        $blacklists = Blacklist::find($id);
        $blacklists->deleted_by = Auth::user()->name;
        $blacklists->save();

        Session::flash('success',"Blacklisted person was deleted from record successfully!");
        return redirect()->back();
    }

    public function displayNewerFirst()
    {
        $blacklists = DB::table('blacklists')->leftJoin('users','blacklists.created_by','=','users.id')
        ->select('blacklists.*','users.name as uName')->orderBy('id','desc')->paginate(5);
        return view('pages.blacklist.view')->with('blacklists',$blacklists);
    }

    //display name that start with A first
    public function displayAlphabetically()
    {
        $blacklists = DB::table('blacklists')->leftJoin('users','blacklists.created_by','=','users.id')
        ->select('blacklists.*','users.name as uName')->orderBy('name')->paginate(5);
        return view('pages.blacklist.view')->with('blacklists',$blacklists);
    }

    //display name that start with Z(if any) first
    public function displayAlphabeticallyDesc()
    {
        $blacklists = DB::table('blacklists')->leftJoin('users','blacklists.created_by','=','users.id')
        ->select('blacklists.*','users.name as uName')->orderBy('name','desc')->paginate(5);
        return view('pages.blacklist.view')->with('blacklists',$blacklists);
    }
}
