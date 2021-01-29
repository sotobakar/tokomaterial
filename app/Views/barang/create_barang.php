<?= $this->extend('template/full') ?>
<?= $this->section('content') ?>
<div class="wrapper ">
  <?= $this->include('layout/sidebar') ?>
  <div class="main-panel">
    <!-- Navbar -->
    <?= $this->include('layout/navbar') ?>
    <!-- End Navbar -->
    <div class="content">
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">add</i>
                  </div>
                  <h4 class="card-title">Tambah Barang</h4>
                </div>
                <div class="card-body ">
                  <form method="post" action="<?= base_url(route_to('dashboard/barang/create')) ?>" id="createBarang">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating" for="kode_barang">Kode Barang e.g., TBTB1515</label>
                      <input type="text" name="kode_barang" class="form-control" value="<?= old('kode_barang') ?>" maxlength="8">
                      <?php if (isset($_SESSION['errors']['kode_barang'])) : ?>
                        <label class="error" for="kode_barang"><?= $_SESSION['errors']['kode_barang'] ?></label>
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label class="bmd-label-floating" for="nama_barang">Nama Barang e.g., Batu Bata</label>
                      <input type="text" name="nama_barang" class="form-control" value="<?= old('nama_barang') ?>" maxlength="20">
                      <?php if (isset($_SESSION['errors']['nama_barang'])) : ?>
                        <label class="error" for="nama_barang"><?= $_SESSION['errors']['nama_barang'] ?></label>
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label class="bmd-label-floating" for="satuan">Satuan e.g., Sak,Lembar,Butir</label>
                      <input type="text" name="satuan" class="form-control" value="<?= old('satuan') ?>" maxlength="20">
                      <?php if (isset($_SESSION['errors']['satuan'])) : ?>
                        <label class="error" for="satuan"><?= $_SESSION['errors']['satuan'] ?></label>
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label class="bmd-label-floating" for="harga">Harga (angka saja)</label>
                      <input type="text" name="harga" class="form-control" value="<?= old('harga') ?>" maxlength="20">
                      <?php if (isset($_SESSION['errors']['harga'])) : ?>
                        <label class="error" for="harga"><?= $_SESSION['errors']['harga'] ?></label>
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label class="bmd-label-floating" for="stok">Stok (angka saja)</label>
                      <input type="text" name="stok" value="<?= old('stok') ?>" class="form-control">
                      <?php if (isset($_SESSION['errors']['stok'])) : ?>
                        <label class="error" for="stok"><?= $_SESSION['errors']['stok'] ?></label>
                      <?php endif; ?>
                    </div>
                  </form>
                </div>
                <div class="card-footer ">
                  <button type="submit" name="submit" class="btn btn-fill btn-rose" form="createBarang">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?= $this->include('layout/footer') ?>
  </div>
</div>
<?= $this->include('layout/sidebar_plugin') ?>
<?= $this->endSection() ?>
<?= $this->section('pageScripts') ?>
<script>
  $(document).ready(function() {
    $().ready(function() {
      $sidebar = $('.sidebar');

      $sidebar_img_container = $sidebar.find('.sidebar-background');

      $full_page = $('.full-page');

      $sidebar_responsive = $('body > .navbar-collapse');

      window_width = $(window).width();

      fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

      if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
        if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
          $('.fixed-plugin .dropdown').addClass('open');
        }

      }

      $('.fixed-plugin a').click(function(event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
          if (event.stopPropagation) {
            event.stopPropagation();
          } else if (window.event) {
            window.event.cancelBubble = true;
          }
        }
      });

      $('.fixed-plugin .active-color span').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-color', new_color);
        }

        if ($full_page.length != 0) {
          $full_page.attr('filter-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-color', new_color);
        }
      });

      $('.fixed-plugin .background-color .badge').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('background-color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-background-color', new_color);
        }
      });

      $('.fixed-plugin .img-holder').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').addClass('active');


        var new_image = $(this).find("img").attr('src');

        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          $sidebar_img_container.fadeOut('fast', function() {
            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $sidebar_img_container.fadeIn('fast');
          });
        }

        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $full_page_background.fadeOut('fast', function() {
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            $full_page_background.fadeIn('fast');
          });
        }

        if ($('.switch-sidebar-image input:checked').length == 0) {
          var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
        }
      });

      $('.switch-sidebar-image input').change(function() {
        $full_page_background = $('.full-page-background');

        $input = $(this);

        if ($input.is(':checked')) {
          if ($sidebar_img_container.length != 0) {
            $sidebar_img_container.fadeIn('fast');
            $sidebar.attr('data-image', '#');
          }

          if ($full_page_background.length != 0) {
            $full_page_background.fadeIn('fast');
            $full_page.attr('data-image', '#');
          }

          background_image = true;
        } else {
          if ($sidebar_img_container.length != 0) {
            $sidebar.removeAttr('data-image');
            $sidebar_img_container.fadeOut('fast');
          }

          if ($full_page_background.length != 0) {
            $full_page.removeAttr('data-image', '#');
            $full_page_background.fadeOut('fast');
          }

          background_image = false;
        }
      });

      $('.switch-sidebar-mini input').change(function() {
        $body = $('body');

        $input = $(this);

        if (md.misc.sidebar_mini_active == true) {
          $('body').removeClass('sidebar-mini');
          md.misc.sidebar_mini_active = false;

          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

        } else {

          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

          setTimeout(function() {
            $('body').addClass('sidebar-mini');

            md.misc.sidebar_mini_active = true;
          }, 300);
        }

        // we simulate the window Resize so the charts will get updated in realtime.
        var simulateWindowResize = setInterval(function() {
          window.dispatchEvent(new Event('resize'));
        }, 180);

        // we stop the simulation of Window Resize after the animations are completed
        setTimeout(function() {
          clearInterval(simulateWindowResize);
        }, 1000);

      });
    });
  });
</script>
<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    md.initDashboardPageCharts();

    md.initVectorMap();

  });
  <?php
  if (session('test')) {
  ?>
    swal({
      title: "Success",
      text: "<?= session('test'); ?>",
      type: "success",
      buttonsStyling: false,
      confirmButtonClass: "btn btn-success"
    });
  <?php
  } else if (session('test_err')) {
  ?>
    swal({
      title: "Error",
      text: "<?= session('test_err'); ?>",
      type: "error",
      buttonsStyling: false,
      confirmButtonClass: "btn btn-danger"
    });
  <?php

  }
  ?>
</script>
<?= $this->endSection() ?>