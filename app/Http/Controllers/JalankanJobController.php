<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;
use App\Jobs\InsertDataBanyak;
use App\Models\User;

class JalankanJobController extends Controller
{
    public function __invoke()
    {
        Benchmark::dd(
            [
                "InsertDataBanyak Job" => fn() => InsertDataBanyak::dispatch(),
                "InsertDataBanyak Tanpa Job" => fn() => User::factory()->count(10)->create(),
            ]
        );
    }
}
