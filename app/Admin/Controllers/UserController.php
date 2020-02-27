<?php

namespace App\Admin\Controllers;

use App\Model\RegisterModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RegisterModel());

        $grid->column('r_id', __('R id'));
        $grid->column('r_name', __('公司名称'));
        $grid->column('r_legal', __('法人名称'));
        $grid->column('r_address', __('公司地址'));
        // $grid->column('r_logo', __('营业执照'));
        $grid->column('r_tel', __('电话'));
        $grid->column('r_email', __('Email'));
        $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(RegisterModel::findOrFail($id));

        $show->field('r_id', __('R id'));
        $show->field('r_name', __('R name'));
        $show->field('r_legal', __('R legal'));
        $show->field('r_address', __('R address'));
        $show->field('r_logo', __('R logo'));
        $show->field('r_tel', __('R tel'));
        $show->field('r_email', __('R email'));
        $show->field('r_pwd', __('R pwd'));
        $show->field('r_pwd1', __('R pwd1'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new RegisterModel());

        $form->text('r_name', __('公司名称'));
        $form->text('r_legal', __('法人名称'));
        $form->text('r_address', __('公司地址'));
        $form->text('r_logo', __('营业执照'));
        $form->text('r_tel', __('电话'));
        $form->text('r_email', __('Email'));
        $form->text('r_pwd', __('密码'));

        return $form;
    }
}
