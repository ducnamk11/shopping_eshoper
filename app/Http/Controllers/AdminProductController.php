<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Traits\UploadFileTrait;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    use UploadFileTrait;
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return view('admin.product.index', [
            'products' => $this->product->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.product.add',
            [
                'htmlOption' => $this->getCategory($parentId = 0)
            ]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $tag = '';
        foreach ($product->tags as $tagItem) {
            $tag .= $tagItem->name . ',';
        }
        return view('admin.product.edit', [
            'tags' => $tag,
            'product' => $product,
            'htmlOption' => $this->getCategory($product->category_id)
        ]);

    }

    public function store(StoreProduct $request)
    {
        try {
            DB::beginTransaction();
            $dataFeatureImage = $this->uploadFileTrait($request, 'feature_image_path', 'product');
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'feature_image_path' => $dataFeatureImage['file_path'],
                'feature_image_name' => $dataFeatureImage['file_name'],
                'content' => $request->content,
                'category_id' => $request->category_id,
                'user_id' => auth()->user()->id,
            ]);
            //insert data to product_images

            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $file) {
                    $dataProductImageDetail = $this->uploadFileTraitMultiple($file, 'product');
                    $product->images()->create([
                        'image_name' => $dataProductImageDetail['file_name'],
                        'image_path' => $dataProductImageDetail['file_path'],
                    ]);
                }
            }
            //insert data to tags
            if (!empty($request->tags)) {
                $tags = explode(',', $request->tags);
                foreach ($tags as $tag) {
                    //insert to tags table
                    $tagInstance = Tag::firstOrCreate(['name' => $tag]);
                    $tagId[] = $tagInstance['id'];

                }
                $product->tags()->attach($tagId);
            }
            DB::commit();
            return redirect()->route('product_index')->with('success', 'Create product successfully!');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }


    }

    public function update(UpdateProduct $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataFeatureImage = $this->uploadFileTrait($request, 'feature_image_path', 'product');
            Product::findOrFail($id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'feature_image_path' => $dataFeatureImage['file_path'],
                'feature_image_name' => $dataFeatureImage['file_name'],
                'content' => $request->content,
                'category_id' => $request->category_id,
                'user_id' => auth()->user()->id,
            ]);
            $product = Product::findOrFail($id);
            //insert data to product_images
            if ($request->hasFile('image_path')) {
                $product->images()->where('product_id', $id)->delete();
                foreach ($request->image_path as $file) {
                    $dataProductImageDetail = $this->uploadFileTraitMultiple($file, 'product');
                    $product->images()->create([
                        'image_name' => $dataProductImageDetail['file_name'],
                        'image_path' => $dataProductImageDetail['file_path'],
                    ]);
                }
            }
            //insert data to tags
            if (!empty($request->tags)) {

                $tags = explode(',', $request->tags);
                foreach ($tags as $tag) {
                    //insert to tags table
                    $tagInstance = Tag::firstOrCreate(['name' => $tag]);
                    $tagId[] = $tagInstance['id'];

                }
                $product->tags()->sync($tagId);
            }
            DB::commit();
            return redirect()->route('product_index')->with('success', 'Updated product successfully!');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }


    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product_image = Product::findOrFail($id)->images;

        //remove image detail from folder
        foreach ($product_image as $detailImage){
            $img = str_replace('/storage', '/public', $detailImage->image_path);
            Storage::delete($img);
        }
        //remove image feature from folder
        $productImage = str_replace('/storage', '/public', $product->feature_image_path);
         Storage::delete($productImage);

        $product->delete();

        return redirect()->route('product_index')->with('success', 'Deleted product successfully!');


    }

    public function getCategory($parentId)
    {
        $data = Category::all();
        $recusive = new Recusive($data);
        return $recusive->categoryRecusive($parentId);
    }

}
