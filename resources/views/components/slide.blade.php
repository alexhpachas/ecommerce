<div class="glider-contain container">
    <div class="glider">
      @foreach ($slides as $slide)
          <div class=""><img src="{{$slide->image}}" alt=""></div>
      @endforeach
    </div>
  
    <button aria-label="Previous" class="glider-prev">«</button>
    <button aria-label="Next" class="glider-next">»</button>
    <div role="tablist" class="dots"></div>
</div>