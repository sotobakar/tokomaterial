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
                    <i class="material-icons">content_cut</i>
                  </div>
                  <h4 class="card-title">Ubah Profile</h4>
                </div>
                <div class="card-body ">
                  <form method="post" action="<?= base_url('dashboard/profile/edit') ?>" id="createBarang" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="bmd-label-floating" for="name">Name</label>
                      <input type="text" name="name" class="form-control" value="<?= $profile_data['name'] ?>">
                      <?php if (isset($errors['name'])) : ?>
                        <label class="error" for="name"><?= $errors['name'] ?></label>
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label class="bmd-label-floating" for="age">Age</label>
                      <input type="text" name="age" class="form-control" value="<?= $profile_data['age'] ?>">
                      <?php if (isset($errors['age'])) : ?>
                        <label class="error" for="age"><?= $errors['age'] ?></label>
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label class="bmd-label-floating" for="jenis_kelamin">Jenis kelamin</label>
                      <input type="text" name="jenis_kelamin" class="form-control" value="<?= $profile_data['jenis_kelamin'] ?>">
                      <?php if (isset($errors['jenis_kelamin'])) : ?>
                        <label class="error" for="jenis_kelamin"><?= $errors['jenis_kelamin'] ?></label>
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label class="bmd-label-floating" for="no_hp">No. HP</label>
                      <input type="text" name="no_hp" class="form-control" value="<?= $profile_data['no_hp'] ?>">
                      <?php if (isset($errors['no_hp'])) : ?>
                        <label class="error" for="no_hp"><?= $errors['no_hp'] ?></label>
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label class="bmd-label-floating" for="bio">URL Foto</label>
                      <textarea class="form-control" name="bio" rows="2"><?= $profile_data['bio'] ?></textarea>
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

<?= $this->endSection() ?>