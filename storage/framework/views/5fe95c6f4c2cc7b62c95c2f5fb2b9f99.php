<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
     <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Page d'ouverture agent du coté administrateur</title>
     
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Bootstrap Icons -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
     
     <!-- Style CSS -->        
     <style>
          body {
               background: url('<?php echo e(asset('image/user.jpg')); ?>') no-repeat center center;
               background-size: cover; /* This will make the background image cover the entire page */
               margin: 0;
               padding: 0;
               display: flex;
               flex-direction: column;
               min-height: 100vh;
               font-family: Arial, sans-serif;
          }

          /* Navbar styles */
          .navbar {
               background-color: rgb(0, 0, 118); /* Slightly indigo color */
               display: flex;
               justify-content: space-between;
               align-items: center;
               padding: 10px 20px;
               color: white;
               width: 100%;
               position: relative;
               z-index: 1000;
          }

          .navbar .logo {
               font-size: 18px;
               font-weight: bold;
          }

          .navbar .nav-buttons {
               display: flex;
               justify-content: center;
               flex-grow: 1;
          }

          .navbar .nav-buttons button {
               background-color: transparent;
               color: white;
               border: 2px solid white;
               border-radius: 5px;
               padding: 5px 10px;
               margin: 0 5px;
               cursor: pointer;
               transition: background-color 0.3s, color 0.3s;
          }

          .navbar .nav-buttons button:hover {
               background-color: white;
               color: rgb(0, 0, 118); /* Indigo color on hover */
          }

          .navbar .login-button {
               background-color: white;
               color: rgb(0, 0, 118); /* Indigo */
               border: none;
               padding: 5px 15px;
               border-radius: 5px;
               cursor: pointer;
               font-size: 14px;
          }

          .navbar .login-button:hover {
               background-color: #E6E6FA; /* Light lavender hover effect */
          }

          /* Footer styles */
          footer {
               background-color: rgb(12, 13, 13);
               color: white;
               position: fixed;
               left: 0;
               bottom: 0;
               width: 100%;
               height: 60px;
               display: flex;
               justify-content: space-between;
               align-items: center;
               padding: 0 20px;
               font-size: 14px;
               z-index: 1000;
          }

          footer .contact {
               text-align: left;
          }

          footer .app-name {
               text-align: center;
          }

          footer .author {
               text-align: right;
          }

          /* Centered logo in the content and fullscreen */
          .content {
               position: relative;
               flex: 1;
               display: flex;
               justify-content: center;
               align-items: center;
               width: 100vw;
               height: 100vh;
               overflow: hidden;
               background-color: white;
          }

          .center-logo img {
               position: absolute;
               top: 0;
               left: 0;
               width: 100vw;
               height: 100vh;
               object-fit: cover; /* Ensures the image fills the screen while maintaining aspect ratio */
          }

          /* Pour le Body */
          .container {
               display: flex;
               flex: 1;
               justify-content: center;
               align-items: center;
               padding: 20px;
          }

          .form-container {
               display: flex;
               border: 1px solid #ccc;
               border-color: rgb(0, 0, 118);
               box-shadow: 0 0 10px rgb(0, 0, 118);
               border-radius: 10px;
               overflow: hidden;
               width: 40%;
               max-width: 500px;
               background-color: rgba(255, 255, 255, 0.914);
          }
          .form-right {
               flex: 1;
               background: url('<?php echo e(asset('image/logo_5.jpg')); ?>') no-repeat center center;                    
               justify-content: center;                    
          }
          .form-left {
               //flex: 1;
               display: flex;
               flex-direction: column;
               justify-content: center;
               align-items: center;
               padding: 20px;
          }
          .form-left h2 {
               margin-bottom: 20px;
          }
          .form-left button {
               margin: 10px;
               padding: 10px 20px;
               border: none;
               background-color: #007bff;
               color: white;
               border-radius: 5px;
               cursor: pointer;
          }
          .form-left button:hover {
               background-color: #010101;
          }
          .form-left .utilisateur {
               background-color: green;
          }
          .form-left .administrateur {
               background-color: #000076;
          }
          .form-right .retour {
               background-color: #000076;
          }
          .form-container input[type="checkbox"] {
               margin-left: 10px;
          }

          form label {
               font-weight: bold;
          }
          .form-left .btn-primary {
               background-color: #000076;
               border-color: #000076;
          }
          .form-left .btn-warning {
               background-color: #e68a00;
               border-color: #e68a00;
          }
          .form-left .btn-danger {
               background-color: #cf0000;
               border-color: #cf0000;
          }

          .btn-primary:hover {
               background-color: #000000;
               border-color: #000000;
          }
          .btn-warning:hover {
               background-color: #000000;
               border-color: #000000;
               color: white;
          }
          .btn-danger:hover {
               background-color: #000000;
               border-color: #000000;
          }
     </style>

     </head>

     <body>
     
     <!-- Navbar -->
     <nav class="navbar">
          <div class="form-left"></div>

          <div class="logo">
               <img src="<?php echo e(asset('image/logo_1.jpg')); ?>" alt="Logo" style="height: 40px;">
          </div>

          <div class="nav-buttons">
               
          </div>
          <div>
                              
          </div>
     </nav>

     <!-- Body -->
     <div class="container">
          <div class="form-container">
               <div class="form-left">  
                    <h2>
                         <font color="#000076"><b><strong>Détails agent</strong></b></font>
                    </h2>
                    <?php if(session('error')): ?>
                         <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                    <?php endif; ?>

                    <?php if(session('success')): ?>
                         <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('updateAgent_administrateur', $user->matricule)); ?>" method="POST" enctype="multipart/form-data">
                         <?php echo csrf_field(); ?>
                         <?php echo method_field('POST'); ?>

                         <div class="form-group">
                         <label for="photo">Photo :</label>
                         <?php if($user->photo): ?>
                              <div class="photo-container" style="background-image: url('<?php echo e(asset('storage/images'.'/'.$user->photo)); ?>');"></div>
                         <?php else: ?>
                              N/A
                         <?php endif; ?>
                         </div>

                         <style>
                         .photo-container {
                              width: 100%;
                              height: 300px; /* Adjust the height as needed */
                              background-size: cover;
                              background-position: center;
                              border: 1px solid #ccc;
                              border-radius: 10px;
                         }
                         </style>
               
                         <br>

                         <div class="form-group">
                         <label for="matricule">Matricule :</label> <strong> <?php echo e($user->matricule); ?> </strong>                        
                         </div>

                         <div class="form-group">
                         <label for="nom">Nom :</label> <strong> <?php echo e($user->nom); ?> </strong>                        
                         </div>

                         <div class="form-group">
                         <label for="prenom">Prénom :</label> <strong> <?php echo e($user->prenom); ?> </strong>                        
                         </div>
                         <div class="form-group">
                         <label for="contact">Contact :</label> <strong> <?php echo e($user->contact); ?> </strong>                        
                         </div>
                         <div class="form-group">
                         <label for="email">Mail :</label> <strong> <?php echo e($user->email); ?> </strong>                        
                         </div>
                         <div class="form-group">
                         <label for="password">Mot de passe :</label> <strong> <?php echo e($user->password); ?> </strong>                        
                         </div>

                         <div class="form-group">
                         <label for="nom_societe">Nom de la société :</label> <strong> <?php echo e($user->nom_societe); ?> </strong>                        
                         </div>
                         <div class="form-group">
                         <label for="numero_societe">Numéro de la société :</label> <strong> <?php echo e($user->numero_societe); ?> </strong>                        
                         </div>

                         
                         <div class="form-group text-center">
                         <button onclick="listeAdministrateurs_administrateur()" type="reset" class="btn btn-danger">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-back" viewBox="0 0 16 16">
                                   <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                              </svg>
                              <strong>Retour</strong>
                         </button>
                         <script>
                              function listeAdministrateurs_administrateur() {
                                   window.location.href = "<?php echo e(url('listeAgents_administrateur')); ?>";
                              }
                         </script>
                         </div>
                    </form>
               </div>
          </div>
     </div>

     <!-- Footer -->
     <footer>
          <div class="contact">
               Joindre : <b><strong>+237659435256</strong></b>
          </div>
          <div class="app-name">
               <b>GESTION DE LA PLATEFORME D'ANNONCES</b>
               <p id="timer"></p>
          </div>
          <div class="author">
               Admin : Mlle <b><strong>EVE_JORDANIE</strong></b>
          </div>
     </footer>

     <!-- Du JS -->
     <script>
          document.getElementById('role').addEventListener('change', function() {
               const role = this.value;
               document.getElementById('agentFields').classList.add('d-none');
               document.getElementById('statut_administrateur').classList.add('d-none');
               
               if (role === 'Agent') {
                    document.getElementById('agentFields').classList.remove('d-none');
               } else if (role === 'Administrateur') {
                    document.getElementById('statut_administrateur').classList.remove('d-none');
               }
          });

          function startTimer(duration, display) {
               let timer = duration, minutes, seconds;
               setInterval(function () {
                    if (timer <= 0) {
                         window.location.href = "<?php echo e(route('connexion')); ?>";
                    }
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = "Temps restant :  " + minutes + " min " + seconds + " sec";

                    if (--timer < 0) {
                         timer = duration;
                    }
               }, 1000);
          }

          window.onload = function () {
               const remainingTime = <?php echo e(session('remaining_time', time()) - time()); ?>;
               const display = document.getElementById('timer');
               startTimer(remainingTime, display);
          };
     </script>

     </body>
</html><?php /**PATH T:\Soutenance_de_JORDANIE_EVE\Nouveau_Projet\gestion_plateforme_anonces\resources\views/authentification/administrateur/agent/OpenAgent_administrateur.blade.php ENDPATH**/ ?>