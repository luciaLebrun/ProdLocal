<?php

namespace App\DataFixtures;

use App\Entity\Shop;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Les fixtures de la table Shop sont créées dans cette classe.
 * @package App\DataFixtures
 */
class ShopFixtures extends Fixture
{
    /**
     * Méthode qui créé des instances de la classe Shop. On charge un jeu de donnée.
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $shop = new Shop();
        $description = "Sur ses 35 hectares de marais au cœur du Fier d’Ars sur la commune de Saint-Clément des Baleines, La Ferme des Baleines est une ferme marine ostréicole pratiquant la polyculture en bassin aquacole." . "<br/><br/>"
            . "Dans ses claires - bassins d’argile hérités des marais salants - la ferme aquacole produit et affine des huîtres de claire, élève des crevettes impériales, des palourdes et des daurades. Les bassins utilisés pour ces productions animales sont en conversion biologique." . "<br/><br/>"
            . "La ferme produit et récolte aussi des végétaux des marais : le maceron, la salicorne, la laitue de mer, l'aster maritime, l'obione, l'aster maritime, la soude maritime, la ficoïde, la mertensia, la lavande de mer, la moutarde noire et les fleurs de moutarde. Toutes ces productions végétales sont certifiées AB Agriculture Biologique et vendues sous la marque de La Ferme des Baleines ou bien de la marque Terre Saline." . "<br/><br/>"
            . "Nos produits sont disponibles en ligne ou en vente directe à La Ferme des Baleines, alors n'hésitez pas à faire venir les saveurs du merroir de l'île de Ré chez vous : huîtres et produits du marais à domicile !" . "<br/><br/>"
            . "Si vous avez des questions, appelez-nous !";
        $shop->setAddress("13 rue Boieldieu, 17000 La Rochelle")
            ->setName("La Ferme Des Baleines")
            ->setTelephone("0516077558")
            ->setLatitude(46.162333)
            ->setLongitude(-1.130729)
            ->setDescription($description)
            ->setImage("shop1.png");

        $manager->persist($shop);
        $this->addReference("shop1", $shop);

        $shop = new Shop();
        $description = "En plein centre ville, visitez une des meilleures caves de La Rochelle ;  elle est située dans l'hypercentre face au marché central (stationnement proche parking Place de Verdun et/ou de Notre Dame)." . "<br/><br/>"
            . "Sommelier diplômé, Jérémy Duchemin a poursuivi sa formation dans des établissements les plus prestigieux de la région Nouvelle Aquitaine." . "<br/><br/>"
            . "Dans un magasin d'une conception originale, il se propose de vous faire découvrir des vins authentiques rouge, blanc et rosé, des champagnes, des eaux de vie, Cognac, Armagnac, de grands Vins de Porto." . "<br/><br/>"
            . "Conseils, sourire, dégustation  tout est là pour vous permettre de trouver l’accord parfait !";
        $shop->setAddress("10 rue Gaston Périer, 17000 La Rochelle")
            ->setName("Aux Tours des Vins")
            ->setTelephone("0549356587")
            ->setLatitude(46.165108)
            ->setLongitude(-1.141557)
            ->setDescription($description)
            ->setImage("shop2.png");

        $manager->persist($shop);
        $this->addReference("shop2", $shop);

        $shop = new Shop();
        $description = "L'histoire familiale commence au début du siècle dernier, notre arrière grand-père Alexis-auguste possède des ruches mais pour une diffusion de sa production dans un cercle restreint. Son fils et son petit fils Louis passionné d'apiculture perpétue cette tradition familliale." . "<br/><br/>"
            . "Dans les années soixantes Louis augmente son cheptel de ruches, et en 1975 s'installe comme apiculteur professionnel dans le nord vienne au croisement de trois régions Poitou-Charentes, Anjou et Touraine et commence les saisons sur l'île de Ré." . "<br/><br/>"
            . "Dans les années quatres vingt dix les enfants de Louis, Aude et François-Xavier perpétuent l'activité familiale et installe la miellerie sur l'île de Ré.";
        $shop->setAddress("7 rue Clément Ader, 17000 La Rochelle")
            ->setName("O'Apiculteur")
            ->setTelephone("0543211523")
            ->setLatitude(46.146037)
            ->setLongitude(-1.146972)
            ->setDescription($description)
            ->setImage("shop3.png");

        $manager->persist($shop);
        $this->addReference("shop3", $shop);

        $shop = new Shop();
        $description="Le verger occupe 10 ha de coteaux exposé au nord sur un riche terroir argilo-calcaire. La forêt au sud du verger offre un environnement propice à l'agriculture biologique avec une faune bien établie, gibier inclus. On observe des chevreuils, sangliers, lapins, renards, blaireaux, chouettes, chauve-souris, couleuvres, pie verts et ainsi de suite. Printemps 2015 nous avons fait un petit inventaire au niveau de la flore présent dans le verger. J’espère mettre ces données sur le site cet hiver." . "<br/><br/>"
            . "Le relief garantit une eau d'irrigation au verger. Toute l’eau provient soit des bois, soit des trente hectares de cultures présentes sur l’exploitation. Les terres elles-mêmes sont bordées de bois, des haies ou un fossé et, encore une fois grâce au relief, ne reçoivent pas d’eau de ruissellement d’autres fermes." . "<br/><br/>"
            . "Au verger il y a 12 variétés de pommes, des poires, des prunes et des coings. Les terres sont dédiées aux grandes cultures dont nous envisageons la transformation dans le futur (huiles et farines ou céréales vrac tout simplement). L'intégralité de nos récoltes est certifiée sous label AB (FR BIO 10).";
        $shop->setAddress("35 rue Saint-Claude, 17000 La Rochelle")
            ->setName("Vergers De La Rochelle")
            ->setTelephone("0549812662")
            ->setLatitude(46.156866)
            ->setLongitude(-1.147401)
            ->setDescription($description)
            ->setImage("shop4.png");

        $manager->persist($shop);
        $this->addReference("shop4", $shop);

        $shop = new Shop();
        $shop->setAddress("13 rue du Lignon, 17000 la Rochelle")
            ->setName("Panier Nature")
            ->setTelephone("0549811325")
            ->setLatitude(46.173796)
            ->setLongitude(-1.155197)
            ->setImage("shop5.png");

        $manager->persist($shop);
        $this->addReference("shop5", $shop);

        $manager->flush();
    }
}
