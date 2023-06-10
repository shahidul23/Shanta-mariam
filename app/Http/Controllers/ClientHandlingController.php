<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use DB;

class ClientHandlingController extends Controller
{
    public function collerNumber($number){
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        $info = DB::table('moriams')->where('phone', $number)->latest()->first();
        if ($info) {
            return view('CRM._user_info',compact('data','info'));
        } else {
            return view('CRM.popup',compact('data','number'));
        }
        
        return view('CRM.popup',compact('data','number'));
    }
    public function outbound(){
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('CRM.manual',compact('data'));

    }
    public function OutboundDataSubmit(Request $request){
        $user = array();
        if (Session::has('loginId')) {
            $user = User::where('id','=',Session::get('loginId'))->first();
        }
        $request->validate([
            'phone' => 'required|max:11|min:7',
            'name' => 'required|max:100',
        ]);
        $data = array();
        $data['date'] = date('Y-m-d H:i:s'); 
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['Program'] = $request->program;
        $data['remark'] = $request->remarks;
        $data['call_type'] = $request->Outbound;
        $data['agent_name'] = $user->name;
        $data['agent_id'] = $user->id;
        $result = DB::table('moriams')->insert($data);
        if ($result) {
            return redirect()->route('client.list')->with('success','Student details save successfully');
        } else {
            return back()->with('error','Student details dose not save !');
        }
    }
    public function InboundDataSubmit(Request $request){
        $user = array();
        if (Session::has('loginId')) {
            $user = User::where('id','=',Session::get('loginId'))->first();
        }
        $request->validate([
            'phone' => 'required|max:11|min:7',
            'name' => 'required|max:100',
        ]);
        $data = array();
        $data['date'] = date('Y-m-d H:i:s'); 
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['Program'] = $request->program;
        $data['remark'] = $request->remarks;
        $data['call_type'] = $request->Inbound;
        $data['agent_name'] = $user->name;
        $data['agent_id'] = $user->id;
        $result = DB::table('moriams')->insert($data);
        if ($result) {
            return redirect()->route('client.list')->with('success','Student details save successfully');
        } else {
            return back()->with('error','Student details dose not save !');
        }
    }

    public function clientList(){
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        if ($data->is_admin==1) {
            $info = DB::table('moriams')->orderBy('id', 'DESC')->get();
            return view('CRM.table._client_list',compact('data','info'));
        }else{
            $info = DB::table('moriams')->where('agent_id',$data->id)->orderBy('id', 'DESC')->get();
            return view('CRM.table._client_list',compact('data','info'));
        }
    }
    public function searchClientList(Request $request){
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id','=',Session::get('loginId'))->first();
        }

        $info = DB::table('moriams')->select()
        ->where('date', '>=', $request->from_date)
        ->where('date', '<=', $request->to_date)->get();
        return view('CRM.table._client_list',compact('data','info'));    

    }
}
