<html>
<head>
    <title>Marathon du Web 2020- IUT de Lens</title>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <!-- http://usewing.ml -->
    <link rel="stylesheet" href="{{url('style.css')}}">
</head>
<body>
<section class="hero container center text-center">
    <header>
        </h1>
    </header>
</section>
<section class="container" id="intro">
    <h2>Introduction</h2>
    <div class="row">
        <div class="col">
            <p>Le marathon débute le
                <time datetime="2020-12-16T08:15:00">mercredi 16 décembre 2020 à 8h15</time>
                par une présentation du sujet et se termine le
                <time datetime="2020-12-17T18:30:00">jeudi 17 décembre 2020 à 18h30</time>
                .
                Le vendredi 18 décembre après midi (13h00 - 17h) est consacré à la présentation des projets.

                Vous devez utiliser le framework PHP Laravel.
            </p>
        </div>
    </div>
</section>
<section class="container" id="subject">
    <h2>Sujet</h2>
    <div class="row">
        <div class="col">
            <p>
                Vous devez réaliser un site de gestion de votre ludothèque. Il sera possible de consulter sa collection
                de jeux,
                regarder les jeux de la base de données, ajouter le dernier jeu acheté, ... Vous souhaitez devenir un
                site référence dans le monde ludique
                ! ;-) . C'est parti !


        </div>
    </div>
</section>


