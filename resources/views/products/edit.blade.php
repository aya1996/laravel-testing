@extends('layouts.app')

@section('content')

<div class="maw-6xl mauto">
    <h1>Products Update</h1>
    <div class="m-2 p-2">
        <a class="p4 py-3 rounded bg-green-400" href="/products">back</a>
    </div>

    <slot name="logo">
        <h1>
            Product Product
        </h1>
    </slot>
    <!-- Validation Errors -->
    <auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name" :value="__('Name')" />

            <input id="name" class="block mt-1 w-full" type="text" name="name" :value="$product->name" />
        </div>

        <div class="mt-4">
            <label for="type" :value="__('Type')" />

            <input id="type" class="block mt-1 w-full" type="text" name="type" :value="$product->type" />
        </div>

        <div class="mt-4">
            <label for="price" :value="__('Price')" />

            <input id="price" class="block mt-1 w-full" type="text" name="price" :value="$product->price" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <button class="ml-4">
                {{ __('Update') }}
            </button>
        </div>
    </form>







    @endsection
