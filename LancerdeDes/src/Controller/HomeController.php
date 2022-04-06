<?php
namespace App\Controller;

use App\Entity\Joueur;
use App\Entity\Inscription;
use App\Form\InscriptionType;
use App\Repository\JoueurRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    /**
     * @var Environment
    */
    private $twig;

    public function __construct($twig, private JoueurRepository $joueurRepo, private ManagerRegistry $doctrine,
    private RequestStack $requestStack){
        $this->twig = $twig;
    }

    /** 
     * @return Response
    */
    public function index(Request $request): Response
    {
        $inscription = new Inscription();
        $form = $this->createForm(InscriptionType::class, $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pseudoJoueur1 = $inscription->getPseudoPremierJoueur();
            $pseudoJoueur2 = $inscription->getPseudoDeuxiemeJoueur();

            //Ajout du premier joueur dans la base de donnees
            $joueur1 = new Joueur();
            $joueur1 ->setPseudo($pseudoJoueur1);
            $em = $this->doctrine->getManager();
            $em->persist($joueur1);
            $em->flush();

            //Ajout du deuxieme joueur dans la base de donnees
            $joueur2 = new Joueur();
            $joueur2 ->setPseudo($pseudoJoueur2);
             $em = $this->doctrine->getManager();
            $em->persist($joueur2);
            $em->flush();

            //Creation de la session pour gerer la partie
            $session = $this->requestStack->getSession();
            $partie = $session->get('partie', []);
            
            $score = 0;
            $nombreLancer= 0;
            $partie['joueur1'] = ["pseudo"=> $pseudoJoueur1,"nombreLancer" => $nombreLancer, "score"=> $score];
            $partie['joueur2'] = ["pseudo"=> $pseudoJoueur2,"nombreLancer" => $nombreLancer, "score"=> $score];
            $partie['vainqueur'] = "none";
            $partie['perdant'] = "none";

            $session->set('partie', $partie);
            return $this->redirectToRoute('game');
        }

        return new Response($this->render('pages/home.html.twig', [
            'form'=> $form->createView()
        ]));
    }

    /** 
     * @return Response
    */
    public function createView(Request $request): Response
    {
        $inscription = new Inscription();
        $form = $this->createForm(InscriptionType::class, $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pseudoJoueur1 = $inscription->getPseudoPremierJoueur();
            $pseudoJoueur2 = $inscription->getPseudoDeuxiemeJoueur();

            //Ajout du premier joueur dans la base de donnees
            $joueur1 = new Joueur();
            $joueur1 ->setPseudo($pseudoJoueur1);
            $em = $this->doctrine->getManager();
            $em->persist($joueur1);
            $em->flush();

            //Ajout du deuxieme joueur dans la base de donnees
            $joueur2 = new Joueur();
            $joueur2 ->setPseudo($pseudoJoueur2);
             $em = $this->doctrine->getManager();
            $em->persist($joueur2);
            $em->flush();

            //Creation de la session pour gerer la partie
            $session = $this->requestStack->getSession();
            $partie = $session->get('partie', []);
            
            $score = 0;
            $nombreLancer= 0;
            $partie['joueur1'] = ["pseudo"=> $pseudoJoueur1,"nombreLancer" => $nombreLancer, "score"=> $score];
            $partie['joueur2'] = ["pseudo"=> $pseudoJoueur2,"nombreLancer" => $nombreLancer, "score"=> $score];
            $partie['vainqueur'] = "none";
            $partie['perdant'] = "none";

            $session->set('partie', $partie);
            return $this->redirectToRoute('game');
        }
        return new Response($this->render('pages/vue.html.twig', [
            'form'=> $form->createView()
        ]));
    } 

}

