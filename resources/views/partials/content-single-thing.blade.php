@php
$img_1024w = json_decode(json_encode(Single::api_single()->media[0]->previews[2]), true);
@endphp
<section class="gris intro-notation extra-pad">
  <div class="row mt-3">
    <div class="col-12 col-lg-6 d-flex flex-lg-column justify-content-lg-between">
    <div>
      {{-- @dump(Single::api_single()) --}}
      <p class="link-white mb-0">→ {{ Single::api_single()->data[0]->value }}</p>
      <ul class="list">

        <li>Agency: <a href="#">{{ Single::api_single()->data[4]->value[0]->value }}</a></li>
        <li>Practice of notation: <a href="#">{{ Single::api_single()->data[4]->value[1]->value }}</a></li>
        <li>Notator: <a href="#">{{ Single::api_single()->data[5]->value[1]->label }}</a></li>
        <li>Time: {{ Single::api_single()->data[6]->value[0][0]->value->from }}
          {{ Single::api_single()->data[6]->value[0][1]->value->from }}h</li>
        <li>Place: <a href="#">{{ Single::api_single()->data[6]->value[0][2]->value[0] }}</a></li>
        <li>Coordinates: <a href="#">{{ Single::api_single()->data[6]->value[0][3]->value }}</a></li>

      </ul>
    </div>

    <div>
      <p class="link-white mb-0">↓ Description</p>
      <p>{{ Single::api_single()->data[4]->value[2]->value }}</p>
    </div>
    </div>



    <div class="col-12 col-lg-6 lg-fire">
      {{-- hay 2 imagenes, una destacada en la home en la posicion 1 y la panoramica en la posicion 0 --}}
      <a data-src="https://basedev.uni-ak.ac.at{{ Single::api_single()->media[0]->original }}" data-sub-html="{{ Single::api_single()->data[0]->value }}">
        <img class="img-fluid" src="https://basedev.uni-ak.ac.at{{ $img_1024w['1024w'] }}">
      </a>
    </div>
  </div>
</section>
<section class="gris">

    <div class="filtro dot">
      <p>→ {{ __('view as:', 'contingentagenciestheme') }}</p>
      <div class="view-as">
        <p><a href="#view" id="snapshots" class="ml-2 mr-2 active"><i data-feather="grid"></i>
            {{ __('Snapshots','contingentagenciestheme')  }}</a> <a href="#view" id="identifiers" class="ml-2"><i
              data-feather="list"></i> {{ __('Identifiers','contingentagenciestheme')  }}</a></p>
      </div>
    </div>


</section>
