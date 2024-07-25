<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\School;
use Carbon\Carbon;

class PupilPerformanceController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('pupils.index', compact('schools'));
    }

    /*public function show($id)/////just a ka back up//////////////////////
    {
        $school = School::findOrFail($id);

        $pupilPerformances = DB::table('participant')
            ->join('challengesubmission', 'participant.PupilID', '=', 'challengesubmission.PupilID')
            ->where('participant.SchoolRegNo', $school->schoolRegNo)
            ->select(
                'participant.FirstName', 
                'participant.LastName', 
                DB::raw('YEAR(challengesubmission.DateSubmitted) as year'), 
                DB::raw('AVG(challengesubmission.QnMarks) as averagemarks')
            )
            ->groupBy('participant.PupilID', 'year')
            ->orderBy('year')
            ->get();

        return view('pupils.show', compact('school', 'pupilPerformances'));
    }*/

    

    //previous.....graph option
    /*public function show($id)
    {
        $school = School::findOrFail($id);
        // Debugging the school data
        //dd($school);


        $pupilPerformances = DB::table('participant')
            ->join('challengesubmission', 'participant.PupilID', '=', 'challengesubmission.PupilID')
            ->where('participant.SchoolRegNo', $school->SchoolRegNo)
            ->select(
                'participant.FirstName', 
                'participant.LastName', 
                DB::raw('YEAR(challengesubmission.DateSubmitted) as year'), 
                DB::raw('AVG(challengesubmission.QnMarks) as averagemarks')
            )
            ->groupBy('participant.PupilID', 'participant.FirstName', 'participant.LastName', 'year')
            ->orderBy('year')
            ->get();
            //dd($pupilPerformances);
            //dd($pupilPerformances);

        return view('pupils.show', compact('school', 'pupilPerformances'));
    }*/





    //list alternative
    /* public function showPupils($id)
    {
        $school = school::findOrFail($id);

        $pupilPerformances = DB::table('participant')
            ->join('challengesubmission', 'participant.PupilID', '=', 'challengesubmission.PupilID')
            ->where('participant.schoolRegNo', $school->schoolRegNo)
            ->select(
                'participant.FirstName',
                'participant.LastName',
                DB::raw('YEAR(challengesubmission.DateSubmitted) as year'),DB::raw('SUM(QnMarks) as marks')
                //'challengesubmission.QnMarks as marks'
            )
            ->groupBy('participant.PupilID', 'participant.FirstName', 'participant.LastName', 'year','challengesubmission.QnMarks')
            //->orderBy('participant.FirstName')
            //->orderBy('participant.LastName')
            ->orderBy('year','asc')
            ->get();

        return view('pupils.show', compact('school', 'pupilPerformances'));
    }*/



  /*  public function showPupils($id)
    {
        $school = School::findOrFail($id);

        $pupilPerformances = DB::table('participant')
            ->join('challengesubmission', 'participant.PupilID', '=', 'challengesubmission.PupilID')
            ->where('participant.schoolRegNo', $school->schoolRegNo)
            ->select(
                'participant.FirstName',
                'participant.LastName',
                DB::raw('YEAR(challengesubmission.DateSubmitted) as year'),
                DB::raw('SUM(challengesubmission.QnMarks) as totalMarks'),
                DB::raw('(SUM(challengesubmission.QnMarks) / 30) * 100 as percentageScore')
            )
            ->groupBy('participant.PupilID', 'participant.FirstName', 'participant.LastName', 'year')
            ->orderBy('year', 'asc')
            ->get();

        return view('pupils.show', compact('school', 'pupilPerformances'));
    }*/
    public function showPupils($id)
{
    $school = School::findOrFail($id);

    $pupilPerformances = DB::table('participant')
        ->join('challengesubmission', 'participant.PupilID', '=', 'challengesubmission.PupilID')
        ->where('participant.schoolRegNo', $school->schoolRegNo)
        ->select(
            'participant.PupilID',
            'participant.FirstName',
            'participant.LastName',
            DB::raw('YEAR(challengesubmission.DateSubmitted) as year'),
            DB::raw('SUM(challengesubmission.QnMarks) as totalMarks'),
            DB::raw('COUNT(DISTINCT challengesubmission.ChID) as challengesCount'),
            DB::raw('(SUM(challengesubmission.QnMarks) / COUNT(DISTINCT challengesubmission.ChID)) as averageScore'),
            DB::raw('((SUM(challengesubmission.QnMarks) / COUNT(DISTINCT challengesubmission.ChID)) / 30) * 100 as percentageScore')
        )
        ->groupBy('participant.PupilID', 'participant.FirstName', 'participant.LastName', 'year')
        ->orderBy('year', 'asc')
        ->get();

    return view('pupils.show', compact('school', 'pupilPerformances'));
}



   /* public function showPupils($id)
{
    $school = School::findOrFail($id);

    $pupilPerformances = DB::table('participant')
        ->join('challengesubmission', 'participant.PupilID', '=', 'challengesubmission.PupilID')
        ->where('participant.schoolRegNo', $school->schoolRegNo)
        ->select(
            'participant.PupilID',
            'participant.FirstName',
            'participant.LastName',
            DB::raw('YEAR(challengesubmission.DateSubmitted) as year'),
            DB::raw('challengesubmission.ChID'),
            DB::raw('SUM(challengesubmission.QnMarks) as totalMarks'),
            DB::raw('(SUM(challengesubmission.QnMarks) / (COUNT(DISTINCT challengesubmission.ChID) * 30)) * 100 as percentageScore')
        )
        ->groupBy('participant.PupilID', 'participant.FirstName', 'participant.LastName', 'year', 'challengesubmission.ChID')
        ->orderBy('year', 'asc')
        ->get();

    return view('pupils.show', compact('school', 'pupilPerformances'));
}*/
}
