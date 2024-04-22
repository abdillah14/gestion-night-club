<?php

if (empty($_SESSION["nom"])) {
  $page = "index.php?action=login";
  header('location:' . $page);
}  ?>

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
        <!-- <div class="page-header"> -->
          <div class="pagetitle">
            <h1>Personnel</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Personnel</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

        </div>

        <br>
        <div class="row">
          <div class="col-md-12">

            <div class="tabbable-line">

              <div class="tab-content">
                <div class="tab-card active fontawesome-demo" id="tab1">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-6">
                      <div class="btn-group">
                        <?php
                        if (
                          $ver_P[0][0] == "personnel" and
                          $ver_P[0][1] == 1
                        ) { ?>
                          <button type="button" class="btn " style="background-color:#587187;" data-toggle="modal" data-toggle="modal" data-target="#ajouter" title="ajouter un batteau" id="ajout">
                            <i class="fa fa-plus"></i>
                            Ajouter un utilisateur</button>&nbsp;
                        <?php } ?>
                      </div>
                    </div>
                    <form class="" action="#" method="GET">
                      <div class="input-group">
                        <input type="text" style="color:green; font-weight:bold;" id="s" class="form-control" placeholder="Nom..." name="query" required>
                        <!--  <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                           <i class="icon-magnifier"></i>
                                         </a>
                                      </span> -->
                      </div>
                    </form>
                    <form class="" action="#" method="GET">
                      <div class="input-group">
                        <input type="text" style="color:green; font-weight:bold;" id="s1" class="form-control" placeholder="Prenom..." name="query" required>

                      </div>
                    </form>
                    <button class="btn btn-info  s2"><i class="ik ik-refresh-cw bg-blue"></i></button>

                  </div>
                  <br>
                  <div class="row vrow">
                  </div>
                  <div class="row " style="height: 500px;overflow: auto;">

                    <?php
                    $q = all_user();
                    $d = "";

                    while ($data = $q->fetch()) : ?>

                      <div class="col-md-3">
                        <div class="stockd stockd-box">
                          <div class="stockd-body no-padding ">
                            <div class="doctor-profile">
                              <?php
                              $d = $data['user_photo'];
                              if ($data['user_photo'] == "") {
                                if ($data['user_sexe'] == "masculin") {
                                  $d = "file/user/homme.png";
                                } else
                                  $d = "file/user/femme.png";
                              }


                              ?>
                              <img src="<?= $d ?>" class="doctor-pic rounded-circle" width="150px" alt="">
                              <div class="profile-usertitle">
                                <div class="doctor-name"><?= $data['user_nom'] ?>&nbsp;<?= $data['user_prenom'] ?></div>

                              </div>
                              <?= $data['user_tel'] ?>
                            </div>
                            <div class="profile-userbuttons">
                              <?php
                              if (
                                $ver_P[0][0] == "personnel" and
                                $ver_P[0][2] == 1
                              ) { ?>
                                <a href="#" id="<?= $data['user_id'] ?>" class="btn btn-info btn-xs voir_user">
                                  <i class="fa fa-eye"></i>
                                </a>
                              <?php } ?>
                              <?php
                              if (
                                $ver_P[0][0] == "personnel" and
                                $ver_P[0][4] == 1
                              ) { ?>
                                <a href="#" id="<?= $data['user_id'] ?>" class="btn btn-dark btn-xs update">
                                  <i class="ik ik-edit-2"></i>
                                </a>
                              <?php } ?>
                              <?php
                              if (
                                $ver_P[0][0] == "personnel" and
                                $ver_P[0][3] == 1
                              ) { ?>
                                <a href="#" id="<?= $data['user_id'] ?>" class="btn btn-pink btn-xs delete">
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
          </div>
        </div>
    </main>
      </div>
      
    </div>
    
  </div>
  <!-- end page content -->
  <!-- start chat sidebar -->

  <!-- End User Chat -->
  <!-- Start Setting cardl -->

  <!-- end chat sidebar -->
</div>
<!-- end page container -->
<!-- start footer -->

<?php include("views/modale/user/user_modale.php"); ?>
<?php include("views/partials/pied.php"); ?>

<!-- end js include path -->
<script src="public/dialog/js/dialogify.min.js"></script>
<script src="public/views/script/croppie.js"></script>

<script type="text/javascript">
  function refreshPage() {
    location.reload();
  }
  $(document).ready(function() {

    $("#ajout").on('click', function() {

      $('#admin')[0].reset();
      $('.modal-title').text("Ajouter Utilisateur");
      $('#save').val("Enregistrer");
      $("#ajouter").modal('show');
      $('#operation').val("add");
      $('#imge').html("");

    });

    $(document).on('submit', '#admin', function(event) {
      event.preventDefault();

      var password = $('#password').val();
      var conf = $('#cpasse').val();

      if (password == conf) {

        $.ajax({

          url: 'views/script/user/user_insert.php',
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
              $('#ajouter').modal('hide');
              setInterval('refreshPage()', 2000);

            }
            if (data.success == false) {

              alert('verifiez vos parametre!')

            }

          }

        });
      } else {
        alert("les deux mot de passe sont differents");
      }

    });

    $(document).on('click', '.voir_user', function() {

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

    $(document).on('click', '.delete', function(event) {
      var id = $(this).attr("id");
      Dialogify.confirm('voulez-vous vraiment supprimer cette personne?', {

        ok: function() {
          $.ajax({

            url: 'views/script/user/user_delete.php',
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

        url: 'views/script/user/user_update.php',
        method: 'POST',
        data: {
          id: id
        },
        dataType: "json",
        success: function(data) {
          $('#admin')[0].reset();
          $('#ajouter').modal('show');

          $('.id').val(data.id);
          $('#pa').val(data.pa);
          $('#nom').val(data.nom);
          $('#prenom').val(data.prenom);
          $('#pa').val(data.pa);
          $('#gh').val(data.gh);

          $('#user').val(data.user);
          $('#phone').val(data.numero);
          $('#sexe').val(data.sexe);
          $('#password').val(data.password);
          $('#cpasse').val(data.password);
          $('.pf').val(data.pf);
          $('#imge').html(data.photo);
          $('#photo_hidden').val(data.photo);

          $('.modal-title').text("Modifier Utilisateur");
          $('#save').val("Modifier");
          $('#operation').val("edit");
          datatable.ajax.reload();
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
            url: 'views/script/user_voir.php',
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


    $('#user').blur(function() {

      var user = $(this).val();

      $.ajax({
        url: 'views/script/check/check.php',
        method: "POST",
        data: {
          user: user
        },
        success: function(data) {
          if (data != '0') {
            $('#num').html('<span class="btn btn-xs btn-danger">le mot de passe existe</span>');
            $('#save').attr("disabled", true);
          } else {
            $('#num').html('<span class="btn btn-xs btn-success">correct</span>');
            $('#save').attr("disabled", false);
          }
        }
      });

    });
    $('#password').blur(function() {

      var pass = $(this).val();

      $.ajax({
        url: 'views/script/check/check.php',
        method: "POST",
        data: {
          pass: pass
        },
        success: function(data) {
          if (data != '0') {
            $('#pss').html('<span class="btn btn-xs btn-danger">le nom utilisateur existe</span>');
            $('#save').attr("disabled", true);
          } else {
            $('#pss').html('<span class="btn btn-xs btn-success">nom  correct</span>');
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