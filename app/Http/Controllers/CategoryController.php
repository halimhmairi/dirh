<?php

namespace App\Http\Controllers;

use App\Http\Requests\category\StoreCategoryRequest;
use App\Http\Requests\category\UpdateCategoryRequest; 
use App\Repositories\category\CategoryRepository;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{

    public $categoryRepository; 

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository =  $categoryRepository; 

        $this->middleware(function ($request, $next) {
            if (!Auth::user() || Auth::user()->role->name !== 'admin') {
                abort(403, 'Accès non autorisé. Seuls les administrateurs peuvent accéder à cette section.');
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = $this->categoryRepository->paginate(5,['*'],'page'); 

        return view('dashboard.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->categoryRepository->create($request->all());
        toast(__('messages.Your category has been submitted!'),'success');
        return redirect('category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->getById($id);
        return view('dashboard.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request)
    {
        $this->categoryRepository->updateById($request->id,$request->except('id'));
        toast(__('messages.Your category has been updated!'),'success');
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->deleteById($id);
        toast(__('messages.Your category has been deleted!'),'success');
        return redirect()->back();
    }
}
