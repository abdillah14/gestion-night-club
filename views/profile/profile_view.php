<?php

if (empty($_SESSION['nom'])) {
  $page = "index.php?action=login";
  header('location:' . $page);
}
?>
<style>
  input.largerCheckbox {
    width: 40px;
    height: 40px;
  }
</style>
<?php include("views/partials/head_link.php"); ?>




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

            <div class="pagetitle">
              <h1>Profile</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Profile</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->


          </div>
        </div><br>
        <div class="row">
          <div class="col-md-3 col-sm-3 col-6">
            <div class="btn-group">
              <?php
              if ($ver_P[1][0] == "profile" and  $ver_P[1][1] == 1) { ?>
                <button type="button" class="btn btn-dark" data-toggle="modal" data-toggle="modal" data-target="#ajouter" id="ajout">
                  <i class="fa fa-plus"></i>Ajouter un Profil
                </button>
              <?php } ?>
            </div>
          </div>
          <!--  <form  class="search-form-opened" action="#" method="GET">
                                                <div class="input-group" style="color:black; font-weight:bold;">
                                                    <input type="text" id="s" class="form-control" placeholder="Profile..." name="query" required>
                                              <span class="input-group-btn">
                                                      <a href="javascript:;" class="btn submit">
                                                         <i class="icon-magnifier"></i>
                                                       </a>
                                                    </span> 
                                                </div>
                                               </form> -->


        </div>
        <br>
        <div class="row vrow">
        </div>
        <div class="row " style="height: 500px;overflow: auto;">

          <?php
          $q = all_profile();

          while ($data = $q->fetch()) : ?>

            <div class="col-md-3">
              <div class="card card-box">
                <div class="card-body no-padding ">
                  <div class="doctor-profile">
                    <i class="ik ik-users"></i>
                    <div class="profile-bstitle">
                      <div class="doctor-name"><?= $data['pf_nom'] ?></div>
                      <div class="name-center">

                        <?= $data['pf_date'] ?></div>
                    </div>

                  </div>
                  <div class="profile-userbuttons">
                    <?php
                    if (
                      $ver_P[0][0] == "personnel" and
                      $ver_P[0][2] == 1
                    ) { ?>
                      <a href="#" id="<?= $data['pf_id'] ?>" class="btn btn-info btn-xs voir">
                        <i class="fa fa-eye"></i>
                      </a>
                    <?php } ?>
                    <?php
                    if (
                      $ver_P[0][0] == "personnel" and
                      $ver_P[0][4] == 1
                    ) { ?>
                      <a href="#" id="<?= $data['pf_id'] ?>" class="btn btn-primary btn-xs update">
                        <i class="ik ik-edit-2"></i>
                      </a>
                    <?php } ?>
                    <?php
                    if (
                      $ver_P[0][0] == "personnel" and
                      $ver_P[0][3] == 1
                    ) { ?>
                      <a href="#" id="<?= $data['pf_id'] ?>" class="btn btn-danger btn-xs delete">
                        <i class="ik ik-trash-2"></i>
                      </a>
                    <?php } ?>

                  </div>
                </div>
              </div>
            </div>
          <?php endwhile;

          $q->closeCursor();

          ?>
        </div>


      </div>
  </div>

</div>
<!-- </div> -->
</div>
</div>
</div>
</div>
<!-- end page content -->
<!-- start chat sidebar -->

<!-- End user Chat -->
<!-- Start Setting Panel -->

<!-- end chat sidebar -->
</div>
<!-- end page container -->
<!-- start footer -->
<?php include("views/modale/profile/profile_modale.php"); ?>
<?php include("views/partials/pied.php"); ?>

<!-- end js include path -->
<script src="public/views/script/croppie.js"></script>
<script type="text/javascript">
  function refreshPage() {
    location.reload();
  }
  $(document).ready(function() {

    $("#ajout").on('click', function() {

      $('#admin')[0].reset();
      $('.modal-title').text("Ajouter Profile");
      $('#save').val("Enregistrer");
      $("#ajouter").modal('show');
      $('#operation').val("add");
      $('#imge').html("");
      $('#imge1').html("");

    });


    $(document).on('submit', '#admin', function(event) {
      event.preventDefault();


      $.ajax({

        url: 'views/script/profile/profile_insert.php',
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

    $(document).on('click', '.voir', function(event) {
      var id = $(this).attr("id");
      $.ajax({

        url: 'views/modale/profile/essai.php',
        method: 'POST',
        data: {
          id: id
        },

        success: function(data) {



          $('#affecte').modal('show');
          $('#getA').html(data);
          //datatable.ajax.reload();
        }

      });

    });

    $(document).on('click', '.delete', function(event) {
      var id = $(this).attr("id");
      Dialogify.confirm('voulez-vous vraiment supprimer cette personne?', {

        ok: function() {
          $.ajax({

            url: 'views/script/profile/profile_delete.php',
            method: 'POST',
            data: {
              id: id
            },
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

        url: 'views/script/profile/profile_update.php',
        method: 'POST',
        data: {
          id: id
        },
        dataType: "json",
        success: function(data) {
          $('#admin')[0].reset();
          $('#ajouter').modal('show');

          $('#id').val(data.id);
          $('#nom').val(data.nom);


          $('.modal-title').text("Modifier Utilisateur");
          $('#save').val("Modifier");
          $('#operation').val("edit");
          datatable.ajax.reload();
        }

      });

    });
    $(document).on('submit', '#affe', function(event) {
      event.preventDefault();


      $.ajax({
        url: 'views/script/profile/insert_affe.php',
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
              text: 'operation echouee',
              footer: ''
            })
          }
          $('#affecte').modal('hide');
          // datatable.ajax.reload();
        }

      });
    });

    // $("#s").on("keyup", function() {
    $(".s2").on("click", function() {
      var val = $("#s").val();
      var val2 = $("#s1").val().toLowerCase();
      if (val != "") {
        if (val) {
          $.ajax({
            type: 'POST',
            url: 'views/script/profile_voir.php',
            data: {
              val: val,
              val2: val2
            },
            success: function(data) {
              if (data) {
                $('.vrow').html(data);
              } else {
                alert('verifiez vos parametre');
              }

            }
          });
        } else {
          alert('verifiez votre orthographe');


        }
      }
    });
    $('#nom').blur(function() {

      var ph = $(this).val();

      $.ajax({
        url: 'views/script/check/check.php',
        method: "POST",
        data: {
          ph: ph
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

  });
</script>
</body>

<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_professors.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Apr 2018 12:37:30 GMT -->

</html>