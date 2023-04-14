<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Http;
use Throwable;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): String | AnonymousResourceCollection
    {
        try {
            return collect(Http::get('https://dog.ceo/api/breeds/list/all')->json('message'));
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id): String | AnonymousResourceCollection
    {
        try {
            return collect(Http::get('https://dog.ceo/api/breed/' . $id . '/images')->json('message'));
         } catch (Throwable $e) {
             return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function random(): String | AnonymousResourceCollection
    {
        try {
            return collect(Http::get('https://dog.ceo/api/breeds/image/random')->json('message'));
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function getBreedImage($id): String | AnonymousResourceCollection
    {
        try {
            return collect(Http::get('https://dog.ceo/api/breed/'.$id.'/images')->json('message'));
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }
}
