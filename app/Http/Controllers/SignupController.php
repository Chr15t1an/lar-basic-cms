<?php

namespace App\Http\Controllers;

use App\Signup;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class SignupController extends Controller
{
    /**
     * Store a newly created lead in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Validate the request
         $validator = Validator::make($request->all(), [
             'first_name' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
             'last_name' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
             'email' => 'required|email',
             'plan' => 'alpha',
         ]);

        if ($validator->fails()) {
              // Need to return errors.
                 return response()->json(['errors'=>$validator->errors()]);
              }
        //Store the lead.


        $newLead = new Signup;
        $newLead->first_name = $request->first_name;
        $newLead->last_name = $request->last_name;
        $newLead->email = $request->email;
        $newLead->plan = $request->plan;

        try {
          $newLead->save();
          return 'Message Saved';
        } catch (\Exception $e) {
          return response()->json(['errors'=>$e]);
        }

    }

     /**
       * Create a CSV
       *
       * @param array $columnNames
       * @param array $rows
       * @param string $fileName
       * @return \Symfony\Component\HttpFoundation\StreamedResponse
       */
      public static function getCsv($columnNames, $rows, $fileName = 'file.csv') {
          $headers = [
              "Content-type" => "text/csv",
              "Content-Disposition" => "attachment; filename=" . $fileName,
              "Pragma" => "no-cache",
              "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
              "Expires" => "0"
          ];
          $callback = function() use ($columnNames, $rows ) {
              $file = fopen('php://output', 'w');
              fputcsv($file, $columnNames);
              foreach ($rows as $row) {
                  fputcsv($file, $row);
              }
              fclose($file);
          };
          return response()->stream($callback, 200, $headers);
      }


      /**
        * Export leads/Signups to a CSV.
        *
        */

      public function exportleads() {
          $rows = [];
          $leads = Signup::all();
          foreach ($leads as $l) {
            array_push($rows,[$l->first_name, $l->last_name,$l->email,$l->plan]);
          }
          $columnNames = ['firstname', 'lastname', 'email','plan'];
          return self::getCsv($columnNames, $rows);
      }

    /**
     * Remove the specified lead from storage.
     *
     * @param  \App\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        $email = Signup::find($id);
        $email->delete();
          return 'ok';
      } catch (\Exception $e) {
        return response()->json(['errors'=>$e]);
      }
    }
}
