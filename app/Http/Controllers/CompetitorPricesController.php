<?php

namespace App\Http\Controllers;

use App\CompetitorPrice;
use Illuminate\Http\Request;

class CompetitorPricesController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $competitorPrice = CompetitorPrice::findOrFail($id);
        return view('competitor-prices.edit', compact('competitorPrice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $competitorPrice = CompetitorPrice::findOrFail($id);
        $competitorPrice->update($request->only(['price']));
        return redirect(action('ProductsController@index'));
    }
}
