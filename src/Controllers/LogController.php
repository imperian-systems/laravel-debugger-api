<?php

namespace ImperianSystems\LaravelDebuggerApi\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lines = explode("\n", file_get_contents(base_path("storage/logs/laravel.log")));
        return $lines;

        $log = array();
        $stacktrace = array();
        $tracing = false;
        foreach($lines as $line)
        {
            if($tracing)
            {
                array_push($stacktrace["stacktrace"], $line);
                if($line == '"} ')
                {
                    array_push($log, $stacktrace);
                    $tracing = false;
                    continue;
                }
            }

            if($line == "[stacktrace]")
            {
                $stacktrace = array("stacktrace"=>array());
                $tracing = true;
                continue;
            }

            array_push($log, $line);
        }

        return $log;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
