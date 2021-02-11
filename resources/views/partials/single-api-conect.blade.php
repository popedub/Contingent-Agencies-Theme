@php
$token = '16515c03479c6d0a8514ab7b8c607ef53a9261df';
$client_single = new GuzzleHttp\Client(['base_uri' =>
'https://basedev.uni-ak.ac.at/portfolio/api/v1/user/3F3920E1AF5D460E98310ABEFA0DDA8B/data/']);
$headers = [
'Authorization' => 'Bearer ' . $token,
'Accept' => 'application/json',
];

$id = $item->id;
// aqui entramos a la entrada individual para ver si está marcada como destacada
$response_single = $client_single->request('GET', $id, [
'headers' => $headers,
'debug' => true
]);
@endphp
