<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Tour;
use Illuminate\Http\Request;


use App\Http\Requests\ProductRequest;
use App\Filters\ProductFilter;
use App\Helpers\ProductHelper;


class ProductController extends Controller
{
    protected $helper;

    public function __construct (ProductHelper $helper)
    {
        $this->helper = $helper;
    }


    public function show ($id)
    {
//        Tour::where('id', $id)->first();
        $tour = Tour::with('comments', 'comments.user', 'medias')->findOrFail($id);


        $sellerTours = $tour->seller->belongingTours->except([$tour->id]);
        $similarTours = $tour->tourType->tours->except([$tour->id]);


        return view('pages.product.product', [
            'tour'         => $tour,
            'sellerTours'  => $sellerTours,
            'similarTours' => $similarTours,
        ]);
    }


    public function index (Request $request, ProductFilter $filters)
    {
        $tours = Tour::with('country', 'category', 'hotel', 'nutrition', 'tourType', 'startLocation.city', 'mainImg')
            ->filter($filters);


        $selectedTours = $tours->get();

        $plucker = function ($selector) use ($selectedTours) {
            return $selectedTours->pluck($selector)->unique()->values();
        };

        $countryNames = $plucker('country.name')->sort();
        $tourTypes = $plucker('tourType.name');
        $nutritionTypes = $plucker('nutrition.nutrition_type');
        $categories = $plucker('category.name');
        $hotels = $plucker('hotel.hotel_class');
        $prices = $plucker('price');

        $prices = $this->helper->priceRanger($prices);

        $tours = $tours->paginate(12);
        $toursCount = $tours->total();

        return view('/pages/search/search', compact(
            'tours', 'countryNames', 'tourTypes', 'nutritionTypes', 'categories', 'hotels', 'toursCount', 'prices'));

    }

    public function create (Request $request)
    {
        return view('pages.product.product-create.product-create');
    }

    public function store (ProductRequest $request)
    {

        $tour = $this->helper->createTour($request);
        return redirect()->route('product-page', $tour);
    }

    public function edit ($id)
    {
        $tour = Tour::findOrFail($id);
        return view('pages.product.product-update.product-update', compact('tour'));
    }

    public function update (ProductRequest $request, $id)
    {
        $tour = $this->helper->updateTour($request, $id);
        return redirect()->route('product-page', $tour);

    }


    public function destroy ($id)
    {
        $tour = Tour::find($id);
        $tour->medias()->detach();
        $tour->delete();
        return redirect('/');
    }

}
