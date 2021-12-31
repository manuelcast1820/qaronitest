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
        $olds = CategoryDescription::where('categoryId',$categoryDescription->categoryId)
        ->where('language',$categoryDescription->language)->first();
        if($olds != "" && $categoryDescription->id != $olds->id){
            $olds->name = $categoryDescription->name;
            $olds->save();
            return false;
        }
    }

    public function updating(CategoryDescription $categoryDescription)
    {
        $olds = CategoryDescription::where('categoryId',$categoryDescription->categoryId)
        ->where('language',$categoryDescription->language)->first();
        if($olds != "" && $categoryDescription->id != $olds->id){
            $olds->name = $categoryDescription->name;
            $olds->save();
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
