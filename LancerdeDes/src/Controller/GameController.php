<?php
namespace App\Controller;

// use Symfony\Component\HttpFoundation\Request;

use App\Entity\Classement;
use App\Entity\Partie;
use App\Entity\RelancePartie;
use App\Form\RelancePartieType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GameController extends AbstractController{

    /** 
     * @var Environment
    */
    private $twig;

    public function __construct($twig, private RequestStack $requestStack, private ManagerRegistry $doctrine){
        $this->twig = $twig;
    }

    /**
     * @return Response 
     */
    public function index( Request $request ): Response
    {
        $session = $this->requestStack->getSession();
        $partie = $session->get('partie');
        
        //Formulaire de fin de la partie et relance
        $relance = new RelancePartie();
        $form = $this->createForm(RelancePartieType::class, $relance);
        
        return new Response($this->twig->render('pages/game.html.twig', [
            'partie' => $partie,
            'form' => $form->createView(),
            'resultatLancer' => [0,0],
            'tour' => $partie['joueur1']['pseudo']
        ]));
    }

    /**
     * Gestion du lancer du premier joueur
     * @return Response 
     */
    public function lancerJoueur1(Request $request): Response
    {
        //Formulaire de fin de la partie et relance
        $relance = new RelancePartie();
        $form = $this->createForm(RelancePartieType::class, $relance);
        $form->handleRequest($request);
        
        //Recuperation des informations sur la partie
        $session = $this->requestStack->getSession();
        $partie = $session->get('partie');
        $pseudoAdversaire = $partie['joueur2']['pseudo'];
        $pseudoJoueur =  $partie['joueur1']['pseudo'];

        if ($form->isSubmitted()){
            //Formulaire de fin de la partie et relance
            if ($form->isSubmitted() && $form->isValid()) {
                $oui = $relance->getNouvellePartie();
                if ($oui) { // Sauvegarde de la partie et relance d'une autre partie
                    $this->saveGame($partie);
                    $nombreLancer = 0;
                    $score = 0;
                    $pseudoAdversaire = $partie['joueur2']['pseudo'];
                    $partie['joueur1'] = ["pseudo"=> $pseudoJoueur,"nombreLancer" => $nombreLancer, "score"=> $score];
                    $partie['joueur2'] = ["pseudo"=> $pseudoAdversaire,"nombreLancer" => $nombreLancer, "score"=> $score];
                    $session->set('partie', $partie);
                    return $this->redirectToRoute('game');
                }else{ // Sauvegarde de la partie et redirection vers une autre page
                    $this->saveGame($partie);
                    return $this->redirectToRoute('rank');
                }
            }
        }else{
            //Recuperation des valeurs de la session
            $nombreLancer= $partie['joueur1']['nombreLancer'];
            $score = $partie['joueur1']['score'];
            
            //Mise a jour des valeurs
            $resultLanceDe1 = rand(1,6);
            $resultLanceDe2 = rand(1,6);
            $nombreLancer++;
            $score+= $resultLanceDe1 + $resultLanceDe2;

            $partie['joueur1'] = ["pseudo"=> $pseudoJoueur,"nombreLancer" => $nombreLancer, "score"=> $score];
            
            if ($score > 9 ) {
                $partie['vainqueur'] = $pseudoAdversaire;
                $partie['perdant'] = $pseudoJoueur;
            }
            $session->set('partie', $partie);

            return new Response($this->twig->render('pages/game.html.twig', [
                'partie' => $partie,
                'form' => $form->createView(),
                'resultatLancer' => [$resultLanceDe1, $resultLanceDe2],
                'tour' => $partie['joueur2']['pseudo']
            ]));
        }
    }

    /**
     * Gestion du lancer du deuxième joueur
     * @return Response 
     */
    public function lancerJoueur2(Request $request): Response
    {
        //Formulaire de fin de la partie et relance
        $relance = new RelancePartie();
        $form = $this->createForm(RelancePartieType::class, $relance);
        $form->handleRequest($request);
        
        //Recuperation des informations sur la partie
        $session = $this->requestStack->getSession();
        $partie = $session->get('partie');
        $pseudoAdversaire = $partie['joueur1']['pseudo'];
        $pseudoJoueur =  $partie['joueur2']['pseudo'];
        
        if ($form->isSubmitted()){
        
            if ($form->isSubmitted() && $form->isValid()) {
                $oui = $relance->getNouvellePartie();
                if ($oui) { // Sauvegarde de la partie et relance d'une autre partie
                    $this->saveGame($partie);
                    $nombreLancer = 0;
                    $score = 0;
                    $partie['joueur2'] = ["pseudo"=> $pseudoJoueur,"nombreLancer" => $nombreLancer, "score"=> $score];
                    $partie['joueur1'] = ["pseudo"=> $pseudoAdversaire,"nombreLancer" => $nombreLancer, "score"=> $score];
                    $session->set('partie', $partie);
                    return $this->redirectToRoute('game');
                }else{ // Sauvegarde de la partie et redirection vers une autre page
                    $this->saveGame($partie);
                    return $this->redirectToRoute('rank');
                }
            }
        }else{
            //Recuperation des valeurs de la session
            $nombreLancer= $partie['joueur2']['nombreLancer'];
            $score = $partie['joueur2']['score'];
            
            //Mise a jour des valeurs
            $resultLanceDe1 = rand(1,6);
            $resultLanceDe2 = rand(1,6);
            $nombreLancer++;
            $score+= $resultLanceDe1 + $resultLanceDe2;

            $partie['joueur2'] = ["pseudo"=> $pseudoJoueur,"nombreLancer" => $nombreLancer, "score"=> $score];
            if ($score > 9 ) {
                $partie['vainqueur'] = $pseudoAdversaire;
                $partie['perdant'] = $pseudoJoueur;
            }
            $session->set('partie', $partie);
            
            return new Response($this->twig->render('pages/game.html.twig', [
                'partie' => $partie,
                'form' => $form->createView(),
                'resultatLancer' => [$resultLanceDe1, $resultLanceDe2],
                'tour' => $partie['joueur1']['pseudo']
            ]));
        }
    }

    //Sauvegarder les données de la partie
    public function saveGame($partie){
        // Resultat de la partie pour le premier joueur
        $joueur1 = $partie['joueur1']['pseudo'];
        $nombreLancerJ1 = $partie['joueur1']['nombreLancer'];
        $scoreJ1 = $partie['joueur1']['score'];

        // Resultat de la partie pour le deuxieme joueur
        $joueur2 = $partie['joueur2']['pseudo'];
        $nombreLancerJ2 = $partie['joueur2']['nombreLancer'];
        $scoreJ2 = $partie['joueur2']['score'];

        $vainqueur = $partie['vainqueur'];

        $partie_db = new Partie();
        $partie_db->setJoueur1($joueur1);
        $partie_db->setJoueur2($joueur2);
        $partie_db->setNombreLancerJoueur1($nombreLancerJ1);
        $partie_db->setNombreLancerJoueur2($nombreLancerJ2);
        $partie_db->setScoreJoueur1( $scoreJ1);
        $partie_db->setScoreJoueur2( $scoreJ2);
        $partie_db->setVainqueur($vainqueur);
        $em = $this->doctrine->getManager();
        $em->persist($partie_db);
        $em->flush();
    }
}