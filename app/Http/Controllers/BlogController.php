<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    private array $articles = [
        'article-1' => [
            'id' => 'article-1',
            'title' => 'Comment devenir électricien professionnel : Guide complet 2025',
            'description' => 'Guide complet pour devenir électricien au Togo. Découvrez les étapes, formations requises, salaires et débouchés professionnels.',
            'category' => 'Carrière',
            'author' => 'Équipe CREFER',
            'date' => '13 décembre 2025',
            'readTime' => 12,
            'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=1200&h=600&fit=crop',
            'introduction' => "La profession d'électricien offre des opportunités carrière exceptionnelles au Togo et en Afrique de l'Ouest. Avec la croissance des énergies renouvelables, la demande pour les électriciens qualifiés explose. Découvrez comment accéder à ce métier rémunérateur et en demande.",
            'keyPoints' => [
                'Le CAP Électricité est la qualification minimale pour travailler comme électricien',
                'Le BT Électrotechnique ouvre des postes de technicien supérieur',
                'Les énergies renouvelables créent des milliers de nouveaux postes chaque année',
                'CREFER propose des formations pratiques avec stages en entreprise',
                'Une carrière dans l\'électricité offre des débouchés locaux et internationaux',
            ],
            'content' => '<h2 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Pourquoi devenir électricien en 2025 ?</h2>
<p class="mb-4">Le secteur électrique connaît une révolution grâce aux énergies renouvelables. Les panneaux solaires, les installations électriques modernes et la maintenance des réseaux créent des milliers de postes chaque année.</p>
<ul class="list-disc pl-6 mb-6 space-y-2">
  <li>Salaire compétitif et progression rapide</li>
  <li>Forte demande (pénurie de personnel qualifié)</li>
  <li>Flexibilité : indépendant ou salarié</li>
  <li>Travail varié et enrichissant</li>
  <li>Débouchés internationaux</li>
</ul>
<h2 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Les étapes pour devenir électricien</h2>
<h3 class="text-xl font-semibold text-gray-700 mt-6 mb-3">1. Éducation de base</h3>
<p class="mb-4">Avoir le BEPC ou équivalent est essentiel. C\'est le fondement pour accéder à une formation professionnelle.</p>
<h3 class="text-xl font-semibold text-gray-700 mt-6 mb-3">2. Formation professionnelle (CAP)</h3>
<p class="mb-4">Le Certificat d\'Aptitude Professionnelle (CAP) en électricité dure 2-3 ans. À CREFER, nous offrons une formation théorique solide, une pratique intensive sur matériel réel, des stages en entreprise et une certification reconnue par l\'État.</p>
<h3 class="text-xl font-semibold text-gray-700 mt-6 mb-3">3. Spécialisation (BT Électrotechnique)</h3>
<p class="mb-4">Pour aller plus loin, le BT Électrotechnique vous ouvre les portes des postes de technicien supérieur, chef de chantier et responsable de maintenance.</p>
<h2 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Salaires et perspectives</h2>
<p class="mb-4">Un électricien débutant au Togo gagne entre 80 000 et 150 000 FCFA par mois. Avec de l\'expérience, ce salaire peut atteindre 300 000 à 500 000 FCFA, voire plus pour les travailleurs indépendants bien établis.</p>',
            'relatedArticles' => [
                ['id' => 'article-3', 'title' => 'CAP vs BT Électrotechnique : Comparaison Complète 2025', 'description' => 'Comparaison détaillée entre le CAP et le BT électrotechnique.'],
                ['id' => 'article-6', 'title' => 'Comment Financer Votre Formation Électricité à CREFER', 'description' => '5 options pour financer votre formation CAP ou BT.'],
            ],
        ],
        'article-2' => [
            'id' => 'article-2',
            'title' => 'Formation Solaire Modulaire : Maîtrisez les Énergies Renouvelables',
            'description' => 'Explorez la formation solaire modulaire flexible. Apprenez à votre rythme et obtenez une certification en énergies renouvelables.',
            'category' => 'Énergie Solaire',
            'author' => 'Équipe CREFER',
            'date' => '14 décembre 2025',
            'readTime' => 10,
            'image' => 'https://images.unsplash.com/photo-1509391366360-2e959099692d?w=1200&h=600&fit=crop',
            'introduction' => "L'énergie solaire est l'avenir de l'Afrique. Notre formation modulaire vous permet d'acquérir des compétences pratiques en installation et maintenance de systèmes photovoltaïques, à votre propre rythme.",
            'keyPoints' => [
                'Formation flexible adaptée aux professionnels en activité',
                'Certification reconnue en installation solaire photovoltaïque',
                'Marché de l\'énergie solaire en forte croissance en Afrique',
                'Débouchés : installateur, technicien, entrepreneur indépendant',
                'Modules progressifs du niveau débutant à expert',
            ],
            'content' => '<h2 class="text-2xl font-bold text-gray-800 mt-8 mb-4">L\'énergie solaire au cœur du développement africain</h2>
<p class="mb-4">L\'Afrique subsaharienne dispose du plus fort potentiel solaire au monde. Avec des millions de foyers encore sans électricité, les opportunités pour les techniciens solaires sont immenses.</p>
<h2 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Notre programme modulaire</h2>
<p class="mb-4">La formation modulaire de CREFER est composée de 4 modules progressifs que vous pouvez suivre selon votre disponibilité :</p>
<ul class="list-disc pl-6 mb-6 space-y-2">
  <li><strong>Module 1</strong> : Bases de l\'électricité et du solaire</li>
  <li><strong>Module 2</strong> : Installation de systèmes photovoltaïques</li>
  <li><strong>Module 3</strong> : Maintenance et dépannage</li>
  <li><strong>Module 4</strong> : Gestion de projet et entrepreneuriat</li>
</ul>',
            'relatedArticles' => [
                ['id' => 'article-5', 'title' => 'Guide Complet : Installation Panneaux Solaires Résidentiel', 'description' => 'Guide étape-par-étape pour installer des panneaux solaires.'],
                ['id' => 'article-7', 'title' => 'Énergies Renouvelables en Afrique : Tendances et Carrières 2025-2030', 'description' => 'Analyse du marché des énergies renouvelables en Afrique.'],
            ],
        ],
    ];

    public function index()
    {
        return view('pages.blog');
    }

    public function show(string $id)
    {
        $article = $this->articles[$id] ?? null;
        if (!$article) {
            abort(404);
        }
        return view('pages.blog-article', compact('article'));
    }
}
