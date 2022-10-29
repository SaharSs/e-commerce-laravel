@extends('admin.layouts.admin-dash')
@section('content')
<div class="container">
<div class="row mt-10 p-5">
    <div class="col-md-12">
  
    <form class="form-inline"  >
@csrf

<a   class="btn btn-primary" href ="{{ route('admin.stocks.create') }}">Ajouter</a>




</form>
<div class="card p-3">
<form action="{{route('admin.stock.update')}}" method="POST"  >
								@csrf
 <table class="table">
                <thead>
                    <tr>
                    <th></th>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>quantité</th>
                      
                    </tr>
                </thead>
                <tbody>
              
                @foreach ($stocks as $stock)
                        <tr>
                        <td><input type="checkbox" name="stock[{{$stock->id}}]" value="{{$stock->id}}"></td>
                            <td>{{$stock->id}}</td>
                            @foreach ($products as $product)
                            @if($product->id==$stock->product_id)
                            <td>{{$product->title}}</td>
                            @endif
                            @endforeach
                            <td>{{ $stock->quantity }}</td>
                          </td>
                          <td><input type="number" name="quant[{{$stock->id}}]" value="0" >
					
							</td>
                            <td class="action" data-title="Remove"><a href="{{route('admin.delete',$stock->id)}}" class="btn btn-danger">supprimer</a></td>
						
		
	
                        </tr>
                        
                    @endforeach
                 
                </tbody>
            </table>
            
<td><button type="submit" class="btn btn-primary "  name="submit" >
															modifier
														</button></td>	
            
            </form></div>
    </div>
    <div class="justify-content-center d-flex">
                {!!$stocks->links()!!}
            </div>
</div>
</div>
@endsection
