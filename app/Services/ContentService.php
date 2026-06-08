<?php

namespace App\Services;

use App\Models\Page;
use Illuminate\Support\Facades\Cache;

class ContentService
{
    private static array $defaults = [
        'global' => [
            'infobar' => [
                'item1Label' => 'ANNÉE', 'item1Value' => '2025-2026',
                'item2Label' => 'CAP & BT', 'item2Value' => '15 SEPTEMBRE 2025',
                'item3Label' => 'MODULAIRE', 'item3Value' => '13 AVRIL 2026',
            ],
        ],
        'home' => [
            'hero' => [
                'titleMain' => 'Formez-vous aux',
                'titleHighlight' => 'Énergies Renouvelables',
                'subtitle' => 'Devenez expert en installation solaire et électrotechnique',
                'cta1' => 'Candidater maintenant',
                'cta2' => 'Nos programmes',
                'badge1' => 'Formation certifiante',
                'badge2' => 'Stage garanti',
                'badge3' => 'Emploi assuré',
                'backgroundImage' => '/images/CHANTIER.jpg',
            ],
            'stats' => [
                'formesCount' => '1500', 'emploiCount' => '850',
                'partnersCount' => '30', 'certifiesCount' => '3',
            ],
            'infobox' => [
                'title' => 'Rejoignez la prochaine promotion',
                'duration' => '12 mois', 'startDate' => 'Septembre 2025',
                'recognition' => 'Reconnu par l\'État togolais',
            ],
            'story' => [
                'title' => 'Notre Histoire',
                'quote' => 'Former pour transformer',
                'text1' => 'Depuis 2015, CREFER forme les professionnels de demain aux énergies renouvelables.',
                'text2' => 'Notre approche pratique garantit une insertion professionnelle rapide.',
                'image' => '/images/CHANTIER2.jpg',
            ],
            'programs' => [
                'p1' => ['title'=>'CAP Électricité','desc'=>'Formation de base en électricité','duration'=>'12 mois','diploma'=>'CAP','feat1'=>'Pratique intensive','feat2'=>'Stage en entreprise','feat3'=>'Certification nationale'],
                'p2' => ['title'=>'BT Électrotechnique','desc'=>'Formation avancée en électrotechnique','duration'=>'24 mois','diploma'=>'BT','feat1'=>'Théorie approfondie','feat2'=>'Projets réels','feat3'=>'Diplôme reconnu'],
                'p3' => ['title'=>'Formation Modulaire','desc'=>'Modules flexibles adaptés à vos besoins','duration'=>'Variable','diploma'=>'Attestation','feat1'=>'Planning flexible','feat2'=>'Modules ciblés','feat3'=>'Formation continue'],
            ],
            'whyus' => [
                'heading' => 'L\'excellence à votre service',
                'description' => 'CREFER vous offre une formation de qualité avec des formateurs expérimentés.',
                'feat1Title' => 'Formateurs experts', 'feat1Text' => 'Des professionnels du secteur',
                'feat2Title' => 'Équipements modernes', 'feat2Text' => 'Laboratoires équipés',
                'feat3Title' => 'Réseau professionnel', 'feat3Text' => 'Accès à notre réseau',
                'feat4Title' => 'Suivi personnalisé', 'feat4Text' => 'Accompagnement individuel',
            ],
        ],
        'about' => [
            'hero' => [
                'badge' => 'À propos de CREFER',
                'title' => 'Notre Centre d\'Excellence',
                'line1' => 'Former les ', 'line1Highlight' => 'professionnels de demain',
                'line2' => 'aux ', 'line2Highlight' => 'énergies renouvelables',
                'ctaText' => 'Découvrir nos formations',
                'backgroundImage' => '/images/theorie1.jpg',
            ],
            'histoire' => [
                'heading' => 'Notre Histoire',
                'quote' => 'Un centre né d\'une vision : rendre accessible la formation aux énergies renouvelables au Togo.',
                'text1' => 'Fondé en 2015, CREFER a formé plus de 1500 jeunes togolais.',
                'text2' => 'Notre mission est de former des techniciens compétents pour l\'Afrique.',
            ],
            'visionmission' => [
                'visionTitle' => 'Notre Vision',
                'visionText1' => 'Devenir le centre de référence en formation aux énergies renouvelables en Afrique de l\'Ouest.',
                'visionText2' => 'Contribuer au développement durable par l\'éducation et la formation professionnelle.',
                'missionTitle' => 'Notre Mission',
                'missionText' => 'Former des techniciens qualifiés, compétents et employables dans le secteur des énergies renouvelables.',
            ],
            'valeurs' => [
                'heading' => 'Nos Valeurs Fondamentales',
                'description' => 'Les principes qui guident notre action quotidienne.',
                'val1Title' => 'Excellence', 'val1Text' => 'Nous visons l\'excellence dans tout ce que nous faisons.',
                'val2Title' => 'Innovation', 'val2Text' => 'Nous intégrons les dernières technologies dans nos formations.',
                'val3Title' => 'Engagement', 'val3Text' => 'Nous nous engageons pour la réussite de chaque étudiant.',
            ],
        ],
        'contact' => [
            'hero' => [
                'title' => 'Contactez-nous',
                'subtitle' => 'Notre équipe est disponible pour répondre à toutes vos questions',
                'backgroundImage' => '/images/theorie2.jpg',
            ],
        ],
        'admissions' => [
            'hero' => [
                'badge'          => 'Admission 2025',
                'title'          => 'RENTRÉE ACADÉMIQUE 2025-2026',
                'capBtLabel'     => 'CAP & BT :',
                'capBtDate'      => '15 SEPTEMBRE 2025',
                'modulaireLabel' => 'MODULAIRE :',
                'modulaireDate'  => '13 AVRIL 2026',
                'ctaText'        => 'Nous contacter',
                'backgroundImage'=> '/images/_DSC4826.jpg',
            ],
            'fiches' => [
                'heading'  => "Fiches d'Inscription & Documentation",
                'infoText' => "La fiche d'inscription peut être imprimée, remplie et déposée au secrétariat de CREFER.",
            ],
            'conditions' => [
                'heading'        => "Conditions d'Admission",
                'capBtTitle'     => 'CAP & BT',
                'cap1'           => "Être titulaire d'un diplôme BAC ou équivalent",
                'cap2'           => 'Avoir une excellente motivation',
                'cap3'           => 'Bonnes connaissances scientifiques',
                'cap4'           => "Entretien d'admission requis",
                'cap5'           => 'Frais de scolarité applicables',
                'modulaireTitle' => 'Formation Modulaire',
                'mod1'           => 'Modules à la carte',
                'mod2'           => 'Flexible et adaptatif',
                'mod3'           => 'Pour professionnels en activité',
                'mod4'           => 'Certifications partielles possibles',
                'mod5'           => 'Tarifs réduits',
            ],
            'cta' => [
                'heading'     => 'PRÊT À NOUS REJOINDRE ?',
                'description' => "Faites un pas de plus vers votre carrière dans l'énergie solaire et l'électricité !",
                'buttonText'  => 'Nous contacter',
                'image'       => '/images/distinction1-1200.jpg',
            ],
        ],
    ];

    public static function defaults(string $pageKey): array
    {
        return self::$defaults[$pageKey] ?? [];
    }

    public function getPage(string $pageKey): array
    {
        $defaults = self::$defaults[$pageKey] ?? [];

        $page = Page::with('sections')->where('page_key', $pageKey)->first();

        if (!$page) return $defaults;

        $result = $defaults;
        foreach ($page->sections as $section) {
            if (isset($result[$section->section_key]) && is_array($section->content)) {
                $result[$section->section_key] = array_merge(
                    $result[$section->section_key] ?? [],
                    $section->content
                );
            } elseif (is_array($section->content)) {
                $result[$section->section_key] = $section->content;
            }
        }

        return $result;
    }

    public function get(string $pageKey, string $sectionKey, array $extra = []): array
    {
        $page = $this->getPage($pageKey);
        $section = $page[$sectionKey] ?? ($extra ?: []);
        return array_merge($extra, is_array($section) ? $section : []);
    }
}
