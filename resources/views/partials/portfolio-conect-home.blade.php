@php
$token = '16515c03479c6d0a8514ab7b8c607ef53a9261df';
// Create a client with a base URI
//43F93B73237D499285666327D3804087
$client = new GuzzleHttp\Client(['base_uri' =>
'https://basedev.uni-ak.ac.at/portfolio/api/v1/user/3F3920E1AF5D460E98310ABEFA0DDA8B/']);
$client_single = new GuzzleHttp\Client(['base_uri' =>
'https://basedev.uni-ak.ac.at/portfolio/api/v1/user/3F3920E1AF5D460E98310ABEFA0DDA8B/data/']);
$headers = [
'Authorization' => 'Bearer ' . $token,
'Accept' => 'application/json',
];
$response = $client->request('GET', 'data', [
'headers' => $headers
]);


$result = json_decode($response->getBody());
foreach ($result->data as $item) {
  foreach($item->data as $post_api){
  // Check if post exist allready in WP
  $existing_posts = get_posts( array('post_type' => 'post', 'numberposts' => -1) );
  $api_ids = array();

  foreach($existing_posts as $post) {
  $id = get_post_meta( $post->ID, 'api_id', true );
  array_push($api_ids, $id);
  }


  if(in_array($post_api->id, $api_ids )) {
  error_log('post allready exists');
  } else {

  // New post data object to set as a post
  $new_post = array(
  'post_type' => 'post',
  'post_title' => $post_api->title,
  'post_status' => 'publish',
  'post_author' => 1,
  'meta_input' => array(
  'api_id' => $post_api->id,
  )
  );

  // Insert the post into the database
  wp_insert_post($new_post);
  }
}

}
@endphp
{{-- @dump($result)<br> --}}


@foreach ($result->data as $data)
{{-- @dump($result)<br> --}}
@foreach ($data->data as $item)

@php
$id = $item->id;
// aqui entramos a la entrada individual para ver si está marcada como destacada
$response_single = $client_single->request('GET', $id, [
'headers' => $headers
]);

$result_single = json_decode($response_single->getBody()->getContents());
// convierto en array las imagenes de 1024 para poder acceder, porque el label es un numero, :(
  // MIRAR DE RECORRER VER LA LONGITUD DEL ARRAY PARA VER CUANTAS FOTOS HAY, si hay 2, una es la destacada y la otra la panoramica


  if(count($result_single->media) == 1) {
    $img_1024w = json_decode(json_encode($result_single->media[0]->previews[2]), true);
  }else if(count($result_single->media) >= 2){
    $img_1024w = json_decode(json_encode($result_single->media[0]->previews[2]), true);
  }
//   count($result_single->media)
// $img_1024w = json_decode(json_encode($result_single->media[0]->previews[2]), true);
@endphp
{{-- @dump($result_single) --}}

@foreach ($result_single->data as $data )
{{-- @dump($data)<br> --}}
{{-- primero compronamos que existe la etiqueta keywords --}}
@if(strcmp($data->label, 'keywords') == 0)
{{-- {{ $data->label }} --}}
{{-- luego que la etiqueta tiene en la primera posicion introducida highlighted --}}
{{-- esta es la posicion del array con la URL si todos los campos están completados --}}
{{-- {{ $result_single->data[7]->value }} --}}
@if (strcmp($data->value[0], 'highlighted') == 0)

{{-- {{$data->value[0]  }}<br> --}}
{{-- {{ $result_single->data[7]->value }}<br> --}}
{{-- @dump($result_single->media) --}}


<div class="col-12 col-lg-6 post-home">
  <a href="{{ $result_single->data[7]->value }}" class="photo">
    <img class="img-fluid" src="https://basedev.uni-ak.ac.at{{ $img_1024w['1024w'] }}">
    <div class="info-post text-center">
      <p>{{ $item->title }}</p>


    </div>
  </a>
</div>
@endif
@endif

@endforeach

@endforeach
@endforeach
