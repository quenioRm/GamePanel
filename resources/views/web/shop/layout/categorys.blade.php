<section class="shop-item-tab-wrap"  data-aos="fade-up20" data-aos-offset="20" data-aos-duration="400" data-aos-once="true">
    <div class="shop-item-tab">
       <div class="inner-content">
        @foreach ($categories as $categorie)
          <!-- Loop Game -->
          <a href="{{route('shop.shopcategory', $categorie->id)}}"
            class="{{$categorie->id == session()->get('selectedCategory')->id ? 'on' : ''}}" >{{$categorie->name}}</a>
          <!--// Loop Game -->
        @endforeach
       </div>
    </div>
 </section>
