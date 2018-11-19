@component('mail::message')

Hi {{ $order->first_name }} {{ $order->last_name }},

we received a new order with the following items:
  
| Article | Quantity | Price |
|:--------|----------|------:|
@foreach ($order->user->getCart() as $item)
| {{ $item->name }} | {{ $item->quantity }} | {{ number_format($item->quantity * $item->price / 100, 2, ',', '.') }} € |
@endforeach
  
Total: {{ $order->user->getCartTotal() }}

@endcomponent