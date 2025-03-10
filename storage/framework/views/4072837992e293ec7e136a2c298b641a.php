<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des formations chez l'administrateur</title>
        
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        
        <!-- Style CSS -->        
        <style>
            /* =========== Google Fonts ============ */
            @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

            /* =============== Globals ============== */
            * {
            font-family: "Ubuntu", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }

            :root {
            --blue: #2a2185;
            --white: #fff;
            --gray: #f5f5f5;
            --black1: #222;
            --black2: #999;
            }

            body {
            min-height: 100vh;
            overflow-x: hidden;
            }

            .container {
            position: relative;
            width: 100%;
            }

            /* =============== Navigation ================ */
            .navigation {
            position: fixed;
            width: 300px;
            height: 100%;
            background: var(--blue);
            border-left: 10px solid var(--blue);
            transition: 0.5s;
            overflow: hidden;
            }
            .navigation.active {
            width: 80px;
            }

            .navigation ul {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            }

            .navigation ul li {
            position: relative;
            width: 100%;
            list-style: none;
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
            }

            .navigation ul li:hover,
            .navigation ul li.hovered {
            background-color: var(--white);
            }

            .navigation ul li:nth-child(1) {
            margin-bottom: 40px;
            pointer-events: none;
            }

            .navigation ul li a {
            position: relative;
            display: block;
            width: 100%;
            display: flex;
            text-decoration: none;
            color: var(--white);
            }
            .navigation ul li:hover a,
            .navigation ul li.hovered a {
            color: var(--blue);
            }

            .navigation ul li a .icon {
            position: relative;
            display: block;
            min-width: 60px;
            height: 60px;
            line-height: 75px;
            text-align: center;
            }

            .navigation ul li a .icon_actuellement {
            position: relative;
            display: block;
            min-width: 60px;
            height: 60px;
            line-height: 75px;
            text-align: center;
            background: var(--white);
            color: var(--blue);
            }

            .navigation ul li a .icon ion-icon {
            font-size: 1.75rem;
            }

            .navigation ul li a .icon_actuellement ion-icon {
            font-size: 1.75rem;
            }

            .navigation ul li a .title {
            position: relative;
            display: block;
            padding: 0 10px;
            height: 60px;
            line-height: 60px;
            text-align: start;
            white-space: nowrap;
            }

            .navigation ul li a .title_actuellement {
            position: relative;
            display: block;
            padding: 0 10px;
            height: 60px;
            line-height: 60px;
            text-align: start;
            white-space: nowrap;
            background: var(--white);
            color: var(--blue);
            }
            

            /* --------- curve outside ---------- */
            .navigation ul li:hover a::before,
            .navigation ul li.hovered a::before {
            content: "";
            position: absolute;
            right: 0;
            top: -50px;
            width: 50px;
            height: 50px;
            background-color: transparent;
            border-radius: 50%;
            box-shadow: 35px 35px 0 10px var(--white);
            pointer-events: none;
            }
            .navigation ul li:hover a::after,
            .navigation ul li.hovered a::after {
            content: "";
            position: absolute;
            right: 0;
            bottom: -50px;
            width: 50px;
            height: 50px;
            background-color: transparent;
            border-radius: 50%;
            box-shadow: 35px -35px 0 10px var(--white);
            pointer-events: none;
            }

            /* ===================== Main ===================== */
            .main {
                position: absolute;
                width: calc(100% - 300px);
                left: 300px;
                min-height: 100vh;
                background: var(--white);
                transition: 0.5s;
                background-image: url("<?php echo e(asset('image/logo_principal.jpg')); ?>");
                background-size: cover; /* Pour que l'image couvre tout le conteneur */
                background-position: center; /* Pour centrer l'image */
                background-repeat: no-repeat; /* Empêche la répétition de l'image */                
                align-items: center;
                justify-content: center;
            }

            .main.active {
            width: calc(100% - 80px);
            left: 80px;
            }

            .topbar {
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
            }

            .toggle {
            position: relative;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2.5rem;
            cursor: pointer;
            }

            .search {
            position: relative;
            width: 320px;
            margin: -20px;
            }

            .search label {
            position: relative;
            width: 100%;
            }

            .search label input {
            width: 100%;
            height: 40px;
            border-radius: 40px;
            padding: 5px 20px;
            padding-left: 35px;
            font-size: 18px;
            outline: none;
            border: 1px solid var(--black2);
            }

            .search label ion-icon {
            position: absolute;
            top: 0;
            left: 10px;
            font-size: 1.2rem;
            }

            button.acces {
               padding: 10px 20px;
               margin: 10px;
               background-color: #cf0000;
               color: white;
               border: 1px solid #ccc;
               border-radius: 0 5px 5px 0;
               cursor: pointer;
               font-weight: bold;
               width: 10%;
            }

          .search button.acces:hover {
               background-color: #E6E6FA;
               color: #cf0000;
          }


            .user {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden; 
            cursor: pointer;
            }

            .user img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            }

            /* ======================= Cards ====================== */
            .cardBox {
            position: relative;
            width: 100%;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 30px;
            }

            .cardBox .card {
            position: relative;
            background: var(--white);
            padding: 30px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            }

            .cardBox .card_actuellement {
            position: relative;
            background: var(--blue);
            padding: 30px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            }

            .cardBox .card .numbers {
            position: relative;
            font-weight: 500;
            font-size: 2.5rem;
            color: var(--blue);
            }

            .cardBox .card_actuellement .numbers_actuellement {
            position: relative;
            font-weight: 500;
            font-size: 2.5rem;
            color: var(--white);
            }

            .cardBox .card .cardName {
            color: var(--black2);
            font-size: 1.1rem;
            margin-top: 5px;
            }

            .cardBox .card_actuellement .cardName {
            color: var(--white);
            font-size: 1.1rem;
            margin-top: 5px;
            }

            .cardBox .card .iconBx {
            font-size: 3.5rem;
            color: var(--black2);
            }

            .cardBox .card_actuellement .iconBx {
            font-size: 3.5rem;
            color: var(--white);
            }

            .cardBox .card:hover {
            background: var(--blue);
            }

            .cardBox .card_actuellement:hover {
            background: var(--white);
            color: var(--white);
            }

            .cardBox .card:hover .numbers,
            .cardBox .card:hover .cardName,
            .cardBox .card:hover .iconBx {
            color: var(--white);
            }

            .cardBox .card_actuellement:hover .numbers_actuellement,
            .cardBox .card_actuellement:hover .cardName,
            .cardBox .card_actuellement:hover .iconBx {
            color: var(--blue);
            }

            /* ================== Order Details List ============== */
            .details {
            position: relative;
            width: 150%;
            padding: 20px;
            display: grid;
            grid-template-columns: 2fr 1fr;
            grid-gap: 30px;
            /* margin-top: 10px; */
            }

            .details .recentOrders {
            position: relative;
            display: grid;
            min-height: 500px;
            background: #ffffffe5;
            padding: 20px;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            }

            .details .cardHeader {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            }
            .cardHeader h2 {
            font-weight: 600;
            color: var(--blue);
            text-align: center;
            }

            .cardHeader .btn {
            position: relative;
            padding: 10px 25px;
            background: #cf0000;
            text-decoration: none;
            color: var(--white);
            border-radius: 6px;
            }

            .status.actuellement {
            padding: 2px 4px;
            background: green;
            color: var(--white);
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            }
            
            .cardHeader .btn_nouveau {
            position: relative;
            padding: 10px 45px;            
            background: green;
            text-decoration: none;
            color: var(--white);
            border-radius: 6px;
            }

            .details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            }
            .details table thead td {
            font-weight: 600;
            }
            .details .recentOrders table tr {
            color: var(--black1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            }
            .details .recentOrders table tr:last-child {
            border-bottom: none;
            }
            .details .recentOrders table tbody tr:hover {
            background: var(--blue);
            color: var(--white);
            }
            .details .recentOrders table tr td {
            padding: 10px;
            }
            .details .recentOrders table tr td:last-child {
            text-align: end;
            }
            .details .recentOrders table tr td:nth-child(2) {
            text-align: end;
            }
            .details .recentOrders table tr td:nth-child(3) {
            text-align: center;
            }
            .status.delivered {
            padding: 2px 4px;
            background: #8de02c;
            color: var(--white);
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            }
            .status.pending {
            padding: 2px 4px;
            background: #e9b10a;
            color: var(--white);
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            }
            .status.return {
            padding: 2px 4px;
            background: #f00;
            color: var(--white);
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            }
            .status.inProgress {
            padding: 2px 4px;
            background: #2a2185;
            color: var(--white);
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            }

            .recentCustomers {
            position: relative;
            display: grid;
            min-height: 500px;
            padding: 20px;
            background: var(--white);
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            }
            .recentCustomers .imgBx {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50px;
            overflow: hidden;
            }
            .recentCustomers .imgBx img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            }
            .recentCustomers table tr td {
            padding: 12px 10px;
            }
            .recentCustomers table tr td h4 {
            font-size: 16px;
            font-weight: 500;
            line-height: 1.2rem;
            }
            .recentCustomers table tr td h4 span {
            font-size: 14px;
            color: var(--black2);
            }
            .recentCustomers table tr:hover {
            background: var(--blue);
            color: var(--white);
            }
            .recentCustomers table tr:hover td h4 span {
            color: var(--white);
            }

            /* ====================== Responsive Design ========================== */
            @media (max-width: 991px) {
            .navigation {
                left: -300px;
            }
            .navigation.active {
                width: 300px;
                left: 0;
            }
            .main {
                width: 100%;
                left: 0;
            }
            .main.active {
                left: 300px;
            }
            .cardBox {
                grid-template-columns: repeat(2, 1fr);
            }
            }

            @media (max-width: 768px) {
            .details {
                grid-template-columns: 1fr;
            }
            .recentOrders {
                overflow-x: auto;
            }
            .status.inProgress {
                white-space: nowrap;
            }
            }

            @media (max-width: 480px) {
                .cardBox {
                    grid-template-columns: repeat(1, 1fr);
                }
                .cardHeader h2 {
                    font-size: 20px;
                    text-align: center;
                }
                .user {
                    min-width: 40px;
                }
                .navigation {
                    width: 100%;
                    left: -100%;
                    z-index: 1000;
                }
                .navigation.active {
                    width: 100%;
                    left: 0;
                }
                .toggle {
                    z-index: 10001;
                }
                .main.active .toggle {
                    color: #fff;
                    position: fixed;
                    right: 0;
                    left: initial;
                }
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

        </style>
    </head>



    <body>

        <!-- =============== Navigation ================ -->
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <img src="<?php echo e(asset('image/logo_1.jpg')); ?>" alt="Logo" style="height: 40px;">
                            </span>
                            <span class="title"><strong>Gestion de Plateforme d'Annonces</strong></span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('accueilAdministrateur')); ?>">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Accueil de l'administrateur</span>
                        </a>
                    </li>
x
                    <li>
                        <a href="<?php echo e(route('listeAnnonces_administrateur')); ?>">
                            <span class="icon">
                                <ion-icon name="chatbubble-outline"></ion-icon>
                            </span>
                            <span class="title">Annonces</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('listeLocalisations_administrateur')); ?>">
                            <span class="icon">
                                <ion-icon name="chatbubble-outline"></ion-icon>
                            </span>
                            <span class="title">Localisations</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('listeElectromenagers_administrateur')); ?>">
                            <span class="icon">
                                <ion-icon name="chatbubble-outline"></ion-icon>
                            </span>
                            <span class="title">Electroniques</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('listeOrdinateurs_administrateur')); ?>">
                            <span class="icon">
                                <ion-icon name="chatbubble-outline"></ion-icon>
                            </span>
                            <span class="title">Ordinateurs</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('listeMagasins_administrateur')); ?>">
                            <span class="icon">
                                <ion-icon name="settings-outline"></ion-icon>
                            </span>
                            <span class="title">Magasin</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('listeServices_administrateur')); ?>">
                            <span class="icon">
                                <ion-icon name="settings-outline"></ion-icon>
                            </span>
                            <span class="title">Services</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('listeFormations_administrateur')); ?>">
                            <span class="icon_actuellement">
                                <ion-icon name="settings-outline"></ion-icon>
                            </span>
                            <span class="title_actuellement">Formations</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('listeTransactions_administrateur')); ?>">
                            <span class="icon">
                                <ion-icon name="lock-closed-outline"></ion-icon>
                            </span>
                            <span class="title">Transactions</span>
                        </a>
                    </li>             

                    <li>
                        <a href="<?php echo e(route('connexion')); ?>">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title"><strong>Se déconnecter</strong></span>
                        </a>
                    </li>
                </ul>
            </div>


               <!-- ========================= Main ==================== -->
               <div class="main">
                    
                    <form action="/searchFormation_administrateur" class="form-inline">
                    <div class="topbar">
                    <div class="toggle">
                        <img src="<?php echo e(asset('image/logo_7.jpg')); ?>" alt="Logo" style="height: 40px;">                            
                    </div>
                    <div class="search">
                         <label for="keyword">
                            <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Rechercher une vidéo">
                            <ion-icon name="search-outline"></ion-icon>                            
                         </label>
                    </div>
                    <button type="submit" class="acces">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                            <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                        </svg>
                        <strong>
                            <font size="3">Vidéo</font>
                        </strong>
                    </button>


                    <form action="/searchFormation1_administrateur" class="form-inline">
                    <div class="search">
                         <label for="keyword1">
                            <input type="text" id="keyword1" name="keyword1" class="form-control" placeholder="Rechercher un pdf">
                            <ion-icon name="search-outline"></ion-icon>                            
                         </label>
                    </div>
                    <button type="submit" class="acces">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                            <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                        </svg>
                        <strong>
                            <font size="3">Pdf</font>
                        </strong>
                    </button>
                    

                    <font color="white" size="6">Administrateur: <strong><u>EVE JORDANIE</u></strong></font>
                                                               
                    <div class="user">
                        <img src="<?php echo e(asset('image/logo_8.jpg')); ?>" alt="Logo" style="height: 40px;">                                                                           
                    </div>
                </div>



                <!-- ======================= Cards ================== -->
                <div class="cardBox">
                    
                    <a href="<?php echo e(route('listeClients_administrateur')); ?>" style="text-decoration: none; color: inherit;">
                        <div class="card">
                            <div>
                                <div class="numbers">Consulter</div>
                                <div class="cardName">Les acteurs</div>
                            </div>
                            <div class="iconBx">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>
                        </div>
                    </a>

                    <a href="<?php echo e(route('listePaniers_administrateur')); ?>" style="text-decoration: none; color: inherit;">
                        <div class="card">
                            <div>
                                <div class="numbers">Panier</div>
                                <div class="cardName">Sélectionner</div>
                            </div>
                            <div class="iconBx">
                                <ion-icon name="cart-outline"></ion-icon>
                            </div>
                        </div>
                    </a>

                    <a href="<?php echo e(route('listeAnnonces_administrateur')); ?>" style="text-decoration: none; color: inherit;">
                        <div class="card_actuellement">
                            <div>
                                <div class="numbers_actuellement">Annonces</div>
                                <div class="cardName">Informations</div>
                            </div>
                            <div class="iconBx">
                                <ion-icon name="chatbubbles-outline"></ion-icon>
                            </div>
                        </div>
                    </a>

                    <a href="<?php echo e(route('listeTransactions_administrateur')); ?>" style="text-decoration: none; color: inherit;">
                        <div class="card">
                            <div>
                                <div class="numbers">Transactions</div>
                                <div class="cardName">En fcfa</div>
                            </div>
                            <div class="iconBx">
                                <ion-icon name="cash-outline"></ion-icon>
                            </div>
                        </div>
                    </a>
                </div>


                <!-- ================ Order Details List ================= -->
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2 align="center"><font size="7">LISTE DES FORMATIONS</font></h2>
                            <br>
                            <form action="/searchFormation_administrateur" class="form-inline">
                            
                            <a href="/nouveauFormation_administrateur" class="btn_nouveau">
                                <i class="bi bi-person-plus"></i> Nouvelle formation Vidéo
                            </a>
                            
                            <a href="/nouveauFormation1_administrateur" class="btn_nouveau">
                                <i class="bi bi-person-plus"></i> Nouvelle formation Pdf
                            </a>    
                        </div>
                        
                            <?php if(session('success')): ?>
                                <div id="successMessage" style="color: green;"><?php echo e(session('success')); ?></div>
                                <script>
                                    setTimeout(function(){
                                    document.getElementById('successMessage').style.display = 'none';
                                    }, 3000);
                                </script>
                            <?php endif; ?>


                         <table class="table table-striped table-hover">
                              <thead>
                                   <tr>
                                        <td><font color="#2a2185" size="4">Formations vidéos</font></td>
                                        <td>Vidéos</td>
                                        <td>Noms</td>
                                        <td>Prix unitaires</td>
                                        <td>Niveaux</td>
                                        <td>Prix totaux</td>
                                        <td>Descriptions</td>
                                        <td>Auteurs</td>
                                        <td><strong><font color="black">Actions</font></strong></td>                                                                                                                  
                                   </tr>
                              </thead>

                              <tbody>
                                   <?php if(isset($formations)): ?>
                                        <?php $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <tr>
                                                    <td><?php echo e($formation->id_formation); ?></td>   
                                                    <td>
                                                        <?php if($formation->video_formation): ?>
                                                            <video width="50" height="50" controls>
                                                                <source src="<?php echo e(asset('videos/'.$formation->video_formation)); ?>" type="video/mp4">
                                                                Le fichier ne peut pas supporter les plus lourds.
                                                            </video>
                                                        <?php else: ?>
                                                            N/A
                                                        <?php endif; ?>
                                                    </td> 
                                                    <td><?php echo e($formation->nom_formation); ?></td>
                                                    <td><?php echo e($formation->prix_formation); ?></td>
                                                    <td><?php echo e($formation->niveau_formation); ?></td>
                                                    <td><?php echo e($formation->total_formation); ?></td>
                                                    <td><?php echo e($formation->description_formation); ?></td>
                                                    <td>"<?php echo e($formation->user->role); ?>" : &nbsp;&nbsp;<?php echo e($formation->user->nom); ?> <?php echo e($formation->user->prenom); ?></td>
                                                    <td>
                                                        <span class="status actuellement">
                                                            <a href="<?php echo e(url('/OpenFormation_administrateur/' . $formation->id_formation)); ?>" class="btn btn-secondary" onclick="return confirm('Êtes-vous sûr de visualiser les détails de cette fomation vidéo ?');">
                                                                <font color="white"><ion-icon name="eye-outline"></ion-icon></font>
                                                            </a>
                                                        </span> &nbsp;&nbsp;
                                                        <span class="status pending">
                                                            <a href="<?php echo e(route('editFormation_administrateur', $formation->id_formation)); ?>" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de vouloir modifier cette formation vidéo ?');">
                                                                <font color="white"><i class="bi bi-pencil"></i></font>
                                                            </a>
                                                        </span> &nbsp;&nbsp;
                                                        <span class="status return">
                                                            <a href="<?php echo e(url('/deleteFormation_administrateur/' . $formation->id_formation)); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation vidéo ?');">
                                                                <font color="white"><i class="bi bi-trash"></i></font>
                                                            </a>
                                                        </span>                                                         
                                                    </td> 
                                             </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php else: ?>
                                        <?php $__currentLoopData = \App\Models\Formation::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <tr>
                                                    <td><?php echo e($formation->id_formation); ?></td>   
                                                    <td>
                                                        <?php if($formation->video_formation): ?>
                                                            <video width="50" height="50" controls>
                                                                <source src="<?php echo e(asset('videos/'.$formation->video_formation)); ?>" type="video/mp4">
                                                                Le fichier ne peut pas supporter les plus lourds.
                                                            </video>
                                                        <?php else: ?>
                                                            N/A
                                                        <?php endif; ?>
                                                    </td> 
                                                    <td><?php echo e($formation->nom_formation); ?></td>
                                                    <td><?php echo e($formation->prix_formation); ?></td>
                                                    <td><?php echo e($formation->niveau_formation); ?></td>
                                                    <td><?php echo e($formation->total_formation); ?></td>
                                                    <td><?php echo e($formation->description_formation); ?></td>
                                                    <td>"<?php echo e($formation->user->role); ?>" : &nbsp;&nbsp;<?php echo e($formation->user->nom); ?> <?php echo e($formation->user->prenom); ?></td>
                                                    <td>
                                                        <span class="status actuellement">
                                                            <a href="<?php echo e(url('/OpenFormation_administrateur/' . $formation->id_formation)); ?>" class="btn btn-secondary" onclick="return confirm('Êtes-vous sûr de visualiser les détails de cette fomation vidéo ?');">
                                                                <font color="white"><ion-icon name="eye-outline"></ion-icon></font>
                                                            </a>
                                                        </span> &nbsp;&nbsp;
                                                        <span class="status pending">
                                                            <a href="<?php echo e(route('editFormation_administrateur', $formation->id_formation)); ?>" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de vouloir modifier cette formation vidéo ?');">
                                                                <font color="white"><i class="bi bi-pencil"></i></font>
                                                            </a>
                                                        </span> &nbsp;&nbsp;
                                                        <span class="status return">
                                                            <a href="<?php echo e(url('/deleteFormation_administrateur/' . $formation->id_formation)); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation vidéo ?');">
                                                                <font color="white"><i class="bi bi-trash"></i></font>
                                                            </a>
                                                        </span>                                                         
                                                    </td> 
                                             </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php endif; ?>
                         </table>


                        <hr color="#2a2185" size="6">
                         <table class="table table-striped table-hover">
                              <thead>
                                   <tr>                                        
                                        <td><font color="#2a2185" size="4">Formations pdf</font></td>
                                        <td>Pdf</td>
                                        <td>Noms</td>
                                        <td>Prix unitaires</td>
                                        <td>Niveaux</td>
                                        <td>Prix totaux</td>
                                        <td>Descriptions</td>
                                        <td>Auteurs</td>
                                        <td><strong><font color="black">Actions</font></strong></td>                                                                                                                    
                                   </tr>
                              </thead>

                              <tbody>
                                   <?php if(isset($formations1)): ?>
                                        <?php $__currentLoopData = $formations1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <tr>
                                                    <td><?php echo e($formation1->id_formation1); ?></td>   
                                                    <td>
                                                        <?php if($formation1->pdf_formation): ?>
                                                            <a href="<?php echo e(asset('storage/' . $formation1->pdf_formation)); ?>" target="_blank">
                                                                <img src="<?php echo e(asset('images/pdf_icon.png')); ?>" alt="PDF" width="50" height="50">
                                                            </a>
                                                        <?php else: ?>
                                                            N/A
                                                        <?php endif; ?>
                                                    </td>  
                                                    <td><?php echo e($formation1->nom_formation); ?></td>
                                                    <td><?php echo e($formation1->prix_formation); ?></td>
                                                    <td><?php echo e($formation1->niveau_formation); ?></td>
                                                    <td><?php echo e($formation1->total_formation); ?></td>
                                                    <td><?php echo e($formation1->description_formation); ?></td>
                                                    <td>"<?php echo e($formation1->user->role); ?>" : &nbsp;&nbsp;<?php echo e($formation1->user->nom); ?> <?php echo e($formation1->user->prenom); ?></td>
                                                    <td>
                                                        <span class="status actuellement">
                                                            <a href="<?php echo e(url('/OpenFormation1_administrateur/' . $formation1->id_formation1)); ?>" class="btn btn-secondary" onclick="return confirm('Êtes-vous sûr de visualiser les détails de cette fomation pdf ?');">
                                                                <font color="white"><ion-icon name="eye-outline"></ion-icon></font>
                                                            </a>
                                                        </span> &nbsp;&nbsp;
                                                        <span class="status pending">
                                                            <a href="<?php echo e(route('editFormation1_administrateur', $formation1->id_formation1)); ?>" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de vouloir modifier cette formation pdf ?');">
                                                                <font color="white"><i class="bi bi-pencil"></i></font>
                                                            </a>
                                                        </span> &nbsp;&nbsp;
                                                        <span class="status return">
                                                            <a href="<?php echo e(url('/deleteFormation1_administrateur/' . $formation1->id_formation1)); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation pdf ?');">
                                                                <font color="white"><i class="bi bi-trash"></i></font>
                                                            </a>
                                                        </span>                                                         
                                                    </td> 
                                             </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php else: ?>
                                        <?php $__currentLoopData = \App\Models\Formation1::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($formation1->id_formation1); ?></td>   
                                                    <td>
                                                        <?php if($formation1->pdf_formation): ?>
                                                            <a href="<?php echo e(asset('storage/' . $formation1->pdf_formation)); ?>" target="_blank">
                                                                <img src="<?php echo e(asset('images/pdf_icon.png')); ?>" alt="PDF" width="50" height="50">
                                                            </a>
                                                        <?php else: ?>
                                                            N/A
                                                        <?php endif; ?>
                                                    </td>  
                                                    <td><?php echo e($formation1->nom_formation); ?></td>
                                                    <td><?php echo e($formation1->prix_formation); ?></td>
                                                    <td><?php echo e($formation1->niveau_formation); ?></td>
                                                    <td><?php echo e($formation1->total_formation); ?></td>
                                                    <td><?php echo e($formation1->description_formation); ?></td>
                                                    <td>"<?php echo e($formation1->user->role); ?>" : &nbsp;&nbsp;<?php echo e($formation1->user->nom); ?> <?php echo e($formation1->user->prenom); ?></td>
                                                    <td>
                                                        <span class="status actuellement">
                                                            <a href="<?php echo e(url('/OpenFormation1_administrateur/' . $formation1->id_formation1)); ?>" class="btn btn-secondary" onclick="return confirm('Êtes-vous sûr de visualiser les détails de cette fomation pdf ?');">
                                                                <font color="white"><ion-icon name="eye-outline"></ion-icon></font>
                                                            </a>
                                                        </span> &nbsp;&nbsp;
                                                        <span class="status pending">
                                                            <a href="<?php echo e(route('editFormation1_administrateur', $formation1->id_formation1)); ?>" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de vouloir modifier cette formation pdf ?');">
                                                                <font color="white"><i class="bi bi-pencil"></i></font>
                                                            </a>
                                                        </span> &nbsp;&nbsp;
                                                        <span class="status return">
                                                            <a href="<?php echo e(url('/deleteFormation1_administrateur/' . $formation1->id_formation1)); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation pdf ?');">
                                                                <font color="white"><i class="bi bi-trash"></i></font>
                                                            </a>
                                                        </span>                                                         
                                                    </td> 
                                             </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php endif; ?>
                         </table>

                    </div>
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


          <!-- JavaScript to change logos -->
          <script>
               // Array of logo paths
               const logos = [
                    "<?php echo e(asset('image/logo_1.jpg')); ?>",
                    "<?php echo e(asset('image/logo_2.jpg')); ?>",
                    "<?php echo e(asset('image/logo_3.jpg')); ?>",
                    "<?php echo e(asset('image/logo_4.jpg')); ?>"
               ];

               // Get the image element
               const logoElement = document.getElementById('dynamic-logo');
               let logoIndex = 0;

               // Function to change the logo
               function changeLogo() {
                    logoIndex = (logoIndex + 1) % logos.length; // Loop through the array
                    logoElement.src = logos[logoIndex];
               }

               // Change logo every 5 seconds (5000 milliseconds)
               setInterval(changeLogo, 5000);

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

            <!-- =========== Scripts =========  -->
            <script src="assets/js/main.js"></script>

            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </body>

</html><?php /**PATH T:\Soutenance_de_JORDANIE_EVE\Nouveau_Projet\gestion_plateforme_anonces\resources\views/authentification/administrateur/formation/listeFormations_administrateur.blade.php ENDPATH**/ ?>