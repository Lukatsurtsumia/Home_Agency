<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\portfolio;
class MainController extends Controller
{
   
        public function index()
    {
        $portfolios = portfolio::with('images')->get();
        
    $slides = [
        [
            'image' => 'https://images.pexels.com/photos/5179534/pexels-photo-5179534.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=1800&h=1200',
            'label' => 'უძრავი ქონების სააგენტო · საქართველო',
'title' => ' სრულყოფილი სარემონტო მომსახურება საქართველოში.',
'text'  => 'ჩვენი გუნდი კლიენტებს ეხმარება უძრავი ქონების შეძენასა და გაყიდვაში თბილისის, ბათუმისა და საქართველოს სხვა მოთხოვნად უბნებში. დამატებით, ვთავაზობთ სრული რემონტის მომსახურებას „გასაღების ჩაბარების“ პრინციპით — პროექტირების, დიზაინის, მასალების, სამშენებლო და მოსაპირკეთებელი სამუშაოების სრული კოორდინაციით.',
'meta1' => 'თბილისი ~ საქართველო',
'meta2' => 'გაყიდული ბინები · რემონტი გასაღების ჩაბარებით', 
],
        [
            'image' => 'https://images.pexels.com/photos/19889118/pexels-photo-19889118.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=1800&h=1200',

    'label' => 'ინტერიერი და რემონტი · თბილისი',

    'title' => 'უძრავი ქონება და სრულყოფილი რემონტი ერთი პროფესიონალური გუნდისგან.',

    'text'  => 'ვქმნით კომფორტულ და ღირებულ საცხოვრებელ სივრცეებს თბილისის საუკეთესო ლოკაციებზე. ბინის შერჩევიდან ინტერიერის დასრულებამდე, თითოეული პროექტი სრულდება ხარისხზე, დეტალებზე და კლიენტის საჭიროებებზე ორიენტირებული მიდგომით.',

    'meta1' => 'თბილისი · პრესტიჟული ლოკაციები',

    'meta2' => 'დიზაინი · რემონტი · სრული უზრუნველყოფა',
    ],
        [
            'image' => 'https://images.pexels.com/photos/33054912/pexels-photo-33054912.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=1800&h=1200',

    'label' => 'თანამედროვე რემონტი · თბილისი',

    'title' => 'ბინები, რომლებიც სრულად მზად არის საცხოვრებლად ან საინვესტიციოდ.',

    'text'  => 'ვთავაზობთ სრულ მომსახურებას ერთ სივრცეში — ბინის შერჩევას, შეძენასა და მაღალი ხარისხის რემონტს. ჩვენი გუნდი მართავს თითოეულ ეტაპს, პროექტირებიდან და მასალების შერჩევიდან სრულად დასრულებულ, საცხოვრებლად მზად სივრცემდე.',

    'meta1' => 'თბილისი · საბურთალო · ვაკე · დიდი დიღომი',

    'meta2' => 'სრული რემონტი · გასაღების ჩაბარებით',
],
    ];
     $soldApartments = $portfolios
    ->whereNotNull('lat')
    ->whereNotNull('lng')
    ->map(function ($portfolio) {
        return [
            'id' => $portfolio->id,
            'title' => $portfolio->title,
            'address' => $portfolio->address,
            'lat' => (float) $portfolio->lat,
            'lng' => (float) $portfolio->lng,
        ];
    })
    ->values();

  $features = [
    'ლამინატი 10 მმ',
    'პლინტუსი 7 მმ',
    'კარი',
    'შპალერი',
    'კაფელ-მეტლახი',
    'რადიატორი',
    'განათებები',
    'უნიტაზი',
    'აბაზანის აქსესუარები',
    'ჩამრთველები',
];
$services = [
            [
                'name' => 'საბაზო',
                'image' => 'https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg',
                'badge' => 'სტანდარტი',
                'description' => 'მინიმალური მაგრამ სუფთა რემონტი საცხოვრებლად.',
                'badge_class' => 'bg-green-400/90',
                'button_class' => 'bg-green-400 hover:bg-green-500',
                'priceM²' => 540,
                'features' => [
                    ['name' => 'ლამინატი 10 მმ', 'price' => 32],
                    ['name' => 'პლინტუსი 7 მმ', 'price' => 7],
                    ['name' => 'შპალერი', 'price' => 80],
                    ['name' => 'კაფელ-მეტლახი', 'price' => 40],
                    ['name' => 'კარი', 'price' => 400],
                    ['name' => 'რადიატორი', 'price' => 25],
                    ['name' => 'განათებები', 'price' => 800],
                    ['name' => 'უნიტაზი', 'price' => 300],
                    ['name' => 'აბაზანის აქსესუარები', 'price' => 800],
                    ['name' => 'ჩამრთველები', 'price' => 300],
                ],
            ],
            [
                'name' => 'კომფორტ',
                'image' => 'https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg',
                'badge' => 'კომფორტი',
                'description' => 'დაბალანსებული მასალები და კომფორტული რემონტი.',
                'badge_class' => 'bg-sky-500',
                'button_class' => 'bg-sky-500 hover:bg-sky-600',
                'priceM²' => 850,
                'features' => [
                    ['name' => 'ლამინატი 10 მმ', 'price' => 42],
                    ['name' => 'პლინტუსი 7 მმ', 'price' => 17],
                    ['name' => 'შპალერი', 'price' => 120],
                    ['name' => 'კაფელ-მეტლახი', 'price' => 60],
                    ['name' => 'კარი', 'price' => 600],
                    ['name' => 'რადიატორი', 'price' => 42],
                    ['name' => 'განათებები', 'price' => 1200],
                    ['name' => 'უნიტაზი', 'price' => 800],
                    ['name' => 'აბაზანის აქსესუარები', 'price' => 1400],
                    ['name' => 'ჩამრთველები', 'price' => 500],
                ],
            ],
            [
                'name' => 'პრემიუმ',
                'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c',
                'badge' => 'პრემიუმი',
                'description' => 'უმაღლესი ხარისხის ინტერიერი და სრული დიზაინი.',
                'badge_class' => 'bg-amber-400',
                'button_class' => 'bg-amber-400 hover:bg-amber-500',
                'priceM²' => 'პერსონალური',
                'features' => [
                    ['name' => 'ლამინატი 10 მმ', 'price' => 'პერსონალური'],
                    ['name' => 'პლინტუსი 7 მმ', 'price' => 'პერსონალური'],
                    ['name' => 'შპალერი', 'price' => 'პერსონალური'],
                    ['name' => 'კაფელ-მეტლახი', 'price' => 'პერსონალური'],
                    ['name' => 'კარი', 'price' => 'პერსონალური'],
                    ['name' => 'რადიატორი', 'price' => 'პერსონალური'],
                    ['name' => 'განათებები', 'price' => 'პერსონალური'],
                    ['name' => 'უნიტაზი', 'price' => 'პერსონალური'],
                    ['name' => 'აბაზანის აქსესუარები', 'price' => 'პერსონალური'],
                    ['name' => 'ჩამრთველები', 'price' => 'პერსონალური'],
                ],
            ],
        ];
 

    return view('page.index', compact('slides', 'soldApartments','services','features', 'portfolios'));
    }


    
 
}

