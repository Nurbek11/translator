<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Redis;
use Symfony\Component\Console\Input\Input;


class ExampleController extends Controller
{
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
        //Connecting to Redis server on localhost
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);
        $databaseId = 0;

        foreach ($request->all() as $item) {

            $redis->select($databaseId);
            $redis->set($request->get('original'), $item);
            $databaseId += 1;

        }

        return redirect('/');


    }

    public function parse()
    {
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);
        $databaseId = 0;

        $inputFileName = "/home/nurbek/PhpstormProjects/translator/Test.xlsx";

        /**  Identify the type of $inputFileName  **/
        $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);

        /**  Create a new Reader of the type that has been identified  **/
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

        /**  Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($inputFileName);

        /**  Convert Spreadsheet Object to an Array for ease of use  **/
        $rows = $spreadsheet->getActiveSheet()->toArray();

        $counter = 0;
        foreach ($rows as $word) {
            $databaseId = 0;
            $originalWord = $rows[$counter][1];
            foreach ($word as $single_item) {
                if ($single_item != null) {
                    $redis->select($databaseId);
                    $redis->set($originalWord, $single_item);
                    $databaseId++;
                } else {
                    $databaseId++;
                }

            }
            $counter++;
        }


    }
}
