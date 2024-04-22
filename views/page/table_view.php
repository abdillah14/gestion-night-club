<?php

if (empty($_SESSION["nom"])) {
  $page = "index.php?action=login";
  header('location:' . $page);
}
?><?php include("views/partials/head_link.php"); ?>




<div class="wrapper">

  <!-- start header -->
  <?php include("views/partials/tete.php"); ?>

  <!-- end header -->
  <div class="page-wrap">
    <!-- start sidebar menu -->
    <?php include("views/partials/sidebar.php"); ?>
    <!-- end sidebar menu -->
    <!-- start page content -->

    <!-- <div class="main-content"> -->
    <main id="main" class="main">
      <div class="container-fluid">
        <div class="page-header">
          <div class="row align-items-end">
            <div class="col-lg-8">
              <div class="page-header-title">
                <i class="ik ik-refresh-cw bg-blue"></i>
                <div class="d-inline">
                  <h5>Table</h5>
                  <span>la page permet de faire l’enregistrement de tables</span>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.php?action=home"><i class="ik ik-home"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Table</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Table</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <br>
        <?php
        if ($ver_P[3][0] == "table" and  $ver_P[3][1] == 1) { ?>
          <div class="row">
            <div class="col-md-4 col-sm-4 col-4">
              <div class="btn-group">

                <button type="button" class="btn " style="background-color:#3a3e59;color: white" data-toggle="modal" data-toggle="modal" data-target="#ajouter" title="ajouter un batteau" id="ajout">
                  <i class="fa fa-plus"></i>
                  <span class="p-3">Ajouter une table</span></button>&nbsp;

              </div>
            </div>
          </div>
        <?php } ?>
        <br>



        <div class="row">
          <div class="col-lg-12">
            <div class="card card-default">

              <!-- /.card-heading -->
              <div class="card-body">
                <div class="table-responsive">
                  <div style="height: 400px;overflow: auto;">
                    <table class="table table-striped table-bordered table-hover" id="example1">
                      <thead >
                        <tr>
                          <th></th>
                          <th>Table</th>
                          <th>Statut</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        $dp = all_table();
                        $i = 0;

                        while ($data = $dp->fetch()) {
                          $i = $i + 1; ?>
                          <tr class="odd gradeX">

                            <td id="cd"><?= $i ?> </td>
                            <td id="nom"><?= $data['t_nom'] ?></td>
                            <td id="pt"><?= $data['t_statut'] ?></td>
                            <td id="pn"><?= $data['t_date'] ?></td>
                            <td id="ds" class="center">
                              <?php
                              if (
                                $ver_P[3][0] == "table" and
                                $ver_P[3][4] == 1
                              ) { ?>
                                <a href="#" id="<?= $data['t_id'] ?>" class="btn btn-warning btn-xs update">
                                  <i class="ik ik-edit-2"></i>
                                </a>
                              <?php } ?>
                              <?php
                              if (
                                $ver_P[3][0] == "table" and
                                $ver_P[3][3] == 1
                              ) { ?>
                                <a href="#" id="<?= $data['t_id'] ?>" class="btn btn-pink btn-xs delete">
                                  <i class="ik ik-trash-2"></i>
                                </a>
                              <?php } ?>


                            </td>

                          </tr>
                        <?php
                        }  ?>

                      </tbody>
                    </table>
                  </div>
                </div>


              </div>

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-lg-12 -->
        </div>


    </main>
  </div>


  <!-- end chat sidebar -->
</div>
<!-- end page container -->
<!-- start footer -->
<?php include("views/modale/page/page_modale.php"); ?>
<?php include("views/partials/pied.php"); ?>



<!-- end js include path -->
<script src="public/js/tableHTMLExport.js"></script>

<script src="public/js/jspdf.min.js"></script>
<script src="public/js/jspdf.plugin.autotable.min.js"></script>
<script src="public/js/pdfmake.min.js"></script>
<script src="public/js/html2canvas.min.js"></script>
<script src="public/dialog/js/dialogify.min.js"></script>
<script src="public/views/script/croppie.js"></script>

<script type="text/javascript">
  function refreshPage() {
    location.reload();
  }
  $(document).ready(function() {

    $(document).on('click', '#ajout', function() {

      $('#admin')[0].reset();
      $('.modal-title').text("Ajouter");
      $('#save').val("Enregistrer");
      $("#ajouter").modal('show');
      $('#operation').val("add");


    });



    $(document).on('submit', '#admin', function(event) {
      event.preventDefault();


      $.ajax({

        url: 'views/script/table/insert.php',
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
          $('#ajouter').modal('hide');
          setInterval('refreshPage()', 2000);
        }

      });


    });


    $(document).on('click', '.delete', function(event) {
      var id = $(this).attr("id");
      Dialogify.confirm('voulez-vous vraiment supprimer?', {

        ok: function() {
          $.ajax({

            url: 'views/script/table/delete.php',
            method: 'POST',
            data: {
              id: id
            },
            dataType: "json",
            success: function(data) {
              if (data) {
                Swal.fire(
                  'Reussi!',
                  '',
                  'success'
                )
              } else {
                Swal.fire(
                  'Reussi!',
                  '',
                  'success'
                )
              }

              setInterval('refreshPage()', 2000);
            }

          });
        },

        cancel: function() {
          return false;
        }
      });

    });

    $(document).on('click', '.update', function(event) {


      var id = $(this).attr("id");

      $.ajax({

        url: 'views/script/table/update.php',
        method: 'POST',
        data: {
          id: id
        },
        dataType: "json",
        success: function(data) {
          $('#admin')[0].reset();
          $('#save').val("modifier");
          $('#ajouter').modal('show');

          $('.id').val(data.id);
          $('.nom').val(data.nom);

          datatable.ajax.reload();
        }

      });

    });
    $('.nom').blur(function() {

      var sg = $(this).val();

      $.ajax({
        url: 'views/script/check/check.php',
        method: "POST",
        data: {
          sg: sg
        },
        success: function(data) {
          if (data != '0') {
            $('#num').html('<span class="btn btn-xs btn-danger">le nom existe</span>');
            $('#save').attr("disabled", true);
          } else {
            $('#num').html('<span class="btn btn-xs btn-success">nom correct</span>');
            $('#save').attr("disabled", false);
          }
        }
      });

    });

    // $("#s").on("keyup", function() {



  });
</script>


</body>

<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_professors.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Apr 20110 12:37:30 GMT -->

</html>