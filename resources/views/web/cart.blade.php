@extends('layouts.app')
    <!-- end header section -->
        <!-- slider section -->
       
@section('content')
@include('web.slider')
</br></br> 
                  @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif
				
                   <table class="table">

						<thead>
							<tr class="main-hading">
							<th>id</th>
							<th>produit_n</th>
							<th>prix</th>
							<th >quantité</th>
							<th >montant</th>
							<th  colspan='3'>options</th>
								
								
							
							
							</tr>
						</thead>
						<tbody>
						<form action="{{route('web.cart.update')}}" method="POST" >
								@csrf
								
						@if(Helper::getAllProductFromCart())
						@foreach(Helper::getAllProductFromCart() as $key=>$cart)
						   <tr >
						   <td>{{$cart['id']}}</td>
								<td>{{$cart['product_n']}}</td>
								<td>{{$cart['price']}}</td>
								<td><input type="text" name="quant[{{$key}}]" class="input-number"  data-min="1" data-max="100" value="{{$cart->quantity}}">
								<input type="hidden" name="qty_id[]" value="{{$cart->id}}">
							</td>
                          <td>{{$cart['amount']}}</td>
							
<td><button type="submit" class="btn btn-primary "  name="submit" >
															modifier
														</button></td>																
	
<td class="action" data-title="Remove"><a href="{{route('web.cart-delete',$cart->id)}}" class="btn btn-danger">supprimer</a></td>
						
							</tr>
                  @endforeach
				  @endif
				  <tr class="text-dark font-weight-bold">
                        <td colspan="4" class="border border-success">
                            Total
                        </td>
                        <td colspan="3" class="border border-success">
						{{number_format(Helper::totalCartPrice(),3)}}DT
                        </td>

                    </tr>
</form>
</tbody>
                </table>
				
				<a href="{{route('web.cart.checkout',Helper::totalCartPrice())}}" class="btn btn-primary">Valider</a>
              @endsection
