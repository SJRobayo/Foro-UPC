<?php

namespace App\Livewire;

use Livewire\Component;
use App\Constants\Ascii;
use App\Services\FibonacciService;

class Test extends Component
{

    // Variables per al xifratge
    public $inputString = '';
    public $outputString = '';
    public $newString = [];

    // Variables per al desxifratge
    public $cypherString = '';
    public $decipheredString = '';
    public $decipheredNewString = [];


    // Variable per al mapa ASCII
    public $asciiMap;
    public $fibonacciService;
    public $map;

    // Variables per al xifratge Fibonacci
    public $fibonacciInputString = '';
    public $fibonacciOutputString = '';
    public $fibonacciNewString = [];
    public $fibonacciCypherString = '';


    public function mount()
    {
        $this->asciiMap = Ascii::class;
        $this->fibonacciService = FibonacciService::class;

        $test =  $this->asciiMap::get(65);
        $this->map = $this->asciiMap::MAP;
        // dd($this->map);

    }

    public function render()
    {
        // $this->encrypt();
        return view('livewire.test')
            ->layout('layouts.app',);
    }


    public function encrypt()
    {
        $this->newString = [];
        $serialized = iconv('UTF-8', 'ASCII//TRANSLIT', $this->inputString);
        $splitted = str_split($serialized);
        $shiftNumber = 1;

        foreach ($splitted as $char) {
            if (ctype_alpha($char)) {
                $char = chr(ord($char) + $shiftNumber);
                if (!ctype_alpha($char)) {
                    $char = chr(ord($char) - 26);
                }
                $this->newString[] = $char;
            } else {
                $this->newString[] = $char;
            }
        }
        $this->outputString = implode('', $this->newString);
        // dd($this->outputString);
    }

    public function decrypt()
    {
        $this->decipheredNewString = [];
        $serialized = iconv('UTF-8', 'ASCII//TRANSLIT', $this->cypherString);
        $splitted = str_split($serialized);
        $shiftNumber = 1;

        foreach ($splitted as $char) {
            if (ctype_alpha($char)) {
                $char = chr(ord($char) - $shiftNumber);
                if (!ctype_alpha($char)) {
                    $char = chr(ord($char) + 26);
                }
                $this->decipheredNewString[] = $char;
            } else {
                $this->decipheredNewString[] = $char;
            }
        }
        $this->decipheredString = implode('', $this->decipheredNewString);
    }

    public function fibonacciEncrypt()
    {

        $this->fibonacciNewString = [];
        $splitted = str_split($this->fibonacciInputString);

        foreach ($splitted as $char) {

            $code = $this->asciiMap::getCode($char);
            $shiftNumber = $this->fibonacciService::getNumberFromSecuence($code) % 84;
            
            $positionsToMove = ($code + $shiftNumber);
            // dd($shiftNumber,$positionsToMove);
            if ($positionsToMove > 83) {
                $positionsToMove = $positionsToMove - 84;
            }
            $char = $this->map[($positionsToMove)];
            $this->fibonacciNewString[] = $char;
        }
        $this->fibonacciOutputString = implode('', $this->fibonacciNewString);
    }
}
