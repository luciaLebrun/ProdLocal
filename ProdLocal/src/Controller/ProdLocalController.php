<?php

namespace App\Controller;

use App\Entity\Shop;
use App\Entity\Feedback;
use App\Form\FeedbackType;
use App\Repository\FeedbackRepository;
use App\Repository\FidelityRepository;
use App\Repository\ScheduleRepository;
use App\Repository\ShopRepository;
use App\Repository\ProductRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * Le controlleur principal de l'application
 * @package App\Controller
 */
class ProdLocalController extends AbstractController
{

    /**
     * Méthode qui renvoie les données nécessaires à l'affichage de la liste des points de vente
     * @Route("/", name="shopList")
     * @param ShopRepository $repo le repository de la table Shop
     * @return Response la vue associée et les données
     */
    public function index(ShopRepository $repo): Response
    {

        $shops = $repo->findAll();

        $categories = $repo->findCategoryOfEachShop();

        return $this->render('prod_local/shopList.html.twig', [
            'listShops' => $shops,
            'listCategories'=>$categories,
        ]);
    }


    /**
     * Méthode qui renvoie les données nécessaires à l'affichage des détails d'un point de vente spécifique
     * @Route("/shop/{id}", name="shopDetail")
     * @param FeedbackRepository $repo_feedback le repository de la table Feedback
     * @param ProductRepository $repo_product le repository de la table Product
     * @param ScheduleRepository $repo_schedule le repository de la table Schedule
     * @param Shop $shop le point de vente
     * @param FidelityRepository $repo_fidelity le repository de la table Fidelity
     * @param Security $security classe qui gère les utilisateurs
     * @return Response la vue associée et les données
     * @throws NonUniqueResultException
     */
    public function shopDetail(FeedbackRepository $repo_feedback, ProductRepository $repo_product,
                               ScheduleRepository $repo_schedule, Shop $shop,
                               FidelityRepository $repo_fidelity, Security $security): Response
    {
        $schedules = $repo_schedule->findBy(array('shop' => $shop));

        $showSchedules = array();
        $i = 0;
        foreach($schedules as $schedule){
            $hours = $schedule->getOpeningHour() . " - " .$schedule->getClosingHour();
            $days = "";

            if ($schedule->getOpeningDay() == 1 and $schedule->getClosingDay() == 7){
                $days = "Tous les jours";
            } else {
                switch($schedule->getOpeningDay()){
                    case 1 : $days = "Lundi"; break;
                    case 2 : $days = "Mardi"; break;
                    case 3 : $days = "Mercredi"; break;
                    case 4 : $days = "Jeudi"; break;
                    case 5 : $days = "Vendredi"; break;
                    case 6 : $days = "Samedi"; break;
                    case 7 : $days = "Dimanche"; break;
                }
                if ($schedule->getOpeningDay() != $schedule->getClosingDay()){
                    switch($schedule->getClosingDay()){
                        case 1 : $days = $days . " - Lundi"; break;
                        case 2 : $days = $days . " - Mardi"; break;
                        case 3 : $days = $days . " - Mercredi"; break;
                        case 4 : $days = $days . " - Jeudi"; break;
                        case 5 : $days = $days . " - Vendredi"; break;
                        case 6 : $days = $days . " - Samedi"; break;
                        case 7 : $days = $days . " - Dimanche"; break;
                    }
                }
            }
            $showSchedules[$i] = array('openingdays'=>$days, 'openinghours'=>$hours);
            $i = $i + 1;
        }

        $avalaibleproducts = $repo_product->findAvailableProductsWithCategory($shop->getId());

        $notavailableproducts = $repo_product->findNotAvailableProductsWithCategory($shop->getId());

        $avgrate = $repo_feedback->findAVGRateOfAShop($shop->getId());

        $feedbacks = $repo_feedback->findBy(array('shop' => $shop));

        $user = $security->getUser();

        $fidelityPoints = $repo_fidelity->findOneBy(array('shop' => $shop,'user' => $user));

        return $this->render('prod_local/shopDetail.html.twig', [
            'shop' => $shop,
            'schedules'=>$showSchedules,
            'listAvailableProducts' => $avalaibleproducts,
            'listNotAvailableProducts' => $notavailableproducts,
            'feedbacks' => $feedbacks,
            'avgrate' => $avgrate['shoprate'],
            'fidelityPoints' => $fidelityPoints,
        ]);
    }

    /**
     * Méthode qui revoie les données nécessaires à l'affichage des feedbacks du point de vente spécifié
     * @Route("/shop/{id}/feedbacks", name="feedbacks")
     * @param FeedbackRepository $repo_feedback le repository de la table Feedback
     * @param Shop $shop le point de vente
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return RedirectResponse|Response la vue associée et les données
     */
    public function feedbacks(FeedbackRepository $repo_feedback, Shop $shop, Request $request,
                              EntityManagerInterface $manager)
    {
        $feedbacks = $repo_feedback->findBy(array('shop' => $shop));

        $feedback = new Feedback();
        $form = $this->createForm(FeedbackType::class, $feedback);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $feedback->setAuthor($this->getUser()->getUsername())
                    ->setDate(new DateTime())
                    ->setShop($shop);
            $manager->persist($feedback);
            $manager->flush();

            return $this->redirectToRoute('feedbacks', ['id' => $shop->getId()]);
        }

        return $this->render('prod_local/feedbacks.html.twig', [
            'shop' => $shop,
            'listFeedbacks' => $feedbacks,
            'feedbackForm' => $form->createView(),
        ]);
    }
}
