<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experiance;
use Illuminate\Http\Request;
use App\Models\PersonalDetail; // Ensure you have created this model
use App\Models\AdditionalDetail; // Ensure you have created this model

use App\Models\Skill;
use App\Models\TechSkill;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class ResumeController extends Controller
{
  public function  ResumePersonalDeaitals()
  {
    $data['kyc'] = PersonalDetail::where('user_id', Auth::user()->id)->first();

    return view('user.resume.personal',$data);
  }
  public function ResumePersonalDeaitalsSave(Request $request)
  {

    $data = $request->validate([
      'full_name' => 'required|string|max:255',
      'father_name' => 'required|string|max:255',
      'gender' => 'required|string|in:male,female,other',
      'marital_status' => 'required|string|in:single,married,divorced,widowed',
      'dob' => 'required|date|before:today',
      'country' => 'required|string|max:255',
      'state' => 'required|string|max:255',
      'district' => 'required|string|max:255',
      'address' => 'required|string|max:1000',
  ]);

      if($request->id)
      {
        $personalDetail =  PersonalDetail::find($request->id);

      }else
      {
      $personalDetail = new PersonalDetail();
      }
      $personalDetail->userid = Auth::user()->id;

      $personalDetail->full_name = $request->input('full_name');
      $personalDetail->father_name = $request->input('father_name');
      $personalDetail->gender = $request->input('gender');
      $personalDetail->marital_status = $request->input('marital_status');
      $personalDetail->dob = $request->input('dob');
      $personalDetail->country = $request->input('country');
      $personalDetail->state = $request->input('state');
      $personalDetail->district = $request->input('district');
      $personalDetail->address = $request->input('address');
      
      $personalDetail->save();

      return redirect()->back()->with('mes', ' data saved  SuccessFull');
  }



  public function  ResumeEducationDeaitals()
  {
    $data['edu'] = Education::where('user_id', Auth::user()->id)->get();

    return view('user.resume.education',$data);
  }

  public function ResumeEducationDeaitalsSave(Request $request)
  {
    $request->validate([
      'courseName' => 'required|string|max:255',
      'collegeName' => 'required|string|max:255',
      'passingYear' => 'required|date',
      'startDate' => 'required|date',
      'percentage' => 'required|integer|min:0|max:100',
  ]);

  $course = Education::create([
    'user_id' => Auth::user()->id,
    'courseName' => $request->courseName,
    'collegeName' => $request->collegeName,
    'passingYear' => $request->passingYear,
    'startDate' => $request->startDate,
    'percentage' => $request->percentage,
]);

return redirect()->back()->with('mes', ' data saved  SuccessFull');
  }


  public function ResumeEducationDeaitalsupdate(Request $request)
  {
      $validatedData = $request->validate([
          'courseName' => 'required|string|max:255',
          'collegeName' => 'required|string|max:255',
          'passingYear' => 'required|date',
          'startDate' => 'required|date',
          'percentage' => 'required|numeric|max:100',
      ]);

      $education = Education::findOrFail($request->educationId);
      $education->update([
        'user_id' => Auth::user()->id,
        'courseName' => $request->courseName,
        'collegeName' => $request->collegeName,
        'passingYear' => $request->passingYear,
        'startDate' => $request->startDate,
        'percentage' => $request->percentage,
      ]);
      return redirect()->back()->with('mes', 'Education details updated successfully.');
  }

  public function ResumeEducationDeaitalsdestroy($id)
  {
      $education = Education::findOrFail($id);
      
      $education->delete();
      return redirect()->back()->with('mes', 'Education details deleted successfully.');
  }

  public function  techSkillShoww()
  {
    $data['skills'] = Skill::get();
    $data['techSkills']  = TechSkill::where('user_id',Auth::user()->id)->get();

    return view('user.resume.tech',$data);
  }
  
  public function techSkillsave(Request $request)
  {
      $request->validate([
          'skillName' => 'required|string|max:255',
          'proficiencyLevel' => 'required|string|max:255',
      ]);

      if ($request->has('techSkillId') && $request->techSkillId) {
          $techSkill = TechSkill::find($request->techSkillId);
          if (!$techSkill) {
              return redirect()->back()->with('err','Skill not found.');
          }
      } else {
          $techSkill = new TechSkill();
      }
      $techSkill->user_id = Auth::user()->id;
      $techSkill->skillName = $request->skillName;
      $techSkill->proficiencyLevel = $request->proficiencyLevel;
      $techSkill->save();

      return redirect()->back()->with('mes', 'Tech Skill saved successfully.');
  }

  public function techSkilldelete($id)
  {
      $techSkill = TechSkill::find($id);
      if (!$techSkill) {
          return redirect()->back()->with('err','Skill not found.');
      }

      $techSkill->delete();

      return redirect()->back()->with('mes', 'Tech Skill deleted successfully.');
  }

  public function experienceShoww()
  {
    $data['experiences'] = Experiance::where('user_id',Auth::user()->id)->get();

    return view('user.resume.experience',$data);
  }


  public function experiencesave(Request $request)
  {
      $request->validate([
          'companyName' => 'required|string|max:255',
          'joiningDate' => 'required|date',
          'position' => 'required|string|max:255',
          'description' => 'nullable|string',
          'endDate' => 'nullable|date',
      ]);

      if ($request->techSkillId) {
          $techSkill = Experiance::findOrFail($request->techSkillId);
      } else {
          $techSkill = new Experiance();
      }
      $techSkill->user_id = Auth::user()->id;

      $techSkill->companyName = $request->companyName;
      $techSkill->joiningDate = $request->joiningDate;
      $techSkill->position = $request->position;
      $techSkill->description = $request->description;

      if ($request->has('workHere') && $request->workHere === 'yes') {
          $techSkill->endDate = null; // or you can set it to null if needed
      } else {
          $techSkill->endDate = $request->endDate;
      }

      // Save the TechSkill instance
      $techSkill->save();

      // Redirect back with success message
      return redirect()->back()->with('mes', 'Tech Skill saved successfully.');
  }

  public function experiencedelete($id)
  {
      // Find and delete the TechSkill instance
      $techSkill = Experiance::findOrFail($id);
      $techSkill->delete();

      // Redirect back with success message
      return redirect()->back()->with('mes', 'Tech Skill deleted successfully.');
  }

  public function objectiveshow()
  {
    $data['kyc'] = AdditionalDetail::where('user_id',Auth::user()->id)->first();
    return view('user.resume.objective',$data);
  }



  public function objectivestore(Request $request)
  {
      $validatedData = $request->validate([
          'objective' => 'required|string',
          'about_us' => 'required|string',
      ]);

      if($request->id)
      {
        $additionalDetail =  AdditionalDetail::find($request->id);
      }
else{
      $additionalDetail = new AdditionalDetail();
}
      $additionalDetail->user_id = Auth::user()->id;
      $additionalDetail->objective = $request->objective;
      $additionalDetail->about_us = $request->about_us;
     
     if( $additionalDetail->save())
      {
      return redirect()->back()->with('mes', 'details saved successfully.');
      }
      else
      {
      return redirect()->back()->with('del', 'Serve Busy try Again.');

      }
  }


}