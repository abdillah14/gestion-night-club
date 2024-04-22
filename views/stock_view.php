<?php

if (empty($_SESSION["nom"])) {
  $page = "index.php?action=login";
  header('location:' . $page);
}
?>
<?php include("views/partials/head_link.php"); ?>

<div class="wrapper">


  <?php include("views/partials/tete.php"); ?>

  <div class="page-wrap">
    <?php include("views/partials/sidebar.php"); ?>


    <!-- <div class="main-content"> -->
    <main id="main" class="main">

      <div class="container-fluid">
        <div class="page-header">
          <div class="row align-items-end">
            <div class="col-lg-8">
              <div class="page-header-title">
                <i class="ik ik-layers bg-blue"></i>
                <div class="d-inline">
                  <h5>Stock Boisson</h5>
                  <span>La page permet de faire la gestion du stock des boissons en vente</span>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#"><i class="ik ik-home"></i></a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="#">Accuiel</a>
                  </li>

                  <li class="breadcrumb-item active" aria-current="page">Boisson stock en vente</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>

        <div class="row">

          <?php
          if ($ver_P[20][0] == "stock" and  $ver_P[20][1] == 1) { ?>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-6">
                <div class="btn-group">

                  <a href="#" class="btn btn-dark change" id="2">
                    Changer le prix
                  </a>

                </div>
              </div>



            </div>
          <?php }

          ?>



        </div>
        <br><br>
        <div class="row">
          <div class="card card-box">
            <table id="example" class="display nowrap table" style="width:100%">
              <thead>
                <tr>
                  <th>Designation</th>
                  <th>Code-Boisson</th>
                  <th>Quantite</th>
                  <th>Prix d'achat</th>
                  <th>Prix de vente</th>
                  <th>statut</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $q = all_stock();
                $d = 0;




                while ($data = $q->fetch()) :  $d++;
                  $col = "";
                  $stat = "<span class='btn btn-success btn-xs'>Actif</span>";

                  if ($data['pr_q'] <= $data['alert']) {
                    $stat = "<span class='btn btn-danger btn-xs'>Alert</span>";
                    $col = "#f67878";
                  }
                ?>
                  <tr class="odd gradeX" style="background-color: <?= $col; ?> "><!-- <td><?= $d; ?></td> -->
                    <td class="left">
                      <?= $data['designation'] ?>
                    </td>
                    <td>
                      <?= $data['code_pr'] ?>
                    </td>
                    <input type="hidden" id="nb" value="<?= $data['designation'] ?>" />
                    <td class="left"><?= $data['pr_q'] ?></td>
                    <td class="left"><?= $data['prix_a'] ?>fbu</td>

                    <td class="left"><?= $data['prix_x'] ?>fbu|
                      <?= $data['etat'] ?></td>
                    <td class="left"><?= $stat ?> </td>
                    <td class="left"><?php
                                      if (
                                        $ver_P[20][0] == "stock" and
                                        $ver_P[20][4] == 1
                                      ) { ?>
                        <a href="#" id="<?= $data['id'] ?>" class="btn btn-primary btn-xs update">
                          <i class="ik ik-edit-2"></i>
                        </a>
                      <?php } ?>
                    </td>


                  </tr>
                <?php endwhile;
                $q->closeCursor();

                ?>

              </tbody>
              <tfoot>
                <tr>
                  <th>Designation</th>
                  <th>Code-Boisson</th>
                  <th>Quantite</th>
                  <th>Prix d'achat</th>
                  <th>Prix de vente</th>
                  <th>statut</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>








    </main>
  </div>



  <?php include("views/partials/pied.php"); ?>




