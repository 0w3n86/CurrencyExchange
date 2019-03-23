<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleXMLElement;

class ExchangeController extends Controller
{

    public function index()
    {

        // Create Array of list of 10 popular currencies.

        $currencies = array (
            "GBP" => "U.K. Pound sterling",
            "USD" => "United States dollar",
            "EUR" => "Euro",
            "CHF" => "Swiss franc",
            "JPY" => "Japanese yen",
            "KRW" => "South Korean won",
            "KWD" => "Kuwaiti dinar",
            "MXN" => "Mexican peso",
            "PLN" => "Polish złoty",
            "RUB" => "Russian ruble",
        );


        // Get all available currencies from the floatrates XML.
        // Disabled as it runs slow and list not always compatible with JSON request.

//        $url = "http://www.floatrates.com/daily/gbp.xml";
//        $xml = new SimpleXMLElement($url, 0, true);
//
//        $currencies = array();
//
//        $currencies['GBP'] = 'U.K. Pound Sterling';
//
//        foreach($xml->item as $currency) {
//
//            $code =  $currency->targetCurrency->__toString();
//            $name =  $currency->targetName->__toString();
//
//            $currencies[$code] = $name;
//
//        }

        return view('index',compact('currencies'));
    }

    public function calculate(Request $request)
    {

        // If user tries to compare the same currency return the same value.

        if($request->from === $request->to OR $request->from === 0) {
            return number_format($request->amount, 2);
        }

        else {

            // XML Request

            if($request->data === 'XML') {

                $url = "http://www.floatrates.com/daily/". $request->from .".xml";
                $xml = new SimpleXMLElement($url, 0, true);

                foreach($xml->item as $currency) {

                    if ($currency->targetCurrency == $request->to)
                    {
                        $converted = $request->amount * $currency->exchangeRate;
                        return number_format($converted, 2);
                    }
                }

            }

            // JSON Request

            else {
                $url = "https://api.exchangeratesapi.io/latest?base=".$request->from;
                $content = file_get_contents($url);
                $json = json_decode($content, true);

                $converted = $request->amount * $json['rates'][$request->to];

                return number_format($converted, 2);
            }
        }
    }
}