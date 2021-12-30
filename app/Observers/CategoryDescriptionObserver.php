<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\CategoryDescription;

class CategoryDescriptionObserver
{
    /**
     * Handle the CategoryDescription "created" event.
     *
     * @param  \App\Models\CategoryDescription  $categoryDescription
     * @return void
     */
    public function created(CategoryDescription $categoryDescription)
    {
        //
    }

    public function creating(CategoryDescription $categoryDescription)
    {
        
        $olds = CategoryDescription::where('language',$categoryDescription->language)->first();
        
        if($olds != ""){
            $category = Category::find($olds->categoryId);            
            $category->slug = Category::find($categoryDescription->categoryId)->slug;
            $category->description->name = $categoryDescription->name;
            $category->save();
            $category->description->save();
            Category::destroy($categoryDescription->categoryId);
            return false;
        }
    }

    /**
     * Handle the CategoryDescription "updated" event.
     *
     * @param  \App\Models\CategoryDescription  $categoryDescription
     * @return void
     */
    public function updated(CategoryDescription $categoryDescription)
    {
        //
    }

    /**
     * Handle the CategoryDescription "deleted" event.
     *
     * @param  \App\Models\CategoryDescription  $categoryDescription
     * @return void
     */
    public function deleted(CategoryDescription $categoryDescription)
    {
        //
    }

    /**
     * Handle the CategoryDescription "restored" event.
     *
     * @param  \App\Models\CategoryDescription  $categoryDescription
     * @return void
     */
    public function restored(CategoryDescription $categoryDescription)
    {
        //
    }

    /**
     * Handle the CategoryDescription "force deleted" event.
     *
     * @param  \App\Models\CategoryDescription  $categoryDescription
     * @return void
     */
    public function forceDeleted(CategoryDescription $categoryDescription)
    {
        //
    }
}