</div>
</div>
<script src="public/dialog/js/dialogify.min.js"></script>
<script src="public/views/script/croppie.js"></script>
<script type="text/javascript">
  function refreshPage() {
    location.reload();
  }
  $(document).ready(function() {

    $(document).on('click', '#ajout', function(event) {


      $('#stock')[0].reset();
      $('.modal-title').text("Ajouter Produit");
      $('#save').val("Enregistrer");
      $("#ajouter").modal('show');
      $('#operation').val("add");
      $('#imge').html("");
      $('#imge1').html("");

    });

    var table = $('#example').DataTable({

      rowReorder: {
        selector: 'td:nth-child(2)'
      },
      responsive: true
    });



    $(document).on('click', '.plus', function(event) {
      var id = $(this).attr("id");
      var nb = $('#nb').val();
      $('.modal-title').text("Produit =  " + nb);
      $('#stock_up')[0].reset();
      $('.id').val(id);
      $('#update_stock').modal('show');

    });


    $(document).on('submit', '#stock_up', function(event) {
      event.preventDefault();

      $.ajax({

        url: 'views/script/stock/stock_up.php',
        method: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(data) {
          if (data) {
            $('#update_stock').modal('hide');
            Swal.fire(
              'Reussi!',
              '',
              'success'
            )

            setInterval('refreshPage()', 2000);

          } else {

            Swal.fire({
              icon: 'error',
              title: '',
              text: 'verifiez vos informations',
              footer: ''
            })
          }

        }

      });


    });
    $(document).on('submit', '#stock', function(event) {
      event.preventDefault();
      var pa = $('#pa').val();
      var pv = $('#pv').val();
      var tot = 0;
      tot = pv - pa;
      if (tot >= 0) {
        $.ajax({

          url: 'views/script/stock/stock_insert_.php',
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

            } else {

              Swal.fire({
                icon: 'error',
                title: '',
                text: 'verifiez vos informations',
                footer: ''
              })
            }

          }

        });
      } else
        alert('le prix achat est superieur au prix de vente')

    });
    $(document).on('click', '.voir', function() {

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
      new Dialogify('views/script/stock/stock_view.php', options)
        .title('Utilisateur details')
        .showModal();

    });


    $(document).on('click', '.change', function(event) {
      var id = $(this).attr("id");
      Dialogify.confirm('voulez-vous vraiment Changer le prix?', {

        ok: function() {
          $.ajax({

            url: 'views/script/stock/change.php',
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



    $(document).on('click', '.delete', function(event) {
      var id = $(this).attr("id");
      Dialogify.confirm('voulez-vous vraiment supprimer le produit?', {

        ok: function() {
          $.ajax({

            url: 'views/script/stock/stock_delete.php',
            method: 'POST',
            data: {
              id: id
            },
            dataType: "json",
            success: function(data) {
              if (data.success == true) {
                Swal.fire({
                  icon: 'error',
                  title: '',
                  text: 'echouée',
                  footer: ''
                })

                Swal.fire(
                  'Reussi!',
                  '',
                  'success'
                )

              } else {



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

        url: 'views/script/stock/stock_update_.php',
        method: 'POST',
        data: {
          id: id
        },
        dataType: "json",
        success: function(data) {
          $('#stock')[0].reset();
          $('#ajouter').modal('show');


          $('.id').val(id);
          $('.cd').val(data.cd);
          $('#ds').val(data.ds);
          $('#pa').val(data.pa);
          $('#pv').val(data.pv);
          $('#pvs').val(data.pvs);
          $('#qt').val(data.qt);
          $('#fs').val(data.fs);
          $('#photo_hidden').val(data.photo);

          $('.modal-title').text("Modifier Utilisateur");
          $('#save').val("Modifier");
          $('#operation').val("edit");
          datatable.ajax.reload();
        }

      });

    });


    $(document).on('submit', '#stock_dg', function(event) {
      event.preventDefault();
      var id = $(this).attr("id");
      $.ajax({

        url: 'views/script/stock/alert.php',
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
            $('#danger').modal('hide');
            setInterval('refreshPage()', 2000);

          } else {

            Swal.fire({
              icon: 'error',
              title: '',
              text: 'verifiez vos informations',
              footer: ''
            })
          }

        }

      });


    });






    $(".s2").on("click", function() {
      var val = $("#s").val();
      var val2 = $("#s1").val().toLowerCase();
      if (val != "") {
        if (val) {
          $.ajax({
            type: 'POST',
            url: 'views/script/stock_voir.php',
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


  });
</script>





</body>

</html>