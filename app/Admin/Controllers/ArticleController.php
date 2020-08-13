<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class ArticleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Article(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->title->editable();
            $grid->content->editable();
            $grid->user_id->editable();
            $grid->category_id->editable();
            $grid->excerpt->editable();
            $grid->slug;
            $grid->created_at;
            $grid->updated_at->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Article(), function (Show $show) {
            $show->id;
            $show->title;
            $show->content;
            $show->user_id;
            $show->category_id;
            $show->excerpt;
            $show->divider();
            $show->slug;
            $show->created_at;
            $show->updated_at;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Article(), function (Form $form) {
            $form->display('id');
            $form->text('title')->rules('required',[
                'required'=>'标题不能为空',
            ]);
            $form->editor('content')->rules('required|min:7',[
                'required'=>'内容不能为空',
                'min'=>'内容不能少于7个字符',
            ]);
            $form->text('user_id');
            $form->select('category_id')->options([
                1 => '分享',
                2 => '教程',
                3 => '问答',
                4 => '公告',
            ]);;
            $form->text('excerpt');
            $form->text('slug');
        
            $form->display('created_at');
            $form->display('updated_at');
            
        });
    }
}
