@extends('layouts.app')
    <!-- end header section -->
	      <!-- slider section -->
       
@section('content')
@include('sweetalert::alert')  
@include('web.slider')
<table class="table">

						<thead>
							<tr class="main-hading">
							
							<th>user_id</th>
							
								<th >total</th>
                                <th>date</th>	
								<th  colspan='3'>options</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($orders as $order)
						<form action="{{route('web.order',$order->id)}}" method="get" >
								@csrf
								
						
						   <tr>
						   <td>{{$order['user_id']}}</td>
								<td>{{$order['total']}}</td>
								<td>{{$order['created_at']}}</td>
						</td>
                          
							
						<td><button type="submit" class="btn btn-primary "  name="submit" >
														invoice
														</button></td>	
																		
	
							</tr>
              
                  </form>
                  @endforeach
</tbody>
                </table>
                  @endsection