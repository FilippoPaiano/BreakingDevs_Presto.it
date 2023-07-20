<!-- Footer -->
<footer class="text-center text-lg-start footer-custom  position-relative">
    
  
    <!-- Section: Links  -->
   
      <div class="container-fluid text-center text-md-start">
        <!-- Grid row -->
        <div class="row justify-content-between align-items-center">
          <!-- Grid column -->
          <div class="col-6 col-md-3 col-lg-4 col-xl-4 d-flex align-items-center fw-bold text-white">
              <p class="m-0 d-none d-lg-block"> Lingue: </p>
            <x-_locale lang="it" />
            <x-_locale lang="en" />
            <x-_locale lang="es" />

            <!-- Content -->
            {{-- <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>BREKING DEVS
            </h6> --}}
           {{-- <img src="/media/LogoNano.png" alt="" class="logo-bd p-2"> --}}
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-6 col-md-3 col-lg-4 col-xl-4 mx-auto text-center d-flex justify-content-around align-items-center">
            <!-- Links -->
            {{-- <h6 class="text-uppercase fw-bold text-white mt-3">
              {{__('ui.f-t-1')}}
            </h6> --}}
            
              @auth
              
                <a href="{{route('revisor.details')}}" class="text-white text-decoration-none">

                    @if(Auth::user()->is_revisor)
                    Linee guida sui contenuti
                    @else
                    {{__('ui.become-revisor')}}
                    @endif
                </a>
              @else
                <a href="{{route('login')}}" class="text-white text-decoration-none">{{__('ui.become-revisor')}}</a>
              
              @endauth
            
    
                
              <a href="{{route('condition')}}" class="text-white text-decoration-none">{{__('ui.condition')}} </a>
            

          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-4 col-md-3 col-lg-4 col-xl-4 mx-auto text-center align-items-center d-none d-lg-block">
            <!-- Links -->
            {{-- <h6 class="text-uppercase fw-bold text-white mt-3">
              {{__('ui.f-t-2')}}
            </h6> --}}
          
            <img src="/media/LogoNano.png" alt="" class="logo-bd">
          </div>

         
         
        
          <!-- Grid column -->
  
          <!-- Grid column -->
          
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
  
    <!-- Section: Links  -->
  </footer>
  <!-- Footer -->