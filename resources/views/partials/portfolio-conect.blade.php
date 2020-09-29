@php
$token = '16515c03479c6d0a8514ab7b8c607ef53a9261df';
// Create a client with a base URI
$client = new GuzzleHttp\Client(['base_uri' => 'https://basedev.uni-ak.ac.at/portfolio/api/v1/user/3F3920E1AF5D460E98310ABEFA0DDA8B/']);
$headers = [
'Authorization' => 'Bearer ' . $token,
'Accept' => 'application/json',
];
$response = $client->request('GET', 'data', [
  'headers' => $headers
]);

$result = json_decode($response->getBody()->getContents());

@endphp



@foreach ($result->data as $data)
  {{-- @dump($data->data)<br> --}}
  @foreach ($data->data as $item)
  @if (@isset($item->title))
  {{ $item->title }}<br>
  @endif
  @if (@isset($item->subtitle))
    {{ $item->subtitle }}<br>
  @endif
  {{ $item->type }}<br>
  {{ $item->location }}<br>
  {{ $item->year }}<br>

  @dump($item)<br>

  @endforeach
@endforeach