<div>
    <section class="container">
        <h2>Base de données</h2>
        <div class="row">
            <div class="col">
                <img id='bd' src="{{url('./images/modeleDonnees.png')}}" width='70%' alt="Tables">
                <ul>
                    <li><strong>users</strong> : les différents utilisateurs enregistrés dans notre application.
                    </li>
                    <li><strong>jeux</strong> : les différentes jeux stockés dans la base. Le champ regles donne
                        les règles du jeu. Le champ description donne une description du jeu. Le champ url_media donne
                        un lien vers un média qui présente le jeu (photo, vidéo, ...).
                        La relation "a ajouté" entre un utilisateur et un jeu indique l'identification de l'utilisateur
                        ayant ajouté (créé) le jeu dans la base de données.
                    </li>
                    <li><strong>editeurs</strong> : Donne le nom de l'éditeur du jeu.</li>
                    <li><strong>themes</strong> : Donne le thème du jeu.</li>
                    <li><strong>mecaniques</strong> : Donne une liste de mécaniques utilisées par le jeu.</li>
                    <li><strong>commentaires</strong> : les utilisateurs peuvent donner un commentaire sur un
                        jeu. L'utilisateur ne peut donner qu'un seul commentaire sur un jeu, il faudra donc interdire la
                        création d'un nouveau commentaire sur un jeu par le même utilisateur.
                        L'utilisateur peut donner une note entre 0 et 5 au jeu en plus du commentaire.
                        Il y a donc deux clés étrangères permettant de connaitre l'utilisateur et le jeu.
                    </li>
                    <li><strong>achats</strong> est une table pivot permettant de spécifier quand un utilisateur a
                        acheté le jeu, où il est stocké et le prix d'achat.
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="container">

        <h2 id="travail-a-realiser">Travail à réaliser</h2>
        <p>
            Vous devez réaliser :
        </p>
        <ol>
            <li>Le code de l'application (backend).</li>
            <li>La charte graphique + logo puis intégration (frontend)</li>
            <li>rédiger un avis sur un jeu (choisi librement)</li>
            <li>la rédaction de règles du jeu en anglais. Attention au plagiat puisque nous passerons tous les textes au
                logiciel anti-plagiat, redoutablement efficace.
            </li>
            <li>la rédaction (en français) de vos choix relatifs au design.</li>
            <li>Pendant le projet 3 jalons (Milestone) + 1 jalon projet</li>

            <li><span style="font-weight: bold">date fin jalon 1 : </span>16/12 à 14h (des tickets simples)</li>
            <li><span style="font-weight: bold">date fin jalon 2 : </span>17/12 à 10h (plus de travail)</li>
            <li><span style="font-weight: bold">date fin jalon 3 + jalon projet :</span> 17/12 à 18h30</li>
        </ol>


        <p style="text-align: center">Il faut cliquer sur les onglets ci dessous pour consulter les tickets (issues) des
            trois jalons;-)</p>
        <div class="tab">
            <button class="tablinks" id="defaultOpen" onclick="opena(event, 'jalon1')">Jalon 1</button>
            <button class="tablinks" onclick="opena(event, 'jalon2')">Jalon 2</button>
            <button class="tablinks" onclick="opena(event, 'jalon3')">Jalon 3</button>
            <button class="tablinks" onclick="opena(event, 'projet')">Projet</button>
        </div>


        <div class="row">
            <div class="col">
                <div id="jalon1" class="tabcontent">
                    <!--<h3>Backend</h3>-->
                    <p>Certaines parties du code sont indépendantes.</p>
                    <p>Vous pouvez (devez :-) travailler een parallèle et, ainsi, avancer plus vite.</p>

                    <p>La gestion des issues dans git est obligatoire</p>

                    <h3>Liste des tickets du jalon 1 (du numéro 11 au numéro 19) :</h3>

                    <ul>
                        <li>
                            <span style="font-weight: bold"> 11	Tester l'authentification</span>
                            <ul>
                                <li>Faire une page de connexion</li>
                                <li>Permettre l'authentification d'un utilisateur</li>
                                <li>Permettre la déconnexion d'un utilisateur</li>
                            </ul>
                        </li>
                        <li><span style="font-weight: bold">12	Formulaire d'ajout d'un jeu</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> Un utilisateur connecté</li>
                                <li><span style="font-weight: bold">Ou suis-je :</span> Sur la page liste des jeux</li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span>
                                    <ol>
                                        <li> Je dois ajouter un bouton pour créer un nouveau jeu.</li>
                                        <li> Créer le formulaire et gérer la persistance d'un nouveau jeu.</li>
                                        <li> Les champs ci-dessous sont requis:
                                            <ul>
                                                <li>nom</li>
                                                <li>description</li>
                                                <li>thème</li>
                                                <li>éditeur</li>
                                            </ul>
                                        </li>
                                    </ol>

                                </li>
                            </ul>
                        </li>
                        <li>
                            <span style="font-weight: bold">13	Ajout d'un jeu dans la BDD</span>
                            <ul>
                                <li>Fixture (Seeders) pour pouvoir ajouter des jeux dans la base de données.</li>
                                <li>ID</li>
                                <li>titre</li>
                                <li>mécanique</li>
                                <li>univers</li>
                                <li>affichage de la photo</li>
                                <li>règles</li>
                                <li>langue</li>
                                <li>nombre de joueurs</li>
                                <li>durée.</li>
                            </ul>
                        <li>
                            <span style="font-weight: bold">14	liste des jeux</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> N'importe quel visiteur du
                                    site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis-je:</span> Sur la page d'accueil et je
                                    clique sur le lien "jeux".
                                </li>
                                <li><span style="font-weight: bold">Que dois-je voir sur cette nouvelle page :</span> Je
                                    dois voir la liste des jeux.
                                </li>
                                <li><span style="font-weight: bold">Que dois-je voir au minimum sur un jeu</span>
                                    <ul>
                                        <li>nom du jeu</li>
                                        <li>la photo</li>
                                        <li>le thème (fantastique, médiéval)</li>
                                        <li>la durée d'une partie</li>
                                        <li>le nombre de joueurs</li>
                                    </ul>
                                </li>
                            </ul>
                        <li>
                            <span style="font-weight: bold">15	Détail d'un jeu</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis je : </span>N'importe quel visiteur du
                                    site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis je : </span>Sur la page regroupant tous les
                                    jeux.
                                    <p>Je clique sur un bouton "Plus d'info" disponible pour chaque jeu de cette
                                        liste</p>
                                </li>
                                <li><span style="font-weight: bold">Que dois je faire:</span>
                                    <ul>
                                        <li> Ajouter le lien sur la page liste</li>
                                        <li> Afficher les informations du jeu</li>
                                    </ul>
                                </li>
                                <li><span style="font-weight: bold">Quelles sont les informations du jeu :</span>
                                    <ul>
                                        <li> titre</li>
                                        <li> la (les) mécanique(s)</li>
                                        <li> description</li>
                                        <li> affichage de la photo</li>
                                        <li> thème</li>
                                        <li> catégorie</li>
                                        <li> langue</li>
                                        <li> éditeur</li>
                                        <li> nombre de joueurs</li>
                                        <li> durée</li>
                                    </ul>
                            </ul>
                        </li>
                        <li>
                            <span style="font-weight: bold">16	Réalisation d'une carte d'un jeu</span>
                            <ul>
                                <li>Réaliser un composant qui affiche une représentation synthétique d'un jeu</li>
                                <li>Ce composant doit être autonome et accepte un paramètre, l'instance d'un jeu</li>
                                <li>On doit pouvoir afficher ce composant dans une page :
                                    <ul>
                                        <li> Une photo</li>
                                        <li> Son nom</li>
                                        <li> Son éditeur</li>
                                        <li> Son thème</li>
                                        <li> liste des mécaniques sous forme de tags</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span style="font-weight: bold">17	Page Accueil : affichage de 5 jeux aléatoires</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis je : </span>Je suis un utilisateur connecté
                                </li>
                                <li><span style="font-weight: bold">Ou suis je : </span>Je suis sur la page d'accueil
                                    <ul>
                                        <li>Je clique sur un bouton "Choix de 5 jeux aléatoires"</li>
                                        <li>La page d'accueil est affichée avec 5 jeux choisis de façon aléatoire</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span style="font-weight: bold">18	Trier la liste des jeux par nom</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis je : </span>N'importe quel visiteur du
                                    site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis je : </span>Sur la page de listing des jeux.
                                </li>
                                <li><span style="font-weight: bold">Que dois-je faire : </span>Ajouter un bouton pour
                                    trier les jeux sur leur nom de manière
                                    croissante.
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span style="font-weight: bold">19	 Règles du jeu</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis je : </span>N'importe quel visiteur du
                                    site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis je : </span>Sur la page règle du jeu.</li>
                                <li><span style="font-weight: bold">Que dois-je faire : </span>
                                    <ul>
                                        <li> Je dois pouvoir voir le titre du jeu suivi de sa règle du jeu</li>
                                        <li> je dois ajouter un lien en dessous de la règle pour retourner à la page du
                                            jeu
                                        </li>
                                        <li> je dois aussi ajouter un lien vers la page de la liste de tous les jeux
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <div id="jalon2" class="tabcontent">
                    <h3>Liste des tickets du jalon 2 (du numéro 20 au numéro 32) :</h3>

                    <ul>
                        <li>
                            <span style="font-weight: bold"> 20- Création du formulaire version 2</span>
                            <ul>
                                <li>Compléter le formulaire de création d'un jeu contenant tous les champs présents dans
                                    la base de données.
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span style="font-weight: bold">21- Ajout d’un commentaire et d’une note</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> Un utilisateur connecté</li>
                                <li><span style="font-weight: bold">Ou suis-je :</span> Sur la page détail d'un jeu</li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Proposer un formulaire pour ajouter un commentaire, c'est à dire
                                    <ul>
                                        <li>Une note comprise entre 0 et 5</li>
                                        <li>Un commentaire (textuel)</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span style="font-weight: bold">22- Afficher les commentaires d’un jeu</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span>N'importe quel visiteur du site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis-je : </span>Sur la page détail d'un jeu</li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Je dois pouvoir voir la
                                    liste des commentaires du jeu, comprenant :
                                    <ul>
                                        <li>L'auteur du commentaire</li>
                                        <li>La date du commentaire sous la forme d'un intervalle de temps depuis l'ajout du
                                            commentaire.</li>
                                        <li>Le texte du commentaire</li>
                                        <li>La note</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">23- Page profil d'un utilisateur</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> Un utilisateur connecté.</li>
                                <li><span style="font-weight: bold">Ou suis-je :</span>N'importe où sur le site</li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Je dois pouvoir afficher
                                    une page qui contient les informations de l'utilisateur comme
                                    <ul>
                                        <li>son nom</li>
                                        <li>son adresse mail</li>
                                    </ul>
                                    <p>D'autres informations viendront compléter la page profil (voir autres questions : ludothèque personnelle)</p>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">24- Ajouter l'achat d’un jeu dans ma collection personnelle</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> Un utilisateur connecté</li>
                                <li><span style="font-weight: bold">Ou suis-je :</span>Dans la page profil de
                                    l'utilisateur connecté
                                </li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Ajouter
                                    <ul>
                                        <li>La date d'achat du jeu</li>
                                        <li>Le lieu de stockage du jeu</li>
                                        <li>Le prix d'achat du jeu</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">25- Suppression de l’achat d’un jeu de ma collection personnelle</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> Un utilisateur connecté</li>
                                <li><span style="font-weight: bold">Ou suis-je :</span>Dans la page profil de
                                    l'utilisateur connecté
                                </li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Possibilité de supprimer
                                    un jeu, précédemment acheté, de ma collection de jeux
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span style="font-weight: bold">26 Affichage de ma collection de jeux de ma collection personnelle</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> Un utilisateur connecté</li>
                                <li><span style="font-weight: bold">Ou suis-je :</span>Dans la page profil de
                                    l'utilisateur connecté
                                </li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Afficher la liste des
                                    jeux achetés
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">27- Jeu : liste des jeux par éditeur</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> N'importe quel visiteur du
                                    site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis-je :</span>La liste des jeux</li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Afficher la liste des
                                    jeux qui respectent le choix d'un éditeur sélectionné
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">28- Jeu : liste des jeux par thème</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> N'importe quel visiteur du
                                    site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis-je :</span>La liste des jeux</li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Afficher la liste des
                                    jeux qui respectent le choix du thème sélectionné
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">29- Jeu : liste des jeux par mécanique</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> N'importe quel visiteur du
                                    site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis-je :</span>La liste des jeux</li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Afficher la liste des
                                    jeux qui respectent le choix d'un mécanisme sélectionné
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">30- Afficher les statistiques d’un jeu</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> N'importe quel visiteur du
                                    site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis-je :</span>Sur la page qui affiche les
                                    détails d'un jeu
                                </li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Je dois pouvoir afficher,
                                    en plus des informations propres au jeu, un cadre statistique avec des informations
                                    supplémentaires
                                    <ul>
                                        <li>La note moyenne de ce jeu</li>
                                        <li>La note la plus haute de ce jeu.</li>
                                        <li>La note la plus basse de ce jeu.</li>
                                        <li>Le nombre de commentaires sur ce jeu.</li>
                                        <li>Le nombre de commentaires total pour tous les jeux.</li>
                                        <li>Le classement de ce jeu dans l'ensemble des jeux ayant le même thème.</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">31- Afficher les informations tarifaires du jeu</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> N'importe quel visiteur du
                                    site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis-je :</span>Sur la page qui affiche les
                                    détails d'un jeu
                                </li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Je dois pouvoir afficher,
                                    en plus des informations propres au jeu, un cadre tarif avec des informations
                                    supplémentaires
                                    <ul>
                                        <li>Le prix moyen de ce jeu.</li>
                                        <li>Le prix le plus haut de ce jeu.</li>
                                        <li>Le prix le plus bas de ce jeu.</li>
                                        <li>Le nombre d'utilisateurs qui possèdent ce jeu.</li>
                                        <li>le nombre total d'utilisateurs du site</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">32- Tri chronologique des commentaires d’un jeu</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> N'importe quel visiteur du
                                    site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis-je :</span>Sur la page qui affiche les
                                    détails d'un jeu
                                </li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Je dois pouvoir afficher,
                                    les commentaires du jeu triés par date, du plus récent au plus ancien.
                                </li>
                            </ul>
                        </li>


                    </ul>

                </div>
                <div id="jalon3" class="tabcontent">
                    <h3>Liste des tickets du jalon 3 (du numéro 40 au numéro 45) :</h3>

                    <ul>

                        <li>
                            <span style="font-weight: bold">40- Page d’accueil : afficher les 5 meilleurs jeux </span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> Un utilisateur connecté.</li>
                                <li><span style="font-weight: bold">Ou suis-je :</span>Sur la page d'accueil après
                                    connexion
                                </li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Je clique sur un bouton :
                                    Les 5 meilleurs jeux (ceux ayant les meilleures notes).
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">41- Créer un template pour le cadre tarifaire du jeu</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> N'importe quel visiteur du
                                    site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis-je :</span>Sur la page qui affiche les
                                    détails d'un jeu
                                </li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Je dois modifier le cadre
                                    tarifaire du jeu pour le rendre visuellement intéressant.
                                </li>
                                <li><span style="font-weight: bold">Comment je m’y prends : </span>
                                    <ul>
                                        <li><span style="font-weight: bold">pour le prix</span></li>
                                        <li>Créer une barre avec à gauche le prix le plus bas et à droite le prix le
                                            plus haut.
                                        </li>
                                        <li>positionner une flèche <img
                                                src="https://www.virages.com/Images/Categorie_B15/27149-500.gif"
                                                width="20" height="20"/> à l'endroit du prix moyen et l'afficher.
                                        </li>
                                        <li><span style="font-weight: bold">pour le nombre d'utilisateurs</span></li>
                                        <li>un rond gris et par dessus un autre rond vert qui représente le pourcentage
                                            de joueurs possédant ce jeu sur le nombre total de joueur du site.
                                        </li>
                                        <li>besoin d'aide : <a
                                                href="https://nosmoking.developpez.com/demos/css/gauge_circulaire.html">"gauge"
                                                circulaire</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">42- Créer un template pour le cadre statistique du jeu</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> N'importe quel visiteur du
                                    site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis-je :</span>Sur la page qui affiche les
                                    détails d'un jeu
                                </li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Je dois modifier le cadre
                                    statistique du jeu pour le rendre visuellement intéressant.
                                </li>
                                <li><span style="font-weight: bold">Comment je m’y prends : </span>
                                    <ul>
                                        <li><span style="font-weight: bold">pour les notes : </span></li>
                                        <li>Réaliser un dégradé de couleur entre le <span style="font-weight: bold">rouge et le vert</span>
                                            selon le poids de la note.
                                        </li>
                                        <li>0 sera un rouge foncé et 10 sera un vert clair</li>
                                        <li><span style="font-weight: bold">pour nombre de commentaires du jeu :</span>
                                        </li>
                                        <li>Ajouter une image et modifier la taille de l'image <img
                                                src="https://img2.freepng.fr/20180205/wke/kisspng-flame-fire-clip-art-flames-5a781390f02af4.5186766115178187689837.jpg"
                                                width="20" height="20"/> en fonction du classement:
                                        <li>sur le podium taille de 200px -> 200px</li>
                                        <li>entre le 4ème et le 7éme taille de 100px -> 100px</li>
                                        <li>au dessous du 7éme taille de 50px -> 50px</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">43- Recherche multi-critères</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je  :</span> N'importe quel visiteur du
                                    site.
                                </li>
                                <li><span style="font-weight: bold">Ou suis-je  :</span>Sur la page d'accueil après
                                    connexion
                                </li>
                                <li><span style="font-weight: bold">Que dois-je faire  :</span> Ajouter la possibilité de
                                    rechercher un jeu en fonction de <span style="font-weight: bold">DEUX critères minimum</span>
                                    : choisis parmi, par exemple
                                    <ul>
                                        <li>au minimum une mécanique</li>
                                        <li>le nombre de joueurs</li>
                                        <li>la durée de jeu</li>
                                        <li>la langue.</li>
                                    </ul>
                                    </p>Cette fonction sera accessible depuis la page d'accueil ou depuis une page
                                    spécifique.</p>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">44- Prévoir un modérateur de commentaires : </span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> Un utilisateur connecté.</li>
                                <li><span style="font-weight: bold">Ou suis-je :</span> La liste des commentaires d'un
                                    jeu
                                </li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Supprimer un commentaire
                                    si je suis :
                                    <ul>
                                        <li>L'utilisateur qui a ajouté le jeu peut supprimer les commentaires.</li>
                                        <li>L'auteur d'un commentaire peut supprimer un de ses commentaires d'un jeu.
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span style="font-weight: bold">45- pagination de la liste des jeux</span>
                            <ul>
                                <li><span style="font-weight: bold">Qui suis-je :</span> Un utilisateur connecté.</li>
                                <li><span style="font-weight: bold">Ou suis-je :</span> Je suis sur la page d'accueil
                                </li>
                                <li><span style="font-weight: bold">Que dois-je faire :</span> Je choisis d'afficher la
                                    liste des jeux
                                    <ul>
                                        <li>J'affiche les jeux dans un tableau de N jeux</li>
                                        <li>Je peux afficher les jeux suivants (N) ou précédents (N)</li>
                                        <li>J'ai le choix de N entre 15, 20, 25 (à adapter en fonction du nombre de
                                            jeux)
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <div id="projet" class="tabcontent">
                    <h3>Liste des tickets du jalon PROJET (du numéro 2 au numéro 7) :</h3>
                    <ul>
                        <li><span style="font-weight: bold">2- Logo et nom de l’application</span>
                            <ul>
                                <li><span style="font-weight: bold">Choisir un Nom </span>pour l'application</li>
                                <li>Vous pouvez, si vous le jugez opportun, définir un univers ou un public
                                    particulier pour votre site.
                                    Par exemple : uniquement des jeux pour les enfants (univers enfantin) ou
                                    un univers fantastique ou ...
                                </li>
                                <li><span style="font-weight: bold">Réaliser le logo </span>de l'application.</li>
                                <p>NB : ce logo peut être simpliste. Vous n'êtes pas en DUT MMI !</p>
                            </ul>
                        </li>
                        <li><span style="font-weight: bold">3- Réaliser le design de la page d'accueil du site. </span>
                            <ul>
                                <p>Cette page comportera :</p>
                                <li>header : nom du site, logo, ...,</li>
                                <li>footer : possibilité de contacter les créateurs, ...</li>
                                <li>la possibilité de se connecter en mode administrateur</li>
                                <li>5 jeux avec le titre du jeu , la photo et si vous le jugez opportun certains
                                    éléments descriptifs du jeu
                                </li>
                                <li>Éventuellement l'accès au menu.</li>
                                <li>Vous choisirez aussi comment ces 5 jeux sont affichés (aléatoire, alphabétique
                                    ...)
                                </li>
                                <!--
                                                                <p>NB : compte tenu du temps dont vous disposez, seule la réalisation du design de la
                                                                    page d'accueil est demandée.
                                                                </p>
                                -->
                            </ul>
                        </li>
                        <li><span style="font-weight: bold">4- Définir le design de base de l'application</span>
                            <ul>
                                <li> choix des couleurs</li>
                                <li> réaliser un nuancier</li>
                                <li> choix des polices de caractère : pour les titres, les textes</li>
                                <li> choix des formes de bouton.</li>
                                <p>NB : pour le design, vous pouvez choisir un template (par ex Bootstrap).</p>
                            </ul>
                        </li>
                        <li><span style="font-weight: bold">5- La rédaction en français</span>
                            <ul>
                                <p>La rédaction comportera deux éléments</p>
                                <ul>
                                    <li><span style="font-weight: bold">1- le choix du design</span>
                                        <ul>
                                            <p>Vous rédigerez un document (1 à 2 pages qui reprend les éléments suivants
                                                :</p>

                                            <li> choix de l'univers ou du public choisi et expliquez pourquoi ce choix
                                            </li>
                                            <li> le logo</li>
                                            <li> le nuancier</li>
                                            <li> les polices de caractère</li>
                                            <li> les choix de boutons</li>
                                            <li> choix pour le front : Quelle solution choisie ? Si utilisation d'un
                                                template : faites un avant - après
                                            </li>
                                            <p>Vous expliquerez en quoi le design réalisé est en concordance avec le
                                                thème choisi.</p>
                                        </ul>
                                    </li>
                                    <li><span style="font-weight: bold">2- la rédaction d'un avis sur un jeu</span>
                                        <ul>
                                            <p>Vous rédigerez également un avis sur un jeu. Cet avis sera ajouté à la
                                                fin de
                                                la rédaction du design.</p>
                                            <p>Le document final , avec les deux parties, doit comporter :</p>
                                            <li> le nom et numéro de votre équipe</li>
                                            <li> les noms des différents membres</li>
                                            <li>Cela être déposé sur Moodle le jeudi 17 décembre avant 20h (Moodle /
                                                DUT2 / projet
                                                marathon).
                                            </li>
                                            <p>NB : la notation en français compte dans la note finale. </p>
                                            <p>NB : pour le design, vous pouvez choisir un template (par ex
                                                Bootstrap).</p>
                                        </ul>
                                    </li>
                                </ul>
                            </ul>
                        </li>
                        <li><span style="font-weight: bold">6- Design de la note attribuée avec le commentaire</span>
                            <ul>
                                <p> Au niveau de l'affichage du commentaire du joueur, une note doit être affichée.
                                    Vous pouvez choisir un design basique (une note sur 5 par exemple) ou un design plus
                                    élaboré.</p>
                                <li>Des étoiles</li>
                                <li>quelque chose de plus original ...</li>
                            </ul>
                        </li>
                        <li><span style="font-weight: bold">7- Add the rules of one game in English</span></li>


                    </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="container" id="notation">
    <h2>Notation</h2>
    <div class="row">
        <div class="col">
            <p class="content">La notation tiendra compte de chaque partie (code, design, écriture). N'en
                négligez
                aucune.
            <p>Les notes obtenues seront comptabilisées pour l'UE 33.</li>
            </p>
        </div>
    </div>
</section>


<section class="container">
    <h2 id="utilisation-serveur">Utilisation du serveur Gitlab de l'Université</h2>
    <div class="row">
        <div class="col">
            <p class="content">
                Vous allez travailler en équipe de 5 à 6 sur le même projet.
                Il est indispensable d'utiliser un outil collaboratif pour pouvoir travailler ensemble et en distanciel.
            </p>
            <p>
                Le leader de votre équipe a créé une divergence (<i>fork</i>) du projet initial <code>https://gitlab.univ-artois.fr/marathon-profs/ludotheque.git</code> dans le groupe de l'équipe.
                Chaque membre de l'équipe (<i>les bisounours</i> par exemple) a ensuite fait un clone du projet sur sa machine personnelle.
            </p>
            <pre><code>git clone https://gitlab.univ-artois.fr/les-bisounours/ludotheque.git</code></pre>
            <p>Chaque membre de l'équipe prend en charge l'une des questions proposées dans section <a href="#travail-a-realiser">Travail à réaliser</a></p>

            <div class="alert alert-warning">
                <strong>Attention</strong> :
                Chaque membre de l'équipe doit suivre <strong>obligatoirement</strong> les instructions <code>git</code> indiquées  dans l'exercice précédent et indiquer à nouveau dans la suite
                de façon à éviter toutes pertes de code.
            </div>

            <ol>
                <li>Création d'une branche locale de travail <code>git checkout -b fix-question_num</code></li>
                <li>Réaliser le travail pour résoudre la question</li>
                <li> Prendre en cours les modifications pour le prochain commit

                    <code>git add .</code>
                </li>
                <li>Faire un commit des modifications
                    <code>git commit -m "Résolution de la question #num"</code>
                </li>
                <li>Faire une vérification que les modifications ont été prises en compte par <code>git</code> :
                    <code>git status</code>
                </li>
                <li>Retour sur la branche principale <code>master</code> :
                    <code>git checkout master</code> ou <code>Etape-1</code> ou <code>Etape-2</code> ou ...
                </li>
                <li>Récupérer les dernières modifications sur la branche partagée (<code>master</code> ou <code>Etape-1</code> ou <code>Etape-2</code> ou ...) :
                    <code>git pull origin master</code>
                </li>
                <li>Fusion avec la branche de développement : <code>git merge fix-question_num</code></li>
                <li>Mise à disposition du travail personnel dans le projet partagé :

                    <code>git push origin master</code> (<code>master</code> ou <code>Etape-1</code> ou <code>Etape-2</code> ou ...)
                </li>
            </ol>

            <h5>Rendu du code d'un jalon du projet </h5>

            <p>Le leader doit s'assurer que chaque membre de l'équipe a bien restitué son travail.
                Ensuite il doit faire une demande de fusion sur le projet initial à partir du serveur gitlab de l'université.
            </p>

            <div class="alert alert-warning">
                <strong>Attention</strong> :
                Lors de la demande de fusion, le leader aura pris soin de spécifier la branche du projet de l'équipe à partir de laquelle il souhaite faire la demande de fusion et la branche destination sur le projet d'origine fourni par les enseignants.
            </div>

            <p>
                Les enseignants évalueront le travail effectué par l'équipe en parcourant le contenu de chaque demande de fusion (<code>Etape-1</code>, <code>Etape-2</code>, <code>Etape-3</code>).
            </p>

        </div>
    </div>
</section>


<section class="container">
    <h2>Rendus</h2>
    <h5>Code</h5>
    <p>Le code de l'application développé par les membres de l'équipe sera récupéré comme des demandes de fusion (voir la section
        <a href="#utilisation-serveur">Utilisation du serveur Gitlab de l'Université</a>).</p>

    <h5>Contenu</h5>

    <p>Deux devoirs sont disponibles dans le cours dept INFO DUT2 sur moodle dans la section "projet marathon" :</p>
    <ul>
        <li><a href="https://moodle.univ-artois.fr/cours/mod/assign/view.php?id=28003">rédaction,</a></li>
        <li><a href="https://moodle.univ-artois.fr/cours/mod/assign/view.php?id=28004">anglais.</a></li>
    </ul>
    <p>Vous devez y déposer vos travaux en français et en anglais. Pour chacun des travaux, vous préciserez
        le nom du groupe.
        Ils devront être rendus le <span style="font-weight: bold">17 décembre 2020 avant 20h00</span> (avant la
        fermeture).</p>
    <h4> <a href="https://moodle.univ-artois.fr/cours/mod/assign/view.php?id=28003">Rédaction en français :</a></h4>
    <ul>
        <li><span style="font-weight: bold">1- le choix du design</span>
            <ul>
                <li>Vous rédigerez un document (1 à 2 pages) qui reprend les éléments suivants :
                    <ul>
                        <li>choix de l'univers ou du public choisi et expliquez pourquoi ce choix</li>
                        <li>le logo</li>
                        <li>le nuancier</li>
                        <li>les polices de caractères</li>
                        <li>les choix de boutons</li>
                        <li>choix pour la charte graphique : Quelle solution choisie ?
                            <ul>
                                <p>Si utilisation d'un template --> faites un avant - après de ce template</p>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>Vous expliquerez en quoi le design réalisé est en concordance avec le thème choisi.</li>
            </ul>
        </li>
        <li><span style="font-weight: bold">2- la rédaction d'un avis sur un jeu</span>
            <ul>
                <li>Vous rédigerez également un avis sur un jeu.</li>
                <li>Cet avis sera ajouté la fin de la rédaction du design.</li>
                <li>Le document final , avec les deux parties, doit comporter :</li>
                <li>le nom et numéro de votre équipe et les noms des différents membres</li>
                <li>--> être déposé sur Moodle le jeudi 17 décembre avant 20h (Moodle / DUT2 / projet marathon).
                </li>
                <p>NB : la notation en français compte dans la note finale.</p>
            </ul>
        </li>
    </ul>
    <h4> <a href="https://moodle.univ-artois.fr/cours/mod/assign/view.php?id=28004">Rédaction en anglais :</a></h4>
    <p>Your task will be to choose a game among your list and write the game rules in English.</p>


    <h5>How to write game instructions</h5>
    <ol>
        <li>Requirements
            <ul>
                <li>title of the game</li>
                <li>Number of players (ex:2-4 players); Playing time (ex: approximately 30 minutes); Age (ex:12+)</li>
                <li>game instructions</li>
            </ul>
        </li>
        <li>Tips:
            <ul>
                <li>Write your instructions to be read aloud</li>
                <li>Use the second person or "the player" </li>
                <li>Use short, declarative sentences</li>
                <li>Make sure the game terms are easy to find and understand</li>
            </ul>
        </li>
        <li>The different sections:
            <ol>
                <li>object of the game: explain the concept or goal of the game</li>
                <li>contents: list and explain all the objects in the game (number of cards, easels…) (sometimes
                    pictures help if there are lots of different bits)
                </li>
                <li>set up (ex: shuffle each deck separately, deal each player five cards…)</li>

                <li>how to play: describe an overview of how the game works
                    for example: the game is played in a series of rounds. During each round, players can do x, y or z;
                </li>
                <li>things to keep in mind during the game
                    <ul>
                        <li>start of a turn or a round (in games with rounds, you may wish to describe tasks that are
                            necessary at the start of each round)
                        </li>
                        <li>if players have some choice of actions, set out what those actions mean. Give each action
                            its own paragraph.
                        </li>
                        <li>end of a turn or round (what happens at the end of a turn or round?)</li>
                    </ul>
                <li>Exceptions (“weird “scenarios…)</li>
                <li>Scoring and endgame: describe the end of game conditions (ex: when the deck is empty)</li>
                <li>winning the game (describe how to win a game)</li>
                <li>include any extras or possible game variants at the end</li>
            </ol>
        </li>
        <li>Mark
            <ul>
                <li>Content: /8 Read over your game instructions to make sure they are clear, easy to understand and
                    that you have not forgotten any step.
                </li>
                <li>Language: /12 Even though you will write short and declarative sentences, make sure they are written
                    in good English, using the appropriate vocabulary
                </li>
                <li>Create your “own” rules, do not give back already-made rules found on the Net.</li>
            </ul>
        </li>
    </ol>
    <h4>Good Luck!</h4>


</section>

<section class="container">

    <h2>Soutenance</h2>

    <p>C'est vendredi que cela se passe. Elle sera d’une durée de 20 minutes de présentation en équipe + 10
        minutes de questions.  :</p>
    <ul>
        <li>Présentation 20 minutes.</li>
        <li>Questions du jury (10 minutes)</li>
    </ul>

    <p>Tous les membres du groupe seront présents. </p>

    <p>La soutenance doit comporter à titre indicatif (ordre des éléments est à votre convenance)</p>
    <ul>
        <li>Le design choisi, vos choix, les justifications... A vous de choisir comment vous l’illustrez.
        </li>
        <li>Le développement (présentez un peu de code !)</li>
        <li>Les diverses fonctionnalités implantées, les fonctionnalités de la version 2.0. On est à la
            version 0.2 en
            ce moment ;-)
        </li>
        <li>Bilan : Il faudra terminer par un bilan général</li>
    </ul>
    A éviter :
    <ul>
        <li>C&#39;est possible de montrer une partie de code, mais pas tout le code</li>
        <li>Idem, la démonstration n&#39;est ni interdite, ni obligatoire.
            Ce qui est sûr, c&#39;est que si vous faites une démo,
            elle doit durer peu de temps et aller à l&#39;essentiel.
        </li>
    </ul>
</section>

<section class="container">
    <div class="center alert alert-success">
        <b>BON COURAGE !!!!</b>
    </div>
</section>


<script>

    function opena(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;
        evt.preventDefault();
        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    document.getElementById("defaultOpen").click();

</script>

</body>
</html>
