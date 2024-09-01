<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function index()
    {
        #using compact
        // return view("welcome", compact("name"));

        #using associative array
        // return view("welcome", array(
        //     'name' => $name,
        // ));
        // < -------------  OR this also associative array ----------> 
        // $data['name'] = 'Aayush';
        // $data['city'] = 'Syd';
        // return view("welcome", $data);

        //with 
        // return view("welcome")->with('name', $name);

        return view('welcome');
    }
    public function about()
    {
        return view("about");
    }
    public function eloquntorm()
    {
        return "Learning to update database with qloquant ORM";
        #<--------- Inserting the data to table option -1 --------->
        // $party = new Party;
        // $party->full_name = 'Shiv';
        // $party->save();
        // return "Database operation";

        #<--------- Option 2 --------->
        // $param = array(
        //     "full_name" => "Alex",
        //     "phone_no" => '1234421'
        // );
        // Party::create($param);
        // return "Database operation option 2";

        #< ----------- How to read all data ----------->
        // $parties = Party::all();
        // dd($parties);

        #< ----------- How to select by id ----------->
        // $id = 1;
        // $party = Party::find(1);
        // dd($party);

        #< ----------- Select by any other column ----------->
        // $party = Party::where("phone_no", "1234421")->get();
        // dd($party);

        #< ----------- Update ----------->
        // $id = 1;
        // $party = Party::find($id);
        // $party->full_name = "Aayush Bartaula";
        // $party->save();
        // return "Database Updated";

        #< ----------- Delete ----------->
        // $id = 2;
        // $party = Party::find($id);
        // $party->delete();
        // return "Database Deleted";
    }
    public function querybuilder()
    {
        // return "Learning to update database with Querybuild";
        #< ----------- Insert ----------->
        $param = [
            'full_name' => "Facads query"
        ];
        // DB::table('parties')->insert($param);

        #< ----------- Select all ----------->
        $party = DB::table('parties')->get();
        // echo "<pre>";
        // print_r($party);

        #< ----------- Select on base of specific ----------->
        $id = 6;
        // $party = DB::table('parties')->where('id', $id)->get();
        // echo "<pre>";
        // print_r($party);

        #< ----------- Update ----------->
        $param = ['full_name' => 'Abishek Bartaula'];
        // DB::table('parties')->where('id', $id)->update($param);

        #< ----------- Delete ----------->
        // DB::table('parties')->where('id', $id)->delete();
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    #funciton to soft delete
    public function softDelete($table, $id)
    {
        return $table . '' . $id;
    }
}
