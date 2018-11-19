@extends('layouts.app')

@section('content')

<div class="container mx-auto">
    <h3 class="px-2 mb-8 pt-8">Personal Details</h3>
    <div class="flex justify-between flex-wrap">
        <div class="w-full md:w-1/2 lg:w-1/3 order-1 lg:order-2 mb-8">
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <div class="flex mb-4">
                    <div class="w-1/2 px-2">
                        <ui-input name="first_name" label="Firstname" vertical></ui-input>
                    </div>
                    <div class="w-1/2 px-2">
                        <ui-input name="last_name" label="Lastname" vertical></ui-input>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-full px-2">
                        <ui-input name="email" icon="envelope" type="email" label="E-Mail Address" vertical value="{{ Auth::user()->email }}"></ui-input>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-full px-2">
                        <ui-input name="address" icon="address" type="text" label="Address" vertical></ui-input>
                    </div>
                </div>
                <div class="flex mb-12">
                    <div class="w-1/3 px-2">
                        <ui-input name="zip" type="text" label="ZIP Code" vertical></ui-input>
                    </div>
                    <div class="w-1/3 px-2">
                        <ui-input name="city" type="text" label="City" vertical></ui-input>
                    </div>
                    <div class="w-1/3 px-2">
                        <ui-input name="country" type="text" label="Country" vertical></ui-input>
                    </div>
                </div>
                <h3 class="px-2 mb-8">Billing Details</h3>
                <div class="flex mb-4">
                    <div class="w-full px-2">
                        <ui-input name="cc-number" icon="credit-card" placeholder="4242 4242 4242 4242" type="text" label="Credit Card Number" vertical></ui-input>
                    </div>
                </div>
                <div class="flex mb-8">
                    <div class="w-1/2 px-2">
                        <ui-input name="cc-expiration" icon="calendar" placeholder="MM/YY" type="text" label="Expiration Date" vertical></ui-input>
                    </div>
                    <div class="w-1/2 px-2">
                        <ui-input name="cc-ccv" icon="lock" type="text" placeholder="123" label="CCV" vertical></ui-input>
                    </div>
                </div>
                <div class="px-2">
                    <ui-form-button class="w-full">Pay {{ Auth::user()->getCartTotal() }}</ui-form-button>
                </div>
            </form>
        </div>

        <div class="w-full md:w-1/2 lg:w-3/5 px-2 order-2 lg:order-1 mb-8">
            <ui-card class="w-full">
                <template slot="heading">
                    Your Cart
                </template>
                <div slot="body">
                    <table class="w-full">
                        <tr>
                            <th class="text-left border-b-2 border-grey-lightest pb-2">Article</th>
                            <th class="text-left border-b-2 border-grey-lightest pb-2">Quantity</th>
                            <th></th>
                            <th class="text-left border-b-2 border-grey-lightest pb-2 text-right">Price</th>
                        </tr>
                        @foreach ($cart as $item)
                            <tr>
                                <td class="py-2 uppercase font-bold">{{ $item->name }}</td>
                                <td class="py-2">{{ $item->quantity }}</td>
                                <td>
                                    <form action="{{ route('remove-from-cart', $item) }}" method="POST">
                                        @csrf
                                        <button type="submit">
                                            <icon class="opacity-50 hover:opacity-75 cursor-pointer" icon="trash"></icon>
                                        </button>
                                    </form>
                                </td>
                                <td class="py-2 text-red font-bold text-right">{{ number_format($item->quantity * $item->price / 100, 2, ',', '.') }} €</td>
                            </tr>
                        @endforeach
                        <tr class="border-t-2 border-grey-lighter">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="font-bold text-blue-darker pt-4 text-right">Total: {{ Auth::user()->getCartTotal() }}</td>
                        </tr>
                    </table>
                </div>
            </ui-card>
        </div>
    </div>
</div>

@endsection