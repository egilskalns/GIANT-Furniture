<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public $profileService;

    public function __construct(
        \App\Services\Profile\Service $profileService,
    )
    {
        $this->profileService = $profileService;
    }
    public function index()
    {
        $mainCategories = Category::whereNull('parent_id')->get();
        $profile = $this->profileService->getUser();

        $allTitles = ['Mr', 'Mrs', 'Ms', 'Mx', 'Prefer not to say'];
        $allCountries = DB::table('country_regions')->select('id', 'name')->get();
        $addresses = $profile->getAddresses();


        return view('profile.index', compact('mainCategories', 'profile', 'allTitles', 'allCountries', 'addresses'));
    }

    public function update(ProfileRequest $request) {
        $request = $request->validated();
        $this->profileService->update($request);
    }
}

