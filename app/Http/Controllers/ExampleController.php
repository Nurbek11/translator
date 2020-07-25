<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Redis;
use Symfony\Component\Console\Input\Input;
use App\Traits\ConnectionRedis;


class ExampleController extends Controller
{

    use ConnectionRedis;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function translate(\Illuminate\Http\Request $request)
    {

        $redis = $this->getRedis();
        $databaseId = 0;

        foreach ($request->all() as $item) {

            $redis->select($databaseId);
            $redis->set($request->get('original'), $item);
            $databaseId += 1;

        }
        $redis->close();
        return redirect('/');


    }

    public function parse()
    {
        $redis = $this->getRedis();
        $databaseId = 0;

        $inputFileName = "/home/nurbek/PhpstormProjects/translator/app/Http/Controllers/translate.xlsx";
        $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($inputFileName);
        $rows = $spreadsheet->getActiveSheet()->toArray();

        $counter = 0;
        foreach ($rows as $words) {
            $databaseId = 0;
            $originalWord = "translate:" . $rows[$counter][0];
            foreach ($words as $single_item) {
                if ($single_item != null) {
                    $redis->select($databaseId);
                    $redis->set($originalWord, $single_item);
                    $redis->sAdd("all:translates", $rows[$counter][0]);
                    $databaseId++;
                } else {
                    $databaseId++;
                }
            }
            $counter++;
        }
        $redis->close();
    }

    public function getTranslates()
    {
        $redis = $this->getRedis();
        $translates = $redis->sMembers("all:translates");
        $collect = array();
        foreach ($translates as $key => $translation) {
            $translations = array();
            for ($i = 1; $i < 6; $i++) {
                $redis->select($i);
                $translationItem = $redis->get("translate:{$translation}");
                array_push($translations, $translationItem);
            }
            $redis->select(0);
            $collect[$key] = array(
                'slug' => $redis->get("translate:{$translation}"),
                'translates'=>$translations
            );

        }
        return $collect;

    }
}
