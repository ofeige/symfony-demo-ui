<?php

namespace App\DataFixtures;


use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ItemFixtures extends Fixture
{
    private $name = ['Gartenbewässerung',
        'Zubehör für Digitalkameras',
        'Gläser',
        'Gartenwerkzeug',
        'Wassersprudler',
        'Lautsprecher',
        'Geschirrspüler',
        'Fahrradhelme',
        'Waschmaschine',
        'Küchenhelfer-Zubehör',
        'Kreativ-Software',
        'Fun Cooking',
        'Handys ohne Vertrag',
        'Staubsauger-Zubehör',
        'Reisetaschen',
        'Konsole',
        'Küchenhelfer',
        'Wäschetrockner',
        'Kochgeschirr',
        'Ventilatoren',
        'Elektrowerkzeug',
        'Armbanduhren',
        'Receiver',
        'Router',
        'Grill-Zubehör',
        'Pools',
        'Festplatte',
        'Wecker',
        'Blaster',
        'Headsets',
        'Haartrockner & -styler',
        'Autoteile',
        'Ferngesteuerte Fahrzeuge',
        'Handy-Zubehör',
        'Sat-Montagezubehör',
        'Kaffeemaschinen',
        'Elektrische Zahnbürste',
        'Fernseher',
        'Batterien',
        'Backofen, Herd & Kochplatte',
        'Xbox One-Game',
        'Dunstabzugshauben',
        'Bestecke',
        'Pool-Zubehör',
        'Krüge & Kannen',
        'Rauchmelder',
        'Rucksäcke',
        'Kühl- & Gefriergeräte',
        'Nintendo Switch Games',
        'Blumenkübel',
        'Gartengeräte',
        'Haarschneider',
        'Wasserspielzeug',
        'USB-Stick',
        'Laufräder',
        'Bügeleisen',
        'Tablet-PC',
        'Kinder-Fahrradanhänger',
        'Notebook',
        'Outdoorspielzeug',
        'Staubsauger',
        'Grills',
        'PowerLAN-Adapter',
        'PS4-Games',
        'Wetterstationen',
        'Klimagerät',
        'Kameradrohnen',
        'Reinigungsutensilien',
        'PC-Lautsprecher',
        'Massagegeräte',
        'Digitalkamera',
        'Gesellschaftsspiele',
        'Wearables',
        'Zubehör für Game & Konsole',
        'Musikspielzeug',
        'Kochgeräte'];

    public function load(ObjectManager $manager)
    {
        foreach ($this->name as $i => $name) {
            $item = new Item();
            $item->setName($name);
            $item->setSortOrder($i);
            $manager->persist($item);
            $manager->flush();
        }
    }
}