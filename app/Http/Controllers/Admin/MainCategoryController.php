<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Nette\Schema\Expect;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Str;

use function PHPUnit\Framework\returnSelf;

class MainCategoryController extends Controller
{
    //

    public function index(){
        $def_lang=get_default_language();
        $categories=MainCategory::where('translation_lang',$def_lang)->selection()->get();
        return view ('admin.includes.maincategories.maincategory',compact('categories'));
    }

    public function create(){

        return view ('admin.includes.maincategories.maincategoryCreate');
    }

    public function store(MainCategoryRequest $request)

        {

            try {
                //return $request;
// save all category and convert it to collection to make filter
                $main_categories = collect($request->category);
//to use just the locale language which is English and use it
                $filter = $main_categories->filter(function ($value, $key) {
                    //return all category  just which contain locale language
                    return $value['abbr'] == get_default_language();
                });
// convert to array
                $default_category = array_values($filter->all()) [0];

//now this section store in database
                $filePath = "";
                if ($request->has('photo')) {

                    $filePath = uploadImage('maincategories', $request->photo);
                }
//this to be good with out wrong or some missing value
                FacadesDB::beginTransaction();
//insert getid  to return just id   it is  same as create function
//insert into database
                $default_category_id = MainCategory::insertGetId([
                    'translation_lang' => $default_category['abbr'],
                    'translation_of' => 0,//default language must take 0 no translation of language or something else
                    'name' => $default_category['name'],
                    'slug' => $default_category['name'],
                    'photo' => $filePath
                ]);
//return all language which is not default language
                $categories = $main_categories->filter(function ($value, $key) {
                    return $value['abbr'] != get_default_language();
                });

//ensure that data is valid
                if (isset($categories) && $categories->count()) {

                    $categories_arr = [];
                    foreach ($categories as $category) {
                        $categories_arr[] = [
                            'translation_lang' => $category['abbr'],
                            'translation_of' => $default_category_id,
                            'name' => $category['name'],
                            'slug' => $category['name'],
                            'photo' => $filePath
                        ];
                    }

                    MainCategory::insert($categories_arr);
                }
//commit  mean save all data into database and redirect back
                FacadesDB::commit();

                return redirect()->route('admin.maincategory')->with(['success' => 'تم الحفظ بنجاح']);

            } catch (\Exception $ex) {
                //back with error and dont insert into database anything
                FacadesDB::rollback();
                return redirect()->route('admin.maincategory')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            }

        }





    // public function store(MainCategoryRequest $request)
    // {

        // $default_category_id=$filter->keys()->first();
        // //return $default_category_id;
        // $default_category_name=$filter->values()->first()['name'];
        // //return $default_category_name;
        // $fileName=null;
        // if($request->has('image')){
        //     $fileName=uploadImg('maincategories',$request->image);
        //     }
        //     try{
        //         $default_category=MainCategory::create([
        //             'translation_lang'=>$default_category_id,
        //             'translation_of'=>$default_category_id,
        //             'name'=>$default_category_name,
        //             'image'=>$fileName,
        //             'active'=>1,
        //             ]);
        //             $categories=MainCategory::where('translation_lang',$default_category_id)->selection()->get();
        //             return redirect()->route('admin.maincategory')->with(['success'=>'Category Added Successfully']);
        //             }catch(\Exception $ex){
        //                 return redirect()->route('admin.maincategory')->with(['error'=>'Try Again']);
        //                 }







//blackbox

    // public function edit($id)
    // {
    //     $main_category=MainCategory::selection()->find($id);
    //     if(!$main_category){
    //         return redirect()->route('admin.maincategory')->with(['error'=>'Try Again']);
    //     }
    //     $categories=MainCategory::where('translation_lang',get_default_language())->selection()->get();
    //     return view('admin.includes.maincategories.maincategoryEdit',compact('main_category','categories'));
    // }

    //from blakbox
    
    // public function update($id,Request $request)
    // {
    //     $data=request()->validate([
    //         'name'=>'required',
    //         'image'=>'sometimes|nullable|image',
    //         'active'=>'required',
    //         ]);

    //         $main_category=MainCategory::find($id);

    //         if(!$main_category)
    //         {
    //             return redirect()->route('admin.maincategory')->with(['error'=>'Try Again']);
    //         }
    //             $fileName=null;
    //             if(request()->has('image')){
    //                 $filePath=request()->file('image')->getRealPath();
    //                 $fileMime=request()->file('image')->getMimeType();
    //                 $fileExt=request()->file('image')->getClientOriginalExtension();
    //                 $fileName=time().'.'.$fileExt;
    //                 $fileSize=request()->file('image')->getSize();
    //                 $fileMove=request()->file('image')->move('uploads/maincategories',$fileName);
    //                 }
    //                 //here update
    //                 $main_category->update([
    //                     'name'=>$data['name'],
    //                     'image'=>$fileName,
    //                     'active'=>$data['active'],
    //                     ]);
    //                     return redirect()->route('admin.maincategory')->with(['success'=>'Updated Successfully']);
    // }

    public function edit($maincategory_id){

        $main_category=MainCategory::selection()->find($maincategory_id);
        if(!$maincategory_id){
            return redirect()->route('admin.maincategory')->withError('This Section Doesnt Found');
        }
        return view ('admin.includes.maincategories.maincategoryEdit',compact('main_category'));

    }

    public function update($mainCat_id, MainCategoryRequest $request)
    {


        try {
            $main_category = MainCategory::find($mainCat_id);

            if (!$main_category)
                return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود ']);

            // update date

            $category = array_values($request->category) [0];

            if (!$request->has('category.0.active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);


            MainCategory::where('id', $mainCat_id)
                ->update([
                    'name' => $category['name'],
                    'active' => $request->active,
                ]);

            // save image

            if ($request->has('photo')) {
                $filePath = uploadImage('maincategories', $request->photo);
                MainCategory::where('id', $mainCat_id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            }


            return redirect()->route('admin.maincategory')->with(['success' => 'تم لتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.maincategory')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }




}

