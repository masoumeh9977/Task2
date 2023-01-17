<?php

use App\Models\Topic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    //First Query of the Task
    $topic = Topic::withCount('tickets')->findOrFail(1);
    //dd($topic->tickets_count);

    //Second Query of the Task
    $tickets_count = $topic->tickets_count;
    $topics_count = Topic::where('id', '<>', $topic->id)->where('topic_parent_id', $topic->id)->get()->count();
    dd($tickets_count + $topics_count);
});
