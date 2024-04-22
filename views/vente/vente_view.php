<?php

if (empty($_SESSION['nom'])) {
  $page = "index.php?action=login";
  header('location:' . $page);
}
$s = date('s');
$h = date('h');
$string = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$string = str_shuffle($string);
$c = substr($string, 0, 7);


$code = $h . $s . $_SESSION["id"] . $c;



?>
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
            <div class="col-lg-8">
              <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                  <h5>Vente de Boissons</h5>
                  <span>la page permet de faire la vente des boissons aux clients</span>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.php?action=home"><i class="ik ik-home"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Vente</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Vente</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <br><br>
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <div class="card card-box">
              <div class="card-head">
                <font size="6">
                  <header class="col-sm-6 control-label">Boisons</header>
                </font>
              </div>
              <div class="card-body " id="bar-parent">
                <div class="form-group col-md-12">
                  <input type="text" style="color:green; font-weight:bold; border-radius: 20px;" id="s" class="form-control sh" placeholder="Seach..." name="query" required>
                </div>
                <div style="height: 120px;overflow: auto;">
                  <?php
                  $q = all_stock();
                  while ($data = $q->fetch()) { ?>
                    <div class="form-group btn btn-info col-md-12 bs" id="<?= $data['id'] ?>"><?= $data['designation'] ?>--<?= $data['prix_x'] ?>fbu</div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8 col-sm-8">
            <div class="card card-box">
              <div class="card-head">
                <font size="6">
                  <header class="col-sm-12 control-label">
                    <div class="form-group col-md-6">

                      <input type="text" id="nom" name="nom" style="border-radius:20px;" class="form-control nom" placeholder="nom">



                      <select class="form-control tb" style="border-radius:20px;">
                        <option value="">Select...table</option>
                        <?php

                        $con = dbConnect();
                        $p = $con->prepare('select * from tab where 
                                                t_statut="Actif" ');

                        $p->execute();
                        for ($d = 0; $d < $p->rowcount(); $d++) {
                          $m = $p->fetch(); ?>
                          <option id='rec' value="<?= $m['t_id'] ?>"><?= $m['t_nom'] ?></option>';

                        <?php  } ?>
                      </select>


                    </div>


                  </header>
                </font>

              </div>
              <div class="card-body " id="bar-parent1">
                <table id="tab" class="table tab" class="table table-striped custom-table table-hover tab">
                  <thead>
                    <tr>
                      <th>Boisons</th>
                      <th>prix</th>
                      <th>Qe</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="add">


                  </tbody>


                </table>





                <div class="col-md-12 col-sm-6 center">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="hidden" value="<?= $code ?>" classe="code" id="code" name="code">
                  <button type="reset" class="btn btn-danger " class="btn submit center">Vider</button>

                  <button type="submit" name="save" id="save" class="btn btn-primary pt center save">Aperçu<i class="fa fa-eye "></i></button>


                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="card card-default">

              <!-- /.card-heading -->
              <div class="card-body">
                <div class="table-responsive">

                  <div style="height: 400px;overflow: auto;">
                    <table class="table table-striped table-bordered table-hover example1" id="simpletable">
                      <thead style="">
                        <tr>
                          <th>N</th>
                          <th>ID</th>
                          <th>Table</th>
                          <th>SV</th>
                          <th>nom</th>
                          <th>Statut</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php


                        $dp = all_vente2();

                        $i = 0;
                        if (
                          $ver_P[7][0] == "vente_boisson" and
                          $ver_P[7][4] == 1
                        ) {

                          $dp = all_vente();
                        }

                        while ($data = $dp->fetch()) {
                          $i = $i + 1;
                        ?>
                          <tr class="odd gradeX">
                            <td id="cd"><?= $i ?></td>
                            <td id="cd"><?= $data['v_code'] ?></td>
                            <td id="nom"><?= $data['t_nom'] ?></td>
                            <td id="cd"><?= $data['user_nom'] ?> <?= $data['user_prenom'] ?></td>
                            <td id="nom"><?= $data['nom'] ?></td>
                            <td id="pt"><?= $data['v_statut'] ?></td>
                            <td id="pn"><?= $data['v_date'] ?></td>
                            <td id="ds" class="center">
                              <a href="#" id="<?= $data['v_code'] ?>" class="btn btn-dark btn-xs voir">
                                <i class="fa fa-eye"></i>
                              </a>
                              <?php
                              if (
                                $ver_P[7][0] == "vente_boisson" and
                                $ver_P[7][4] == 1
                              ) { ?>
                                <a href="#" id="<?= $data['v_code'] ?>" class="btn btn-info btn-xs update">
                                  <i class="ik ik-check-square"></i>
                                </a>
                              <?php } ?>
                              <?php
                              if (
                                $ver_P[7][0] == "vente_boisson" and
                                $ver_P[7][3] == 1
                              ) { ?>
                                <a href="#" id="<?= $data['v_code'] ?>" class="btn btn-pink btn-xs delete">
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
</div>
</div>
<!-- end page container -->
<!-- start footer -->

<?php include("views/partials/pied.php"); ?>
<script src="public/dialog/js/dialogify.min.js"></script>

<!-- end js include path -->
<script src="public/views/script/croppie.js"></script>
<script type="text/javascript">
  $('.tab').hide();
  $('#sav').hide();
  $('.en').hide();

  function refreshPage() {
    location.reload();
  }


  $(document).ready(function() {

    $(".sh").on("keyup", function() {

      var value = $(this).val().toLowerCase();
      $(".bs").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
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
      new Dialogify('views/script/vente/vente_view.php', options)
        .title('details')
        .showModal();

    });




    var count = 1;

    $(document).on('click', '.bs', function() {
      var id = $(this).attr("id");
      if (id) {

        $.ajax({

          url: 'views/script/stock/stock_update_.php',
          method: 'POST',
          data: {
            id: id
          },
          dataType: "json",
          success: function(data) {


            var ds = data.ds;
            var cd = data.cd;
            var pa = data.pa;
            var pv = data.px;
            var qt = data.qt;
            var pr = data.id;
            count = count + 1;
            var html_code = "<tr id='row" + count + "'>";

            html_code += "<td class='item_ds'>" + ds + "</td>";
            html_code += "<td  class='item_pv'>" + pv + "</td>";
            html_code += "<td  class='item_qt'><input type='number' name='qt[]' id='qt' class='form-control col-md-6 qt' min='1' /><input type='hidden' name='pr[]' id='pr' value='" + pr + "' class='pr' /><input type='hidden' name='qr[]' id='qr' value='" + qt + "' class='qr' /></td>";
            html_code += "<td><button type='button' name='remove' data-row='row" + count + "' class='btn btn-danger btn-xs remove'>-</button></td>";
            html_code += "</tr>";

            $('#add').append(html_code);

            // datatable.ajax.reload();
          }

        });

        $('.tab').show();
        $('.save').show();
        // $('.en').show(); 
        $('#sh').val("");
      }

    });
    $(document).on('click', '#save', function(event) {
      var tb = $('.tb').val();
      var id = $('#code').val();
      var nom = $('.nom').val();
      if (nom == '') {
        nom = 'client';
      }
      if (tb != '') {

        var item_qr = [];
        $('.qr').each(function() {
          item_qr.push($(this).val());
        });
        var item_qt = [];
        $('.qt').each(function() {
          item_qt.push($(this).val());
        });

        var item_ds = [];
        var item_pv = [];
        var item_pr = [];

        $('.item_ds').each(function() {
          item_ds.push($(this).text());
        });

        $('.item_pv').each(function() {
          item_pv.push($(this).text());
        });

        $('.pr').each(function() {
          item_pr.push($(this).val());
        });


        $.ajax({

          url: 'views/script/vente/vente_voir.php',
          method: 'POST',
          data: {
            item_ds: item_ds,
            id: id,
            item_qt: item_qt,
            item_qr: item_qr,
            tb: tb,
            item_pv: item_pv,
            item_pr: item_pr,
            nom: nom
          },

          success: function(data) {



            $('#ajouter').modal('show');
            $('#print').html(data);
            //datatable.ajax.reload();
          }

        });
      } else
        alert('veillez selectioner une table');

    });



    $(document).on('click', '.savv', function(event) {

      var item_qr = [];

      $('.qr').each(function() {
        item_qr.push($(this).val());
      });
      var item_qt = [];
      $('.qt').each(function() {
        item_qt.push($(this).val());
      });
      var tb = $('.tb').val();
      var item_ds = [];
      var item_pv = [];
      var item_pr = [];

      var stat = $(this).attr("id");

      var nom = $('.nom').val();
      if (nom == '') {
        nom = 'client';
      }
      $('.item_ds').each(function() {
        item_ds.push($(this).text());
      });

      $('.item_pv').each(function() {
        item_pv.push($(this).text());
      });

      $('.pr').each(function() {
        item_pr.push($(this).val());
      });
      var id = $('#code').val();

      $.ajax({
        url: "views/script/vente/vente_insert.php",
        method: "POST",
        data: {
          item_ds: item_ds,
          id: id,
          item_qt: item_qt,
          item_qr: item_qr,
          tb: tb,
          item_pv: item_pv,
          item_pr: item_pr,
          nom: nom,
          stat: stat
        },
        success: function(data) {
          if (data) {
            $('#ajouter').modal('hide');
            Swal.fire(
              'Reussi!',
              '',
              'success'
            )
            w = window.open();
            w.document.write($('.print_div').html());
            w.print();
            w.close();

            $("td[contentEditable='true']").text("");
            for (var i = 2; i <= count; i++) {
              $('tr#' + i + '').remove();
            }
            setInterval('refreshPage()', 2000);
          } else {
            alert(data)
          }

        }
      });

    });




    $('#sh').blur(function() {

      var sh = $(this).val();

      $.ajax({
        url: 'views/script/vente/vente_view.php',
        method: "POST",
        data: {
          num: sh
        },
        success: function(data) {
          if (data == 0 || data == "") {
            $('#num').html('<span class="text-danger">produit not available</span>');
            $('#ajout').attr("disabled", true);
          } else {
            $('.idd').val(data);
            $('#num').html('<span class="btn btn-info btn-xs">' + sh + '</span>');
            $('#ajout').attr("disabled", false);
          }
        }
      });

    });
    $(document).on('click', '.remove', function() {
      var delete_row = $(this).data("row");
      $('#' + delete_row).remove();
    });

    $(document).on('click', '.en', function() {

      setInterval('refreshPage()', 2000);
    });

    $(document).on('click', '#pt', function() {
      w = window.open();
      w.document.write($('.print_div2').html());
      w.print();
      w.close();

    });


    $(document).on('click', '.delete', function(event) {
      var id = $(this).attr("id");
      Dialogify.confirm('voulez-vous vraiment supprimer la vente?', {

        ok: function() {
          $.ajax({

            url: 'views/script/vente/vente_delete.php',
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
      Dialogify.confirm('voulez-vous vraiment enregister la vente?', {

        ok: function() {
          $.ajax({

            url: 'views/script/vente/paye.php',
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





  });
</script>
</body>

<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_professors.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Apr 2018 12:37:30 GMT -->

</html>