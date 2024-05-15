<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ProductFormController extends Controller
{


    public function create()
    {
        return view('user.book.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateProductRequest $request)
    {
        if ($request->hasFile('upload_file')) {
            try {
                $file = $request->file('upload_file');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('uploads', $filename, 'public');

                // Log the successful upload
                Log::info('File uploaded successfully:', [
                    'filename' => $filename,
                    'path' => $path
                ]);
            } catch (\Exception $e) {
                Log::error('File upload error:', [
                    'error' => $e->getMessage()
                ]);
                return back()->with('error', 'File upload failed');
            }
        }

        $product = new Product();

        $product->paper_cups = $this->serializeProductData($request, 'paper_cups_size', 'paper_cups_quantity');
        $product->paper_bags_no_handle = $this->serializeProductData($request, 'paper_bags_no_handle_size', 'paper_bags_no_handle_quantity');
        $product->paper_bags = $this->serializeProductData($request, 'paper_bags_size', 'paper_bags_quantity');
        $product->plastic_cups = $this->serializeProductData($request, 'plastic_cups_size', 'plastic_cups_quantity');
        $product->transparent_cups = $this->serializeProductData($request, 'transparent_cups_size', 'transparent_cups_quantity');
        $product->reusable_cups = $this->serializeProductData($request, 'reusable_cups_size', 'reusable_cups_quantity');
        $product->pizza_box = $this->serializeProductData($request, 'pizza_box_size', 'pizza_box_quantity');
        $product->other = $this->serializeProductData($request, 'other_size', 'other_quantity');

        $product->comment = $request->comment;
        $product->contact = $request->contact;
        $product->company_name = $request->company_name;
        $product->phone = $request->phone;
        $product->email = $request->email;
        $product->terms = $request->terms;

        try {
            $product->save();
            return redirect()->back()->with('success', 'Product information saved successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save product information: ' . $e->getMessage());
        }
    }
    private function serializeProductData($request, $sizeKey, $quantityKey) {
        return json_encode([
            'size' => $request->input($sizeKey),
            'quantity' => $request->input($quantityKey)
        ]);
    }
}
