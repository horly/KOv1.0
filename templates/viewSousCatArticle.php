<!doctype html>
<!--Début html-->
<html lang="fr">
<!--Début html-->
    <head>
    <!--Début head-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <!--<link rel="stylesheet" href="../asserts/css/bootstrap.min.css" >
        <link rel="stylesheet" href="../asserts/css/dashboard.css" >-->

        <!--Style personnel-->
        <link rel="stylesheet" href="../asserts/css/style.css" >
        
        <!--Chargement des styles pour les icones des reseaux socio-->
        <link rel="stylesheet" href="../asserts/css/bootstrap-social.css" >
        <link rel="stylesheet" href="../asserts/css/docs.css" >
        <link rel="stylesheet" href="../asserts/css/font-awesome.css" >

         <!--chargement des icones-->
        <link href="../icons/css/ionicons.css" rel="stylesheet" type="text/css" />
        <link href="../icons/css/iconstyles.css" rel="stylesheet" type="text/css" />

        <!--CSS charts-->
        <!--<link rel="stylesheet" href="../asserts/css/chartist.min.css">-->

        <!--css toast message-->
        <link href="../asserts/css/toastr/toastr.min.css" rel="stylesheet">

        <!--ceci pour le chart graphique (tableau de statystique)-->
        <link rel="stylesheet" type="text/css" href="../asserts/C3/css/c3.css">


        <link rel="stylesheet" href="assets/css/normalize.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/icons/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/icons/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="assets/icons/pixeden-stroke-7-icon-master/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
        <link rel="stylesheet" href="assets/icons/flag-icon-css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <link href="assets/icons/weather-icons/css/weather-icons.min.css" rel="stylesheet" />
        <link href="assets/css/lib/calendar/fullcalendar.css" rel="stylesheet" />


        <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">

        <!--Mon modal personnel-->
        <link rel="stylesheet" type="text/css" href="assets/css/modal.mata.css">

        <!--loader-->
        <link rel="stylesheet" type="text/css" href="assets/css/loader.css">


         <!--css callout message-->
        <link href="../asserts/css/callout.css" rel="stylesheet">

        <!--<link rel="stylesheet" type="text/css" href="assets/css/loader.css">-->
        <link href="assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet">

  

    <style type="text/css">
     
     .form_card
        {
          background-color: #d1ecf1;
        }

      .scrollcat
      {
        height:150px;
        width:100%;
        overflow:auto;
      }

      #article_zone {
        overflow-y: scroll;
        height: 306px;
        background-color: white;
      }

      #dropdownMenuLink
      {
        border: 1px solid gray;
        color: black;
      }

      .stock
      {
        background-color: #d1ecf1;
      }

      .body-modal-article
        {
          overflow-y: auto;
          height: 550px;
          background-color: white;
        }

        #libsearchcatart {
          background-image: url('../icons/png/office/search.png');
          background-position: 10px 10px; 
          background-repeat: no-repeat;
          padding: 6px 12px 5px 40px;
          -webkit-transition: width 0.4s ease-in-out;
          transition: width 0.4s ease-in-out;
      }

      .viewtva
      {
        display: none;
      }
    </style>
        

         <title>KEDIS Online! | Détails sous catégorie d'articles</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
               <?php 
                    //session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['id_s_cat_art']))  //si la variable id qu'on a transité existe dans l'url 
                    {
                      $getid = $_GET['id']; //on protège la variable 
                      
                      $get_id_connexion = $_GET['id_connexion'];

                      $requser = $bdd->prepare("SELECT * FROM user WHERE id_cl = ? ");
                      $requser->execute(array($getid));

                      $userfos = $requser->fetch();
                      $getname = $userfos['nom_cl'];
                      $getprenom = $userfos['prenom_cl'];
                      $getmail = $userfos['email_cl'];
                      $getprofil = $userfos['profil_cl']; 
                      $sexe= $userfos['sexe_cl'];
                      $login_required = $userfos['login_required'];
                      $id_connexion = $userfos['id_connexion'];


                      if($id_connexion == $get_id_connexion)
                      {
                        //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                        if($login_required == 1)
                        {
                          
                          $nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise
                          $nomUE = $_GET['nom_unite_exploitation']; //on recupère le nom de l'UE

                          //on recupère la date debut du mois
                          $datedebut = date("Y-m-d", mktime(0,0,0,date("m"),1,date("Y")));
                          //on recupère la date fin du mois
                          $datefin = date("Y-m-d", mktime(0,0,0,date("m")+1,0,date("Y")));

                          $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production

                          $id_s_cat_art = $_GET['id_s_cat_art']; //on récupère l'id de l'article
                  ?>

                <!--Code PHP-->
      <!--chargement de la page-->
      <div class="preload">
          <div id="floatingBarsG">
            <div class="blockG" id="rotateG_01"></div>
            <div class="blockG" id="rotateG_02"></div>
            <div class="blockG" id="rotateG_03"></div>
            <div class="blockG" id="rotateG_04"></div>
            <div class="blockG" id="rotateG_05"></div>
            <div class="blockG" id="rotateG_06"></div>
            <div class="blockG" id="rotateG_07"></div>
            <div class="blockG" id="rotateG_08"></div>
          </div>
        </div>

    <div id="body">              
       <!--on inlus la navigation du menu -->
        <?php include('navigation.php'); ?>

         <div id="right-panel" class="right-panel">
            
            <!--on inlus la la barre de navigation au dessus-->
            <?php  include('navbar.php'); ?>

          <?php include('navigation.php'); ?>

            <?php  

              $reqart = $bdd->prepare("SELECT * FROM sous_categorie_article WHERE id_s_cat_art = ?");
              $reqart->execute(array($id_s_cat_art));

              $fetctser = $reqart->fetch();
            ?>


            <!-- Breadcrumbs-->
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Mon stock</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="stock_sous_categorie_article.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mon stock</a></li>
                                        <li class="active">Détails sous catégorie d'articles</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
              <!-- Animated -->
              <div class="animated fadeIn">
                <div class="card">
                  <div class="card-header">
                    <h6>Détails sous catégorie d'articles</h6>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#update">
                          <span class="step size-21">
                            <i class="icon ion-edit"></i>
                          </span>
                          &nbsp;&nbsp;Modifier
                        </button>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-block" id="delete_cat_article">
                          <span class="step size-21">
                            <i class="icon ion-ios-trash"></i>
                          </span>
                          &nbsp;&nbsp;Supprimer
                        </button>
                      </div>
                      <div class="col-md-8"></div>
                    </div>

                    <div id="detail_content">
                      
                    </div>
                       
                  </div>
                </div>
              </div>
              <!-- Animated -->

            </div>


            <!--Les modales-->
            <div class="modal fade ajouter-categorie-service" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-sm-10">
                            <h6 class="modal-title" id="myModalLabel">Modifier la sous catégorie d'articles</h6>
                          </div>
                          <div class="col-sm-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                          
                      </div>
                      <div class="modal-body">
                        <label for="libelleser"><h6>Désignation</h6></label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-inbox.png"></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Entrer le libellé de votre catégorie d'article" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libelleser" id="libelleser" required="" value="<?php echo $fetctser['libelle_s_cat_art'];?>">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          <span class="step size-21">
                            <i class="icon ion-android-cancel"></i>
                          </span>
                          &nbsp;&nbsp;Annuler</button>
                        <button type="submit" class="btn btn-primary" name="addcatser" id="updatecatser"> 
                          <span class="step size-21">
                            <i class="icon ion-archive"></i>
                          </span>
                          &nbsp;&nbsp;Enregistrer</button>
                      </div>
                    </div>
                  
                </div>
              </div>
              <!--fin modale update service-->
                


            </div>
        </div>
         

        <!--*****************************************************-->
        <br><br>
  </div>
    
        <!-- Bootstrap JS -->

         <!--<script src="../asserts/js/vendor/jquery-slim.min.js"></script>-->
        <script src="../asserts/js/jquery/jquery.min.js"></script>

        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.matchHeight.min.js"></script>
        <script src="assets/js/main.js"></script>


        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/lib/calendar/fullcalendar.min.js"></script>
        <script src="assets/js/init/fullcalendar-init.js"></script>


        <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
        <script src="../asserts/js/toastr/toastr.min.js"></script>



        <script src="../dist/js/util.js"></script>
        <!--<script src="../dist/js/dropdown.js"></script>-->
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>


          <script src="assets/js/lib/data-table/datatables.min.js"></script>
          <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
          <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
          <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
          <script src="assets/js/lib/data-table/jszip.min.js"></script>
          <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
          <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
          <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
          <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
          <!--<script src="assets/js/init/datatables-init.js"></script>-->

          <!--Mon modal personnel-->
          <script src="assets/js/modal.mata.js"></script>

          <!--loader-->
          <script src="assets/js/loader.js"></script>

          <!--switch arlert-->
          <script src="assets/js/lib/sweetalert/sweetalert.min.js"></script>

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">

          jQuery(document).ready(function($) 
          {
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.stock').addClass('active');

             affiche_detail(); 

              function affiche_detail()
              {
                
                var id_s_cat_art = '<?php echo $id_s_cat_art; ?>';
                var idUE = '<?php echo $idUE; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/detail_sous_categorie_article.php',
                  data : 'id_s_cat_art=' + id_s_cat_art + '&idUE=' + idUE,
                  success:function(data)
                  {
                    $('#detail_content').html(data);
                  }
                });
              }


               //ajout du catégorie service
             $('#updatecatser').click(function()
                {
                  var libelleser = $('#libelleser').val();
                  var id_s_cat_art = '<?php echo $id_s_cat_art; ?>';
                  var idUE = '<?php echo $idUE; ?>';

                  if(libelleser != '')
                  {
                    $.ajax({
                      type : 'POST',
                      url : 'fonction/update_sous_categorie_articles.php',
                      data : "libelleser=" + libelleser + '&id_s_cat_art=' + id_s_cat_art + 
                             "&idUE=" + idUE,
                      success:function(data)
                      {
                        //alert(data);
                        if(data == 1)
                        {
                          err3("Cette sous-catégorie d'articles existe déjà !");
                          $('#libelleser').addClass('is-invalid');
                        }
                        else
                        {
                          $('#libelleser').removeClass('is-invalid');
                          valid3("Sous-catégorie d'articles mis à jour avec succès !");
                          $('.ajouter-categorie-service').modal('hide');

                          setTimeout(function()
                          {
                            window.location.reload();
                          }, 5000);
                        }
                        affiche_detail();
                      }
                    });
                  }
                  else
                  {
                    $('#libelleser').addClass('is-invalid');
                    err3("Veuillez entrer le libellé du sous-catégorie d'articles S.V.P!");
                  }
                });

              //supprimer une catégorie d'articles
              $('#delete_cat_article').click(function()
                  {

                    var id_s_cat_art = '<?php echo $id_s_cat_art; ?>';
                    var getid = '<?php echo $getid; ?>';
                    var id_connexion = '<?php echo $id_connexion; ?>';
                    var idUE = '<?php echo $idUE; ?>';
                    var nomUE = '<?php echo $nomUE; ?>';
                    var nomE = '<?php echo $nomE; ?>';

                    swal({
                            title: "Confirmer !",
                            text: "Voulez-vous vraiment supprimer cette sous catégorie d'articles ?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#28a745",
                            confirmButtonText: "Oui",
                            cancelButtonText: "Non",
                            closeOnConfirm: false
                            },
                            function(){
                                //swal("Supprimé !!", "L'utilisateur a été supprimé avec succès !!", "success");
                                delete_cat_article();
                                swal(
                                  {
                                    title: "Supprimé !!",
                                  text: "La sous catégorie d'arlticles a été supprimé avec succès !!",
                                  type: "success",
                                  confirmButtonColor: "#28a745",
                                  }, function(){ window.location = 'stock_sous_categorie_article.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE; });
                            });
                  });


              //fonction supprimer une catégorie d'articles
              function delete_cat_article()
              {
                var id_s_cat_art = '<?php echo $id_s_cat_art; ?>';
                var idUE = '<?php echo $idUE; ?>';

                $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction/delete_sous_cat_article.php',
                    data  : 'id_s_cat_art=' + id_s_cat_art + '&idUE=' + idUE, 
                    success:function(data)
                    {
                      
                    }
                  });
              }
             


              /*Ici, on affiche les erreurs et les dans un toast*/

               function err3(element){
                toastr.error(element,'Erreur',{
                  "positionClass": "toast-bottom-right",
                  timeOut: 5000,
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "preventDuplicates": true,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut",
                  "tapToDismiss": false

                })
              }

              function valid3(element)
              {
                toastr.success(element,'Succès',{
                  "positionClass": "toast-bottom-left",
                  timeOut: 5000,
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "preventDuplicates": true,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut",
                  "tapToDismiss": false

                })
              }



          
            

          });
        </script>

    <!--fin body-->
    </body>
<!--fin html-->
</html>
<?php
    }
    else
    {
      header('location:deconnexion.php?id='.$getid);
    }
  }
  else
  {
    header('location:deconnexion.php?id='.$getid);
  }
}  
else
{
  header('location:error404.php');
}
?>
