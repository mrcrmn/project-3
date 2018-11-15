@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex flex-wrap justify-center">
        @foreach ($products as $product)
            <div class="w-full sm:w-1/2 lg:w-1/4 px-2 mb-4">
                <ui-card class="w-full">
                    <template slot="heading">{{ $product->name }}</template>
                    <div slot="body" class="">
                        <div class="-mx-4 -mt-4 mb-4">
                        <img src="https://loremflickr.com/320/240/nature?id={{ $loop->index }}" alt="">
                        </div>
                        <div class="flex justify-between">
                            <div class="text-grey-blue-darker uppercase font-semibold">
                                {{ $product->brand->name }}
                            </div>
                            <div class="text-red-light font-bold">
                                {{ $product->getPrice() }}
                            </div>
                        </div>
                        @auth
                        <div class="mt-4">
                            <add-to-cart action="{{ route('add-to-cart', $product) }}"></add-to-cart>
                        </div>
                        @endauth
                    </div>
                </ui-card>
            </div>
        @endforeach
        <div class="w-full">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
