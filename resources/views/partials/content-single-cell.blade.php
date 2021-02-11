<div class="intro">
  {{ Single::api_single()->data[4]->value[0]->value }}
  @dump()
</div>
@php
$img_1024w = json_decode(json_encode(Single::api_single()->media[0]->previews[2]), true);
@endphp

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
