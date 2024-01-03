<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Repositories\CountryRepository;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;

class CountryController extends Controller
{
    private $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function index()
    {
        try {
            $countries = $this->countryRepository->getAllCountries();

            return new ApiSuccessResponse(
                [
                    'countries' => $countries
                ],
                'Retrieve Country List Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Country $country)
    {
        try {
            return new ApiSuccessResponse(
                [
                    'country' => $country
                ],
                'Retrieve Country Details Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, Country $country)
    {
        //
    }

    public function destroy(Country $country)
    {
        //
    }
}
