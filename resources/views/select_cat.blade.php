

<ol class="list-group list-group-flush">
	
		   
            <li class="list-group-item ">
                <div class="row">
                     <div class="col-10"> pattiserie</div>	
                     <div class="col-auto">	
                          <input type="checkbox" class="success"value="1" name="1">			
                          <span class="slider"></span>
                          </label>
                    </div>	
                </div>
            </li>

         <li class="list-group-item ">
                <div class="row">
                     <div class="col-10"> Fast Food</div>	
                     <div class="col-auto">	
                          <input type="checkbox" class="success"value="1" name="patisserie">			
                          <span class="slider"></span>
                          </label>
                    </div>	
                </div>
            </li>
            <li class="list-group-item ">
                <div class="row">
                     <div class="col-10"> Salon de the et Coffee-shops</div>	
                     <div class="col-auto">	
                          <input type="checkbox" class="success"value="1" name="patisserie">			
                          <span class="slider"></span>
                          </label>
                    </div>	
                </div>
            </li>
            <li class="list-group-item ">
                <div class="row">
                     <div class="col-10"> patisserie</div>	
                     <div class="col-auto">	
                          <input type="checkbox" class="success"value="1" name="patisserie">			
                          <span class="slider"></span>
                          </label>
                    </div>	
                </div>
            </li>
          
        </ol>
        @foreach($data['categories'] -> all() as $categorie)	   
	<li class="list-group-item ">
		<div class="row">
			 <div class="col-10"> {{$categorie->name}}</div>	
			 <div class="col-auto">	
				  <input type="checkbox" class="success"value="{{$categorie->name}}" name="{{$categorie->id}}">			
				  <span class="slider"></span>
				  </label>
			</div>	
		</div>
	</li>
	@endforeach
    <div class="funkyradio">
					       <div class="funkyradio-success">
                              <input type="checkbox" name="partenaire" id="checkbox3" checked/>
                              <label for="checkbox3">C'est un partenaire</label>
                            </div>
			</div>