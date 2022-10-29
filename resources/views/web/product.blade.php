<section class="arrival_section">
         <div class="container">
            <div class="box">
               <div class="arrival_bg_box">
                  <img src="front/images/arrival-bg.png" alt="">
               </div>
               <div class="row">
                  <div class="col-md-6 ml-auto">
                     <div class="heading_container remove_line_bt">
                        <h2>
                          Lorem ipsum
                        </h2>
                     </div>
                     <p style="margin-top: 20px;margin-bottom: 30px;">
                        Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
                     </p>
                     <a href="/product">
                  
                Achetez maintenant
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
    
      <!-- end arrival section -->
      
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
               Nos <span>produits</span>
               </h2>
            </div>
            <div class="row">
            @foreach($products as $prod)
               <div class="col-sm-6 col-md-4 ">
              
                  <div class="box">
           
                     <div class="option_container">
                       
                        <div class="options">
                           <a href="web/prod/{{$prod->id}}" class="option1">
                           Add To Cart
                           </a>
                        
                        </div>
                     </div>
                     
                     <div class="img-box">
                        <img src="/images/products/{{ $prod['image']}}" width="100%" height="100%" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                         {{$prod->title}}
                        </h5>
                        <h6>
                        {{$prod->price}}DT
                        </h6>
                     
                     </div>
                    
                  </div>
               </div>
               @endforeach
               
                     
               
            </div>
            <div class="btn-box">
               <a href="/product">
               View All products
               </a>
            </div>
         </div>
      </section>
      <!-- end product section -->

      <!-- subscribe section -->
     