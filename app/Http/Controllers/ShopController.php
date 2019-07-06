<?php

namespace App\Http\Controllers;

use App\Like;
use App\User;
use App\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nearby()
    {
        $currentUser = auth()->user();
        $latitude = $currentUser->lat;
        $longitude = $currentUser->lng;

        // liked shops shouldn’t be displayed on the main page
        $dislikeShops = $currentUser->likes()->where('like', false)->get()->pluck('shop_id')->toArray();
        // The Shops are ordered by the closest to the current user
        $shops = Shop::orderBy(DB::raw("3959 * acos( cos( radians($latitude) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($longitude) ) + sin( radians($latitude) ) * sin(radians(lat)) )"), 'ASC')
            ->whereNotIn('id', $dislikeShops)
            ->get();

      

        // This approach uses the Spherical Law of Cosines to get the distance
        return view('shops.nearby', compact('shops'));
    }
    public function preferred()
    {
        $currentUser = auth()->user();
        // this database query retrieve shops that the user has already liked using eloquent-relationship
        $preferredShops  = Like::with('shop')
            ->where('user_id', $currentUser->id)
            ->where('like', true)
            ->get()
            ->pluck('shop');
        return view('shops.preferred', compact('preferredShops'));
    }

    public function likeShop($shopId)
    {
        $currentUser = auth()->user();
        /** here i am checking if the user has already liked this shop,
         *  and prevent the user from liking the same shop twice
         */
        $shop = Like::where('user_id', $currentUser->id)->where('shop_id', $shopId)->first();
        if (!$shop)
        // if the user wants to like a shop for the first time. add a record to likes Table
        {
            $like = new Like();
            $like->user_id = $currentUser->id;
            $like->shop_id = $shopId;
            $like->like = true;
            // expiration date doesn't matter here because the like is equal to true
            $like->expiration_date = Carbon::now();
            $like->save();
        } else {
            // if the user wants to like a shop that he already disliked
            $shop->like = true;
            $shop->save();
        }

        response()->json(['success' => 'success'], 200);
    }
    public function dislikeShop($shopId)
    {
        $currentUser = auth()->user();
        $shop = Like::where('user_id', $currentUser->id)->where('shop_id', $shopId)->first();
        if ($shop) {
            // if the user has already liked shop and wants to dislike the shop I only update the existing record in the likes Table
            $shop->like = false;
            $shop->save();
        } else {
            // if the user dislikes a shop for the first time a new record will be added to likes Table
            $like = new Like();
            $like->user_id = $currentUser->id;
            $like->shop_id = $shopId;
            $like->like = false;
            // set expiration date to current time plus two hours
            $like->expiration_date = Carbon::now()->addHours(2);
            $like->save();
        }
        response()->json(['success' => 'success'], 200);
    }
}
