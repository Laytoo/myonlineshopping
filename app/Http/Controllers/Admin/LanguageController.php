<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //

    public function index(){

        $languages=Language::select()->paginate(PAGINATION_COUNT);
        return view('admin.includes.langauges',compact('languages'));
    }

    public function create(){

       // $languages=Language::select()->paginate(PAGINATION_COUNT);
        return view('admin.includes.languageCreate');
    }

    public function store(LanguageRequest $request)
    {
        try{
            Language::create($request->except(['_token']));
            return redirect()->route('admin.langauge')->with(['success'=>'Saved Successfully']);

        }catch(\Exception $ex){
            return redirect()->route('admin.langauge')->with(['error'=>'Wrong Value']);
        }
        return view ('admin.includes.languageEdit');


       // return view('admin.includes.langauges',compact('languages'));
    }

    public function edit($id){
        $language=Language::select()->find($id);
        if(!$language){
            return redirect()->route('admin.langauge')->with(['error','This Language Does Not Exist']);
        }

        return view('admin.includes.languageEdit',compact('language'));


    }

    public function update($id,LanguageRequest $request){

        try{
            $language=Language::find($id);
            if(!$language){
                return redirect()->route('admin.langauge.edit',$id)->with(['error'=>'error Language does not exist']);
            }
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);

            $language->update($request->except('_token'));
            return redirect()->route('admin.langauge')->with(['success'=>'Language Updated Successfully']);
        }catch(\Exception $ex){
                return redirect()->route('admin.langauge')->with(['error'=>'error']);

            }


    }

    public function delete($id){
        try{
            $language=Language::find($id);
            if(!$language){
                return redirect()->route('admin.langauge')->with(['error'=>'error Language does not exist']);
                }
                $language->delete();
                return redirect()->route('admin.langauge')->with(['success'=>'Language Deleted Successfully']);
                }catch(\Exception $ex){
                    return redirect()->route('admin.langauge')->with(['error'=>'error']);
                    }

    }
}
