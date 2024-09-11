<?php

namespace Ramzi\LaraChat\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as Controller;
class BaseController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
}