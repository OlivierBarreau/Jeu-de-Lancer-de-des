<?php
namespace App\Controller;

use App\Entity\Partie;
use App\Entity\Classement;
use App\Repository\JoueurRepository;
use App\Repository\PartieRepository;
use App\Repository\ClassementRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

class RankingController{

    /** 
     * @var Environment
    */
    private $twig;

    public function __construct($twig, private ManagerRegistry $doctrine, private ClassementRepository $ranKingRepo,
    private PartieRepository $partieRepo, private JoueurRepository $joueurRepo){
        $this->twig = $twig;
    }

    /**
     * @return Response 
     */
    public function index(): Response
    {
        //Tous les joueurs
        $joueurs = $this->joueurRepo->getPlayer();

        //Toutes les parties
        $parties = $this->partieRepo->getPartie();

        $gains = array();

        foreach( $joueurs as $joueur){
            $nombrePartieGagne = 0;
            $pseudo =  $joueur->pseudo;
            foreach($parties as $partie){
                $vainqueur = $partie->vainqueur;
                if ($vainqueur == $pseudo) {
                    $nombrePartieGagne++;
                }
            }
            array_push($gains, ['pseudo' => $pseudo, 'gain' => $nombrePartieGagne]);
        }
        
        //Trier la liste
        usort ( $gains , function ($a, $b) {
            return $a['gain'] < $b['gain'];
        } );

        //Enregistrement des données dans la table classement de la base de données
        
        for ($i=0; $i < sizeof($gains); $i++) { 
            $classement = new Classement();
            $classement->setRang($i+1);
            $classement->setPseudo($gains[$i]['pseudo']);
            $classement->setNombreMatchGagne($gains[$i]['gain']);
            $em = $this->doctrine->getManager();
            $em->persist($classement);
            $em->flush();
        }
        
        //Récuperation de données de la table classement
        $bestPlayer = $this->ranKingRepo->findLatest();
        return new Response($this->twig->render('pages/ranking.html.twig', [
            'bestPlayer' => $bestPlayer
        ]));
    }

    function myFunctionToCallback($a, $b) {
        return $a['age'] < $b['age'];
    }
}