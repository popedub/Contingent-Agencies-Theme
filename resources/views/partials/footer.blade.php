@if (is_home() || is_category() || is_single() || is_page(array('conceptual-framework', 'researchers')) )
<footer class="content-info">
  <div class="container-fluid">
    @php dynamic_sidebar('sidebar-footer') @endphp
    <div class="row">
      <div class="col-12 col-lg-6">
        <p>The project is funded by the Program for Arts-based Research (PEEK) of the Austrian Science Fund (FWF).</p>
      </div>
      <div class="col-12 col-lg-6 text-right">
        <p><a  href="mailto:contact@contingentagencies.net" target="_blank" class="link-white">contact@contingentagencies.net</a></p>
        <p><a class="link-gris" href="#">Datenschutzerklärung</a></p>
        <p><a class="link-gris" href="#">Imprint</a></p>
      </div>
    </div>
  </div>
</footer>
@endif
