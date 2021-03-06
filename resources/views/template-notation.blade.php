{{--
  Template Name: Notation
--}}

@extends('layouts.app')

@section('content')


{{-- aquí hay q llamar al contenido vía API --}}
<section class="gris intro-notation">
  <div class="row mt-3">
    <div class="col-12 col-lg-6">
      <p class="link-white mb-0">↓ Identifier: N-GANSTERER-20200112-1200-Viena</p>
      <ul class="list">
        <li>Agency: <a href="#">Resonance</a></li>
        <li>Practice of notation:<a href="#">Video</a></li>
        <li>Notator: <a href="#">Alex Arteaga</a></li>
        <li>Time: 20.012020 12:41h</li>
        <li>Place: C / Santa Eulàlia 21, 08012 <a href="#">Barcelona</a></li>
        <li>Coordinates: <a href="#">41º24'04.3"N2º09'50.5"</a></li>
        <li>Þhing: <a href="#">20200122-1241-Barcelona</a></li>
      </ul>
    </div>
    <div class="col-12 col-lg-6 lg-fire">
      <a data-src="https://picsum.photos/seed/picsum/1200/600" data-sub-html="N-GANSTERER-20200112-1200-Viena">
      <img class="img-fluid" src="https://picsum.photos/seed/picsum/1200/500" alt="">
      </a>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-12 col-lg-6">
      <p class="link-white mb-0">↓ notes</p>
      <div class="acordeon">
        <p>Architecture of Embodiment is a research environment conceived and realized by Alex Arteaga in which
          architecture is
          addressed from an enactivist perspective and through methodologies based on aesthetic practices. As a point of
          departure, architecture is understood here in its most basic terms—structure, form and materiality—and in
          relation to
          fundamental operations—design and construction.</p>
      </div>
    </div>
    <div class="col-12 col-lg-6">
      <p class="link-white mb-0">↓ Short description of the atmosphere</p>
      <p>The emergence of sense is researched here in attendance to its most fundamental processes: those enabled by the
        immediate, spontaneous, sensuous, emotional and non-thetic interaction between human bodies and their
        surroundings, that
        is, those processes enabled by aesthetic conduct and facilitating aesthetic experience. </p>

    </div>
    <div class="col-12 col-lg-6">
      <p class="link-white mb-0">↓ strategies of display</p>
      <p>The emergence of sense is researched here in attendance to its most fundamental processes: those enabled by the
        immediate, spontaneous, sensuous, emotional and non-thetic interaction between human bodies and their
        surroundings, that
        is, those processes enabled by aesthetic conduct and facilitating aesthetic experience. </p>
    </div>
    <div class="col-12 col-lg-6">
      <div class="d-flex">
        <div>
          <p class="link-white mb-0">↓ related reflections</p>
          <ul class="list">
            <li><a href="#">R-Gomez-20191102-0600-Bogota</a></li>
            <li><a href="#">R-Gansterer-20200113-1200-Vienna</a></li>
            <li><a href="#">R-Arteaga-20200113-1600-Vienna</a></li>
          </ul>
        </div>
        <div class="pl-5">
          <p class="link-white mb-0">↓ research cells</p>
          <ul class="list">
            <li><a href="#">Environment and atmosphere</a></li>
            <li><a href="#">Acustics</a></li>
            <li><a href="#">Acustics</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="row dark mt-4">
    <div class="col-12 text-center mb-5">
      <h3>artifacts of notation</h3>
    </div>
    <div class="col-12 col-lg-6 offset-lg-6">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Y8x3LWVC1L4" frameborder="0"
          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</section>
@endsection
