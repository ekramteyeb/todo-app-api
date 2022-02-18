<?php
   
namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use Validator;
use Illuminate\Support\Facades\Gate;


class ProductController extends BaseController
{

    public function index(Request $request)
    {
        $products = Product::all();
       
        /* $products = Product::where('user_id', Auth::id())->when(isset($request->status), function($query) use ($request) {
            $query->where('status','=', $request->status);
        })->get(); */
        return $this->handleResponse(ProductResource::collection($products), 'products have been retrieved!');
    }
    

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'status' => 'required',/* , Rule::in(['Available','NotAvailable','Coming Soon']) */
            'price' => 'required',
            'category' => 'required',
            'image' => 'nullable',
            'details' => 'nullable',
           
        ]);
        if($validator->fails()){
            //return $this->handleError($validator->errors());       
            return $this->handleError($validator->errors());       
        }
        //$input->user_id = Auth::id();
        //$input['user_id'] = Auth::id();
        //$input['status'] = $request['status'] ? $input['status'] : 'Available'; 
        $product = Product::create($input);
        return $this->handleResponse(new ProductResource($product), 'Product created!');
    }

    public function show($id)
    {
        $Product = Product::find($id);
        if (is_null($Product) || ($Product['user_id'] !== Auth::id())) {
            return $this->handleError('Product not found!');
        }
        return $this->handleResponse(new ProductResource($Product), 'Product retrieved.');
    }
    

    public function update(Request $request, Product $Product)
    {
        //autorization done by Gate which is configured in Providers/AuthServiceProvider.php
        if(!Gate::allows('update-Product', $Product)){
            abort(403);
        }

        //Similarly authorization can be done manually like this ,check if the user is the owner of the Product
        /* if( $Product['user_id'] != Auth::id()){
            return $this->handleError('Unauthorized operation'); 
        } */
        $input = $request->all();

        $validator = Validator::make($input, [
            'status' => 'nullable',
            'description' => 'nullable' ,
            'name' => 'nullable'
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
         
        //check if a given column value is provided and insert , else leave intact 
        $Product->name = $request->name ? $input['name'] : $Product->name;
        $Product->description = $request->description ? $input['description'] : $Product->description ;
        $Product->status = $request->status ? $input['status'] : $Product->status;
        $Product->save();
        
        return $this->handleResponse(new ProductResource($Product), 'Product successfully updated!');
    }
   
    public function destroy(Product $Product)
    {
        //check if the user is the owner of the Product
        if(!Gate::allows('delete-Product', $Product)){
            abort(403);
        }
        /* if( $Product['user_id'] != Auth::id()){
            return $this->handleError('Unauthorized operation'); 
        } */
        $Product->delete();
        return $this->handleResponse([], 'Product deleted!');
    }
}