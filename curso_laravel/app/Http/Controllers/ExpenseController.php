<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use Illuminate\Http\Request;
use App\Expense;

class ExpenseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function create(ExpenseReport $expenseReport)
    {
        return view ('expense.create',[
            'report' => $expenseReport
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ExpenseReport $expenseReport)
    {
        $expense = new Expense();
        //esta parte de codigo nos permite validar el ingreso a los input
        $validData = $request->validate([
            'description' => 'required|min:3',
            'amount' => 'required|numeric|between:0,999999,99'
        ]);

        $expense->description = $request->get('description');
        $expense->amount = $request->get('amount');
        $expense->expense_report_id = $expenseReport->id;
        $expense->save();
        //dd($request->all()); sirve para saber que es lo que estamos enviando como valors a la base de datos. 

        return redirect('/expense_reports/'.$expenseReport->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
