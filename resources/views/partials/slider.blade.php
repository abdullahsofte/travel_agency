<div class="main-banner">
    <div class="banner-slider owl-carousel">
      @foreach ($sliders as $item)
      <div class="slider-item slider-item-1" style="background: -webkit-gradient(linear, left top, left bottom, color-stop(100%, rgba(48, 79, 71, 0.65)), to(rgba(48, 79, 71, 0.65))), url(../images/banners/banner-1.png);background: url({{ asset($item->image) }});background-position: center center;
        object-fit: contain;">
        <div class="container">
          <div class="slider-content wow fadeInLeft animated" data-wow-delay="300ms" data-wow-duration="1500ms">
            <h2>{{ $item->title }}</h2>
            <h5>{{ $item->sub_title }}</h5>
            <div class="banner-btn"> <a href="{{ $item->link }}" target="_blank" class="btn-common">Book Now</a> </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>
  
  <!-- Search Section Here -->
  <div class="find-form">
    <div class="container sticky-top">
      <form action="{{ route('search.package') }}" method="POST" class="findfrom-wrapper">
        @csrf

        <div class="row">
          
          <div class="col-lg-3">
            <input type="text" name="name" placeholder="Search for Tour">
          </div>

          <div class="col-lg-3">
            <div class="calendar-input">
              <input type="text" name="date" class="input-field check-in" placeholder="dd-mm-yy" autocomplete="off">
              <i class="flaticon-calendar"></i> </div>
          </div>
          <div class="col-lg-2">
            <div class="custom-select">
              <select name="category_id">
                <option value="0">Travel Type</option>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          
          <div class="col-lg-2">
            <select name="hotel">
              <option value="">-- select hotel --</option>
              @foreach ($hotels as $item)
              <option value="{{ $item->name }}">{{ $item->name }}</option>
              @endforeach
            </select>
          </div>
          
          <div class="col-lg-2">
            <div class="find-btn"> 
              <button type="submit" class="btn-second"><i class='bx bx-search-alt'></i> Find now</button> 
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  