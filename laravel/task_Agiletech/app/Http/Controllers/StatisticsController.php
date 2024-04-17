<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Brand;
use App\Models\District;
use App\Models\Region;


class StatisticsController extends Controller
{
    /**
     * Display count of branch of brand in region.
     */
    public function by_region(Brand $brand)
    {
        $data = [];
        $regions = Region::all();

        foreach ($regions as $region) {
            $districts = District::where('region_id', $region->id)
                ->pluck('id')
                ->toArray();

            $branch_count = Branch::where('brand_id', $brand->id)
                ->whereIn('district_id', $districts)
                ->count();

            $data[$region->name] = $branch_count;
        };

        return $data;
    }
    /**
     * Display count of branch of brand in district.
     */
    public function by_district(Brand $brand)
    {
        $data = [];
        $regions = Region::all();
        foreach ($regions as $region) {
            $in_district = [];
            $districts = District::where('region_id', $region->id)->get();

            foreach ($districts as $district) {
                $branch_count = Branch::where('brand_id', $brand->id)
                    ->where('district_id', $district->id)
                    ->count();

                $in_district[$district->name] = $branch_count;
            }

            $data[$region->name] = $in_district;
        };

        return $data;
    }
}
