<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Data = \DB::table('expenses as e')
                    ->join('users as u','e.user_id','=','u.id')
                    ->join('expense_category as c','e.category_id','=','c.id')
                    ->select(
                                'e.id',
                                \DB::raw("CONCAT(u.fname,' ',u.lname) as name"),
                                'c.name as category',
                                'e.amount',
                                'e.date_entry'
                            )
                    ->get();

        return $Data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category'      => 'required',
            'amount'        => 'required|numeric|between:1,9999.99',
            'date_entry'    => 'required|date'
        ]);

        $data = new Expenses($request->all());
        $data->save();

        return response()->json('Expenses was successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Expenses::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category'      => 'required',
            'amount'        => 'required|numeric|between:1,9999.99',
            'date_entry'    => 'required|date'
        ]);

        $data = Expenses::find($id);
        $data->update($request->all());

        return response()->json('Expenses updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Expenses::find($id);
        $data->delete();

        return response()->json('Expenses deleted!');
    }
}
