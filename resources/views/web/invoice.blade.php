<!DOCTYPE html>
<html  lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>facture - Project.com</title>

	<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
      
</head>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Facture</h1>
</div>
<div class="add-detail mt-10">

    <div class="w-50 float-left mt-10">
  
    @foreach($orderss as $order)
    <p class="m-0 pt-5 text-bold w-100"> - <span class="gray-color">M.{{$order['lastName']}}</span></p>
     
       <p class="m-0 pt-5 text-bold w-100">adresse - <span class="gray-color">{{$order['adress']}}</span></p>
      
       @break;
       @endforeach
       @foreach($orders as $order)
      					

        <p class="m-0 pt-5 text-bold w-100">facture Id - <span class="gray-color">{{$order['id']}}</span></p>
       <p class="m-0 pt-5 text-bold w-100"> Date - <span class="gray-color">{{$order['created_at']}}</span></p>
        @endforeach
    
    </div>

    <div class="w-50 float-left logo mt-10">
        <img src="https://thumbs.dreamstime.com/b/pj-logo-p-j-design-white-pj-letter-pj-p-j-letter-logo-design-initial-letter-pj-linked-circle-uppercase-monogram-logo-pj-logo-p-j-196993262.jpg"> <span>Project.com</span>     
    
    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
<table class="table w-100 mt-10" >

						<thead>
							<tr>
                            <th class="w-50">Product_title</th>
							<th class="w-50">quantité</th>
							<th class="w-50">prix</th>
						    <th class="w-50">total</th>
                       
							
								
							</tr>
						</thead>
						<tbody>
                            @foreach($orderss as $order)
				           <tr>
                           <td>
						   <div class="box-text">
							   {{$order['product_title']}}
                           </div>
							</td>
						   <td>
						   <div class="box-text">
							   {{$order['quantity']}}
                           </div>
							</td>
						   <td>
						   <div class="box-text">
							   {{$order['price']}}
                           </div>
							</td>
								<td>
								<div class="box-text">
									{{$order['total']}}
                                </div>
								</td>
								
								
	
						</td>
                     
</tr>
							
  
               
                  @endforeach
                  @foreach($orders as $order)
                  <tr>
                      <td style="text-align: center;" colspan="3">Total</td>
              <td>
								<div class="box-text">
									{{$order['total']}}
                                </div>
								</td>
                            </tr>
                            <tr>
    <td style="text-align: center;" colspan="3">tax(20%)</td>
    <td>{{($order['total']*20)/100}}</td>
   </tr>
   <tr>
    <td colspan="3" style="text-align: center;">Total TTC</td>
    <td>{{$order['total']+($order['total']*20)/100}}</td>
   </tr>
  
                                 @endforeach																				
	
                            
              
</tbody>

			
                </table>
</div>        
	       		
	
</body>
</html>               
@foreach($orders as $order)
      <a class="action" data-title="Remove" href="{{route('web.download-pdf',$order->id)}}" class="btn btn-danger">download</a>
	@endforeach	