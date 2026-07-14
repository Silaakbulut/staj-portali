<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GunlukController extends Controller
{
    public function index()
{
    return view('gunlukler.index');
}
public function create(){
    return view('gunlukler.create');
    }
    public function store(Request $request){
 }
 public function edit($id){

 }
 public function update(Request $request, $id){

 }
    public function destroy($id){
    }
}
