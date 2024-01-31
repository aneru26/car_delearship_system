<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Hash;

class DealerController extends Controller
{
    public function list()
    {
        $data['getRecord']= User::getDealer();
        $data['header_title'] = "Dealer List ";
        return view('admin.dealer.list',$data);
    }

    public function add()
    {
        $data['header_title'] = "Add Dealer";
        return view('admin.dealer.add',$data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            
        ]);

        $dealer = new User;
        $dealer->name = trim($request->name);
        $dealer->last_name = trim($request->last_name);
        $dealer->gender = trim($request->gender);

        if ($request->hasFile('profile_pic') && $request->file('profile_pic')->isValid()) 
        {
            $file = $request->file('profile_pic');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
    
            $uploadPath = public_path('upload/profile');

        // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
        $file->move($uploadPath, $filename);

        $dealer->profile_pic = $filename;
        }
        $dealer->status = trim($request->status);
        $dealer->email = trim($request->email);
        $dealer->password = Hash::make($request->password);
        $dealer->user_type = 3;
        $dealer->save();

        return redirect('admin/dealer/list')->with('succes',"Dealer successfully added");

        
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
        
            $data['header_title'] = "Edit Dealer ";
            return view('admin.dealer.edit',$data);
        }
       
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
           

            
        ]);

        $dealer = User::getSingle($id);
        $dealer->name = trim($request->name);
        $dealer->last_name = trim($request->last_name);   
        $dealer->gender = trim($request->gender);


        if(!empty($request->file('profile_pic')))
        {
            if(!empty($dealer->getProfile))
            {
                unlink('upload/profile/'.$dealer->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(30);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/profile/'), $filename);

            $dealer->profile_pic = $filename;
        }

        $dealer->status = trim($request->status);
        $dealer->email = trim($request->email);
        
        $dealer->password = Hash::make($request->password);
        $dealer->save();

        return redirect('admin/dealer/list')->with('succes',"Dealer successfully updated");

       
    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();

            return redirect()->back()->with('succes',"Dealer successfully Deleted");
        }
        else
        {
            abort(404);
        }
        
    }
}
