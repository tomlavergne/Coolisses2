<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use App\Entity\AffichageGeneral;
use App\Entity\Alerte;
use App\Entity\ArticleLocation;
use App\Entity\Atelier;
use App\Entity\BruitDeCoolisses;
use App\Entity\CategorieActualite;
use App\Entity\CategorieFilm;
use App\Entity\Contact;
use App\Entity\Formation;
use App\Entity\Langue;
use App\Entity\Metier;
use App\Entity\Partenaire;
use App\Entity\Profil;
use App\Entity\QuestionFAQ;
use App\Entity\Realisation;
use App\Entity\Stage;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Coolisses2');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl("Retour à l'accueil", 'fa fa-home', "/");
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-toolbox');

        yield MenuItem::section("Page d'accueil");
        yield MenuItem::linkToCrud("Affichage général", 'fas fa-bell', AffichageGeneral::class);
        yield MenuItem::linkToCrud("Message d'alerte", 'fas fa-bell', Alerte::class);
        yield MenuItem::linkToCrud('Actualités', 'fas fa-newspaper', Actualite::class);
        yield MenuItem::linkToCrud('Partenaires', 'fas fa-handshake-simple', Partenaire::class);
        yield MenuItem::linkToCrud('Questions FAQ', 'fas fa-question', QuestionFAQ::class);

        yield MenuItem::section("Services");
        yield MenuItem::linkToCrud('Articles de location', 'fas fa-camera', ArticleLocation::class);
        yield MenuItem::linkToCrud('Bruits de Coolisses', 'fas fa-book', BruitDeCoolisses::class);

        yield MenuItem::section("Programmation");
        yield MenuItem::linkToCrud("Formation", 'fas fa-calendar-days', Formation::class);
        yield MenuItem::linkToCrud("Stage", 'fas fa-calendar-days', Stage::class);
        yield MenuItem::linkToCrud("Atelier", 'fas fa-calendar-days', Atelier::class);


        yield MenuItem::section("Autres pages");

        yield MenuItem::linkToCrud('Realisations', 'fas fa-film', Realisation::class);

        yield MenuItem::section("Utilitaires");
        yield MenuItem::linkToCrud('Contact', 'fas fa-envelope', Contact::class);

        yield MenuItem::section("Gestion utilisateur");
        yield MenuItem::linkToCrud('Profils', 'fas fa-user', Profil::class);

        yield MenuItem::section("Relations Base de donnée");
        yield MenuItem::linkToCrud("Categorie d'articles", 'fas fa-icons', CategorieActualite::class);
        yield MenuItem::linkToCrud('Categorie de film', 'fas fa-icons', CategorieFilm::class);
        yield MenuItem::linkToCrud('Metier', 'fas fa-briefcase', Metier::class);
        yield MenuItem::linkToCrud('Langue', 'fas fa-flag', Langue::class);

    }
}
