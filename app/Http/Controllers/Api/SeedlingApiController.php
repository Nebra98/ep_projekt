<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Seedling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SeedlingApiController extends Controller
{
    public function index()
    {
        return Seedling::all();
    }

    public function getSingleSeedling(Seedling $seedling)
    {
        return $seedling;
    }

}
