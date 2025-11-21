<?php

namespace App\Http\Controllers\Admin;

use App\Models\Costumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Costumer\CostumerCreateRequest;
use App\Http\Requests\Costumer\CostumerUpdateRequest;

class CostumerController extends Controller
{
    public function create(CostumerCreateRequest $request)
    {
        $validated = $request->validated();
        
        Costumer::create($validated);
        
        return redirect(route("costumer"))->with("success", "Successfully added a new customer");
    }
    
    public function update(CostumerUpdateRequest $request, $id)
    {
        $validated = $request->validated();

        Costumer::findOrFail($id)->update($validated);
        
        return redirect(route("costumer"))->with("success", "Successfully changed a new customer");
    }
    
    public function delete($id)
    {
        Costumer::findOrFail($id)->delete();
        
        return redirect(route("costumer"))->with("success", "Successfully deleted a new customer");
    }
}
