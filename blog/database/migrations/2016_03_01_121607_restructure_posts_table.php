<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestructurePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('subtitle')->after('title'); //文章副标题
            $table->renameColumn('content', 'content_raw'); //markdown格式文本
            $table->text('content_html')->after('content'); //使用markdown编辑的内容  同时保存为HTML
            $table->string('page_image')->after('content_html'); //文章封面
            $table->string('meta_description')->after('page_image'); //备注说明
            $table->boolean('is_draft')->after('meta_description'); //是否为抄稿
            $table->string('layout')->after('is_draft')->default('blog.layouts.post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->dropColumn('layout');
            $table->dropColumn('is_draft');
            $table->dropColumn('meta_description');
            $table->dropColumn('page_image');
            $table->dropColumn('content_html');
            $table->renameColumn('content_raw', 'content');
            $table->dropColumn('subtitle');
        });
    }
}
