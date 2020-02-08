<?php

use App\Http\Controllers\AuthenticateController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'courses'], function ($course) {
    $course -> get('/', 'CourseController@getAllCourses');
    $course -> post('/', 'CourseController@addNewCourse');
});

Route::group(['prefix' => 'levels'], function ($level) {
    $level -> get('/', 'LevelController@getAllLevels');
    $level -> post('/', 'LevelController@addNewLevel');
});

Route::group(['prefix' => 'requirements'], function ($requirement) {
    $requirement -> get('/', 'RequirementsController@getAllRequirements');
    $requirement -> post('/', 'RequirementsController@addNewRequirement');
});

Route::group(['prefix' => 'targets'], function ($target) {
    $target -> get('/', 'TargetController@getAllTargets');
    $target -> post('/', 'TargetController@addNewTarget');
});

Route::group(['prefix' => 'teachers'], function ($teacher) {
    $teacher -> get('/', 'TeacherController@getAllTeachers');
    $teacher -> post('/', 'TeacherController@addNewTeacher');
});

Route::group(['prefix' => 'topics'], function ($topic) {
    $topic -> get('/', 'TopicController@getAllTopics');
    $topic -> post('/', 'TopicController@addNewTopic');
});

Route::group(['prefix' => 'auth'], function($auth){
    $auth ->post('/login', 'AuthenticateController@authenticate')->name('login');
    $auth ->post('/register', 'AuthenticateController@register')->name('register');
});