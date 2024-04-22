<?php include("views/modale/user/user_up.php"); ?>
<footer id="footer" class="footer">
  <div class="copyright">
  2023 &copy; Copyright <strong><span>NIght Club</span></strong>. All Rights Reserved
  </div>

</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script type="text/javascript">
  $(document).on('click', '.voir_us', function() {

    var id = $(this).attr('id');

    var options = {
      ajaxPrefix: '',
      ajaxData: {
        id: id
      },
      ajaxComplete: function() {
        this.buttons([{
          type: Dialogify.BUTTON_PRIMARY
        }]);
      }
    };
    new Dialogify('views/script/user/user_view.php', options)
      .title('Utilisateur details')
      .showModal();

  });
</script>


 <!-- Vendor JS Files -->
 <script src="public/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="public/assets/vendor/echarts/echarts.min.js"></script>
  <script src="public/assets/vendor/quill/quill.min.js"></script>
  <script src="public/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="public/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="public/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="public/assets/js/main.js"></script>


<!-- admin side -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  window.jQuery || document.write('<script src="public/public/src/js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>
<script src="public/public/plugins/popper.js/dist/umd/popper.min.js"></script>
<script src="public/public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="public/public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="public/public/plugins/screenfull/dist/screenfull.js"></script>
<script src="public/public/plugins/moment/moment.js"></script>
<script src="public/public/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="public/public/plugins/jvectormap/jquery-jvectormap.min.js"></script>
<script src="public/public/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
<script src="public/public/dist/js/theme.min.js"></script>
<script src="public/public/js/widgets.js"></script>
<script src="public/public/plugins/select2/dist/js/select2.min.js"></script>
<script src="public/public/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="public/public/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="public/public/js/datatables.js"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
  (function(b, o, i, l, e, r) {
    b.GoogleAnalyticsObject = l;
    b[l] || (b[l] =
      function() {
        (b[l].q = b[l].q || []).push(arguments)
      });
    b[l].l = +new Date;
    e = o.createElement(i);
    r = o.getElementsByTagName(i)[0];
    e.src = 'https://www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e, r)
  }(window, document, 'script', 'ga'));
  ga('create', 'UA-XXXXX-X', 'auto');
  ga('send', 'pageview');
</script>
<!-- dialog -->
<script src="public/dialog/js/dialogify.min.js"></script>
<!-- croppie -->
<script src="public/crop/croppie.js"></script>
<!-- alert -->
<script src="public/alert/dist/sweetalert2.min.js"></script>


<!-- <script src="jquery-3.5.1.js"></script> -->
<script src="public/table/jquery.dataTables.min.js"></script>
<script src="public/table/dataTables.rowReorder.min.js"></script>
<script src="public/table/dataTables.responsive.min.js"></script>
<!-- export -->
<script src="public/js/jquery.PrintArea.js" type="text/JavaScript"></script>
<!-- export -->

<script src="public/export/jquery.dataTables.min.js"></script>
<script src="public/export/dataTables.buttons.min.js"></script>
<script src="public/export/buttons.html5.min.js"></script>
<script src="public/export/buttons.print.min.js"></script>
<script src="public/export/jszip.min.js"></script>
<script src="public/export/vfs_fonts.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.example').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });
  });
</script>

<script type="text/javascript">
  $(document).on('click', '.voir_us', function() {

    var id = $(this).attr('id');

    var options = {
      ajaxPrefix: '',
      ajaxData: {
        id: id
      },
      ajaxComplete: function() {
        this.buttons([{
          type: Dialogify.BUTTON_PRIMARY
        }]);
      }
    };
    new Dialogify('views/script/user/user_view.php', options)
      .title('Utilisateur details')
      .showModal();

  });
</script>
<script type="text/javascript">
  function refreshPage() {
    location.reload();
  }
  $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width: 200,
      height: 200,
      type: 'square' //circle
    },
    boundary: {
      width: 300,
      height: 300
    }
  });
  $(document).on('change', "#voir_photo", function() {
    var reader = new FileReader();
    reader.onload = function(event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function() {
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#insertimageModal').modal('show');
    $('.imge').hide();
  });

  $('.crop_image').click(function(event) {

    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response) {
      $(".photo").val(response);
      $('#insertimageModal').modal('hide');

    });
  });
  $(document).on('submit', '#admin1', function(event) {
    event.preventDefault();
    var password = $('#password').val();
    var conf = $('#cpasse').val();
    if (password == conf) {

      $.ajax({

        url: 'views/script/user/update.php',
        method: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(data) {
          if (data.success == true) {

            Swal.fire(
              'Reussi!',
              '',
              'success'
            )

          } else {
            Swal.fire({
              icon: 'error',
              title: '',
              text: 'echouée',
              footer: ''
            })
          }
          $('#mod').modal('hide');
          setInterval('refreshPage()', 1000);

        }

      });
    } else {
      alert("les deux mot de passe sont differents");
    }

  });
</script>