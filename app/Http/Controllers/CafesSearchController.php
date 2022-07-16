<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CafeSearchRequest;
use App\Http\Resources\CafeCollection;
use App\Models\Cafe;

final class CafesSearchController extends Controller
{
    public function __invoke(CafeSearchRequest $request): CafeCollection
    {
        $q = $request->safe(['q'])['q'];

        return new CafeCollection(Cafe::search($q)->get());
    }
}
