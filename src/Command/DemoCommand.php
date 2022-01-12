<?php

namespace App\Command;

use App\Model\Item;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'demo:command',
    description: 'Add a short description for your command',
)]
class DemoCommand extends Command
{
    #Constructor Property Promotion rfc
    public function __construct (
        private EntityManagerInterface $entityManager,
        private LoggerInterface $logger
    )
    {
        parent::__construct();
    }

    protected function execute (InputInterface $input, OutputInterface $output): int
    {
        #$this->first();
        #$this->second();
        #$this->third();
        #$$this->fourth();
        #$this->fifth();
        #$this->sixth();
        #$this->seventh('deneme');
        #$this->eighth();
        #$this->nineth();
        $this->tenth(new Item());
        #$this->twelfth("Mixed Type");

        return Command::SUCCESS;
    }

    private function first ()
    {
        #php7
        dump(array_fill(1, 4, 25));

        #php8
        dump(array_fill(value: 25, start_index: 1, count: 4));
    }

    private function second ()
    {
        #php7 => == ile karsilastirma yapar
        switch (8.0) {
            case '8.0':
                dump('string');
                break;
            case 8.0:
                dump('float');
                break;
        }

        #php8 => === ile karsilastirma yapar
        dump(match (8.0) {
            '8.0', "adem" => "string",
            8.0, 9.0, 10.0 => "float"
        });
    }

    private function third ()
    {
        #php7
       $coll = new ArrayCollection();
       $coll->set('a', new ArrayCollection());
       $coll->get('a')->set('b', new ArrayCollection());
       $coll->get('a')->get('b')->set('c', 'NULL SAFE OPERATOR');

        if($coll->get('a') !== null) {
            if($coll->get('a')->get('b') !== null) {
                if($coll->get('a')->get('b')->get('c') !== null) {
                    dump($coll->get('a')->get('b')->get('c'));
                }
            }
        }

        #php8
        dump($coll->get('a')?->get('b')?->get('c'));
    }

    private function fourth ()
    {
        #php7 => cikti true geliyor.
       dump(0 == 'string');

        #php8 => cikti false geliyor. Eskiden metin sayiya cevriliyordu, artik sayi metine cevriliyor.
        dump(0 == 'string');
    }

    private function fifth () {
        #php7
        try {
            throw new \Exception();
        } catch (\Exception $exception) {
            dump('An exception fired');
        }

        #php
        try {
            throw new \Exception();
        } catch (\Exception) {
            dump('An exception fired');
        }
    }

    private function sixth () {
        #php7'de yok.

        #php8
        $text = 'Enuygun: Türkiyenin Seyahat Sitesi! Biz, teknolojik gelişmelerin öncüsü olan, dijital düşünen ve bunu kullanıcılarımıza mükemmel deneyimi sunmak için kullanan, genç ve dinamik bir şirketiz';

        dump(str_contains($text, "öncüsü"));
        dump(str_starts_with($text, "Enuygun"));
        dump(str_ends_with($text, "şirketiz"));
    }

    private function seventh (string|int|float $value):string|float|null {
        dump($value);
        return null;
    }

    private function eighth () {
        #php8 Named Arguments rfc
        $this->seventh(value: "RFC");
    }

    private function nineth(): static {
        #php8 static type geldi
        #return new static();
    }

    private function tenth(\Stringable $text) {
        dump($text->__toString());
    }

    private function twelfth(mixed $text) {
        dump($text);
    }
}
