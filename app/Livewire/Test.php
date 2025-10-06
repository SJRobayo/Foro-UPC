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

    // Variables per al desxifratge Fibonacci
    public $fibonacciEncryptedString = '';
    public $fibonacciDecipheredNewString = [];
    public $fibonacciDecipheredString = '';



    public function mount()
    {
        $this->asciiMap = Ascii::class;
        $this->fibonacciService = FibonacciService::class;
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
        $this->validateFibonacciInput();
        $this->fibonacciNewString = [];
        $splitted = str_split($this->fibonacciInputString);

        foreach ($splitted as $index => $char) {
            $shiftNumber = $this->fibonacciService::getNumberFromSecuence($index) % 94;
            $code = $this->asciiMap::getCode($char);
            $positionsToMove = ($code + $shiftNumber) % 94;
            $char = $this->map[$positionsToMove];
            $this->fibonacciNewString[] = $char;
        }
        $this->fibonacciOutputString = implode('', $this->fibonacciNewString);
    }

    public function fibonacciDecrypt()
    {
        $this->validateEncryptedFibonacciInput();
        $this->fibonacciDecipheredNewString = [];
        $splitted = str_split($this->fibonacciEncryptedString);
        $this->fibonacciDecipheredString = $this->fibonacciService::decrypt($this->fibonacciEncryptedString);
    }

    public function validateFibonacciInput()
    {
        $this->validate(
            [
                'fibonacciInputString' => 'required|string|max:100',
            ],
            [
                'fibonacciInputString.required' => 'El camp no pot estar buit.',
                'fibonacciInputString.string' => 'El camp ha de ser una cadena de text.',
                'fibonacciInputString.max' => 'El camp no pot tenir més de :max caràcters.',

            ]
        );
    }

    public function validateEncryptedFibonacciInput()
    {
        $this->validate(
            [
                'fibonacciEncryptedString' => 'required|string|max:255',
            ],
            [
                'fibonacciEncryptedString.required' => 'El camp no pot estar buit.',
                'fibonacciEncryptedString.string' => 'El camp ha de ser una cadena de text.',
                'fibonacciEncryptedString.max' => 'El camp no pot tenir més de :max caràcters.',
            ]
        );
    }
}
