@extends('layout.master')

@section('content')
    <div>
        <form method="POST" class="my-32">
            @csrf
            <section class="flex justify-center">
                <table class="w-[95%]">
                    <thead align="left" class="bg-gray-100">
                        <tr>
                            <th class="py-3 pl-3">PRODUCT</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>TOTAL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($cartItems) != 0)
                            @foreach ($cartItems as $key => $item)
                                <tr class="h-[90px] item-cart">
                                    <td>
                                        <div class="flex items-center gap-3 pl-3">
                                            <!-- <input type="checkbox" name="products[]" value="{{ $item['id'] }}"> -->
                                            <div class="w-[60px] h-[60px] bg-gray-300 rounded-lg flex items-center justify-center">
                                                🪑
                                            </div>
                                            <h1>{{ $item['nama'] }}</h1>
                                        </div>
                                    </td>
                                    <td>
                                        <p>Rp.{{ number_format($item['harga'], 0, ',', '.') }}</p>
                                    </td>
                                    <td>
                                        <div class="counter flex">
                                            <a href="{{ route('cart.update', ['type' => 'minus', 'id' => $item['id']]) }}" class="btn-minus h-[30px] w-[30px] text-2xl bg-white">-</a>
                                            <input type="text" class="qty-input w-[30px] text-center bg-gray-300" readonly
                                                value="{{ $item['quantity'] }}">
                                            <a href="{{ route('cart.update', ['type' => 'plus', 'id' => $item['id']]) }}" class="btn-plus h-[30px] w-[30px] text-2xl bg-white">+</a>
                                        </div>
                                    </td>
                                    <td>
                                        <p>Rp.{{ number_format($item['total_harga'], 0, ',', '.') }}</p>
                                    </td>
                                    <td>
                                        <a href="{{ route('cart.delete', ['id' => $item['id'] ]) }}">X</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="h-[90px] item-cart bg-gray-50">
                                <td colspan="5" class="text-center">
                                    <h1>Cart is Empty</h1>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </section>

            @if (count($cartItems) != 0)
                <section>
                    <div class="flex justify-end w-[95%] mt-5">
                        <div class="flex flex-col">
                            <h1 class="text-lg">Total Price</h1>
                            <p class="text-xl font-medium">Rp.{{ number_format($totalHargaCart, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </section>

                <section class="flex justify-center mt-7">
                    <div class="flex justify-between w-[95%]">
                        <button type="button"
                            class="px-20 py-2 text-[#B5733A] font-medium rounded-full border-2 border-[#B5733A]">
                            Use Promo Code
                        </button>
                        <input type="submit" name="btnCheckOut" value="CheckOut"
                            class="px-20 py-2 text-white font-medium rounded-full bg-[#B5733A] border-2 border-[#B5733A]">
                    </div>
                </section>
            @endif
        </form>
    </div>
@endsection